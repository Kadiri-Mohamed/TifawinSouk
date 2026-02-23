<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\OrderItemController as AdminOrderItemController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\AdminDashboardController;

use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Client\ProductController as ClientProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'role:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->group(function () {
        Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::get('admin/categories/{h}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::put('admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
        Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
        Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
        Route::get('/admin/products/{product}', [AdminProductController::class, 'show'])->name('admin.products.show');
        Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

        Route::get('admin/suppliers', [SupplierController::class, 'index'])->name('admin.suppliers.index');
        Route::get('admin/suppliers/create', [SupplierController::class, 'create'])->name('admin.suppliers.create');
        Route::post('admin/suppliers', [SupplierController::class, 'store'])->name('admin.suppliers.store');
        Route::get('admin/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('admin.suppliers.edit');
        Route::put('admin/suppliers/{supplier}', [SupplierController::class, 'update'])->name('admin.suppliers.update');
        Route::delete('admin/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('admin.suppliers.destroy');

        Route::get('admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
        Route::get('admin/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
        Route::put('admin/orders/{order}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('admin/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');

        Route::get('admin/order-items/{order}', [AdminOrderItemController::class, 'getOrderItems'])->name('admin.order-items.getOrderItems');
        Route::get('admin/order-items', [AdminOrderItemController::class, 'index'])->name('admin.order-items.index');
    });


    Route::get('/cart', [CartController::class, 'index'])->name('client.carts.index');

    Route::get('/products', [ClientProductController::class, 'index'])->name('client.products.index');
    
    Route::get('/products/{product}',[ClientProductController::class, 'show'])->name('client.products.show');
});



require __DIR__ . '/auth.php';
