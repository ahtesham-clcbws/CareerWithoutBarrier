<?php
namespace App\Services;

use App\Models\Student;

class StudentRankService
{
    public function calculateOverallRank($studentId)
    {
        $student = Student::findOrFail($studentId);
        $studentPercentage = $student->percentage;

        $percentages = Student::with('latestStudentCode')
            ->get()
            ->pluck('percentage')
            ->sortDesc();

        $rank = $percentages->search($studentPercentage) + 1;

        return $rank;
    }

    public function calculateStateRank($studentId)
    {
        $student = Student::findOrFail($studentId);
        $stateId = $student->state_id;
        $studentPercentage = $student->percentage;

        $percentages = Student::where('state_id', $stateId)
            ->with('latestStudentCode')
            ->get()
            ->pluck('percentage')
            ->sortDesc();

        $rank = $percentages->search($studentPercentage) + 1;

        return $rank;
    }

    public function calculateDistrictRank($studentId)
    {
        $student = Student::findOrFail($studentId);
        $districtId = $student->district_id;
        $studentPercentage = $student->percentage;

        $percentages = Student::where('district_id', $districtId)
            ->with('latestStudentCode')
            ->get()
            ->pluck('percentage')
            ->sortDesc();

        $rank = $percentages->search($studentPercentage) + 1;

        return $rank;
    }

    public function calculateGenderRank($studentId)
    {
        $student = Student::findOrFail($studentId);
        $gender = $student->gender;
        $studentPercentage = $student->percentage;

        $percentages = Student::where('gender', $gender)
            ->with('latestStudentCode')
            ->get()
            ->pluck('percentage')
            ->sortDesc();

        $rank = $percentages->search($studentPercentage) + 1;

        return $rank;
    }
}
