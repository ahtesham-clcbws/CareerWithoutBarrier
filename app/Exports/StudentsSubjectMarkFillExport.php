<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Student;
use App\Models\StudentPaperExported;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class StudentsSubjectMarkFillExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting, WithStyles, ShouldAutoSize
{
    public $students;
    public $rowNumber = 1;
    public $subjects;
    public $subjectMapping;

    public function __construct($subjectMapping)
    {
        $this->students = Student::where('scholarship_category', $subjectMapping->education_type_id)
            ->whereIn('scholarship_opted_for', json_decode($subjectMapping->name))
            ->with(['latestStudentCode', 'scholarShipCategory'])
            ->get();

        $this->subjects = $subjectMapping->subjects();

        $this->subjectMapping = $subjectMapping;
    }

    public function collection()
    {
        return $this->students;
    }

    public function map($row): array
    {
        $allSubjects = [];

        foreach ($this->subjects as $subject) {
            $allSubjects[] = $subject->name;
        }

        $studPaperExporteds = StudentPaperExported::where('student_id', $row->id)->where('app_code', $row->latestStudentCode?->application_code)->orderBy('subject_id')->get();
        
        if ($studPaperExporteds->isEmpty()) {
            foreach ($this->subjects as $subject) {

                $subjectPaper = DB::table('subject_paper_details')
                ->where('subject_mapping_id',$this->subjectMapping->id)
                ->where('subject_id', $subject->id)->get();

                $studPaperExporteds = new StudentPaperExported;
                $studPaperExporteds->student_id = $row->id;
                $studPaperExporteds->subject_mapping_id = $this->subjectMapping->id;
                $studPaperExporteds->app_code = $row->latestStudentCode?->application_code;
                $studPaperExporteds->subject_id = $subject->id;
                $studPaperExporteds->subject_name = $subject->name;
                $studPaperExporteds->max_marks = $subjectPaper->sum('max_marks');
                $studPaperExporteds->save();
            }
        }

        return [
            $this->rowNumber++,
            $studPaperExporteds->first()?->id,
            ucfirst($row->name),
            $row->father_name,
            $row->gender == 'Male' ? 'M' : ($row->gender == 'Female' ? 'F' : 'T'),
            Date::dateTimeToExcel(Carbon::parse($row->dob)),
            $row->state?->name,
            $row->district?->name,
            $row->latestStudentCode?->application_code,
            $row->latestStudentCode?->roll_no,
            $row->scholarShipCategory?->name,
            '',
            ''
        ];
    }

    public function headings(): array
    {
        $headings = [
            'Sr.No',
            'student_id',
            'Name',
            'Father\'s Name',
            'Gender',
            'Date of Birth',
            'State',
            'City',
            'Application Number',
            'Roll No',
            'Scholarship Category',
        ];

        // Add exam subject names as headings
        foreach ($this->subjects as $subject) {
            $headings[] = $subject->name;
        }
        $headings[] = 'Wrong Answers';
        $headings[] = 'Right Answers';
        return $headings;
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['argb' => 'FF0000']]],
        ];
    }
}
