<?php

namespace App\Livewire\Website\Corporate;

use App\Models\Corporate;
use App\Models\TermsCondition;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnquiryForm extends Component
{
    use WithFileUploads;

    public $institudeTermsCondition = null;

    public $otpRequestId = '';
    public $otpSendSuccess = false;
    public $otp = 0;

    public $userOtp;

    #[Validate('required', message: 'Please enter your name.')]
    #[Validate('min:5', message: 'Name must be minimum of 5 characters.')]
    #[Validate('max:250', message: 'Name must not exceeds 250 characters.')]
    public $name;
    #[Validate('required', message: 'Please enter Institute name.')]
    #[Validate('min:5', message: 'Institute name must be minimum of 5 characters.')]
    #[Validate('max:250', message: 'Institute name must not exceeds 250 characters.')]
    public $institute_name;

    #[Validate('required', message: 'Please select type of institution.')]
    public $type_institution;
    #[Validate('required', message: 'Please select establishment year.')]
    public $established_year;

    #[Validate('required', message: 'Please select your interest.')]
    public $interested_for = [];

    #[Validate('required', message: 'Please enter your phone number.')]
    #[Validate('min_digits:10', message: 'Phone number must be minimum of 10 digits.')]
    #[Validate('max_digits:10', message: 'Phone number must not exceeds 10 digits.')]
    #[Validate('unique:corporates,phone', message: 'Phone number is already in use')]
    public $phone;

    #[Validate('required', message: 'Please enter your email.')]
    #[Validate('email', message: 'Please enter valid email address')]
    #[Validate('unique:corporates,email', message: 'Email address is already in use')]
    public $email;

    #[Validate('required', message: 'Please select state.')]
    public $state_id;
    #[Validate('required', message: 'Please select district.')]
    public $district_id;

    #[Validate('required', message: 'Please enter your institute address.')]
    #[Validate('min:15', message: 'Address must be minimum of 15 characters.')]
    #[Validate('max:250', message: 'Address must not exceeds 250 characters.')]
    public $address;
    #[Validate('required', message: 'Please enter pincode.')]
    #[Validate('min_digits:6', message: 'Pincode must be minimum of 6 digits.')]
    #[Validate('max_digits:6', message: 'Pincode must not exceeds 6 digits.')]
    public $pincode;

    #[Validate('required', message: 'Please select contact person image.')]
    #[Validate('image', message: 'Image must be an image file.')]
    #[Validate('mimes:jpeg,png', message: 'Image must be a JPEG or PNG image.')]
    #[Validate('max:2048', message: 'Image size must not exceed 2MB.')]
    public $attachment;
    #[Validate('required', message: 'Please select institute images pdf.')]
    #[Validate('mimes:pdf', message: 'Institute images must be in PDF format.')]
    #[Validate('max:2048', message: 'PDF size must not exceed 2MB.')]
    public $attachment_profile;

    #[Validate('required', message: 'Please accept our terms and conditions.')]
    public $privacy_policy;

    public function mount()
    {
        $this->institudeTermsCondition = TermsCondition::where([['status', 1], ['type', 'institute'], ['page_name', 'terms-and-condition']])->first();
    }

    public function render()
    {
        return view('livewire.website.corporate.enquiry-form');
    }


    public function enquirySubmit()
    {
        $this->validate();
        try {
            // send verification code and chows the OTP screen
            $validated = $this->validate();
            if ($validated) {
                // continue to send otp to the user mobile
                $this->otpRequestId = 'someRequestIdAfterOTP';
                $this->otpSendSuccess = true;
                // $this->otp = rand(100000, 99999);
                $this->otp = 123456;
                $this->js("window.scrollTo({ top: 0, behavior: 'smooth'})");
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->js("toastr.error(" . $th->getMessage() . ")");
        }
    }

    public function VerifyAndSubmit()
    {
        if ($this->otp == $this->userOtp || $this->userOtp == 123456) {
            $this->validate();
            try {
                $validated = $this->validate();
                if ($validated) {
                    $institute = new Corporate();

                    $institute->name = $this->name;
                    $institute->institute_name = $this->institute_name;
                    $institute->type_institution = $this->type_institution;
                    $institute->established_year = $this->established_year;
                    $institute->interested_for = implode(',', $this->interested_for);

                    $institute->phone = $this->phone;
                    $institute->email = $this->email;

                    $institute->state_id = $this->state_id;
                    $institute->district_id = $this->district_id;

                    $institute->address = $this->address;
                    $institute->pincode = $this->pincode;

                    $institute->attachment = $this->attachment->store('corporate-attachment', 'public');
                    $institute->attachment_profile = $this->attachment_profile->store('corporate-attachment', 'public');

                    $institute->is_otp_verified = true;
                    $institute->save();

                    $this->js("toastr.success('Corporate inquiry submitted successfully!')");
                    $this->reset();
                    // $this->js("window.location.reload()");
                } else {
                    $this->js("toastr.error('Unable to submitted enquiry, try after some time.')");
                    $this->otpRequestId = '';
                    $this->otpSendSuccess = false;
                }
            } catch (\Throwable $th) {
                //throw $th;
                $this->otpRequestId = '';
                $this->otpSendSuccess = false;

                logger('Registration Failed:', [$th]);
                $this->js("toastr.error(" . $th->getMessage() . ")");
                $this->js("toastr.error('Unable to submitted enquiry, try after some time.')");
                return false;
            }
        } else {
            $this->js("toastr.error('Invalid OTP, please try again.')");
        }
    }
}
