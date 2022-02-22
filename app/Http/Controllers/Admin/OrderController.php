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
    }//end of construct 

    public function index(){
        $canceled_orders = Order::where('status', 0)->count();
        $processing_orders = Order::where('status', 2)->count();
        $shipped_orders = Order::where('status', 3)->count();
        $delivered_orders = Order::where('status', 4)->count();
        $orders = Order::orderby('id','desc')->paginate(paginate_conut);
        return view('admin.orders.index', compact(
            'orders',
            'canceled_orders',
            'processing_orders',
            'shipped_orders',
            'delivered_orders',
        ));
    }//end of index

    public function show($id){
        $order = Order::find($id);
        if (!$order)
            return abort('404');
        return view('admin.orders.show',compact('order'));
    }

    public function changeStutas($id,$change){

        $order = Order::find($id);
        if (!$order)
            return abort('404');
        if($change >= 0 && $change <= 4){  // Check the status of the change
            $order->update([
                'status'=>$change,  // Change status
            ]);
            if($change == 2){
                $alert = alert('success', 'Order : Processing', 'sweet');  //redirect masage
            }
            if ($change == 3) {
                $alert = alert('success', 'Order : Shipped', 'sweet');
            }
            
            return redirect()->back()->with($alert); //"admin/orders/show/{$id}"
        }
        return redirect()->back();
        
    }
    
    public function print($id){
        $order = Order::find($id);
        if (!$order)
            return abort('404');
        return view('admin.orders.print', compact('order'));
    }

    public function pdf($id){
        dd("This function for pdf ");
        // $order = Order::find($id);
        // if (!$order)
        //     return abort('404');
        // $pdf = PDF::loadView('admin.orders.pdf', compact('order'));
   
        // return $pdf->download('orderdatils.pdf');
       
       
        
    }

    /**
     * All This function in down for Statistics coming from the admin home page
     */
    public function newOrders($id){
            if($id >=0  && $id <= 4 ){
                $orders = Order::where('status', $id)
                                ->orderby('id', 'desc')
                                ->paginate(15)
                                ->setPath('');
            $orders->appends(array(
                $id
            ));
                
            return view('admin.orders.index', compact('orders'));

            }
            return redirect()->back();
        
    }
    
    
}

