<?php

use App\Models\District;
use App\Models\DistrictScholarshipLimit;
use App\Models\EducationType;
use App\Models\Image;
use App\Models\Student;
use App\Models\StudentCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

function moveFile($path, $files)
{
    if (is_null($files)) {
        return null;
    }
    $hasUrl = hash_file('sha256', $files);
    $image = Image::where('has_url', $hasUrl)->first();

    $name = $image?->image_name;

    if (is_null($image)) {
        $name = rand(10000, 99999) . '-' . date('His') . preg_replace('/[^\w\-\.]/', '', $files->getClientOriginalName());
        $files->move(public_path($path), $name);

        $imageUrl = asset(rtrim($path, '/') . '/' . $name);

        $image = new Image();
        $image->url = $imageUrl;
        $image->has_url = $hasUrl;
        $image->image_name = $name;
        $image->image_path = $path;
        $image->save();

        $image->url = $imageUrl . '?' . $image->id;
        $image->save();
    }

    return $name;
}

function familyIncome($family_income)
{
    $incomeRange = '';
    switch ($family_income) {
        case '1':
            $incomeRange = 'Less than 1L';
            break;
        case '2':
            $incomeRange = '1L to 2L';
            break;
        case '3':
            $incomeRange = '2L to 3L';
            break;
        case '4':
            $incomeRange = '3L to 5L';
            break;
        case '5':
            $incomeRange = '5L and above';
            break;
        default:
            $incomeRange = '';
    }
    return $incomeRange;
}

function institudeCodeGenerate($institudeNamte): string
{
    preg_match_all('/\b(\w)/', $institudeNamte, $matches);
    $firstLetters = implode('', $matches[1]);

    // Generate a random number
    $randomNumber = rand(10000000, 99999999);

    // Concatenate the first letters with the random number
    return strtoupper($firstLetters) . $randomNumber;
}

if (!function_exists('couponValueApply')) {
    function couponValueApply($valueType, $value)
    {
        $valueAmount = $valueType == 'amount' ? $value : (750 * ($value / 100));
        return 750 - $valueAmount;
    }
}

function maskMobile($mobile)
{
    return 'xxxxxxx' . substr($mobile, -3);
}

function maskEmail($email)
{
    $atPos = strpos($email, '@');

    if ($atPos !== false) {
        return substr($email, 0, 2) . str_repeat('*', $atPos - 2) . substr($email, $atPos);
    }
    return $email;
}

function getExamTime($exam_at, $exam_hours)
{
    // Get exam start time (exam_at) and convert exam_hours to minutes
    $startTime = Carbon::parse($exam_at);
    $endTime = $startTime->copy()->addMinutes($exam_hours);

    // Format times
    $formattedStartTime = $startTime->format('g:i A');
    $formattedEndTime = $endTime->format('g:i A');

    // Calculate duration in hours and minutes
    $durationHours = floor($exam_hours / 60);
    $durationMinutes = $exam_hours % 60;

    // Prepare display string
    $displayString = "{$formattedStartTime} - {$formattedEndTime} ({$durationHours} Hrs";

    if ($durationMinutes > 0) {
        $displayString .= " {$durationMinutes} Min";
    }
    $displayString .= ')';

    return $displayString;
}

function encodeId($id)
{
    return base64_encode($id);
}

function decodeId($encodedId)
{
    try {
        return base64_decode($encodedId);
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
        return null;
    }
}

if (!function_exists('wrapHalfTitleInSpan')) {
    function wrapHalfTitleInSpan($title)
    {
        $words = explode(' ', $title);
        $half = (int) ceil(count($words) / 2);

        $firstHalf = implode(' ', array_slice($words, 0, $half));
        $secondHalf = implode(' ', array_slice($words, $half));

        return "{$firstHalf} <span>{$secondHalf}</span>";
    }
}

if (!function_exists('decimal_Number')) {
    function decimal_Number($number)
    {
        $number = (string) $number;

        if (strpos($number, '.') === false) {
            return $number . '.00';
        }
        return $number;
    }
}

if (!function_exists('genderShort')) {
    function genderShort($gender)
    {
        return match (strtolower($gender)) {
            'male' => 'M',
            'female' => 'F',
            default => 'T'
        };
    }
}

function getStudentById($id)
{
    $student = Student::with([
        'studentCode',
        'latestStudentCode',
        'studentClaimForm',
        'studentPayment',
        'state',
        'district',
        'choiceCenterA',
        'choiceCenterB',
        'qualifications',
        'scholarShipCategory',
        'scholarShipOptedFor',
        'studentPaperDetails',
        'scholarship_granted',
        'testimonial',
    ])->find($id);
    $student->career_one_year = $student->year;
    if ($student->scholar_ship_category) {
        $student->scholar_ship_category->name = str_replace("\r\n", ' ', $student->scholar_ship_category->name);
    }

    return $student;
}

function getBase64Image($base64String)
{
    try {
        // Decode the base64 image
        $imageData = str_replace('data:image/jpg;base64,', '', $base64String);
        $imageData = str_replace(' ', '+', $imageData);
        return base64_decode($imageData);
    } catch (\Throwable $th) {
        Log::error('base64 decode failed', [$th->getMessage()]);
        return null;
    }
}

/**
 * Get the registration limit for a given district and education type.
 * Returns 0 if no limit is set.
 */
function getLimit($districtId, $educationTypeId)
{
    // return [$districtId, $educationTypeId];
    $limit = DistrictScholarshipLimit::where('district_id', $districtId)
        ->where('education_type_id', $educationTypeId)
        ->first();

    // return $limit;
    return $limit ? $limit->max_registration_limit : 0;
}

function isFirstTimeRollNumberGeneration()
{
    return StudentCode::whereNotNull('roll_no')->first() ? false : true;
}

function setFormsStartEndSerial()
{
    $allLimits = DistrictScholarshipLimit::query()->orderBy('district_id')->get();
    $lastNumber = 0;
    foreach ($allLimits as $index => $limit) {
        $startNumber = $lastNumber;
        if ($startNumber == 0) {
            $startNumber = 1;
        }
        $limit->start_from = $startNumber;
        $limit->save();

        $lastNumber = $lastNumber + $limit->max_registration_limit;
    }
}

function resetFormSerials()
{
    DistrictScholarshipLimit::query()->update(['start_from' => 0]);
}

function getRollNumbers($district_id, $scholarship_category, $total)
{
    try {
        $query = DistrictScholarshipLimit::where(['district_id' => $district_id, 'education_type_id' => $scholarship_category])->first();

        if ($query) {
            $alreadyCreatedRollNumbers = Student::where('district_id', $district_id)
                ->where('scholarship_category', $scholarship_category)
                ->whereHas('latestStudentCode', function ($q) {
                    $q->whereNotNull('roll_no');
                })
                ->count();

            $rollNumberStarts = ($query->start_from + 1) + $alreadyCreatedRollNumbers;
            $rollNumberEnds = $query->start_from + $query->max_registration_limit;

            $rollNumbers = [];
            for ($i = 0; $i < $total; $i++) {
                $rollNumbers[] = '1' . sprintf('%05d', ($rollNumberStarts + $i));
            }

            // logger('getRollNumbers', [$rollNumbers]);
            // return $rollNumbers;
            return [
                'success' => true,
                'roll_numbers' => $rollNumbers
            ];
        } else {
            $district = District::find($district_id);
            $scholarship = EducationType::find($scholarship_category);
            $message = 'There is no limit defined for ' . $scholarship->name . ' in ' . $district->name;
            return [
                'success' => false,
                'message' => $message
            ];
        }
    } catch (\Throwable $th) {
        // throw $th;
        logger('roll number generation error: ', [$th]);
        return [
            'success' => false,
            'message' => $th->getMessage()
        ];
    }
}

/**
 * Recursively group and round-robin merge Eloquent models by fields.
 *
 * @param \Illuminate\Support\Collection $students
 * @param array $fields   Order of fields to alternate by
 * @return \Illuminate\Support\Collection
 */
function alternateSort(Collection $students, array $fields): Collection
{
    if (empty($fields) || $students->count() <= 1) {
        return $students->values();
    }

    $field = array_shift($fields);

    // Group by current field
    $grouped = $students->groupBy($field);

    // Recursively apply to subgroups
    $grouped = $grouped->map(function ($group) use ($fields) {
        return alternateSort($group, $fields);
    });

    // Round-robin merge
    $result = collect();
    while ($grouped->flatten(1)->isNotEmpty()) {
        foreach ($grouped as $key => $group) {
            if ($group->isNotEmpty()) {
                $result->push($group->shift());
            }
        }
    }

    return $result->values();
}
