<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Purchase\EventController;
use App\Http\Controllers\Purchase\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Purchase Manager Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Purchase Manager routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Purchase Manager" middleware group. Now create something great!
|
*/

Route::post('logout', [AuthenticatedSessionController::class, 'destroyPurchase'])->name('logout');

Route::middleware('auth:purchase_manager')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(EventController::class)->group(function () {
        Route::prefix('event')->name('event.')->group(function () {
            Route::get('/list', 'list')->name('list');
            Route::get('/view/{id?}', 'view')->name('view');
            Route::get('/status/{id?}', 'status')->name('status');
        });
    });
});
