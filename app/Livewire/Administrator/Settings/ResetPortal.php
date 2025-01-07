<?php

namespace App\Livewire\Administrator\Settings;

use App\Models\CouponCode;
use App\Models\MobileNumber;
use App\Models\OtpVerifications;
use App\Models\Payment;
use App\Models\StudentClaimForm;
use App\Models\StudentCode;
use App\Models\StudentPaperExported;
use App\Models\StudentPayment;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('administrator.layouts.master')]
class ResetPortal extends Component
{
    public function render()
    {
        return view('livewire.administrator.settings.reset-portal');
    }

    public function resetPortal(){
        try {
            DB::beginTransaction();
            StudentCode::truncate();
            CouponCode::truncate();
            StudentClaimForm::truncate();
            StudentPaperExported::truncate();
            StudentPayment::truncate();
            MobileNumber::truncate();
            OtpVerifications::truncate();
            Payment::truncate();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
