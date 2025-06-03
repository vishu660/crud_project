<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::get('/',[ProductController::class, 'index'])->name('products.index');
Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/products',[ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}',[ProductController::class, 'update'])->name('products.update');
Route::get('/products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/{product}',[ProductController::class, 'destroy'])->name('products.destroy');




