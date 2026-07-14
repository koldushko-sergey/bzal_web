<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AppealController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LiquidationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('about')->name('about.')->group(function () {
    Route::get('/company', [AboutController::class, 'company'])->name('company');
    Route::get('/history', [AboutController::class, 'history'])->name('history');
    Route::get('/team', [AboutController::class, 'team'])->name('team');
    Route::get('/corporate', [AboutController::class, 'corporate'])->name('corporate');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProductController::class, 'category'])->name('category');
    Route::get('/{categorySlug}/{slug}', [ProductController::class, 'show'])->name('show');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('show');
});

Route::prefix('information')->name('information.')->group(function () {
    Route::get('/corruption', [InformationController::class, 'corruption'])->name('corruption');
    Route::get('/extremism', [InformationController::class, 'extremism'])->name('extremism');
    Route::get('/mchs', [InformationController::class, 'mchs'])->name('mchs');
    Route::get('/documents', [InformationController::class, 'documents'])->name('documents');
});

Route::prefix('appeals')->name('appeals.')->group(function () {
    Route::get('/citizens', [AppealController::class, 'citizens'])->name('citizens');
    Route::post('/citizens', [AppealController::class, 'storeCitizens'])->name('citizens.store');
    Route::get('/business', [AppealController::class, 'business'])->name('business');
    Route::post('/business', [AppealController::class, 'storeBusiness'])->name('business.store');
});

Route::get('/liquidation', [LiquidationController::class, 'index'])->name('liquidation.index');

Route::prefix('contacts')->name('contacts.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});

require __DIR__.'/admin.php';
