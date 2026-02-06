<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\CartController;

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

    Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('admin/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('Admin/suppliers', [SupplierController::class, 'index'])->name('admin.suppliers.index');
    Route::get('Admin/suppliers/create', [SupplierController::class, 'create'])->name('admin.suppliers.create');
    Route::post('Admin/suppliers', [SupplierController::class, 'store'])->name('admin.suppliers.store');
    Route::get('Admin/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('admin.suppliers.edit');
    Route::put('Admin/suppliers/{supplier}', [SupplierController::class, 'update'])->name('admin.suppliers.update');
    Route::delete('Admin/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('admin.suppliers.destroy');

        Route::get('Client/carts', [CartController::class, 'index'])->name('client.carts.index');
    Route::get('Client/carts/create', [CartController::class, 'create'])->name('client.carts.create');
    Route::post('Client/carts', [CartController::class, 'store'])->name('client.carts.store');
    Route::get('Client/carts/{cart}/edit', [CartController::class, 'edit'])->name('client.carts.edit');
    Route::put('Client/carts/{cart}', [CartController::class, 'update'])->name('client.carts.update');
    Route::delete('Client/carts/{cart}', [CartController::class, 'destroy'])->name('client.carts.destroy');

});

require __DIR__ . '/auth.php';
