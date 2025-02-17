<?php

namespace App\Livewire\Corporate;

use App\Models\Corporate;
use App\Models\CorporateCouponRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('corporate.layouts.master')]
class CouponRequest extends Component
{

    public $requestsList;
    public Corporate $corporate;

    public function mount()
    {
        $corporateUser = Auth::guard('corporate')->user();
        $this->corporate = \App\Models\Corporate::find($corporateUser->id);
        // $this->requestsList = $this->corporate->couponRequests();
        $this->requestsList = CorporateCouponRequest::where('corporate_id', $corporateUser->id)->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        // $corporateUserId = Auth::guard('corporate')->id();
        // $corporate = Corporate::find($corporateUserId);
        // $requestsList = $corporate->couponRequests();
        return view('livewire.corporate.coupon-request');
    }

    public function createNewRequest()
    {
        try {
            $requestPending = CorporateCouponRequest::where('corporate_id', $this->corporate->id)->where('status', 'pending')->orderBy('id', 'desc')->first();
            if ($requestPending) {
                // you already have an pending request
                $this->js('alert("You already have an pending request, please wait some time.")');
            } else {
                $this->corporate->couponRequests()->create([
                    'status' => 'pending'
                ]);
                $this->js('success("Coupons requested successfully")');
                $this->js('reload300()');
            }
        } catch (\Throwable $th) {
            // throw $th;
            $this->js('error("' . $th->getMessage() . '")');
        }
    }
}
