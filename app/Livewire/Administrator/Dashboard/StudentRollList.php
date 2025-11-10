<?php

namespace App\Livewire\Administrator\Dashboard;

use App\Models\BoardAgencyStateModel;
use App\Models\District;
use App\Models\DistrictScholarshipLimit;
use App\Models\EducationType;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentCode;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('administrator.layouts.master')]
class StudentRollList extends Component
{
    use WithPagination;

    #[Url('perPage')]
    public $perPage = 5;

    #[Url('search')]
    public $search = '';

    #[Url('district_id')]
    public $district_id = '';

    #[Url('genders')]
    public $genders = [];

    #[Url('scholarhips')]
    public $scholarhips = [];

    #[Url('classes')]
    public $classes = [];

    #[Url('roll_number_filter')]
    public $roll_number_filter = 'A';

    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $cities = District::orderBy('name')->get();

        $query = Student::query()
            ->with([
                'choiceCenterA',
                'studentPayment',
                'district',
                'qualifications',
                'scholarShipCategory',
                'scholarShipOptedFor',
                'latestStudentCode',
            ]);

        if ($this->district_id) {
            $query->where('district_id', $this->district_id);
        }

        if (!empty($this->genders)) {
            $query->whereIn('gender', $this->genders);
        }

        if (!empty($this->scholarhips)) {
            $query->whereIn('scholarship_category', $this->scholarhips);
        }

        if (!empty($this->classes)) {
            $query->whereIn('qualification', $this->classes);
        }

        // if ($this->roll_number_filter) {
        if ($this->roll_number_filter == 'B') {
            $query
                // ->with('latestStudentCode:student_codes.id,student_codes.roll_no,student_codes.stud_id,student_codes.created_at')
                ->whereHas('latestStudentCode', function ($q) {
                    $q->whereNotNull('roll_no');
                });
        } elseif ($this->roll_number_filter == 'C') {
            $query
                // ->with('latestStudentCode:student_codes.id,student_codes.roll_no,student_codes.stud_id,student_codes.created_at')
                ->whereHas('latestStudentCode', function ($q) {
                    $q->whereNull('roll_no');
                });
        } else {
            // $query->with('latestStudentCode:student_codes.id,student_codes.roll_no,student_codes.stud_id,student_codes.created_at');
        }
        // } else {
        //     $query->with('latestStudentCode:student_codes.id,student_codes.roll_no,student_codes.stud_id,student_codes.created_at');
        // }

        $query->withAggregate('latestStudentCode', 'roll_no');

        $query->where('is_final_submitted', 1);

        $query->orderBy('latest_student_code_roll_no');

        $students = $query->paginate($this->perPage);

        return view('livewire.administrator.dashboard.student-roll-list', compact('students', 'cities'));
    }

    public function clearFilter(?string $filter = null)
    {
        if ($filter == 'district') {
            $this->district_id = '';
        } elseif ($filter == 'gender') {
            $this->genders = [];
        } elseif ($filter == 'scholarhip') {
            $this->scholarhips = [];
        } elseif ($filter == 'class') {
            $this->classes = [];
        } else {
            $this->district_id = '';
            $this->genders = [];
            $this->scholarhips = [];
            $this->classes = [];
            $this->roll_number_filter = 'A';
        }
    }

    public function resetRollNumbers()
    {
        $studentsQuery = Student::select('id', 'district_id', 'scholarship_category', 'qualification', 'gender', 'is_final_submitted');
        if ($this->district_id) {
            $studentsQuery->where('district_id', $this->district_id);
        }
        if (!empty($this->scholarhips)) {
            $studentsQuery->whereIn('scholarship_category', $this->scholarhips);
        }
        if (!empty($this->classes)) {
            $studentsQuery->whereIn('qualification', $this->classes);
        }
        if (!empty($this->genders)) {
            $studentsQuery->whereIn('gender', $this->genders);
        }
        $studentsQuery->where('is_final_submitted', 1);
        $studentsQuery
            ->with('latestStudentCode:student_codes.id,student_codes.roll_no,student_codes.stud_id,student_codes.created_at')
            ->whereHas('latestStudentCode', function ($q) {
                $q->whereNotNull('roll_no');
            });
        $studentsQuery->orderBy('id', 'desc');
        $allStudents = $studentsQuery->get();
        $studentCodeIds = $allStudents->pluck('latestStudentCode.id')->toArray();
        // logger('studentCodeIds: ', $studentCodeIds);
        StudentCode::whereIn('id', $studentCodeIds)->update(['roll_no' => null]);
        return $this->js('alert("Rest Selected roll numbers successfull.")');
    }

    public function generateRollNumbers()
    {
        if (DistrictScholarshipLimit::where('start_from', 0)->count() > 1) {
            setFormsStartEndSerial();
        }

        if ($this->district_id && !empty($this->scholarhips) && !empty($this->classes) && !empty($this->genders)) {
            $studentsQuery = Student::select('id', 'district_id', 'scholarship_category', 'qualification', 'gender', 'is_final_submitted');
            $studentsQuery->where('district_id', $this->district_id);
            $studentsQuery->whereIn('scholarship_category', $this->scholarhips);
            $studentsQuery->whereIn('qualification', $this->classes);
            $studentsQuery->whereIn('gender', $this->genders);
            $studentsQuery->where('is_final_submitted', 1);
            $studentsQuery
                ->with('latestStudentCode:student_codes.id,student_codes.roll_no,student_codes.stud_id,student_codes.created_at')
                ->whereHas('latestStudentCode', function ($q) {
                    $q->whereNull('roll_no');
                });
            $studentsQuery->orderBy('id', 'desc');
            $allStudents = $studentsQuery->get();
            // logger('students: ', [$students->toArray()]);
            // $fields = ['scholarship_category', 'qualification', 'gender'];
            $fields = ['qualification', 'gender'];

            foreach ($this->scholarhips as $key => $scholarhip) {
                $students = $allStudents->where('scholarship_category', $scholarhip);
                $sortedStudents = alternateSort($students, $fields);

                $rollNumbers = getRollNumbers($this->district_id, $scholarhip, $sortedStudents->count());
                if ($rollNumbers['success']) {
                    $roll_numbers = $rollNumbers['roll_numbers'];
                    foreach ($sortedStudents as $key => $student) {
                        $student->latestStudentCode->roll_no = isset($roll_numbers[$key]) ? $roll_numbers[$key] : null;
                        $student->latestStudentCode->save();
                    }
                } else {
                    $this->js('alert("' . $rollNumbers['message'] . '")');
                }
            }
        } else {
            return $this->js('alert("Please select: District, Scholarship Type, Class/Exam and Gender.")');
        }
    }
}
