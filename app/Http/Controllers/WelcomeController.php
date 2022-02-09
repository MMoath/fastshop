<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;

class WelcomeController extends Controller
{
 
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(6);
        if (!$products)
            return abort('404');   
        $active_nav ="1";
        return view('frontend.index',compact('products', 'active_nav'));
    }

    public function viewProduct($id){
        $product = Product::where('id',$id)->first();
        if(!$product)
            return abort('404');
        $category = Category::where('id',$product->categories_id)->first();
        if (!$category)
            return abort('404');
        $active_nav = "0";
        return view('frontend.product', compact( 'active_nav','product', 'category'));
    }
  
}
