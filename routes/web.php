<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use  App\Http\Controllers\CategoryController;
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


    Route::get('product-list', function () {
        return view('admin.product.list');
    })->name('product-list');


    Route::prefix('category')->group(function () {

        Route::get('list', [CategoryController::class, 'index'])->name('category-list');

        Route::get('add', [CategoryController::class,'create'])->name('category-create');

        Route::post('add',[CategoryController::class, 'store'] )->name('category-store');

        Route::get('delete/{id}',[CategoryController::class, 'destroy'])->name('category-delete');

        Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('category-edit');

        Route::post('edit/{id}',[CategoryController::class, 'update'])->name('category-update');
    });

    Route::get('category/api', [CategoryController::class,'api'])->name('category.api');
});
