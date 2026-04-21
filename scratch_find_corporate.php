<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Corporate;
use Illuminate\Support\Facades\DB;

$corporates = Corporate::withCount(['studentCodes'])
    ->orderBy('student_codes_count', 'desc')
    ->take(10)
    ->get();

foreach ($corporates as $corporate) {
    echo "ID: {$corporate->id}, Name: {$corporate->name}, Email: {$corporate->email}, StudentCodes: {$corporate->student_codes_count}\n";
}
