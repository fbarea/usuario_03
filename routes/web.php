<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

//Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

// Login Routes...
Route::get('login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Logout Routes...
Route::post('logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

// Registration Routes...
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// ResetPassword routes
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class,'reset'])->name('password.update');

// Confirm Password routes
Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class,'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class,'confirm']);

// Email Verification routes
Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class,'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class,'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class,'resend'])->name('verification.resend');
