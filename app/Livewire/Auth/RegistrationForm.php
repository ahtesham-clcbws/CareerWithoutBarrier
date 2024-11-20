<?php

namespace App\Livewire\Auth;

use App\Models\CouponCode;
use App\Models\District;
use App\Models\Student;
use App\Models\StudentCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;
// board_agency_exam

// #[Layout('layouts.website')]
class RegistrationForm extends Component
{
    public $showPassword = false;

    public $isFormValid = true;
    public $formError = null;


    public $selectedBoard = null;
    public $selectedScholarship = null;

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

    public $referrenceCode = null;
    public $referrenceCodeError = null;

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
        if ($property == 'selectedBoard') {
            $this->selectedScholarship = null;
            $this->selectedState = null;
            $this->selectedDistrict = null;
            $this->selectedDistrictData = null;
        }
        if ($property == 'selectedScholarship') {
            $this->selectedState = null;
            $this->selectedDistrict = null;
            $this->selectedDistrictData = null;
        }
        if ($property == 'selectedState') {
            $this->selectedDistrict = null;
            $this->selectedDistrictData = null;
        }
        if ($property == 'selectedState') {
            $this->selectedDistrictData = null;
        } else if ($property = 'selectedDistrict') {
            $this->selectedDistrictData = District::find($this->selectedDistrict);
        }

        if ($property == 'referrenceCode') {
            $this->verifyReferrenceCode();
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

        $validCode = $this->verifyReferrenceCode();

        if (!$checkPhone && !$checkEmail && $validCode) {
            try {
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
                        // $dstrict = District::find($this->selectedDistrict);
                        // if (intval($dstrict->getRemainingForms()) > 0) {
                        // DB::beginTransaction();
                        $student = new Student();

                        $student->qualification = $this->selectedBoard;
                        $student->scholarship_category = $this->selectedScholarship;

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

                        $this->applyCoupon($student->id, $this->referrenceCode);

                        // DB::commit();
                        // Log the user in after registration
                        Auth::guard('student')->login($student);
                        $this->js("toastr.success('Registered successfully.')");

                        return $this->redirect('/students/studentDashboard');
                        // } else {
                        //     $this->js("toastr.error('Forms not available for this district right now, please after some time, or contact administrator.')");
                        //     return false;
                        // }
                    } catch (\Throwable $th) {
                        DB::rollBack();
                        logger('Registration Failed:', [$th]);
                        $this->js("toastr.error('Unable to register, try after some time.')");
                        return false;
                    }
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

    public function verifyReferrenceCode()
    {
        try {
            $couponCode = CouponCode::where('is_applied', 0)
                ->where('couponcode', $this->referrenceCode)
                ->first();
            if ($couponCode) {
                if ($couponCode->corporate && $couponCode->corporate->district_id != $this->selectedDistrict) {
                    $this->referrenceCodeError = 'Reference code is not valid';
                    $this->js("toastr.error('Referral code is not valid for this city/district')");
                    return false;
                } else {
                    $this->referrenceCodeError = null;
                    return true;
                }
            } else {
                $this->referrenceCodeError = 'Reference code not found.';
                $this->js("toastr.error('Reference code not found.')");
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->js("toastr.error('Email already exist, please change.')");
            return false;
        }
    }

    public function applyCoupon($studentId, $coupon)
    {
        try {
            $studentCode = StudentCode::where('stud_id', $studentId)->get()->last();
            if (!$studentCode) {
                $studentCode = new StudentCode();
                $studentCode->stud_id = $studentId;
            }

            $couponCode = CouponCode::where('couponcode', $coupon)->first();

            $couponCode->is_applied = 1;

            $afterAppliedRemainValue = $this->couponValueApply($couponCode->valueType, $couponCode->value);

            $corporate = $couponCode->corporate;
            if ($corporate) {
                $studentCode->corporate_id = $corporate->id;
                $studentCode->corporate_name = $corporate->name;
            }

            $studentCode->coupan_code = $couponCode->couponcode;
            $studentCode->is_coupan_code_applied = 1;
            $studentCode->coupan_value = 750 - $afterAppliedRemainValue > 0 ? 750 - $afterAppliedRemainValue : 0;
            $studentCode->fee_amount = $afterAppliedRemainValue;

            if ($studentCode->fee_amount <= 0) {
                $studentCode->used_coupon = 1;
            }
            if ($studentCode->save()) {
                $couponCode->save();
            }
        } catch (\Throwable $th) {
            $this->js("toastr.error('" . $th->getMessage() . "')");
        }
    }

    public function couponValueApply($valueType, $value)
    {
        $valueAmount = $valueType == 'amount' ? $value : (750 * ($value / 100));
        return 750 - $valueAmount;
    }
}
