<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;




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

Route::get('home',[App\Http\Controllers\HomeController::class, 'adminHome'])->middleware('admin')->name('admin.home');

Route::group(["namespace"=>"Admin"],function(){
   
    Route::group(["prefix" => "users"], function () {
        Route::get('add', [UserController::class, 'add'])->name('add.user');
        Route::post('creat', [UserController::class, 'creat'])->name('creat.user');
        Route::post('delete', [UserController::class, 'delete'])->name('delete.user');
        Route::post('update', [UserController::class, 'update'])->name('update.user');
        Route::post('change-password', [UserController::class, 'changePassword'])->name('change.password');
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/{id}', [UserController::class, 'show']);
    });
    
    Route::group(["prefix" => "settings"], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings');
        Route::get('categories',[SettingController::class ,'categoryIndex'])->name('Categories');
        Route::post('categories/create', [SettingController::class, 'categoryCreate'])->name('create.categories');
        Route::get('categories/{id}/delete', [SettingController::class, 'categoryDelete']);
        Route::get('categories/{id}/edit', [SettingController::class, 'categoryEdit']);
        Route::post('categories/update', [SettingController::class, 'categoryUpdate'])->name('category.update');
    });

    Route::group(["prefix" => "products"], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('add', [ProductController::class, 'add'])->name('add.products');
        Route::POST('create', [ProductController::class, 'create'])->name('create.product');
        Route::POST('update', [ProductController::class, 'update'])->name('update.product');
        Route::get('{id}/view', [ProductController::class, 'view']);
        Route::get('{id}/delete', [ProductController::class, 'delete']);
        Route::get('{id}/edit', [ProductController::class, 'edit']);
      
        
       
    });


});

