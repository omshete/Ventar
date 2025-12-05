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
