<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResturantManager\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ResturantManager\DashboardController;

/*
|--------------------------------------------------------------------------
| Resturant Manager Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Resturant Manager routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Resturant Manager" middleware group. Now create something great!
|
*/

Route::post('logout', [AuthenticatedSessionController::class, 'destroyResturantManager'])->name('logout');

Route::controller(ProfileController::class)->middleware('auth:resturant_manager')->group(function () {
    Route::get('/complete-profile', 'completeProfile')->name('complete.profile');
    Route::post('/profile-save', 'profileSave')->name('profile.save');
    Route::get('/profile-success', 'profileSuccess')->name('profile.success');

    Route::get('/get-attachment', 'getAttachment')->name('get.attachment');
    Route::post('/upload-attachment', 'uploadAttachment')->name('upload.attachment');
    Route::post('/destroy-attachment', 'destroyAttachment')->name('destroy.attachment');
});

Route::controller(DashboardController::class)->middleware('auth:resturant_manager', 'mobile.verify:resturant_manager', 'approve.profile:resturant_manager')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});
