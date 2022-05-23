<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DashboardController;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register User routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('/complete-profile', 'completeProfile')->name('complete.profile');
    Route::post('/profile-save', 'profileSave')->name('profile.save');
    Route::get('/profile-success', 'profileSuccess')->name('profile.success');

    Route::get('/get-attachment', 'getAttachment')->name('get.attachment');
    Route::post('/upload-attachment', 'uploadAttachment')->name('upload.attachment');
    Route::post('/destroy-attachment', 'destroyAttachment')->name('destroy.attachment');
});

Route::controller(DashboardController::class)->middleware('auth', 'mobile.verify', 'approve.profile')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});
