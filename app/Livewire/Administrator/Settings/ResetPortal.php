<?php

namespace App\Livewire\Administrator\Settings;

use App\Models\BoardAgencyStateModel;
use App\Models\ClassGoupExamModel;
use App\Models\CouponCode;
use App\Models\Gn_DisplayExamAgencyBoardUniversity;
use App\Models\Gn_DisplayOtherExamClassDetail;
use App\Models\Gn_EducationClassExamAgencyBoardUniversity;
use App\Models\Gn_OtherExamClassDetailModel;
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
            // DB::beginTransaction();
            StudentCode::truncate();
            CouponCode::truncate();
            StudentClaimForm::truncate();
            StudentPaperExported::truncate();
            StudentPayment::truncate();
            MobileNumber::truncate();
            OtpVerifications::truncate();
            Payment::truncate();
            // ClassGoupExamModel::truncate();
            // BoardAgencyStateModel::truncate();
            
            // Gn_EducationClassExamAgencyBoardUniversity::truncate();
            // Gn_OtherExamClassDetailModel::truncate();
            // Gn_DisplayExamAgencyBoardUniversity::truncate();
            // Gn_DisplayOtherExamClassDetail::truncate();
            
            // Gn_DisplayOtherExamClassDetail::truncate();
            // DB::commit();
            $this->js('window.location.href = "/administrator"');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
