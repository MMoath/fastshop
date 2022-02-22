<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;

class WelcomeController extends Controller
{
 
    public function index(){
        //dd(topSellingProducts());
        
       
        $products = Product::orderBy('id', 'desc')->paginate(6);  
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

    public function store(Request $request){

        

        $active_nav = "2";
     
        if($request->filter_show == null){
            $filter = '';
            $pag = 100;
        }
        else{
            switch ($request->filter_show) {
                case (0):
                    $filter = 0;
                    $pag = 100;
                    break;
                case (1):
                    $filter = 1;
                    $pag = 50;
                    break;
                case (2):
                    $filter = 2;
                    $pag = 20;
                    break;
                default:
                    $filter = 0;
                    $pag = 100;
            }

        }

        if($request->input('category') ==null || $request->category == 'all'){
            $ck='all';
            $products = Product::orderBy('id', 'desc')->paginate($pag);
            $products->appends(array(
                'filter_show' => $request->filter_show,
                'category'=> $request->input('category')
            ));
            return view('frontend.store', compact('products', 'active_nav','filter', 'ck'));
            if (!$products)
            return abort('404');
          
        }else{
              $ck = $request->category;
            $products = Product::where('categories_id', $request->input('category'))->orderBy('id', 'desc')->paginate($pag);
            $products->appends(array(
                 'filter_show' => $request->filter_show,
                'category'=> $request->input('category')
            ));
            if (!$products)
                return abort('404');

            return view('frontend.store', compact('products', 'active_nav', 'filter','ck'));


        }
        
      
       
       
        
    }

    public function category($id){
     
        $active_nav = "3";
        $filter = '';
        $pag = 100;
        $ck = $id;

        $products = Product::where('categories_id', $id)->orderBy('id', 'desc')->paginate($pag);
        if (!$products)
            return abort('404');

        return view('frontend.store', compact('products', 'active_nav', 'filter', 'ck'));
        
    }
    public function search(Request $request){

        $q = $request->search;
        $active_nav = "";
     
            $products = Product::where('name','like',"%$q%")
                                ->orWhere('selling_price','like',"%$q%")
                                ->paginate(100)
                                ->setPath('');
            $products->appends ( array (
                'search' => $q ));
        if (!$products)
            return abort('404');
            return view('frontend.search', compact('products', 'active_nav'));

    }
    
  
}
