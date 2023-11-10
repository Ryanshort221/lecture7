<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\userController;
use App\Http\Controllers\StatementController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', userController::class);
Route::resource('accounts', AccountController::class);
Route::resource('phone_number_model1s', PhoneNumberController::class);
Route::resource('statements', StatementController::class);