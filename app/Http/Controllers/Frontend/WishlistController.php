<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Wishlist;
use App\Models\User;
class WishlistController extends Controller
{
    public function __construct(){
        $this->middleware('auth.check');
    }

    public function index(){
     
        $active_nav = '';
        return view('frontend.wishlist', compact('active_nav'));
    }

    public function add($id){
        
        // Check if the wishlist is already exist in the table or no
        $check_wishlist = Wishlist::where('product_id', $id)->where('user_id', userId())->get();
        if (!$check_wishlist)
            return abort('404');
        if (count($check_wishlist) >= 1) {
            $alert = alert('info', 'The product is already in the wishlist !', 'sweet');
            return redirect()->back()->with($alert);
        } else {
            $user = User::find(userId());
            if (!$user)
                return abort('404');
            //$user->products()->syncWithoutDetaching($id); // add to relishineship many to many  in larvel ths method 
            Wishlist::create([
                'product_id' => $id,
                'user_id' => userId(),

            ]);

            $alert = alert('success', 'Product has been successfully added to wishlist', 'sweet');
            return redirect()->route('wishlist')->with($alert);
        }
    }

    public function remove($id){

        $product = Wishlist::find($id);
        if (!$product)
            return abort('404');
        $product->delete();
        return redirect()->back();

    }
}
