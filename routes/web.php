<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function(){
    Route::view('dashboard', 'admin.dashboard')->name('admin_dashboard');

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin_register');
});