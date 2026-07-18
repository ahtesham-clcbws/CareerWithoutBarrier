<?php

namespace App\Livewire\Administrator\Dashboard;

use App\Models\Corporate;
use App\Models\CouponCode;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('administrator.layouts.master')]
class AllotCoupon extends Component
{
    public $corporate_id = '';
    public $coupon_input = '';
    public $report = null;
    public $summary = [];

    protected $rules = [
        'corporate_id' => 'required|exists:corporates,id',
        'coupon_input' => 'required|string',
    ];

    protected $messages = [
        'corporate_id.required' => 'Please select an institute/corporate.',
        'coupon_input.required' => 'Please enter coupon codes in the textarea.',
    ];

    public function allot()
    {
        $this->validate();

        $selectedCorporate = Corporate::find($this->corporate_id);
        if (!$selectedCorporate) {
            $this->addError('corporate_id', 'Selected corporate not found.');
            return;
        }

        // Split input by whitespace, comma, semicolon or newline
        $rawCodes = preg_split('/[\s,;]+/', $this->coupon_input);
        
        $processedCodes = [];
        $report = [];
        $successCount = 0;
        $failedCount = 0;

        foreach ($rawCodes as $rawCode) {
            $trimmed = trim($rawCode);
            if (empty($trimmed)) {
                continue;
            }

            // Normalize the code format: strip spaces/dashes, uppercase
            $cleanInput = strtoupper(str_replace(['-', ' '], '', $trimmed));
            $formattedCode = implode('-', str_split($cleanInput, 4));

            // Prevent duplicate processing in the same request
            if (isset($processedCodes[$formattedCode])) {
                continue;
            }
            $processedCodes[$formattedCode] = true;

            try {
                DB::beginTransaction();

                // Find the coupon in DB (check both formatted and raw input code)
                $coupon = CouponCode::where('couponcode', $formattedCode)
                    ->orWhere('couponcode', $trimmed)
                    ->first();

                if (!$coupon) {
                    $report[] = [
                        'code' => $trimmed,
                        'status' => 'failed',
                        'reason' => 'Coupon/Voucher code not found in the database.'
                    ];
                    $failedCount++;
                    DB::rollBack();
                    continue;
                }

                // If coupon exists, check usage/allotment status
                if ($coupon->is_applied) {
                    $report[] = [
                        'code' => $coupon->couponcode,
                        'status' => 'failed',
                        'reason' => 'Already applied/used by a student.'
                    ];
                    $failedCount++;
                    DB::rollBack();
                    continue;
                }

                if ($coupon->is_issued) {
                    if ($coupon->corporate_id == $selectedCorporate->id) {
                        $report[] = [
                            'code' => $coupon->couponcode,
                            'status' => 'failed',
                            'reason' => 'Already alloted to this institute.'
                        ];
                    } else {
                        $otherCorporate = $coupon->corporate;
                        $otherName = $otherCorporate ? ($otherCorporate->institute_name ?: $otherCorporate->name) : 'Another Institute';
                        $report[] = [
                            'code' => $coupon->couponcode,
                            'status' => 'failed',
                            'reason' => "Already alloted to another institute: {$otherName}."
                        ];
                    }
                    $failedCount++;
                    DB::rollBack();
                    continue;
                }

                // Allot the coupon
                $coupon->is_issued = 1;
                $coupon->corporate_id = $selectedCorporate->id;
                $coupon->save();

                $report[] = [
                    'code' => $coupon->couponcode,
                    'status' => 'success',
                    'reason' => 'Alloted successfully.'
                ];
                $successCount++;
                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                $report[] = [
                    'code' => $trimmed,
                    'status' => 'failed',
                    'reason' => 'An error occurred during allotment: ' . $e->getMessage()
                ];
                $failedCount++;
            }
        }

        $this->report = $report;
        $this->summary = [
            'total' => count($report),
            'success' => $successCount,
            'failed' => $failedCount,
            'institute' => $selectedCorporate->institute_name ?: $selectedCorporate->name
        ];

        session()->flash('success', "Processed {$successCount} coupons successfully, {$failedCount} failed.");
    }

    public function render()
    {
        $corporates = Corporate::orderBy('institute_name')->get();
        return view('livewire.administrator.dashboard.allot-coupon', compact('corporates'));
    }
}
