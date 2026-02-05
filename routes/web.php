<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;


use App\Http\Controllers\Admin\SupplierController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('admin/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');


});

require __DIR__ . '/auth.php';
