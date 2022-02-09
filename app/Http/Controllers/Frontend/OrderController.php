<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use App\Models\Frontend\Order_Detail;
use App\Models\User;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth.check');
    }

    public function add(){
      if(yourCart()->total() <= 0){
            $alert = alert('error', 'You have no products in the cart !', 'sweet');
            return redirect()->route('welcome')->with($alert);
      }else{
            $active_nav = '';
            $user = User::find(userId());
            if(!$user) 
                return abort('404');
            return view('frontend.order.add',compact('active_nav','user'));

      }
        
    }
    public function save(Request $request){
        if (yourCart()->total() <= 0) {
            $alert = alert('error', 'You have no products in the cart !', 'sweet');
            return redirect()->route('welcome')->with($alert);
        } else {
            $user = User::find(userId());
            if (!$user)
                return abort('404');

            $cart =  Cart::where('user_id',$user->id)->get();
            if (!$cart)
                return abort('404'); 

            $this->validate($request, [    
                'address' => ['required', 'string', 'max:190', 'min:10',],
                'payment' => ['required', 'digits_between:1,10', 'numeric'],
            ]);

             $price = sumPrice() + 1;
            
             $new_order = new Order();
             $new_order->price = $price;
             $new_order->address = $request->address;
             $new_order->payment_method	= $request->payment;
             $new_order->notes = $request->notes;
             $new_order->user_id = $user->id;
             $new_order->status = '1';
             $new_order->save();

            foreach($cart as $ca){
                Order_Detail::create([
                    'order_id'=> $new_order->id,
                    'product_id' =>$ca->product_id
                ]);
            }

            $user->products()->detach();

            $alert = alert('success', 'Order has been received successfully, please check your email within the next few days.', 'sweet');
            return redirect()->route('welcome')->with($alert);
        
        }
    }
    
}
