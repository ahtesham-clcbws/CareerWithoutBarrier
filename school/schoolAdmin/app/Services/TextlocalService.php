<?php

namespace App\Services;

use GuzzleHttp\Client;

class TextlocalService
{
    protected $apiKey;
    protected $sender;

    public function __construct($apiKey, $sender)
    {
        $this->apiKey = $apiKey;
        $this->sender = $sender;
    }

    public function sendSms($numbers, $message)
    {
        $client = new Client();

        $data = [
            'apikey' => $this->apiKey,
            'numbers' => implode(',', $numbers),
            'sender' => $this->sender,
            'message' => $message,
        ];

        $response = $client->post('https://api.textlocal.in/send/', [
            'form_params' => $data,
        ]);

        return $response->getBody()->getContents();
    }
}
