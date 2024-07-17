<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminFuncController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// todo: Admin Auth
Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin_register_form');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin_register');

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin_login_form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin_login');

    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class,'dashboard'])->name('admin_dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
    });
});

//todo: Admin Functionality
Route::prefix('admin')->group(function(){
    Route::middleware('auth.admin')->group(function(){
        Route::get('/allusers', [AdminFuncController::class, 'allusers'])->name('admin_allusers');
    });
});


//todo: User Auth
Route::get('/register', [UserAuthController::class, 'user_register_form'])->name('user_register_form');
Route::post('/register', [UserAuthController::class, 'register'])->name('user_register_save');

Route::get('/login', [UserAuthController::class, 'user_login_form'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user_login');


Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/dashboard', [UserAuthController::class, 'dashboard'])->name('user_dashboard');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('user_logout');
});
