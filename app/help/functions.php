<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Wishlist;
use App\Models\Frontend\Order;
use Illuminate\Support\Facades\DB;


/* 
* This file contains all the auxiliary functions at the entire project level
*/


// Get id of user auth 
function userId(){
    $user = Auth::user()->id;
    return  $user;
}//end of userId

// Get the Name of status product
function productStatus(){
    $status_name = 
    [
        '0'=> "Stock", // مخزون
        '1' => "Displayed", // معرض
        '2'=> "Discounts", // تخفيضات
        '3' => "Finished", // انتهي
        '4' => "Consists", // تالف
        '5'=> "comment", // تعليق
    ];
    return $status_name;
}// end of productStatus

// Move and save thumbnail in DB
function thumbnail($path_thumbnail, $folder){
    $thumbnail = time() . '.' . $path_thumbnail->extension();
    $path_thumbnail->move(public_path($folder), $thumbnail);
    return  $thumbnail;
}

// function of Total Cost
function totalCost(){
    $total_sales= Product::select( DB::raw('SUM(quantity * unit_price) as total_sales'))
     ->get();
   $total_cost= $total_sales->sum('total_sales');
    return $total_cost;
}