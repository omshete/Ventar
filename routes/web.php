<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\HomeSettingController;
/*
|--------------------------------------------------------------------------
| Public site routes
|--------------------------------------------------------------------------
*/


Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/our-aim', [SiteController::class, 'aim'])->name('aim');
Route::get('/team', [SiteController::class, 'team'])->name('team');
Route::get('/blogs', [SiteController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [SiteController::class, 'blogDetail'])->name('blog.detail');
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

        // Blogs CRUD
        Route::resource('blogs', BlogController::class);

        // Team CRUD
        Route::resource('team', TeamController::class);

        // Home sections CRUD (index, create, store, edit, update, destroy)
        Route::resource('home-sections', HomeSectionController::class);

        // Home Settings combined screen (edit + update)
        Route::resource('home_settings', HomeSettingController::class);
    });
});

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
