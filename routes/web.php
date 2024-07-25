<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


// Route::get('/', [ProductController::class, 'home'])->name('product.welcome');

Route::get('/', [ProductController::class, 'home'])->name('product.home');
Route::get('list-products', [ProductController::class, 'listProducts'])->name('product.list');
//http://127.0.0.1:8000/users/add-user
Route::get('add-products', [ProductController::class, 'addProducts'])->name('product.add');
Route::post('add-products', [ProductController::class, 'addProductsPost'])->name('product.addPost');
//route xóa
Route::get('delete-product/{id}', [ProductController::class, 'deleteProducts'])->name('product.delete');
//route edit
Route::get('edit-product/{id}', [ProductController::class, 'editProducts'])->name('product.edit');
Route::post('edit-product/{id}', [ProductController::class, 'editProductsPost'])->name('product.editPost');