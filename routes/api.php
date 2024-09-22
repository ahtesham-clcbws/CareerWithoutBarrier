<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// auth API
Route::post('check-credentials', [AuthController::class, 'verifyMobileEmail']);
Route::post('verify-otp', [AuthController::class, 'verifyOTP']);
Route::post('register', [AuthController::class, 'rgisterUser']);
Route::post('login', [AuthController::class, 'loginUser']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
