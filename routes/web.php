<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use  App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('layout.master');
    });


    Route::prefix('product')->group(function(){
          Route::get('list', [ProductController::class, 'index'])->name('product-list');

          Route::get('create', [ProductController::class, 'create'])->name('product-create');

          Route::post('store', [ProductController::class, 'store'])->name('product-store');

          Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product-edit');

          Route::post('edit/{id}', [ProductController::class, 'update'])->name('product-update');

          Route::get('delete/{id}',[ProductController::class, 'destroy'])->name('product-delete');

    });

    Route::prefix('category')->group(function () {

        Route::get('list', [CategoryController::class, 'index'])->name('category-list');

        Route::get('add', [CategoryController::class,'create'])->name('category-create');

        Route::post('add',[CategoryController::class, 'store'] )->name('category-store');

        Route::get('delete/{id}',[CategoryController::class, 'destroy'])->name('category-delete');

        Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('category-edit');

        Route::post('edit/{id}',[CategoryController::class, 'update'])->name('category-update');
    });


});
