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

    public function verifyMobileEmail(Request $request)
    {
        $checkEmail = Student::where('email', $request->email)->first();
        if ($checkEmail) {
            return response()->json(['success' => false, 'message' => 'Email already in use.']);
        }
        $checkMobile = Student::where('mobile', $request->mobile)->first();
        if ($checkMobile) {
            return response()->json(['success' => false, 'message' => 'Mobile number in use.']);
        }
        OtpVerifications::insert([
            [
                'type'=>'mobile',
                'credential'=>$request->mobile,
                'otp'=>'mobile',
                'status'=>0,
            ]
        ]);
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
        // Redirect back or return a response
        return redirect()->route('studentDashboard');
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
