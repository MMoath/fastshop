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

Auth::routes();

Route::get('build-up', function () {
    $alert = alert('', 'This page is under construction, thanks for your understanding.', 'sweet');
    return redirect()->route('welcome')->with($alert);
})->name('build.up');



Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
Route::any('search', [App\Http\Controllers\WelcomeController::class, 'search'])->name('search');


Route::group(["prefix" => "products"], function () {
    Route::get('{id}/view', [App\Http\Controllers\WelcomeController::class, 'viewProduct']);
});

Route::group(["prefix" => "store"], function () {
    Route::get('/',[App\Http\Controllers\WelcomeController::class, 'store'])->name('store');
    Route::POST('/', [App\Http\Controllers\WelcomeController::class, 'store'])->name('store');
    Route::get('category/{id}', [App\Http\Controllers\WelcomeController::class, 'category'])->name('category');

});


