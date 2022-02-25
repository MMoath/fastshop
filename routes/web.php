<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Auth::routes();

        Route::get('build-up', function () {
            $alert = alert('', 'This page is under construction, thanks for your understanding.', 'sweet');
            return redirect()->route('welcome')->with($alert);
        })->name('build.up');

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



        Route::get(LaravelLocalization::transRoute('routes.welcome'), [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
        Route::any(LaravelLocalization::transRoute('routes.search'), [App\Http\Controllers\WelcomeController::class, 'search'])->name('search');

        Route::group(["prefix" => "products"], function () {
            Route::get('/show/{id}', [App\Http\Controllers\WelcomeController::class, 'showProduct'])->name('show.products');
        });

        Route::group(["prefix" => "store"], function () {
            Route::any('/', [App\Http\Controllers\WelcomeController::class, 'store'])->name('store');
            Route::get('category/{id}', [App\Http\Controllers\WelcomeController::class, 'category'])->name('category');
        });
    }
);




