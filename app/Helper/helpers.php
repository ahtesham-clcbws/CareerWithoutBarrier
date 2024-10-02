<?php

use App\Models\Image;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
    $displayString .= ")";

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
    return $student;
}
function getBase64Image($base64String){
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
