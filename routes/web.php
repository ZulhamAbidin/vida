<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public Website
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/preview-client', [HomeController::class, 'previewClient'])->name('preview.client');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');

// Alias for standard auth redirect
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');

// Admin Authentication & CMS
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Protected Dashboard & CMS
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Units Management & Dynamic Favorit Tamu
        Route::resource('units', UnitController::class);
        Route::post('units/{unit}/quick-promo', [UnitController::class, 'quickPromoUpdate'])->name('units.quick-promo');
        Route::post('units/{unit}/toggle-featured', [UnitController::class, 'toggleFeatured'])->name('units.toggle-featured');

        // Facilities Management
        Route::resource('facilities', FacilityController::class)->only(['index', 'store', 'update', 'destroy']);

        // FAQs Management
        Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class)->only(['index', 'store', 'update', 'destroy']);

        // Landmarks & Strategic Access Management
        Route::resource('landmarks', \App\Http\Controllers\Admin\LandmarkController::class)->only(['index', 'store', 'update', 'destroy']);

        // About Us CMS
        Route::get('/about', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about.index');
        Route::post('/about', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');

        // Settings (WhatsApp & Banner)
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
