<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use App\Models\Frontend\Order_Detail;
use App\Models\User;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $orders = Order::orderby('id','desc')->paginate(15);
        if (!$orders)
            return abort('404');
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id){
        $order = Order::find($id);
        if (!$order)
            return abort('404');
        return view('admin.orders.show',compact('order'));
    }
    
    public function print($id){
        $order = Order::find($id);
        if (!$order)
            return abort('404');
        return view('admin.orders.print', compact('order'));
    }

    public function pdf($id){
        $order = Order::find($id);
        if (!$order)
            return abort('404');
        return view('admin.orders.pdf', compact('order'));
    }
    
}

