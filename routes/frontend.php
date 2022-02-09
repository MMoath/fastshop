<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;


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


Route::group(["namespace" => "Frontend"], function () {   
    Route::get('/', [IndexController::class, 'index'])->name('index')->middleware("admin.redirect");

    Route::group(["prefix" => "cart", "middleware"=>"auth.check"], function () {
        Route::get('/', [CartController::class, 'index'])->name('cart');
        Route::get('{id}/add', [CartController::class, 'add'])->name('add-to-cart');
        Route::get('{id}/remove', [CartController::class, 'remove'])->name('remove-to-cart');
    });

    Route::group(["prefix" => "order", "middleware" => "auth.check"], function () {
        Route::get('add', [OrderController::class, 'add'])->name('add-order');
        Route::POST('place', [OrderController::class, 'save'])->name('place.order');
       

    });

});





