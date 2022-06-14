<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\payController;
use App\Http\Controllers\reviewController;

Route::get('/', [cartController::class, 'getCatalog'])->name('index.host');

Route::post('/cart', [cartController::class, 'addCart'])->name('index.cart.add');

Route::post('/cart/update', [cartController::class, 'updateCart'])->name('index.cart.update');

Route::post('/cart/remove', [cartController::class, 'removeCart'])->name('index.cart.remove');

Route::get('/login', function () {
    return view('log_in_pc_page');
});

Route::post('/login/check', [LoginController::class, 'login_post']);

Route::get('/register', function () {
    return view('register_in_page');
});

Route::post('/register/check', [RegisterController::class, 'register_post']);

Route::get('/catalog', [CatalogController::class, 'getCatalog'])->name('catalog.host');

Route::post('/catalog/cart', [CatalogController::class, 'addCart'])->name('cart.add');

Route::post('/catalog/cart/update', [CatalogController::class, 'updateCart'])->name('cart.update');

Route::post('/catalog/cart/remove', [CatalogController::class, 'removeCart'])->name('cart.remove');

Route::get('/pay', function () {return view('pay_page');})->name('pay.host');

Route::post('/pay/check', [payController::class, 'pay_post']);

Route::get('/review', function () {return view('review_page');})->name('review.host');

Route::post('/review/check', [reviewController::class, 'review_post']);

Route::get('/review/cancel', [reviewController::class, 'review_cancel']);


// Mob version


Route::get('/mob/cart', function () {
    return view('mob_cart');
});

Route::get('/mob/contact', function () {
    return view('mob_contact');
});

Route::get('/mob/delivery', function () {
    return view('mob_delivery');
});

Route::get('/mob/discount', function () {
    return view('mob_discount');
});

Route::get('/mob/discountcard', function () {
    return view('mob_discount_card');
});

Route::get('/mob/katalog', function () {
    return view('mob_katalog');
});
Route::get('/mob/reviews', function () {
    return view('mob_reviews');
});

Route::get('/mob', function () {
    return view('mob_main_page');
});

