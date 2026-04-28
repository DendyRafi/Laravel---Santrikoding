<?php

use Illuminate\Support\Facades\Route;

//import product controller
use App\Http\Controllers\ProductController;

//route resource for products
Route::get('/', [ProductController::class, 'index']);
Route::resource('/products', ProductController::class);

#Route::get('/', function () {
 #   return view('welcome');
#});

