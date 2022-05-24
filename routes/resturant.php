<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResturantManager\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ResturantManager\DashboardController;
use App\Http\Controllers\ResturantManager\PurchaseManagerController;

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

Route::middleware('auth:resturant_manager', 'email.verify:resturant_manager', 'approve.profile:resturant_manager')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::prefix('purchase-manager')->name('purchase.manager.')->controller(PurchaseManagerController::class)->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/add', 'add')->name('add');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/save/{id?}', 'save')->name('save');
        Route::get('/delete/{id?}', 'delete')->name('delete');
        Route::get('/status/{id?}', 'status')->name('status');
    });
});


