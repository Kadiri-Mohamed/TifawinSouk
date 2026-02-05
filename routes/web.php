<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupplierController;

Route::get('Admin/suppliers',[SupplierController::class,'index'])->name('admin.suppliers.index');

Route::get('Admin/suppliers/create',[SupplierController::class,'create'])->name('admin.suppliers.create');

Route::post('Admin/suppliers',[SupplierController::class,'store'])->name('admin.suppliers.store');

Route::get('Admin/suppliers/{supplier}/edit',[SupplierController::class,'edit'])->name('admin.suppliers.edit');

Route::put('Admin/suppliers/{supplier}',[SupplierController::class,'update'])->name('admin.suppliers.update');

Route::delete('Admin/suppliers/{supplier}',[SupplierController::class,'destroy'])->name('admin.suppliers.destroy');



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

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});

require __DIR__.'/auth.php';
