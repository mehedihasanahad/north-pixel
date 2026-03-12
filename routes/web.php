<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomRequestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/locale/{locale}', LocaleController::class)->name('locale.switch');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/custom-request', [CustomRequestController::class, 'index'])->name('custom-request');
Route::post('/custom-request', [CustomRequestController::class, 'store'])->name('custom-request.store');
Route::get('/custom-request/success', [CustomRequestController::class, 'success'])->name('custom-request.success');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/website-development',        [ServiceController::class, 'webDev'])->name('web');
    Route::get('/mobile-app-development',     [ServiceController::class, 'mobileApp'])->name('mobile');
    Route::get('/website-speed-optimization', [ServiceController::class, 'speedOpt'])->name('speedup');
    Route::get('/website-maintenance',        [ServiceController::class, 'maintenance'])->name('maintenance');
    Route::get('/ready-made-websites',        [ServiceController::class, 'readyMade'])->name('ready');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
