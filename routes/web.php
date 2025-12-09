<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/our-aim', [SiteController::class, 'aim'])->name('aim');
Route::get('/team', [SiteController::class, 'team'])->name('team');
Route::get('/blogs', [SiteController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [SiteController::class, 'blogDetail'])->name('blog.detail');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\SettingController;

Route::prefix('admin')->name('admin.')->group(function () {

    // 1) Login routes: NO admin.auth here
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'save'])->name('settings.save');

    // 2) Protected routes: USE admin.auth here
    Route::middleware('admin.auth')->group(function () {

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('services', ServiceController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('team', TeamController::class);
        Route::resource('home-sections', HomeSectionController::class)
            ->only(['index','edit','update']);
        Route::resource('settings', SettingController::class)
            ->only(['index','edit','update']);
    });
});


