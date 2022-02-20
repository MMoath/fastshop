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



class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Show the admin dashboard.
     */
    public function index(){
   
        $canceled_orders = Order::where('status',0)->count();
        $new_orders = Order::where('status', 1)->count();
        $processing_orders = Order::where('status', 2)->count();
        $shipped_orders = Order::where('status', 3)->count();
        $delivered_orders = Order::where('status', 4)->count();
        $all_product = Product::all()->count();
        $users = User::all()->except(userId())->count();
        $Categories = Category::all()->count();
        $sold_todye = Order::where('status', 3)->orwhere('orders.status', 4)->whereDate('created_at', '=', date('Y-m-d'))->sum('price');
        $cart = Cart::all()->count();
        $wishlist = Wishlist::all()->count();
        $sales = Order::where('status', 3)->orwhere('status',4)->select(
          
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(price) as sum'),
        )->groupBy('month')->get();
       $sum = array();
      
       foreach($sales as $sal){
            $sum= $sal->month;
       }

        
        return view('admin.index',compact(
            'canceled_orders',
            'new_orders',
            'processing_orders',
            'shipped_orders',
            'delivered_orders',
            'all_product',
            'users',
            'Categories',
            'sold_todye',
            'cart',
            'wishlist',
            'sales',
            'sum',
        ));
    }
}
