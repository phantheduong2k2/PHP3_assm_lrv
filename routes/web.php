<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Backend Controller
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use  App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\frontend\CartController;
// Frontend Controller
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductHomeController;


use Laravel\Socialite\Facades\Socialite;

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




// -------------------Product-HomeClient-------------------

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('getLogout')->middleware('auth');

Route::middleware('guest')->prefix('auth')->group(function () {


    Route::get('/login-google', [AuthController::class, 'getLoginGoogle'])->name('getLoginGoogle');
    Route::get('/google/callback', [AuthController::class, 'loginGoogleCallback'])->name('loginGoogleCallback');


    Route::get('login', [AuthController::class, 'getLogin'])->name('getLogin-client');

    Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin-client');

    Route::post('regiter', [AuthController::class, 'PostRegiter'])->name('regiter-client');
});
// ---------------------Login------------------------


Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home-client');

    Route::get('contact', [ContactController::class, 'index'])->name('contact-client');

    Route::post('addComment', [CommentController::class, 'store'])->name('add-comment');

    Route::prefix('product')->group(function () {

        Route::get('/', [ProductHomeController::class, 'index'])->name('client-product-list');

        Route::get('detail/{id}', [ProductHomeController::class, 'show'])->name('client-product-detail');

        Route::get('productCate/{id}', [ProductHomeController::class, 'productCategory'])->name('client-productCate-detail');
    });

    Route::prefix('cart')->group(function () {
        Route::Post('addCart{id}', [CartController::class, 'addCart'])->name('client-addCart');
        Route::get('viewCart', [CartController::class, 'viewCart'])->name('client-viewCart');
    });
});
// ------------------------Home-----------------------------
//
 Route::middleware('auth', 'checkUser')->prefix('admin')->group(function () {
    // check nguoi dung da dang nhap chua va check nguoi dung co quyen truy cap quan tri hay khong
    Route::get('/', function () {
        return view('layout.master');
    })->name('dashboard');

    // -----------------------------Product--------------------------------

    Route::prefix('product')->group(function () {
        Route::get('list', [ProductController::class, 'index'])->name('product-list');

        Route::get('create', [ProductController::class, 'create'])->name('product-create');

        Route::post('store', [ProductController::class, 'store'])->name('product-store');

        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product-edit');

        Route::post('edit/{id}', [ProductController::class, 'update'])->name('product-update');

        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');

        Route::get('updateStatus/{id}', [ProductController::class, 'updateStatus'])->name('product-updateStatus');

        Route::get('addAttribute/{id}', [ProductController::class, 'addAttribute'])->name('product-addAttribute');
    });

    // -----------------------------Category--------------------------------

    Route::prefix('category')->group(function () {

        Route::get('list', [CategoryController::class, 'index'])->name('category-list');

        Route::get('add', [CategoryController::class, 'create'])->name('category-create');

        Route::post('add', [CategoryController::class, 'store'])->name('category-store');

        Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('category-delete');

        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');

        Route::post('edit/{id}', [CategoryController::class, 'update'])->name('category-update');
    });

    // -----------------------------Attribute--------------------------------

    Route::prefix('attribute')->group(function () {

        Route::get('list', [AttributesController::class, 'index'])->name('attribute-list');

        Route::get('add', [AttributesController::class, 'create'])->name('attribute-create');

        Route::post('add', [AttributesController::class, 'store'])->name('attribute-store');

        Route::get('delete/{id}', [AttributesController::class, 'destroy'])->name('attribute-delete');
    });



    // -----------------------------Users--------------------------------

    Route::middleware('checkAdmin')->prefix('user')->group(function () {

        Route::get('list', [UserController::class, 'index'])->name('user-list');

        Route::get('add', [UserController::class, 'create'])->name('user-create');

        Route::post('add', [UserController::class, 'store'])->name('user-store');

        Route::get('updateLevels/{id}', [UserController::class, 'updateLevels'])->name('user-updateLevel');
    });
});
    // --------------------------------admin----------------------------------------------
