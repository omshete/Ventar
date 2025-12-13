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

/*
|--------------------------------------------------------------------------
| Public site routes
|--------------------------------------------------------------------------
*/

Route::get('/', [SiteController::class, 'index'])->name('index');
//services listing page
Route::get('/services', [SiteController::class, 'services'])->name('services');
// Service detail page (by id or slug)
Route::get('/services/{service}', [SiteController::class, 'serviceDetail'])->name('services.show');

Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/our-aim', [SiteController::class, 'aim'])->name('aim');
Route::get('/team', [SiteController::class, 'team'])->name('team');
// Blogs listing page
Route::get('/blogs', [SiteController::class, 'blogs'])->name('blogs.index');

// Blog detail page (by slug or id)
Route::get('/blogs/{blog}', [SiteController::class, 'blogDetail'])->name('blogs.show');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');


Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact.show');
Route::post('/contact-us', [SiteController::class, 'submitContact'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Login (no admin.auth)
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    // Settings page (form + save) that must be accessible only for logged-in admin
    Route::middleware('admin.auth')->group(function () {

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Services CRUD
        Route::resource('services', ServiceController::class);
        
        // Our Story edit + update
        Route::prefix('home')->name('home.')->group(function () {
        Route::get('our-story', [HomeStoryController::class, 'index'])->name('our-story.index');
        Route::get('edit', [HomeStoryController::class, 'edit'])->name('our-story.edit');
        });

        // Blogs CRUD
        Route::resource('blogs', BlogController::class);

        // Customers CRUD
        Route::resource('customers', CustomerController::class)->except(['show']);

        // Team CRUD
        Route::resource('team', TeamController::class);

        // Home sections CRUD (index, create, store, edit, update, destroy)
        Route::resource('home-sections', HomeSectionController::class);

        // Home Settings combined screen (edit + update)
        Route::resource('home_settings', HomeSettingController::class);
    });
});

