<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index']);


Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/add_product', [ProductController::class, 'add']);
Route::get('/edit_product/{id}', [ProductController::class, 'edit']);
Route::get('/categories', [CategoryController::class, 'index']);


Route::post('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete.product');
Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('update.product');
Route::post('/add-product', [ProductController::class, 'add_product'])->name('add.product');
Route::post('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete.category');
Route::post('/add-category', [CategoryController::class, 'add'])->name('add.category');
