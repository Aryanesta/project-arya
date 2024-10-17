<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParsingDataController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProductCategoryController;


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('checkAuth');

// Product Route
Route::put('/admin/product/{product}/edit', [ProductController::class, 'update'])->middleware('checkAuth');
Route::resource('/admin/product', ProductController::class)->middleware('checkAuth');

// Product Catgeory Route
Route::put('/admin/product-category/{productCategory}/edit', [ProductCategoryController::class,'update'])->middleware('checkAuth');
Route::resource('/admin/product-category', ProductCategoryController::class)->middleware('checkAuth');

// Customer Route
Route::put('/admin/customer/{customer}/edit', [CustomerController::class, 'update'])->middleware('checkAuth');
Route::resource('/admin/customer', CustomerController::class)->middleware('checkAuth');

// Transaction Route
Route::get('/admin/transaction', [TransactionController::class, 'index'])->middleware('checkAuth');

// Login Success
Route::get('/login-success', function() {
    return view('/auth/login-success');
})->middleware('checkAuth');


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('checkAuth');

Route::get('/registration', [RegistrationController::class, 'index'])->middleware('guest');

Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/contact', [ContactController::class, 'index'])->middleware('checkAuth');

Route::get('/blog', [BlogController::class, 'index'])->middleware('checkAuth');

Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->middleware('checkAuth');

Route::get('/category', [CategoryController::class, 'index'])->middleware('checkAuth');

Route::get('/single-category/{category:slug}', [CategoryController::class, 'show'])->middleware('checkAuth');

Route::get('/author/{user:username}', function(User $user) {
    return view('/author', [
        'title' => 'Author Post',
        'user' => $user,
        'posts' => $user->post->load('user', 'category'),
    ]);
})->middleware('checkAuth');



Route::get('/parse-data/{nama_lengkap}/{email}/{jenis_kelamin}', [ParsingDataController::class, 'parseData'])->middleware('checkAuth');
