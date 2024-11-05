<?php

namespace App\Livewire\Auth;

use App\Models\District;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;

// #[Layout('layouts.website')]
class RegistrationForm extends Component
{
    public $showPassword = false;

    public $isFormValid = true;
    public $formError = null;

    public $selectedState = null;
    public $selectedDistrict = null;
    public $selectedDistrictData = null;

    public $districts = [];

    public $institudeTermsCondition;

    // form inputs data
    public string $name;
    public $nameError = null;
    public string $gender;
    public $genderError = null;
    public string $email;
    public $emailError = null;
    public string $mobile;
    public $mobileError = null;
    public string $password;
    public $passwordError = null;
    public string $confirmPassword;
    public $confirmPasswordError = null;
    public string $disability = 'No';
    public $disabilityError = null;
    public string $terms;
    public $termsError = null;

    public $otpRequestId = null;
    public bool $otpSendSuccess = false;
    public string $userOtp;
    public $userOtpError = null;

    public $isMobileVerified = false;

    public function mount()
    {
        $terms = DB::table('terms_conditions')->where([['status', 1], ['type', 'student'], ['page_name', 'terms-and-condition']])->first();
        if ($terms) {
            $this->institudeTermsCondition = $terms->terms_condition_pdf;
            $this->terms = false;
        } else {
            $this->institudeTermsCondition = null;
            $this->terms = true;
        }
    }

    public function render()
    {
        return view('livewire.auth.registration-form');
    }

    public function updated($property)
    {
        if ($property == 'selectedState') {
            $this->selectedDistrictData = null;
        } else if ($property = 'selectedDistrict') {
            $this->selectedDistrictData = District::find($this->selectedDistrict);
        }
    }

    public function register()
    {
        $checkPhone = Student::where('mobile', $this->mobile)->first();
        if ($checkPhone) {
            $this->mobileError = 'Phone number already exist, please change.';
            $this->js("toastr.error('Phone number already exist, please change.')");
        } else {
            $this->mobileError = null;
        }
        $checkEmail = Student::where('email', $this->email)->first();
        if ($checkEmail) {
            $this->emailError = 'Email already exist, please change.';
            $this->js("toastr.error('Email already exist, please change.')");
        } else {
            $this->emailError = null;
        }

        if (!$checkPhone && !$checkEmail) {
            // validate other fields
            if (!in_array(strtolower($this->gender), ['male', 'female', 'transgender']) || strlen($this->mobile) != 10 || !filter_var($this->email, FILTER_VALIDATE_EMAIL) || $this->password != $this->confirmPassword) {
                if (!in_array(strtolower($this->gender), ['male', 'female', 'transgender'])) {
                    $this->genderError = 'Select Gender';
                    $this->js("toastr.error('Select Gender')");
                } else {
                    $this->genderError = null;
                }

                if (strlen($this->mobile) != 10) {
                    $this->mobileError = 'Input valid phone number, and it should be 10 digits.';
                    $this->js("toastr.error('Input valid phone number, and it should be 10 digits.')");
                } else {
                    $this->mobileError = null;
                }

                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $this->emailError = 'Enter valid email address';
                    $this->js("toastr.error('Enter valid email address')");
                } else {
                    $this->emailError = null;
                }

                if ($this->password != $this->confirmPassword) {
                    $this->confirmPasswordError = 'Password doesn\'t match.';
                    $this->js("toastr.error('Password doesn\'t match.')");
                } else {
                    $this->confirmPasswordError = null;
                }
                return false;
            }
            if (!$this->otpSendSuccess || !$this->otpRequestId) {
                // continue to send otp to the user mobile
                $this->otpRequestId = 'someRequestIdAfterOTP';
                $this->otpSendSuccess = true;
            } else {
                // verify otp here
                $checkOtpVerify = true;
                if (!$checkOtpVerify) {
                    $this->js("toastr.error('OTP doesn\'t match, try again.')");
                    return false;
                }
                $this->isMobileVerified = true;
                // register the user
                try {
                    // check by disctrict for real time data now
                    $dstrict = District::find($this->selectedDistrict);
                    if (intval($dstrict->getRemainingForms()) > 0) {
                        $student = new Student();

                        $student->state_id = $this->selectedState;
                        $student->district_id = $this->selectedDistrict;

                        $student->name = $this->name;
                        $student->email = $this->email;
                        $student->mobile = $this->mobile;
                        $student->gender = $this->gender;
                        $student->disability = $this->disability;

                        $student->password = Hash::make($this->password);
                        $student->login_password = $this->password;
                        $student->save();

                        // Log the user in after registration
                        Auth::guard('student')->login($student);
                        $this->js("toastr.success('Registered successfully.')");

                        return $this->redirect('/students/studentDashboard');
                    } else {
                        $this->js("toastr.error('Forms not available for this district right now, please after some time, or contact administrator.')");
                        return false;
                    }
                } catch (\Throwable $th) {
                    $this->js("toastr.error('Unable to register, try after some time.')");
                    return false;
                }
            }
        }
    }

    public function togglePasswords() {}
}
