<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } //end construct

    public function index(){
        $sold_todye = Order::where('status', 3)->orwhere('orders.status', 4)->whereDate('created_at', '=', date('Y-m-d'))->sum('price');
         return view('admin.sales.index',compact('sold_todye'));
    }//end index
}
