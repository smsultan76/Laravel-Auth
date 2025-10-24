<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\PasswordResetController;





Route::get('/',[IndexController::class, 'index'])->name('index');
Route::get('/home',[IndexController::class, 'home'])->name('home')->middleware('verified','auth');
Route::get('/login',[IndexController::class, 'LoginForm'])->name('login');
Route::get('/register',[IndexController::class, 'Regform'])->name('Regform');



Route::post('/login_user', [AuthController::class, 'UserLogin'])->name('auth.login');
Route::post('/register_user', [AuthController::class, 'UserRegister'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');






Route::get(('/email/verify'), [VerificationController::class, 'show'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.resend');
   




//Password reset
Route::get('/forgot-password',[PasswordResetController::class,'create'])
    ->middleware('guest')->name('password.request');

Route::post('/forget-password',[PasswordResetController::class, 'store'])
    ->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}',[PasswordResetController::class,'newcreate'])
    ->middleware('guest')->name('password.reset');

Route::post('/reset-password',[PasswordResetController::class, 'newstore'])
    ->middleware('guest')->name('password.update');





Route::get('/hotel', [TicketController::class, 'index'])->name('tickets.index');
Route::post('/take', [TicketController::class, 'takeTicket'])->name('tickets.take');
Route::post('/reset', [TicketController::class, 'resetToday'])->name('tickets.reset');