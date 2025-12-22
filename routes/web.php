<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeStoryController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AimController;
use App\Http\Controllers\Admin\HomeHeroController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\CareerController as PublicCareerController;
/*
|--------------------------------------------------------------------------
| Public site routes
|--------------------------------------------------------------------------
*/

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/services/{service}', [SiteController::class, 'serviceDetail'])->name('services.show');

Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/our-aim', [SiteController::class, 'aim'])->name('aim');
Route::get('/team', [SiteController::class, 'team'])->name('team');
Route::get('/blogs', [SiteController::class, 'blogs'])->name('blogs.index');
Route::get('/blogs/{blog}', [SiteController::class, 'blogDetail'])->name('blogs.show');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact-us', [SiteController::class, 'submitContact'])->name('contact.submit');

/// careers listing
Route::get('/careers', [SiteController::class, 'careers'])->name('careers');

// new: show apply form for one job
Route::get('/careers/apply/{career}', [SiteController::class, 'careerApplyForm'])->name('careers.apply.form');

// new: handle form submit
Route::post('/careers/apply', [SiteController::class, 'submitCareer'])->name('careers.apply');

// contact (unchanged)
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [SiteController::class, 'submitContact'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Public login routes (no auth required)
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    // Protected routes (require admin.auth middleware)
    Route::middleware('admin.auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Services CRUD
        Route::resource('services', ServiceController::class);
        
        // Our Story routes - FIXED
        Route::get('home', [HomeStoryController::class, 'index'])->name('home.index');
        Route::get('home/edit', [HomeStoryController::class, 'edit'])->name('home.edit');
        Route::put('home', [HomeStoryController::class, 'update'])->name('home.update');

        // Blogs CRUD
        Route::resource('blogs', BlogController::class);

        // Customers CRUD
        Route::resource('customers', CustomerController::class)->except(['show']);

        // Team CRUD
        Route::resource('team', TeamController::class);

        // Home sections CRUD
        Route::resource('home-sections', HomeSectionController::class)
        ->names([
            'index'   => 'home_sections.index',
            'create'  => 'home_sections.create',
            'store'   => 'home_sections.store',
            'edit'    => 'home_sections.edit',
            'update'  => 'home_sections.update',
            'destroy' => 'home_sections.destroy',
        ]);

        // Home Settings
        Route::resource('home_settings', HomeSettingController::class)->only(['index', 'edit', 'update']);

        // About Us CRUD
        Route::resource('about-us', AboutUsController::class)->parameters(['about-us' => 'aboutUs']);

        // Our Aim routes
        Route::resource('aim', AimController::class);

        // Home Hero CRUD
        Route::resource('home-hero', HomeHeroController::class)->names('home-hero');

        // Contact Settings CRUD
        Route::resource('contact-settings', ContactSettingController::class)
        ->names('contact-settings');

        // ← NEW: Careers CRUD (inside admin.auth middleware)
        
        Route::resource('careers', CareerController::class);
    });
});
