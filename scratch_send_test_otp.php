<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\Msg91Service;
use Illuminate\Support\Facades\Log;

$service = app(Msg91Service::class);
$number = '9873350509';
$otp = rand(100000, 999999);

echo "Attempting to send OTP $otp to $number...\n";

$result = $service->sendSms($number, $otp);

if ($result) {
    echo "SUCCESS: OTP sent successfully.\n";
} else {
    echo "FAILED: Check laravel.log for details.\n";
}
