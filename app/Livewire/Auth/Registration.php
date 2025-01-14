<?php

namespace App\Livewire\Auth;

use App\Models\CouponCode;
use App\Models\District;
use Livewire\Attributes\Validate;
use Livewire\Component;

use App\Models\Student;
use App\Models\StudentCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Registration extends Component
{
    public $showPassword = false;


    #[Validate('required', message: 'Please select Qualification')]
    public $selectedBoard = null;
    #[Validate('required', message: 'Please select Scholarship')]
    public $selectedScholarship = null;
    #[Validate('required', message: 'Please select State')]
    public $selectedState = null;
    #[Validate('required', message: 'Please select District')]
    public $selectedDistrict = null;
    public District $selectedDistrictData;

    #[Validate('required', message: 'Please enter your name')]
    #[Validate('min:8', message: 'Full name must be minimum 8 characters')]
    public $name;
    #[Validate('required', message: 'Please select Gender')]
    public $gender;
    #[Validate('required', message: 'Please enter mobile number')]
    #[Validate('min_digits:10', message: 'Mobile number must minimum 10 digits')]
    #[Validate('max_digits:10', message: 'Mobile number have maximum 10 digits')]
    #[Validate('unique:students,mobile', message: 'Mobile number is already in use')]
    public $mobile;
    #[Validate('required', message: 'Please enter your email address')]
    #[Validate('email', message: 'Please enter valid email address')]
    #[Validate('unique:students,email', message: 'Email address is already in use')]
    public $email;

    #[Validate('required', message: 'Password is required')]
    #[Validate('min:8', message: 'Password should be minimum 8 characters')]
    public $password;
    #[Validate('required', message: 'Password is required')]
    #[Validate('min:8', message: 'Password should be minimum 8 characters')]
    #[Validate('same:password', message: 'Confirm password should matched with password')]
    public $password_confirmation;

    #[Validate('required', message: 'Disability is required')]
    #[Validate('in:Yes,No', message: 'Please choose disability')]
    public $disability = '';
    #[Validate('required', message: 'Please accept our term & conditions before proceed further')]
    public $terms = null;

    public $remainingForms = 1000;
    public $couponcode;
    public $customErrors = null;


    public $otpRequestId = '';
    public $otpSendSuccess = false;

    public $userOtp;

    public $institudeTermsCondition;

    public function mount()
    {
        $termsAndConditions = DB::table('terms_conditions')->where([['status', 1], ['type', 'student'], ['page_name', 'terms-and-condition']])->first();
        if ($termsAndConditions) {
            $this->institudeTermsCondition = $termsAndConditions->terms_condition_pdf;
            // $this->terms = false;
        } else {
            $this->institudeTermsCondition = null;
            // $this->terms = true;
        }
    }

    // public function mount(){
    //     $this->otpRequestId = null;
    //     $this->otpSendSuccess = false;
    // }

    // protected function rules()
    // {
    //     return [
    //         'selectedBoard' => 'required',
    //         'selectedScholarship' => 'required',
    //         'selectedState' => 'required',
    //         'selectedDistrict' => 'required',

    //         'name' => ['required', 'min:8'],
    //         'gender' => 'required',
    //         'mobile' => ['required', 'min_digits:10', 'max_digits:10', 'unique:students,mobile'],
    //         'email' => ['required', 'email', 'unique:students,email'],

    //         'password' => ['required', 'min:8'],
    //         'password_confirmation' => ['required', 'min:8', 'same:password'],

    //         'couponcode' =>  [
    //             Rule::requiredIf(fn() => $this->remainingForms < 300),
    //             Rule::exists('coupon_codes')->where(function (Builder $query) {
    //                 $query->where('status', 1)->where('is_applied', 0);
    //             })
    //         ],
    //     ];
    // }
    // protected function messages()
    // {
    //     return [
    //         'selectedBoard.required' => 'Please select Qualification',
    //         'selectedScholarship.required' => 'Please select Scholarship',
    //         'selectedState.required' => 'Please select State',
    //         'selectedDistrict.required' => 'Please select District',

    //         'name.required' => 'Full name is required',
    //         'name.min' => 'Full name must be minimum 8 characters',

    //         'gender.required' => 'Gender is required',

    //         'mobile.required' => 'Mobile number is required',
    //         'mobile.min_digits' => 'Mobile number must minimum 10 digits',
    //         'mobile.max_digits' => 'Mobile number have maximum 10 digits',
    //         'mobile.unique' => 'Mobile number is already in use',

    //         'email.required' => 'Email is required',
    //         'email.email' => 'Enter valid email address',
    //         'email.unique' => 'Email address is already in use',

    //         'password.required' => 'Password is required',
    //         'password.min' => 'Password should be minimum 8 characters',

    //         'password_confirmation.required' => 'Confirm password is required',
    //         'password_confirmation.min' => 'Password should be minimum 8 characters',
    //         'password_confirmation.same' => 'Confirm password should matched with password',

    //         'couponcode.required' => 'Referrence code is required',
    //         'couponcode.exists' => 'Referrence code is incorrect',
    //     ];
    // }

    public function updated($property)
    {
        if ($property == 'selectedBoard') {
            $this->selectedScholarship = null;
            $this->selectedState = null;
            $this->selectedDistrict = null;
        }
        if ($property == 'selectedScholarship') {
            $this->selectedState = null;
            $this->selectedDistrict = null;
        }
        if ($property == 'selectedState') {
            $this->selectedDistrict = null;
        }
        // $this->js('console.log(' . json_encode($property) . ')');
        if ($property == 'selectedDistrict' && $this->selectedState && $this->selectedDistrict) {
            $this->selectedDistrictData = District::find($this->selectedDistrict);
            $data = $this->selectedDistrictData?->getLimit($this->selectedScholarship);
            $limit = $data?->limit ?? 0;
            $this->remainingForms = $data?->remaining ?? 0;
        }
    }


    public function boot()
    {
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                if ($this->remainingForms <= 300) {
                    if (empty(trim($this->couponcode))) {
                        $validator->errors()->add('couponcode', 'Referrence code is required');
                    } else {
                        if (!CouponCode::where('couponcode', $this->couponcode)->where('status', 1)->where('is_applied', 0)->first()) {
                            $validator->errors()->add('couponcode', 'Referrence code is incorrect');
                        }
                    }
                }
            });
        });
    }

    public function render()
    {
        return view('livewire.auth.registration');
    }

    public function register()
    {
        $this->validate();
        try {
            $validated = $this->validate();
            if ($validated) {
                // continue to send otp to the user mobile
                $this->otpRequestId = 'someRequestIdAfterOTP';
                $this->otpSendSuccess = true;
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->js("toastr.error(" . $th->getMessage() . ")");
        }
    }

    public function verifyOtp() {
        // fisrt verify user otp

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

            if ($this->remainingForms <= 300) {
                $this->applyCoupon($student->id, $this->referrenceCode);
            }

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
