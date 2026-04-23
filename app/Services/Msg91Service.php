<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\OtpVerifications;
use Illuminate\Support\Facades\Log;

class Msg91Service
{
    protected $authKey;
    protected $senderId;
    protected $templateId;

    /**
     * Centralized TRAI Approved Template
     * The only thing we change is the OTP, everything else is a traced copy of the approved message.
     */
    const OTP_TEMPLATE = "Dear user OTP for sign up to www.careerwithoutbarrier.com is {otp}. valid for 10 minutes. Do not share this OTP Regards CAREER without BARRIER Management";

    public function __construct($authKey = null, $senderId = null, $templateId = null)
    {
        $this->authKey = $authKey ?: env('MSG91_AUTH_KEY');
        $this->senderId = $senderId ?: env('MSG91_SENDER_ID', 'GYNLGY');
        $this->templateId = $templateId ?: env('MSG91_OTP_TEMPLATE_ID');
    }

    /**
     * Get the formatted OTP message based on the approved TRAI template.
     */
    public function getFormattedMessage($otp)
    {
        return str_replace('{otp}', $otp, self::OTP_TEMPLATE);
    }

    /**
     * Send OTP via MSG91 Flow API
     * 
     * @param string|array $numbers
     * @param string|int $otp
     * @param string|null $templateId
     * @return bool
     */
    public function sendSms($numbers, $otp, $templateId = null)
    {
        if (empty($this->authKey)) {
            Log::error('MSG91 Auth Key is missing in .env');
            return false;
        }

        $activeTemplateId = $templateId ?: $this->templateId;
        $numberList = is_array($numbers) ? $numbers : explode(',', $numbers);

        foreach ($numberList as $number) {
            // Clean number to exactly 10 digits for database and internal matching
            $rawNumber = preg_replace('/[^0-9]/', '', $number);
            $tenDigitNumber = (strlen($rawNumber) > 10) ? substr($rawNumber, -10) : $rawNumber;
            
            // Add country code for MSG91 API call
            $apiNumber = '91' . $tenDigitNumber;

            // Save to database BEFORE attempting to send, so we have a record even if API fails
            $this->saveOtpToDatabase($tenDigitNumber, $otp);

            // Using MSG91 Flow API (Recommended)
            if (!empty($activeTemplateId)) {
                $payload = [
                    'template_id' => $activeTemplateId,
                    'short_url' => '1',
                    'recipients' => [
                        [
                            'mobiles' => $apiNumber,
                            'otp' => (string)$otp, // Variable name must match MSG91 template variable
                        ]
                    ]
                ];

                $response = Http::withHeaders([
                    'authkey' => $this->authKey,
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                ])->post('https://control.msg91.com/api/v5/flow/', $payload);
            } 
            else {
                // Fallback to MSG91 OTP API if no template is provided
                // Note: DLT might reject this if not configured on MSG91 panel
                $otpPayload = [
                    'authkey' => $this->authKey,
                    'mobile' => $apiNumber,
                    'otp' => $otp,
                    'sender' => $this->senderId,
                    'message' => $this->getFormattedMessage($otp),
                ];

                if (!empty($activeTemplateId)) {
                    $otpPayload['template_id'] = $activeTemplateId;
                }

                $response = Http::get('https://control.msg91.com/api/v5/otp', $otpPayload);
            } 

            if (!$response->successful()) {
                Log::error('MSG91 API Error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'number' => $apiNumber
                ]);
                return false;
            }
        }

        return true;
    }

    /**
     * Log OTP to database for verification
     */
    protected function saveOtpToDatabase($number, $otp)
    {
        try {
            $otpVerifications               = new OtpVerifications();
            $otpVerifications->type         = 'mobile';
            $otpVerifications->credential   = $number;
            $otpVerifications->otp          = $otp;
            $otpVerifications->save();
        } catch (\Throwable $th) {
            Log::error('Failed to save OTP to database', [
                'error' => $th->getMessage(),
                'number' => $number,
                'otp' => $otp
            ]);
        }
    }
}
