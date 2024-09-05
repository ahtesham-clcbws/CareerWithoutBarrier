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

                        $studPaper->obtained_marks = $row[$subjectName];
                        $studPaper->wrong_answers = $row['wrong_answers'];
                        $studPaper->right_answers = $row['right_answers'];
                        $studPaper->attempted_questions = $row['wrong_answers'] + $row['right_answers'];
                        $studPaper->total_questions = $subjPaper->total_questions;
                        $studPaper->is_imported = true;
                        $studPaper->save();
                    }
                }

                $student = Student::find($studentPapers->first()?->student_id);

                $appCode = $student?->latestStudentCode;

                $appCode->total_max_marks = $studentPapers->sum('max_marks');
                $appCode->total_obtained_marks = $studentPapers->sum('obtained_marks');
                $appCode->percentage = (intval($studentPapers->sum('obtained_marks')) / intval($studentPapers->sum('max_marks'))) * 100;
                $appCode->save();
            }
        }

        $students = Student::with(['latestStudentCode'])->all();

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
    }
}
