<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\WishlistController;


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


// Route::get('/', function () {
//     return view('frontend.index');
// })->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'frontendHome'])->name('index');


// Route::get('fast-shop', function () {
//     return view('frontend.index');
// })->name('welcome');

// Route::get('/',[App\Http\Controllers\WelcomeController::class, 'index'])->name('index')->middleware("admin.redirect");



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [IndexController::class, 'index'])
        ->name('index')
        ->middleware("admin.redirect", "check.account.status");

        Route::group(["namespace" => "Frontend"], function () {


            Route::group(["prefix" => "cart"], function () {
                Route::get('/', [CartController::class, 'index'])->name('cart');
                Route::get('{id}/add', [CartController::class, 'add'])->name('add.to.cart');
                Route::get('{id}/remove', [CartController::class, 'remove'])->name('remove-to-cart');
            });

            Route::group(["prefix" => "order"], function () {
                Route::get('/', [OrderController::class, 'index'])->name('order');
                Route::get('add', [OrderController::class, 'add'])->name('add-order');
                Route::POST('place', [OrderController::class, 'save'])->name('place.order');
                Route::get('change/{id}/{change}', [OrderController::class, 'changeStutas'])->name('order.change.status');
            });

            Route::group(["prefix" => "account"], function () {
                Route::get('/', [AccountController::class, 'index'])->name('account');
                Route::POST('profile/update', [AccountController::class, 'update'])->name('update.profile');
                Route::POST('profile/change-password', [AccountController::class, 'changePassword'])->name('change.password.profile');
            });

            Route::group(["prefix" => "wishlist"], function () {
                Route::get('/', [WishlistController::class, 'index'])->name('wishlist');
                Route::get('{id}/add', [WishlistController::class, 'add'])->name('add.to.wishlist');
                Route::get('{id}/remove', [WishlistController::class, 'remove'])->name('remove.from.wishlist');
            });
        });
    }
);




