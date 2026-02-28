<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\AwardController as AdminAwardController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/awards', [AwardController::class, 'index'])->name('awards');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Home Sections
        Route::resource('home-sections', HomeSectionController::class);

        // Gallery
        Route::resource('gallery', AdminGalleryController::class);

        // Events
        Route::resource('events', AdminEventController::class);

        // Awards
        Route::resource('awards', AdminAwardController::class);

        // Testimonials
        Route::resource('testimonials', AdminTestimonialController::class);
    });
});
