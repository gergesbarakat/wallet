<?php

use App\Http\Controllers\SuperAdmin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SuperAdmin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\SuperAdmin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\SuperAdmin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\SuperAdmin\Auth\NewPasswordController;
use App\Http\Controllers\SuperAdmin\Auth\PasswordController;
use App\Http\Controllers\SuperAdmin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
 

Route::prefix('super-admin')->name('super-admin.')->group(function(){

    Route::middleware('guest')->group(function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');


        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

    });

    Route::middleware('auth:super-admin')->group(function () {

        Route::get('dashboard',function(){
            return view('super-admin.dashboard');
        })->name('dashboard');
        Route::get('/',function(){
            return view('super-admin.dashboard');
        })->name('dashboard');
         Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->name('password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });

});
