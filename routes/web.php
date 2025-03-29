<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')
->middleware(['auth', 'verified']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/viewprofile/{id}', [App\Http\Controllers\HomeController::class, 'viewprofile'])->name('viewprofile');
Route::get('/change/password', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('change.password')->middleware('verified');
Route::post('/change/password/page', [App\Http\Controllers\HomeController::class, 'changepasswordpage'])->name('change.password.page')->middleware('verified');
