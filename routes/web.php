<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function(){
    Route::view('dashboard', 'admin.dashboard');

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
});