<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StatisticController;





/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/



Route::group(["namespace"=>"Admin"],function(){

    Route::get('home', [HomeController::class, 'index'])->name('admin.home');
   
    Route::group(["prefix" => "users"], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users');
        Route::get('/{id}/show', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('add', [UserController::class, 'add'])->name('add.user');
        Route::post('creat', [UserController::class, 'creat'])->name('creat.user');
        Route::post('delete', [UserController::class, 'delete'])->name('delete.user');
        Route::post('update', [UserController::class, 'update'])->name('update.user');
        Route::post('change-password', [UserController::class, 'changePassword'])->name('change.password');
        
    });
    
    Route::group(["prefix" => "settings"], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings');
        Route::get('categories',[SettingController::class ,'categoryIndex'])->name('Categories');
        Route::post('categories/create', [SettingController::class, 'categoryCreate'])->name('create.categories');
        Route::post('categories/update', [SettingController::class, 'categoryUpdate'])->name('category.update');
        Route::get('categories/{id}/delete', [SettingController::class, 'categoryDelete']);
        Route::get('categories/{id}/edit', [SettingController::class, 'categoryEdit']);
      
    });

    Route::group(["prefix" => "products"], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('add', [ProductController::class, 'add'])->name('add.products');
        Route::POST('create', [ProductController::class, 'create'])->name('create.product');
        Route::POST('update', [ProductController::class, 'update'])->name('update.product');
        Route::get('{id}/view', [ProductController::class, 'show']);
        Route::get('{id}/delete', [ProductController::class, 'delete']);
        Route::get('{id}/edit', [ProductController::class, 'edit']);
        Route::any('search',[ProductController::class, 'search'])->name('admin.product.search');
        
    });

    Route::group(["prefix" => "orders"], function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('admin.order.show');
        Route::get('stutas/{id}/{change}', [OrderController::class, 'changeStutas'])->name('admin.order.stutas');
        Route::get('print/{id}', [OrderController::class, 'print'])->name('admin.order.print');
        Route::get('pdf/{id}', [OrderController::class, 'pdf'])->name('admin.order.pdf');

        // Statistics coming from the admin home page
        Route::get('type/{id}', [OrderController::class, 'newOrders'])->name('admin.type.orders');
        

    });

    Route::group(["prefix" => "statistics"], function () {
        Route::get('/', [StatisticController::class, 'index'])->name('admin.statistics');
     
    });


});


