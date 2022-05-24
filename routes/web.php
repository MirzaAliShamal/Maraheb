<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::controller(HomeController::class)->group(function () {
    Route::get('/mobile-verify', 'mobileVerify')->name('mobile.verify');
    Route::post('/otp-verify', 'otpVerify')->name('otp.verify');

    Route::get('/email-verify', 'emailVerify')->name('email.verify');
    Route::get('/resend-email-verify', 'resendEmailVerify')->name('resend.email.verify');
});
