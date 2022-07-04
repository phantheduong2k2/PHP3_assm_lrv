<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


    Route::prefix('category')->group(function(){

        Route::get('list' ,function(){
            return view('admin.category.list');
         })->name('category-list');

        Route::get('add' ,function(){
            return view('admin.category.add');
         })->name('category-add');

         Route::post('add' ,function(){
            return view('admin.category.add');
         })->name('category-add');
    });

});

