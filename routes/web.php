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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware(['auth', 'verified']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/viewprofile/{id}', [App\Http\Controllers\HomeController::class, 'viewprofile'])->name('viewprofile')->middleware('verified');
Route::get('/change/password', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('change.password')->middleware('verified');
Route::post('/change/password/page', [App\Http\Controllers\HomeController::class, 'changepasswordpage'])->name('change.password.page')->middleware('verified');
Route::get('/change/student/list', [App\Http\Controllers\StudentController::class, 'index'])->name('student.list')->middleware('verified');
Route::get('/change/add/student', [App\Http\Controllers\StudentController::class, 'addstudent'])->name('add.student')->middleware('verified');
Route::post('/change/add/student/page', [App\Http\Controllers\StudentController::class, 'addstudentstore'])->name('add.student.store')->middleware('verified');
Route::get('/viewstudent/{id}', [App\Http\Controllers\StudentController::class, 'viewstudent'])->name('viewstudent')->middleware('verified');
Route::get('/editstudent/{id}', [App\Http\Controllers\StudentController::class, 'editstudent'])->name('editstudent')->middleware('verified');
Route::post('/editstudentstore/{id}', [App\Http\Controllers\StudentController::class, 'editstudentstore'])->name('editstudent.store')->middleware('verified');
Route::get('/deletestudent/{id}', [App\Http\Controllers\StudentController::class, 'deletestudent'])->name('deletestudent')->middleware('verified');
