<?php

use App\Http\Controllers\Api\ApiCheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiProductCategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Kategori
Route::resource('/product-categories', ApiProductCategoryController::class);

// Produk
Route::resource('/products', ApiProductController::class);

Route::get('province', [ApiCheckoutController::class, 'province']);

Route::get('city/{provinceId}', [ApiCheckoutController::class, 'city']);

Route::post('ongkir', [ApiCheckoutController::class, 'ongkir']);

// Route::get('/products/list', [ApiProductController::class, 'getProductList']);
