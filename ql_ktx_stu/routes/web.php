<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BedController;

// =========================
// AUTH
// =========================

// LOGIN + FORGOT + RESET (chỉ dành cho khách chưa đăng nhập)
Route::middleware('guest.custom')->group(function () {

    // login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // forgot password
    Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

    // reset password (email link)
    Route::get('/reset-password/{token}', [AuthController::class, 'showReset'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// LOGOUT (chỉ dành cho user đăng nhập)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// =========================
// ADMIN ROUTES
// =========================

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

     //Rooms
    Route::resource('rooms', RoomController::class);

    //Beds
    Route::resource('beds', BedController::class);
});


// =========================
// STUDENT ROUTES
// =========================
Route::middleware(['auth', 'student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
    
    // Dashboard
    Route::get('/student/dashboard', function () {
         return view('student.pages.dashboard');
    })->name('student.dashboard');



    
});
