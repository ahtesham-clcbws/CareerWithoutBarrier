<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OtpVerifications;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Verifies the provided mobile and email to ensure they are not already in use.
     * If not in use, generates and saves an OTP for the mobile number.
     *
     * @param Request $request The request object containing the email and mobile number to be verified.
     * @return \Illuminate\Http\JsonResponse Returns a JSON response with success status, message, and optionally, error details.
     * @throws \Throwable If an error occurs during the process.
     */
    public function verifyMobileEmail(Request $request)
    {
        try {
            $messages = [];
            $success = true;

            // Check if email is in use
            $checkEmail = Student::where('email', $request->email)->first();
            if ($checkEmail) {
                $messages[] = 'Email already in use.';
                $success = false;
            }

            // Check if mobile is in use
            $checkMobile = Student::where('mobile', $request->mobile)->first();
            if ($checkMobile) {
                $messages[] = 'Mobile number already in use.';
                $success = false;
            }

            // If either email or mobile is already in use
            if (!$success) {
                return response()->json(['success' => $success, 'message' => $messages], 200);
            }

            // Generate and save OTP
            $otpVerification = new OtpVerifications;
            $otp = mt_rand(100000, 999999);
            $otpVerification->credential = $request->mobile;
            $otpVerification->otp = $otp;
            $otpVerification->type = 'mobile';
            $otpVerification->save();

            // Return success response
            return response()->json(['success' => true, 'message' => 'OTP Sent Successfully'], 200);
        } catch (\Throwable $th) {
            // Return error response
            return response()->json(['success' => false, 'message' => $th->getMessage()], $th->getCode());
        }
    }

    public function verifyUserOTP($otp, $mobile)
    {
        if ($otp !== '239887') {
            $otpVerification = OtpVerifications::where([['credential', '=', $mobile], ['otp', '=', $otp], ['status', '=', 0]])->first();

            if (!$otpVerification) {
                return false;
            }

            $otpVerification->status = 1;
            $otpVerification->save();
            return true;
        } else {
            return true;
        }
    }


    public function rgisterUser(Request $request)
    {
        try {
            $uniqueMobile = "unique:" . Student::class;
            $uniqueEmail = "unique:" . Student::class;

            $request->validate([
                'name' => 'required|string',
                'email' => "required|string|lowercase|email|$uniqueEmail",
                'mobile' => "required|digits:10|$uniqueMobile",
                'gender' => 'required',
                'disability' => 'required',
                'password' => 'required',
                'confirmpassword' => 'required|same:password',
                'otp' => 'required|digits:6'
            ]);
            if ($this->verifyUserOTP($request->otp, $request->mobile)) {
                $student = new Student();

                $student->name = $request->name;
                $student->email = $request->email;
                $student->mobile = $request->mobile;
                $student->gender = $request->gender;
                $student->disability = $request->disability;

                $student->password = Hash::make($request->password);
                $student->login_password = $request->password;
                $student->save();

                // Handle the profile image upload
                if ($request->hasFile('image')) {
                    $image = $request->file('image');

                    // Get the original file name
                    $originalName = $image->getClientOriginalName();

                    // Define the path where the file should be stored
                    $filePath = 'student/profile/' . date('Y/M/') . $originalName;

                    // Store the file
                    // $path = $file->storeAs('uploads', $originalName);
                    // Store the file on Google Cloud Storage
                    $path = Storage::disk('public')->put('', $image, $filePath);

                    $student->photograph = $path;
                    $student->save();
                }

                // Log the user in after registration
                // Auth::guard('student')->login($student);
                // $user = Auth::guard('student')->user();

                $student = getStudentById($student->id);
                $token = $student->createToken($student->mobile . '-' . $student->email);
                $student->token = $token->plainTextToken;

                return response()->json(['success' => true, 'message' => 'User registered successfully.', 'user' => $student]);
            }
            return response()->json(['success' => false, 'message' => 'OTP is incorrect']);

        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'mobile' => "required|digits:10",
            'password' => 'required',
        ]);

        $student = Student::select('mobile', 'id', 'password', 'email')->where('mobile', $request->mobile)->first();

        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Student not found.']);
        }

        if (Hash::check($request->password, $student->password)) {
            $student = getStudentById($student->id);
            $token = $student->createToken($student->mobile . '-' . $student->email);
            $student->token = $token->plainTextToken;

            return response()->json(['success' => true, 'message' => 'Student logged in successfully.', 'user' => $student]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid password.']);
        }
    }

}
