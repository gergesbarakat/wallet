<?php


use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SubscribtionController;

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest')->group(function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

     });

    Route::middleware('auth:admin')->group(function () {
        Route::resource('subscribtions', SubscribtionController::class);
        Route::resource('users', UsersController::class);
        Route::resource('profile', ProfileController::class);



        Route::get('dashboard', function () {return view('admin.dashboard');})->name('dashboard');
         Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });

});
