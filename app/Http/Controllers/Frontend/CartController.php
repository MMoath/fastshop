<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Wishlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth.check');
    }
    public function index(){
        $active_nav = '';
        return view('frontend.cart', compact('active_nav'));
    }
   
    public function add($id){
      
       $check_cart = Cart::where('product_id',$id)->where('user_id', userId())->get();

       if(count($check_cart) >= 1){
            $alert = alert('info', 'The product is already in the cart !', 'sweet');
            return redirect()->back()->with($alert);
       } else{
            $user = User::find(userId());
            if(!$user)
             return abort('404');
            //$user->products()->syncWithoutDetaching($id);
            Cart::create([
                'product_id'=> $id,
                'user_id' => userId(),
            ]);

            // Check wishlist for delete the products if already it
            $check_wishlist = Wishlist::where('product_id', $id)->where('user_id', userId())->first();
      
            if ($check_wishlist !=null){
                Wishlist::find($check_wishlist->id)->delete();
            }
  
            $alert = alert('success', 'Product has been successfully added to cart', 'sweet');
            return redirect()->route('cart')->with($alert);
       }
      

    }

    public function remove($id){
        $product = Cart::find($id);
        if(!$product)
            return abort('404');
        $product->delete();
        return redirect()->back();
    }

    
}
