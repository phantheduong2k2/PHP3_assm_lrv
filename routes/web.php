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

    Route::get('category-add' ,function(){
       return view('admin.category.list');
    })->name('category-list');
});

Route::get('/register', function(){
    return view('register');
});


Route::get('/register-success', function (Request $request) {
    // Nhận dữ liệu và truyền sang cho view request-success.blade.php
    $requestData = $request->all(); // ['name' => gtri, 'email' => gtr, 'password' => gtri]
    return view('register-success', $requestData);
})->name('regis-success');
