<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PortalAuthController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\AwardController as AdminAwardController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StudentController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback');
Route::post('/feedback', [HomeController::class, 'storeFeedback'])->name('feedback.store');
Route::get('/login', [PortalAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [PortalAuthController::class, 'login'])->name('login.post');
Route::post('/register', [PortalAuthController::class, 'register'])->name('register.post');
Route::post('/logout', [PortalAuthController::class, 'logout'])->name('logout');
Route::view('/about', 'frontend.about')->name('about');
Route::view('/academics', 'frontend.academics')->name('academics');
Route::view('/admissions', 'frontend.admissions')->name('admissions');
Route::view('/facilities', 'frontend.facilities')->name('facilities');
Route::view('/mandatory-disclosure', 'frontend.mandatory-disclosure')->name('mandatory-disclosure');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::view('/careers', 'frontend.careers')->name('careers');
Route::get('/chairman-desk', [App\Http\Controllers\PageController::class, 'chairmanDesk'])->name('chairman-desk');
Route::redirect('/principal-desk', '/chairman-desk');
Route::get('/correspondent-desk', [App\Http\Controllers\PageController::class, 'correspondentDesk'])->name('correspondent-desk');
Route::get('/videos', [GalleryController::class, 'videos'])->name('videos');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/awards', [AwardController::class, 'index'])->name('awards');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::redirect('/admin', '/admin/dashboard');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        // Gallery
        Route::delete('gallery/item/{id}', [AdminGalleryController::class, 'destroyItem'])->name('gallery.item.destroy');
        Route::resource('gallery', AdminGalleryController::class);

        // Events
        Route::resource('events', AdminEventController::class);
        Route::post('events/send-bulk-mail', [AdminEventController::class, 'sendBulkMail'])->name('events.send-bulk-mail');

        // Awards
        Route::resource('awards', AdminAwardController::class);

        // Testimonials
        Route::resource('testimonials', AdminTestimonialController::class);

        // Banners
        Route::get('banners/check-availability', [App\Http\Controllers\Admin\BannerController::class, 'checkAvailability'])->name('banners.check-availability');
        Route::resource('banners', App\Http\Controllers\Admin\BannerController::class);

        // Profile
        Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
        Route::put('profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

        // New Inquiry Management
        Route::get('admissions', [App\Http\Controllers\Admin\AdmissionController::class, 'index'])->name('admissions.index');
        Route::get('admissions/{id}', [App\Http\Controllers\Admin\AdmissionController::class, 'show'])->name('admissions.show');
        Route::post('admissions/{id}/reply', [App\Http\Controllers\Admin\AdmissionController::class, 'reply'])->name('admissions.reply');
        Route::delete('admissions/{id}', [App\Http\Controllers\Admin\AdmissionController::class, 'destroy'])->name('admissions.destroy');

        Route::get('careers', [App\Http\Controllers\Admin\CareerApplicationController::class, 'index'])->name('careers.index');
        Route::get('careers/{id}', [App\Http\Controllers\Admin\CareerApplicationController::class, 'show'])->name('careers.show');
        Route::post('careers/{id}/reply', [App\Http\Controllers\Admin\CareerApplicationController::class, 'reply'])->name('careers.reply');
        Route::delete('careers/{id}', [App\Http\Controllers\Admin\CareerApplicationController::class, 'destroy'])->name('careers.destroy');

        Route::get('visit-requests', [App\Http\Controllers\Admin\VisitRequestController::class, 'index'])->name('visit-requests.index');
        Route::get('visit-requests/{id}', [App\Http\Controllers\Admin\VisitRequestController::class, 'show'])->name('visit-requests.show');
        Route::post('visit-requests/{id}/reply', [App\Http\Controllers\Admin\VisitRequestController::class, 'reply'])->name('visit-requests.reply');
        Route::delete('visit-requests/{id}', [App\Http\Controllers\Admin\VisitRequestController::class, 'destroy'])->name('visit-requests.destroy');

        Route::get('contact-messages', [App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::post('contact-messages/{id}/reply', [App\Http\Controllers\Admin\ContactMessageController::class, 'reply'])->name('contact-messages.reply');
        Route::delete('contact-messages/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

        // Student Management
        Route::resource('categories', CategoryController::class)->names([
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'show' => 'categories.show',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
            'destroy' => 'categories.destroy',
        ]);
        Route::resource('students', StudentController::class)->names([
            'index' => 'students.index',
            'create' => 'students.create',
            'store' => 'students.store',
            'show' => 'students.show',
            'edit' => 'students.edit',
            'update' => 'students.update',
            'destroy' => 'students.destroy',
        ]);
        Route::get('get-sections/{standard}', [StudentController::class, 'getSections'])->name('get-sections');

        // User Management
        Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::delete('users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

        // Feedback Management
        Route::get('feedback', [App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('feedback.index');
        Route::get('feedback/{id}', [App\Http\Controllers\Admin\FeedbackController::class, 'show'])->name('feedback.show');
        Route::post('feedback/{id}/reply', [App\Http\Controllers\Admin\FeedbackController::class, 'reply'])->name('feedback.reply');
        Route::delete('feedback/{id}', [App\Http\Controllers\Admin\FeedbackController::class, 'destroy'])->name('feedback.destroy');


    });
});

// Frontend Inquiry Routes
Route::post('/admission-form', [App\Http\Controllers\InquiryController::class, 'admission'])->name('admission.submit');
Route::post('/career-form', [App\Http\Controllers\InquiryController::class, 'career'])->name('career.submit');
Route::post('/visit-form', [App\Http\Controllers\InquiryController::class, 'visit'])->name('visit.submit');
Route::post('/contact-form', [App\Http\Controllers\InquiryController::class, 'contact'])->name('contact.submit');
