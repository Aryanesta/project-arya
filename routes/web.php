<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\ParsingDataController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/add-product', function () {
        return view('add-product', [
            'title' => 'Add Product'
        ]);
    });
    Route::get('/contact', [ContactController::class, 'index']);
});

// Route::prefix('product')->group(function () {
//     Route::get('/', [ProductController::class, 'index'])->name('product.index'); // Rute untuk menampilkan produk
    
//     Route::get('add-product', function () {
//         return view('add-product', [
//             'title' => 'Add Product'
//         ]);
//     })->name('product.add'); // Rute untuk menambah produk
// });



Route::get('/blog', [BlogController::class, 'index']);

Route::get('/blog/{post:slug}', [BlogController::class, 'show']);

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/single-category/{category:slug}', [CategoryController::class, 'show']);

Route::get('/author/{user:username}', function(User $user) {
    return view('/author', [
        'title' => 'Author Post',
        'user' => $user->name,
        'posts' => $user->post->load('user', 'category'),
    ]);
});

use App\Http\Controllers\ParsingDataController;

Route::get('/parse-data/{nama_lengkap}/{email}/{jenis_kelamin}', [ParsingDataController::class, 'parseData']);
