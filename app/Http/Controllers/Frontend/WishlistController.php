<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct(){
        $this->middleware('auth.check');
    }

    public function index(){
     
        $active_nav = '';
        return view('frontend.wishlist', compact('active_nav'));
    }

    public function remove($id){
        dd("remove from wish list",$id);

    }
}
