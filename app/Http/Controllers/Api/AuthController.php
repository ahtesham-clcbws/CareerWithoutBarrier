<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OtpVerifications;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $message = '';
            $success = true;

            // Check if email is in use
            $checkEmail = Student::where('email', $request->email)->first();
            if ($checkEmail) {
                $message = 'Email already in use.';
                $success = false;
            }

            // Check if mobile is in use
            $checkMobile = Student::where('mobile', $request->mobile)->first();
            if ($checkMobile) {
                $message = 'Mobile number already in use.';
                $success = false;
            }

            // If either email or mobile is already in use
            if (!$success) {
                return response()->json(['success' => $success, 'message' => $message], 200);
            }

            // Generate and save OTP
            $otpVerification = new OtpVerifications;
            $otp = mt_rand(100000, 999999);
            $otpVerification->credential = $request->mobile;
            $otpVerification->otp = $otp;
            $otpVerification->type = 'mobile';
            $otpVerification->save();

            // Return success response
            return response()->json(['status' => true, 'message' => 'OTP Sent Successfully'], 200);
        } catch (\Throwable $th) {
            // Return error response
            return response()->json(['success' => false, 'message' => $th->getMessage()], $th->getCode());
        }
    }

    /**
     * Verifies the provided OTP for the mobile number.
     *
     * @param Request $request The request object containing the mobile number and OTP to be verified.
     * @return \Illuminate\Http\JsonResponse Returns a JSON response with success status, message, and optionally, error details.
     * @throws \Throwable If an error occurs during the process.
     */
    public function verifyOTP(Request $request)
    {
        try {
            $otpVerification = OtpVerifications::where([['credential', '=', $request->mobile], ['otp', '=', $request->otp], ['status', '=', 0]])->first();

            if (!$otpVerification) {
                return response()->json(['success' => false, 'message' => 'Invalid OTP.']);
            }

            $otpVerification->status = 1;
            $otpVerification->save();

            return response()->json(['success' => true, 'message' => 'OTP verified successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], $th->getCode());
        }
    }

    /**
     * Registers a new student user.
     *
     * @param Request $request The request object containing the registration details.
     * @return \Illuminate\Http\JsonResponse Returns a JSON response with success status, message, and optionally, error details.
     * @throws \Throwable If an error occurs during the process.
     */
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
            ]);

            $student = new Student();

            $student->name = $request->name;
            $student->email = $request->email;
            $student->mobile = $request->mobile;
            $student->gender = $request->gender;
            $student->disability = $request->disability;

            $student->password = Hash::make($request->password);
            $student->login_password = $request->password;
            $student->save();

            // Log the user in after registration
            Auth::guard('student')->login($student);

            $user = Auth::guard('student')->user();
            $user->token = $user->createToken($request->email);

            return response()->json(['success' => true, 'message' => 'User registered successfully.', 'user' => $user]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function loginUser(Request $request){
        if (!$request->mobile) {
            return response()->json(['success' => false,'msg' => 'Mobile number is required.']);
        }

        $student = Student::where('mobile', $request->mobile)->first();

        if (!$student) {
            return response()->json(['success' => false,'msg' => 'Student not found.']);
        }

        if (Hash::check($request->password, $student->password)) {
            $token = $student->createToken($request->mobile);
            $student->token = $token->plainTextToken;
            return response()->json(['success' => true,'msg' => 'Student logged in successfully.', 'user' => $student]);
        } else {
            return response()->json(['success' => false,'msg' => 'Invalid password.']);
        }
    }


    public function usersignup(Request $request)
    {
        if (!$request->mobile) {
            return response()->json(['success' => false, 'msg' => 'Mobile number is required.']);
        }

        $uniqueMobile = "unique:" . Student::class;
        $uniqueEmail = "unique:" . Student::class;

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => "required|string|lowercase|email|$uniqueEmail",
            'mobile' => "required|digits:10|$uniqueMobile",
            'gender' => 'required',
            'otp' => 'required',
            'password' => 'required',
            'disability' => 'required',
            'confirmpassword' => 'required|same:password',
        ]);

        try {
            if (OtpVerifications::where([['credential', '=', $request->mobile], ['otp', '=', $request->otp], ['status', '=', 1]])->count() == 0) {
                return response()->json(['success' => false, 'msg' => 'Otp is not verified.']);
            }
            $student = new Student();
            $student->forceFill(collect($validatedData)->except('confirmpassword', 'otp')->all());
            $student->password = Hash::make($request->password);
            $student->login_password = $request->password;
            $student->save();

            // Log the user in after registration
            Auth::guard('student')->login($student);

            $user = Auth::guard('student')->user();
            $user->token = $user->createToken($request->token_name);

            return response()->json(['success' => true, 'msg' => 'Registered and login successfully', 'user' => $user]);
        } catch (\Throwable $th) {
            logger('message failed:', [$th]);
            return response()->json(['success' => false, 'msg' => $th->getMessage()]);
        }
    }

    // public function login(Request $request)
    // {
    //     if (Auth::guard('student')->check()) return redirect()->route('studentDashboard');

    //     if ($request->method() == 'POST') {
    //         $request->validate([
    //             'mobile' => 'required',
    //             'password' => 'required'

    //         ], [
    //             'mobile.required' => 'Please Enter Registration no.',
    //             'password.required' => 'Please Enter Password',
    //         ]);
    //         // dd(['mobile' => $request->mobile, 'password' => $request->password]);
    //         if (Auth::guard('student')->attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
    //             return response()->json(['success' => true]);
    //         } else {
    //             return response()->json(['success' => false]);
    //         }
    //     }

    //     return back();
    // }


    // other function
    public function sendOtpToStudent($email, $mobileNumber)
    {

    }

}
