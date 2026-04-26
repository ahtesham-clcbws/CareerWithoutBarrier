<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Corporate;

$counts = Corporate::select('status', DB::raw('count(*) as count'))->groupBy('status')->get();
print_r($counts->toArray());
