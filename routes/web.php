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


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->middleware('auth');

// Product Route
Route::put('/admin/product/{product}/edit', [ProductController::class, 'update'])->middleware('auth');
Route::resource('/admin/product', ProductController::class)->middleware('auth');

// Product Catgeory Route
Route::put('/admin/product-category/{productCategory}/edit', [ProductCategoryController::class,'update'])->middleware('auth');
Route::resource('/admin/product-category', ProductCategoryController::class)->middleware('auth');

// Customer Route
Route::put('/admin/customer/{customer}/edit', [CustomerController::class, 'update'])->middleware('auth');
Route::resource('/admin/customer', CustomerController::class)->middleware('auth');

// Transaction Route
Route::get('/admin/transaction', [TransactionController::class, 'index'])->middleware('auth');


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/registration', [RegistrationController::class, 'index'])->middleware('guest');

Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/contact', [ContactController::class, 'index'])->middleware('auth');

Route::get('/blog', [BlogController::class, 'index'])->middleware('auth');

Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->middleware('auth');

Route::get('/category', [CategoryController::class, 'index'])->middleware('auth');

Route::get('/single-category/{category:slug}', [CategoryController::class, 'show'])->middleware('auth');

Route::get('/author/{user:username}', function(User $user) {
    return view('/author', [
        'title' => 'Author Post',
        'user' => $user,
        'posts' => $user->post->load('user', 'category'),
    ]);
})->middleware('auth');



Route::get('/parse-data/{nama_lengkap}/{email}/{jenis_kelamin}', [ParsingDataController::class, 'parseData'])->middleware('auth');
