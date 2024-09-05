<?php

namespace App\Services;

use App\Models\OtpVerifications;
use GuzzleHttp\Client;

class TextlocalService
{
    protected $apiKey;
    protected $sender;

    public function __construct()
    {
        $this->apiKey = 'MzQ0YzZhMzU2ZTY2NjI0YjU4Mzc0NDMxNmU3MjYzNmM=';
        $this->sender = urlencode("GYNLGY");
    }

    public function sendSms($numbers, $otp)
    {
        $client = new Client();

        $message = rawurlencode('Dear user%nYour OTP for sign up to The Gyanology portal is ' . $otp . '.%nValid for 10 minutes. Please do not share this OTP.%nRegards%nThe Gyanology Team');

        $data = [
            'apikey' => $this->apiKey,
            'numbers' =>  $numbers,
            'sender' => $this->sender,
            'message' => $message,
        ];

        $response = $client->post('https://api.textlocal.in/send/', [
            'form_params' => $data,
            'verify' => false
        ]);

        $response = json_decode($response->getBody()->getContents());

        if ($response) {
            $otpVerifications               = new OtpVerifications();
            $otpVerifications->type         = 'mobile';
            $otpVerifications->credential   = $numbers;
            $otpVerifications->otp          = $otp;
            $saveToDb                       = $otpVerifications->save();

            if ($saveToDb && $response->status == 'success') {
                return true;
            }
        }
        return false;
    }
}
