<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
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

    Route::get('home', [HomeController::class, 'index'])->name('admin.home'); //route admin index page
   
    
    Route::group(["prefix" => "users"], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users');
        Route::get('add', [UserController::class, 'add'])->name('admin.users.add');
        Route::get('show/{id}', [UserController::class, 'show'])->name('admin.users.show');    
        Route::post('create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('delete', [UserController::class, 'delete'])->name('admin.users.delete');
        Route::post('update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('change-password', [UserController::class, 'changePassword'])->name('admin.users.change-password');
        Route::any('search', [UserController::class, 'search'])->name('admin.users.search');
        
    });//end of users

    Route::group(["prefix" => "categories"], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::post('create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('update', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('{id}/delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    });//end of categories

    Route::group(["prefix" => "products"], function () {
        Route::get('/',[ProductController::class, 'index'])->name('admin.products');
        Route::get('add',[ProductController::class, 'add'])->name('admin.products.add');
        Route::POST('create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::POST('update', [ProductController::class, 'update'])->name('admin.products.update');
        Route::get('show/{id}',[ProductController::class, 'show'])->name('admin.products.show');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
        Route::any('search', [ProductController::class, 'search'])->name('admin.product.search');
    });//end of products
    
    // Route::group(["prefix" => "settings"], function () {
    //     Route::get('/', [SettingController::class, 'index'])->name('settings');
    //     Route::get('categories',[SettingController::class ,'categoryIndex'])->name('Categories');
    //     Route::post('categories/create', [SettingController::class, 'categoryCreate'])->name('create.categories');
    //     Route::post('categories/update', [SettingController::class, 'categoryUpdate'])->name('category.update');
    //     Route::get('categories/{id}/delete', [SettingController::class, 'categoryDelete']);
    //     Route::get('categories/{id}/edit', [SettingController::class, 'categoryEdit']);
      
    // });



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


