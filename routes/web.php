<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->name('create.product');
Route::post('/products', [ProductController::class, 'store'])->name('store.product');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('delete.product');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit.product');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('update.product');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('show.product');