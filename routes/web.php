<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/changeLang/{locale}', [HomeController::class, 'changeLang']);
Route::group([
], function(){
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/faqs', [HomeController::class, 'faqs']);
    Route::get('/contact', [HomeController::class, 'contact']);
    Route::get('/about', [HomeController::class, 'about']);
    Route::get('/products', [HomeController::class, 'products']);
    Route::post('/contactRequest', [HomeController::class, 'contactRequest']);
    Route::post('/addToNewsLetter', [HomeController::class, 'addToNewsLetter']);
    Route::get('/policy/{id}', [HomeController::class, 'policy']);

    Route::get('/login', [CustomerController::class, 'loginView']);
    Route::post('/login', [CustomerController::class, 'login']);
    Route::get('/register', [CustomerController::class, 'registerView']);
    Route::post('/register', [CustomerController::class, 'register']);
    Route::get('/verify/{verify_token}', [CustomerController::class, 'verifyEmail']);
    Route::get('/logout', [CustomerController::class, 'logout']);
    Route::post('/logout', [CustomerController::class, 'logout']);
    Route::get('/forgetPassword', [CustomerController::class, 'forgetPasswordView']);
    Route::post('/forgetPassword', [CustomerController::class, 'forgetPassword']);
    Route::get('/resetPassword', [CustomerController::class, 'resetPasswordView']);
    Route::post('/resetPassword', [CustomerController::class, 'resetPassword']);

    Route::post('/profile', [CustomerController::class, 'profile']);
    Route::post('/updateProfile', [CustomerController::class, 'updateProfile']);
    Route::post('/changePassword', [CustomerController::class, 'changePassword']);

    Route::get('/checkout', [CartController::class, 'checkoutView']);
    Route::post('/checkout', [CartController::class, 'checkout']);
    Route::get('/getCartItemsCount', [CartController::class, 'getCartItemsCount']);
    Route::get('/getCartItems', [CartController::class, 'getCartItems']);
    Route::post('/addItemToCart', [CartController::class, 'addItemToCart']);
    Route::post('/deleteItemFromCart', [CartController::class, 'deleteItemFromCart']);
    Route::get('/applyCoupon', [CartController::class, 'applyCoupon']);
});
