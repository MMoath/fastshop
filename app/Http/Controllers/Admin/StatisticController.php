<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use App\Models\Frontend\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }//end construct

    public function index(){

        // users statistic
        $all_users = User::count();
        $available_users = User::where('account_status',1)->count();
        $unavailable_users = User::where('account_status',0)->count();
        $male_users = User::where('gender', 'Male')->count();
        $female_users = User::where('gender', 'Female')->count();

        // Categories statistic
        $all_category = Category::count();

        // Products statistic
        $all_products = Product::count();
        $all_quantities = Product::select('quantity')->sum('quantity');

        // Orders statistic
        $all_order = Order::count();
        $canceled_orders = Order::where('status', 0)->count();
        $processing_orders = Order::where('status', 2)->count();
        $shipped_orders = Order::where('status', 3)->count();
        $delivered_orders = Order::where('status', 4)->count();

        //Cart
        $cart = Cart::all()->count();

        //wishlist
        $wishlist = Wishlist::all()->count();

        return view('admin.statistic.index',compact(
            'all_users',
            'available_users',
            'unavailable_users',
            'male_users',
            'female_users',
            'all_category',
            'all_products',
            'all_quantities',
            'all_order',
            'canceled_orders',
            'processing_orders',
            'shipped_orders',
            'delivered_orders',
            'cart',
            'wishlist',


        ));
    }//end index
}
