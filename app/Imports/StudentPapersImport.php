<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\StudentCode;
use App\Models\StudentPaperExported;
use App\Services\StudentRankService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class StudentPapersImport implements ToCollection, WithHeadingRow
{
    protected $studentRankService;

    public function __construct()
    {
        $this->studentRankService = new StudentRankService;
    }

    public function collection(Collection $rows)
    {
        try {
            $rows = $rows->map(function ($row) {
                return collect($row)->mapWithKeys(function ($value, $key) {
                    return [strtolower($key) => $value];
                })->toArray();
            });

            foreach ($rows as $row) {
                $validator = Validator::make($row, [
                    'application_number' => 'required',
                    'wrong_answers' => 'required|integer',
                    'right_answers' => 'required|integer',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator);
                }

                $studentPapers = StudentPaperExported::where('app_code', $row['application_number'])->get();

                if ($studentPapers->isNotEmpty()) {
                    foreach ($studentPapers as $studPaper) {
                        $subjectName = str_replace(' ', '_', strtolower($studPaper->subject_name));

                        if (isset($row[$subjectName])) {
                            $subjPaper = $studPaper->subjectPaperDetail;
                            
                            // Calculate marks per question: max_marks / total_questions
                            $perQuestionMark = $subjPaper->total_questions > 0 ? ($subjPaper->max_marks / $subjPaper->total_questions) : 0;
                            
                            $wrongAnswers = intval($row['wrong_answers']);
                            $rightAnswers = intval($row['right_answers']);
                            $attemptedQuestions = $wrongAnswers + $rightAnswers;
                            $skippedQuestions = $subjPaper->total_questions - $attemptedQuestions;
                            
                            $wrongDeduction = $wrongAnswers * ($subjPaper->negative_marks_wrong ?? 0);
                            $skippedDeduction = $skippedQuestions * ($subjPaper->negative_marks_skipped ?? 0);
                            
                            $obtainedMarks = ($rightAnswers * $perQuestionMark) - $wrongDeduction - $skippedDeduction;

                            $studPaper->obtained_marks = $obtainedMarks;
                            $studPaper->wrong_answers = $wrongAnswers;
                            $studPaper->right_answers = $rightAnswers;
                            $studPaper->attempted_questions = $attemptedQuestions;
                            $studPaper->total_questions = $subjPaper->total_questions;
                            $studPaper->is_imported = true;
                            $studPaper->save();
                        }
                    }

                    $student = Student::find($studentPapers->first()?->student_id);

                    $appCode = $student?->latestStudentCode;

                    $appCode->total_max_marks = $studentPapers->sum('max_marks');
                    $appCode->total_obtained_marks = $studentPapers->sum('obtained_marks');
                    $appCode->percentage = (floatval($studentPapers->sum('obtained_marks')) / floatval($studentPapers->sum('max_marks'))) * 100;
                    $appCode->save();
                }
            }

            $students = Student::with(['latestStudentCode'])->get();

            foreach ($students as $student) {
                if ($student->percentage) {
                    $appCode = $student?->latestStudentCode;
                    if ($appCode) {
                        $appCode->rank = $this->studentRankService->calculateOverallRank($student->id);
                        $appCode->district_rank = $this->studentRankService->calculateDistrictRank($student->id);
                        $appCode->state_rank = $this->studentRankService->calculateStateRank($student->id);
                        $appCode->gender_rank = $this->studentRankService->calculateGenderRank($student->id);
                        $appCode->save();
                    }
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
