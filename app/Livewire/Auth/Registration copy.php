<?php

namespace App\Livewire\Auth;

use App\Models\CouponCode;
use App\Models\District;
use Illuminate\Database\Query\Builder;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Rule as LivewireRule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Reactive;
use Livewire\Livewire;

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


    public $remainingForms = 0;
    public $couponcode;


    public $otpRequestId = '';
    public $otpSendSuccess = false;

    public $userOtp;

    // public function mount(){
    //     $this->otpRequestId = null;
    //     $this->otpSendSuccess = false;
    // }

    protected function rules()
    {
        return [
            'couponcode' =>  [
                Rule::requiredIf(fn() => $this->remainingForms < 300),
                Rule::exists('coupon_codes')->where(function (Builder $query) {
                    $query->where('status', 1)->where('is_applied', 0);
                })
            ],
        ];
    }
    protected function messages()
    {
        return [
            'couponcode.required' => 'Referrence code is required',
            'couponcode.exists' => 'Referrence code is incorrect',
        ];
    }

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

    public function render()
    {
        return view('livewire.auth.registration');
    }

    public function register()
    {
        try {
            $validated = $this->validate();
            if ($validated) {
                // continue to send otp to the user mobile
                $this->otpRequestId = 'someRequestIdAfterOTP';
                $this->otpSendSuccess = true;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        // try {           

        //     $this->js('alert("validated content")');
        //     $this->js("toastr.success('validated content')");
        //     // $this->js('alert("' . json_encode($this->name) . '")');
        //     // if ($validated) {
        //     //     $this->js('alert("' . json_encode($validated) . '")');
        //     // } else {
        //     //     $this->js('alert("data not validated")');
        //     // }
        // } catch (\Throwable $th) {
        //     $this->js("toastr.error('validated content')");
        //     throw $th;
        //     // $this->js('alert("' . json_encode($th->getMessage()) . '")');
        // }
    }
}
