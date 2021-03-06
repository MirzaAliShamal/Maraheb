<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RecruiterController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SpecialisationController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/


Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::prefix('event')->name('event.')->controller(EventController::class)->group(function () {
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/approved', 'approved')->name('approved');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::get('/delete/{id?}', 'delete')->name('delete');
    });

    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/approved', 'approved')->name('approved');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/new-profile-requests', 'submitted')->name('submitted');
        Route::get('/profile/{id?}', 'profile')->name('profile');
        Route::get('/profile/{id?}/edit', 'edit')->name('edit');
        Route::post('/profile/{id?}/save', 'save')->name('save');
        Route::get('/profile-status/{id?}', 'profileStatus')->name('profile.status');
        Route::get('/delete/{id?}', 'delete')->name('delete');
        Route::get('/status/{id?}', 'status')->name('status');
    });

    Route::prefix('recruiter')->name('recruiter.')->controller(RecruiterController::class)->group(function () {
        Route::get('/approved', 'approved')->name('approved');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/new-profile-requests', 'submitted')->name('submitted');
        Route::get('/profile/{id?}', 'profile')->name('profile');
        Route::get('/profile/{id?}/edit', 'edit')->name('edit');
        Route::post('/profile/{id?}/save', 'save')->name('save');
        Route::get('/profile-status/{id?}', 'profileStatus')->name('profile.status');
        Route::get('/delete/{id?}', 'delete')->name('delete');
        Route::get('/status/{id?}', 'status')->name('status');
    });

    Route::prefix('hotel')->name('hotel.')->controller(HotelController::class)->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/add', 'add')->name('add');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/save/{id?}', 'save')->name('save');
        Route::get('/delete/{id?}', 'delete')->name('delete');
        Route::get('/status/{id?}', 'status')->name('status');
    });

    Route::prefix('department')->name('department.')->controller(DepartmentController::class)->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/add', 'add')->name('add');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/save/{id?}', 'save')->name('save');
        Route::get('/delete/{id?}', 'delete')->name('delete');
        Route::get('/status/{id?}', 'status')->name('status');
    });

    Route::prefix('specialisation')->name('specialisation.')->controller(SpecialisationController::class)->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/add', 'add')->name('add');
        Route::get('/edit/{id?}', 'edit')->name('edit');
        Route::post('/save/{id?}', 'save')->name('save');
        Route::get('/delete/{id?}', 'delete')->name('delete');
        Route::get('/status/{id?}', 'status')->name('status');
    });
});
