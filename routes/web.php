<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\StatementController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::resource('users', userController::class);

Route::get('/', function () {
    return view('signup');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/userHome/{id}', [userController::class, 'show'])->name('userHome');
Route::get('/statements/{id}', [StatementController::class, 'show'])->name('statements');
// Within web.php or api.php
// Route::get('api/users/{user}', [userController::class, 'show'])->name('users.show');
// Route::get('/userHome/{id}', [PhoneNumberController::class, 'show']);
// Route::put('phone_number_model1s/{id}', [PhoneNumberController::class, 'update'])->name('phone_number_model1s.update');
Route::resource('phone_number_model1s', PhoneNumberController::class);

Route::get('/test-session', function (Request $request) {
    $request->session()->put('test', 'value');
    return $request->session()->get('test');
});
