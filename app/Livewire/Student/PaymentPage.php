<?php

namespace App\Livewire\Student;

use App\Models\CouponCode;
use App\Models\StudentCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;


#[Layout('student.layouts.master')]
class PaymentPage extends Component
{
    public $modalOpened = false;

    public $student;

    #[Validate('required', 'string')]
    public $coupan_code;

    public function updated($property)
    {
        if ($property) {

        }
    }

    public function render()
    {
        $this->student = Auth::guard('student')->user();
        $this->student->latestStudentCode;
        // $appCode = $this->student->latestStudentCode;
        $studentPayment = $this->student->studentPayment->last();

        $this->coupan_code = $this->student->latestStudentCode?->is_coupan_code_applied && $this->student->latestStudentCode?->coupan_code ? $this->student->latestStudentCode?->coupan_code : '';

        $calculateDiscountPercentage = $this->calculateDiscountPercentage($this->student->latestStudentCode?->coupan_value);

        return view('livewire.student.payment-page', [
            'student' => $this->student,
            // 'appCode' => $appCode,
            'studentPayment' => $studentPayment,
            'calculateDiscountPercentage' => $calculateDiscountPercentage,
        ]);
    }

    public function calculateDiscountPercentage($discountAmount, $originalAmount = 750)
    {
        if ($originalAmount == 0) {
            return 0;
        }
        $discountPercentage = ($discountAmount / $originalAmount) * 100;

        return $discountPercentage;
    }

    public function applyCoupon()
    {
        $studentCode = StudentCode::where('stud_id', $this->student->id)->get()->last();
        if (! $studentCode) {
            $studentCode = new StudentCode;
            $studentCode->stud_id = $this->student->id;
        }

        $this->validate();

        try {
            DB::beginTransaction();
            $couponCode = CouponCode::where('is_applied', 0)
                ->where('couponcode', $this->coupan_code)
                ->first();

            if (is_null($couponCode)) {
                $this->addError('coupan_code', 'Coupon Code invalid');

                // return response()->json([
                //     'status' => false,
                //     'message' => "Coupon Code invalid"
                // ]);
                return false;
            }

            $couponCode->is_applied = 1;
            $couponCode->save();

            $afterAppliedRemainValue = couponValueApply($couponCode->valueType, $couponCode->value);

            $corporate = $couponCode->corporate;
            if ($corporate) {
                $studentCode->corporate_id = $corporate->id;
                $studentCode->corporate_name = $corporate->name;
            }
            // $studentCode->forceFill([
            //     'coupan_code' => $this->coupan_code
            // ]);
            $studentCode->coupan_code = $this->coupan_code;
            $studentCode->is_coupan_code_applied = 1;
            $studentCode->coupan_value = 750 - $afterAppliedRemainValue > 0 ? 750 - $afterAppliedRemainValue : 0;
            $studentCode->fee_amount = $afterAppliedRemainValue;

            if ($studentCode->fee_amount <= 0) {
                $studentCode->used_coupon = 1;
            }
            $studentCode->save();

            DB::commit();
            $this->js("success('Coupon Code Applied.')");
            // return response()->json([
            //     'status' => true,
            //     'message' => 'Coupon code applied successfully.',
            //     'amount' => $studentCode->fee_amount,
            //     'discount_amount' => $studentCode->coupan_value,
            //     'coupan_code' => $couponCode->couponcode,
            //     'corporate_name' => $studentCode->corporate_name
            // ]);
        } catch (\Throwable $th) {
            // $this->addError('coupan_code', 'Failed to apply code');
            DB::rollBack();
            logger('Failed:', [$th]);

            return false;
            // return back()->withErrors('Failed to apply code');
        }
        // $this->dispatch('coupon-applied');

        // Redirect back or return a response

    }

    public function removeCoupon()
    {
        // $student = Auth::guard('student')->user();
        try {
            DB::beginTransaction();
            $studentCode = StudentCode::where('stud_id', $this->student->id)->where('coupan_code', $this->coupan_code)->first();

            if (! $studentCode) {
                $this->js("error('No coupon applied to remove')");

                // $this->addError('coupan_code', 'No coupon applied to remove.');
                return false;
                // return response()->json([
                //     'status' => false,
                //     'message' => 'No coupon applied to remove.',
                // ]);
            }

            $studentCode->corporate_name = null;
            $studentCode->corporate_id = null;
            $studentCode->coupan_code = null;
            $studentCode->is_coupan_code_applied = false;
            $studentCode->fee_amount = 750;
            if ($studentCode->fee_amount > 0) {
                $studentCode->used_coupon = false;
            }
            $studentCode->coupan_value = 0;
            $studentCode->save();

            $couponCode = CouponCode::where('couponcode', $this->coupan_code)->first();

            if ($couponCode) {
                $couponCode->is_applied = false;
                $couponCode->save();
            }

            DB::commit();
            $this->js("success('Coupon removed successfully.')");
            // return response()->json([
            //     'status' => true,
            //     'message' => 'Coupon removed successfully.',
            // ]);
        } catch (\Throwable $th) {
            // $this->js('error(' . $th->getMessage() . ')');
            DB::rollBack();
            logger('Failed:', [$th]);
            $this->js("error('Failed to remove coupon.')");

            return false;
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Failed to remove coupon.',
            // ]);
        }
        // $this->dispatch('coupon-applied');
    }
    // SQS AKGEFCNZInP7227

    public function formSubmit() {}

    #[On('close-modal')]
    public function closeModal()
    {
        $this->modalOpened = false;
    }
}
