<?php

use App\Http\Controllers\AdminAgencyController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminFuncController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin_login_form');

// todo: Admin Auth
Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin_register_form');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin_register');

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin_login_form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin_login');

    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin_dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
    });
});

//todo: Admin Functionality
Route::prefix('admin')->group(function () {
    Route::middleware('auth.admin')->group(function () {
        Route::get('/allusers', [AdminFuncController::class, 'allusers'])->name('admin_allusers');

        Route::get('/user/{id}/edit', [AdminFuncController::class, 'edit_user_form'])->name('admin_edit_user_form');
        Route::put('/user/{id}', [AdminFuncController::class, 'update_user'])->name('admin_update_user');
        Route::delete('/user/{id}', [AdminFuncController::class, 'delete_user'])->name('admin_delete_user');
        //Escorts Operations
        Route::get('/all-escorts', [AdminFuncController::class, 'allescorts'])->name('admin.escorts');

        Route::get('/add-escorts', [AdminFuncController::class, 'addescorts'])->name('admin.add.escorts');
        Route::post('/post-escorts', [AdminFuncController::class, 'postescorts'])->name('admin.post.escorts');

        Route::get('/escorts/{id}/edit', [AdminFuncController::class, 'edit_escorts_form'])->name('admin.edit_escorts_form');
        Route::put('/escorts/{id}', [AdminFuncController::class, 'edit_escorts'])->name('admin.edit_escorts');

        Route::get('/escorts/{id}', [AdminFuncController::class, 'escorts_by_id'])->name('admin.get.scorts');
        Route::delete('/escorts/{id}', [AdminFuncController::class, 'deleteEscorts'])->name('admin.delete.escorts');
        //Agency Operations
        Route::get('/all-agencies', [AdminAgencyController::class, 'allagencies'])->name('admin.allagencies');

        Route::get('/add-agency', [AdminAgencyController::class, 'addagency_form'])->name('admin.addagency_form');
        Route::post('/add-agency', [AdminAgencyController::class, 'addagency_form_submit'])->name('admin.addagency_form_submit');

        Route::get('/agency/{id}/edit', [AdminAgencyController::class, 'edit_agency_form'])->name('admin.edit_agency_form');
        Route::put('/agency/{id}', [AdminAgencyController::class, 'edit_agency'])->name('admin.edit_agency');
        Route::delete('/agency/{id}', [AdminAgencyController::class, 'delete_agency'])->name('admin.delete.agency');
        Route::get('/agency/{id}/show', [AdminAgencyController::class, 'agency'])->name('admin.agency');
        //Agency-escorts Operation
        Route::get('/agency/{id}/show-escorts', [AdminAgencyController::class, 'agency_escorts'])->name('admin.agency.escorts');
        Route::get('/agency/{id}/add-escorts', [AdminAgencyController::class, 'agency_add_escorts_form'])->name('admin.agency.add_escorts_form');
        Route::post('/agency/{id}/add-escorts', [AdminAgencyController::class, 'agency_add_escorts'])->name('admin.agency.add_escorts');
        //Badges Operation
        Route::get('/add-badge', [BadgeController::class, 'add_badge_form'])->name('admin.add.badge_form');
        Route::post('/add-badge', [BadgeController::class,'add_badge_form_submit'])->name('admin.add.badge_form_submit');
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
