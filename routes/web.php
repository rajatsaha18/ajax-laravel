<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/',[ProductController::class, 'products'])->name('products');
Route::get('/add-product',[ProductController::class, 'addProduct'])->name('add.product');
