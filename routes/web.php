<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// homepage
Route::get('/', [ProductController::class, 'index']);

// ✅ TARUH SEMUA ROUTE CUSTOM DI ATAS
Route::get('/products/draft', [ProductController::class, 'draftList'])
    ->name('products.draftList');

Route::patch('/products/{id}/draft', [ProductController::class, 'draft'])
    ->name('products.draft');

Route::patch('/products/{id}/publish', [ProductController::class, 'publish'])
    ->name('products.publish');

// ✅ BARU RESOURCE DI BAWAH
Route::resource('/products', ProductController::class);

#Route::get('/', function () {
 #   return view('welcome');
#});

