<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login'])->name('login');

Route::post('/', [LoginController::class, 'loginPost'])->name('loginPost');

Route::get('/home', [LoginController::class, 'home'])->name('home');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Category Routes

// Route::get('/category', [CategoryController::class, 'index'])->name('category');
// Route::post('/category', [CategoryController::class, 'add'])->name('add');
// Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
// Route::put('/category/{id}', [CategoryController::class, 'update'])->name('update');
// Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('delete');



Route::prefix('category')->controller(CategoryController::class)->group(function () {

    Route::get('/', 'index')->name('category');
    Route::post('/','add')->name('category.add');
    Route::get('/{id}/edit','edit')->name('category.edit');
    Route::put('/{id}','update')->name('category.update');
    Route::delete('/{id}','delete')->name('category.delete');
});

// Add Product Routes

Route::prefix('product')->controller(ProductController::class)->group(function () {

    Route::get('/', 'productlist')->name('product');
    Route::get('/add', 'add')->name('product.add');
    Route::post('/add', 'store')->name('product.store');

    Route::delete('/{id}', 'productDelete')->name('productDelete');

    Route::get('/deleted', 'productDeleted')->name('productDeleted');
    Route::post('/deleted/{id}', 'productRestore')->name('productRestore');
    Route::delete('/deleted/{id}', 'productForceDelete')->name('productForceDelete');

    Route::get('/{id}/stock', 'restockIndex')->name('restockIndex');
    Route::patch('/{id}/stock', 'productRestock')->name('productRestock');

    

});

Route::prefix('pos')->controller(PosController::class)->group(function () {

    Route::get('/', 'posIndex')->name('pos');

});
