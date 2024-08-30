<?php

use App\Http\Controllers\AdminAgencyController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminEscortsController;
use App\Http\Controllers\AdminFuncController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\EscortsAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserEscortsController;
use Illuminate\Support\Facades\Route;

//Public routes ***************************************************************
Route::get('/', [UserEscortsController::class, 'index'])->name('index');
Route::get('escort-list', [UserEscortsController::class, 'escort_list'])->name('escort.list');
Route::get('/{id}/escort-detail', [UserEscortsController::class, 'escort_detail'])->name('escort.detail_by_id');

//Agency routes ****************************************************************
Route::prefix('agency')->group(function () {
    Route::get('/register', [AgencyController::class, 'agency_regiser_from'])->name('agency.register_form');
    Route::post('/register', [AgencyController::class, 'agency_regiser_from_submit'])->name('agency.register.form_submit');

    Route::get('/login', [AgencyController::class, 'agency_login_form'])->name('agency.login');
    Route::post('/login', [AgencyController::class, 'agency_login_form_submit'])->name('agency.login_submit');

    // Agency Forgot Password
    Route::get('/forgot-password', [AgencyController::class, 'showForgotPasswordForm'])->name('agency.password.request');
    Route::post('/forgot-password', [AgencyController::class, 'sendResetLinkEmail'])->name('agency.password.email');
    // Agency Reset Password
    Route::get('/reset-password/{token}', [AgencyController::class, 'showResetPasswordForm'])->name('agency.password.reset');
    Route::post('/reset-password', [AgencyController::class, 'resetPassword'])->name('agency.password.update');

    //Protected Agency Routes
    Route::middleware(['auth:agency'])->group(function () {
        Route::get('/{agency_id}/profile', [AgencyController::class, 'profile'])->name('agency.profile');      
        Route::get('/{agency_id}/dashboard', [AgencyController::class, 'dashboard'])->name('agency.dashboard');
        Route::get('/{agency_id}/escort-listing', [AgencyController::class, 'escort_listing'])->name('agency.escort_listing');
        
        Route::get('/{agency_id}/profile-edit', [AgencyController::class, 'profileEditForm'])->name('agency.profileEditForm');
        Route::put('/{agency_id}', [AgencyController::class, 'edit_agency'])->name('agency.edit_agency');        
        Route::put('/profile/{agency_id}/profile-pic-update', [AgencyController::class, 'profile_pic_update'])->name('agency.profilePic.update');
        
        Route::get('/{agency_id}/escort-detail/{escort_id}/show', [AgencyController::class, 'agency_escort_detail'])->name('agency.escort.detail');
        Route::get('/{agency_id}/add-escort',[AgencyController::class, "agency_add_escort_form"])->name('agency.add.escortform');
        Route::post('/{agency_id}/add-escort',[AgencyController::class, "agency_add_escort_form_submit"])->name('agency.add.escortFormSubmit');
       
        Route::get('/{agency_id}/escorts/{id}/escort-edit', [AgencyController::class, 'edit_escorts_form'])->name('agency.edit_escorts_form');
        Route::put('/escorts/{id}', [AgencyController::class, 'edit_escorts'])->name('agency.edit_escorts');

        Route::delete('/escorts/{id}', [AgencyController::class, 'deleteEscorts'])->name('agency.delete.escorts');

        Route::post('/logout', [AgencyController::class, 'agency_logout'])->name('agency.logout');
        

    });
});

// todo: Admin Auth *************************************************************************
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
        //User Operations
        Route::get('/allusers', [AdminFuncController::class, 'allusers'])->name('admin_allusers');
        Route::get('/user/{id}/edit', [AdminFuncController::class, 'edit_user_form'])->name('admin_edit_user_form');
        Route::put('/user/{id}', [AdminFuncController::class, 'update_user'])->name('admin_update_user');
        Route::delete('/user/{id}', [AdminFuncController::class, 'delete_user'])->name('admin_delete_user');
        //Escorts Operations
        Route::get('/all-escorts', [AdminEscortsController::class, 'allescorts'])->name('admin.escorts');

        Route::get('/add-escorts', [AdminEscortsController::class, 'addescorts'])->name('admin.add.escorts');
        Route::post('/post-escorts', [AdminEscortsController::class, 'postescorts'])->name('admin.post.escorts');

        Route::get('/escorts/{id}/edit', [AdminEscortsController::class, 'edit_escorts_form'])->name('admin.edit_escorts_form');
        Route::put('/escorts/{id}', [AdminEscortsController::class, 'edit_escorts'])->name('admin.edit_escorts');

        Route::get('/escorts/{id}', [AdminEscortsController::class, 'escorts_by_id'])->name('admin.get.scorts');
        Route::delete('/escorts/{id}', [AdminEscortsController::class, 'deleteEscorts'])->name('admin.delete.escorts');
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
        //Badges Operations
        Route::get('all-badges', [BadgeController::class, 'allbadges'])->name('admin.allbadges');
        Route::get('/add-badge', [BadgeController::class, 'add_badge_form'])->name('admin.add.badge_form');
        Route::post('/add-badge', [BadgeController::class, 'add_badge_form_submit'])->name('admin.add.badge_form_submit');

        Route::get('/badge/{id}/edit', [BadgeController::class, 'badge_edit'])->name('admin.badge_edit');
        Route::put('/badge/{id}/edit', [BadgeController::class, 'badge_edit_submit'])->name('admin.badge_edit_submit');
        Route::delete('/badge/{id}', [BadgeController::class, 'badge_delete'])->name('admin.badge_delete');
        Route::get('/badge/{id}/show', [BadgeController::class, 'show'])->name('admin.badge.show');
        //Ads Operations
        Route::get('/all-ads', [AdvertiseController::class, 'index'])->name('admin.allAds');
        Route::get('/create-ads', [AdvertiseController::class, 'create'])->name('admin.ads.create');
        Route::post('/create-ads', [AdvertiseController::class, 'store'])->name('admin.ads.store');

        Route::get('/ads/{id}/show', [AdvertiseController::class, 'show'])->name('admin.ads.show');
        Route::get('/ads/{id}/edit', [AdvertiseController::class, 'ads_edit'])->name('admin.ads_edit');
        Route::put('/ads/{id}/edit', [AdvertiseController::class, 'ads_edit_submit'])->name('admin.ads_edit_submit');
        Route::delete('/ads/{id}', [AdvertiseController::class, 'ads_delete'])->name('admin.ads_delete');
    });
});

//todo: Escort Authentication Functionality
Route::get('/register', [EscortsAuthController::class, 'escort_register_form'])->name('escorts.register_form');
Route::post('/register', [EscortsAuthController::class, 'escort_register_form_submit'])->name('escorts.register_submit');
Route::get('/login', [EscortsAuthController::class, 'escort_login_form'])->name('login');
Route::post('/login', [EscortsAuthController::class, 'login'])->name('escorts_login');

// Forgot Password
Route::get('/forgot-password', [EscortsAuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [EscortsAuthController::class, 'sendResetLinkEmail'])->name('password.email');
// Reset Password
Route::get('/reset-password/{token}', [EscortsAuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [EscortsAuthController::class, 'resetPassword'])->name('password.update');

//todo: Escort Operation Functionality
Route::group(['middleware' => ['auth:escort']], function () {
    Route::get('/{id}/profile', [UserEscortsController::class, 'profile'])->name('escorts.profile');
    Route::get('/{id}/dashboard', [UserEscortsController::class, 'dashboard'])->name('escorts.dashboard');
    Route::get('/{id}/my-pictures',[UserEscortsController::class, 'escort_myPictures'])->name('escorts.myPictures');

    Route::get('/{id}/profile-edit', [UserEscortsController::class, 'profileEditForm'])->name('escorts.profileEditForm');
    Route::put('/profile/{id}/profile-edit', [UserEscortsController::class, 'update_profile'])->name('escorts.update.profile');
   
    Route::put('/profile/{id}/profile-pic-update', [UserEscortsController::class, 'profile_pic_update'])->name('escorts.profilePic.update');
    Route::put('/profile/{id}/pictures-update', [UserEscortsController::class, 'escort_pictures_update'])->name('escorts.pictures.update');

    Route::post('/logout', [EscortsAuthController::class, 'logout'])->name('escorts.logout');
});
