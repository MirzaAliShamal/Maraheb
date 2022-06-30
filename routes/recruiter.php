<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Recruiter\EventController;
use App\Http\Controllers\Recruiter\ProfileController;
use App\Http\Controllers\Recruiter\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Recruiter\PurchaseManagerController;

/*
|--------------------------------------------------------------------------
| Recruiter Manager Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Recruiter Manager routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Recruiter Manager" middleware group. Now create something great!
|
*/

Route::post('logout', [AuthenticatedSessionController::class, 'destroyRecruiter'])->name('logout');

Route::controller(ProfileController::class)->middleware('auth:recruiter')->group(function () {
    Route::get('/complete-profile', 'completeProfile')->name('complete.profile');
    Route::post('/profile-save', 'profileSave')->name('profile.save');
    Route::get('/profile-success', 'profileSuccess')->name('profile.success');

    Route::get('/get-attachment', 'getAttachment')->name('get.attachment');
    Route::post('/upload-attachment', 'uploadAttachment')->name('upload.attachment');
    Route::post('/destroy-attachment', 'destroyAttachment')->name('destroy.attachment');
});

Route::middleware('auth:recruiter', 'email.verify:recruiter', 'approve.profile:recruiter')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(EventController::class)->group(function () {
        Route::prefix('event')->name('event.')->group(function () {
            Route::get('/list', 'list')->name('list');
            Route::get('/add', 'add')->name('add');
            Route::get('/edit/{id?}', 'edit')->name('edit');
            Route::post('/save/{id?}', 'save')->name('save');
            Route::get('/delete/{id?}', 'delete')->name('delete');
            Route::get('/status/{id?}', 'status')->name('status');

            Route::get('/processed/{id?}', 'processed')->name('processed');

            Route::get('/candidates/{id?}', 'candidate')->name('candidate');
            Route::get('/search-candidates/{id?}', 'searchCandidate')->name('search.candidate');
            Route::post('/select-candidate/{id?}', 'selectCandidate')->name('select.candidate');
            Route::post('/remove-candidate/{id?}', 'removeCandidate')->name('remove.candidate');
        });
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


