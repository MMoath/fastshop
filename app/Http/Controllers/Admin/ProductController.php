<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }//end  function __construct

    public function index(){
        $products = Product::paginate(paginate_conut);
        return view('admin.products.index',compact('products'));
    }//end function index

    public function add(){ 
        return view('admin.products.add');
    }//end function add

    public function create(ProductRequest $request){
 
        // Check the categories 
        if($request['categories_id'] == "No Category"){
            $alert = alert('warning', 'Categories must be added first', 'sweet');
            return redirect()->route('Categories')->with($alert);
        }

        // save thumbnail product at functions thumbnail
        $thumbnail = thumbnail($request->thumbnail, 'imges\products');
        
        // add new product
        Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'thumbnail' => $thumbnail,
            'categories_id' =>$request['categories_id'],
            'quantity' => $request['quantity'],
            'unit_price' => $request['unit_price'],
            'selling_price' => $request['selling_price'],
            'notes' => $request['notes'],
            'status' => $request['status'],
            'created_by' => Auth::user()->id,
        ]);

        // redirect back with massage 
        $alert = alert('success', 'Product added successfully', 'toast');
        return redirect()->route('products')->with($alert);
        
    }//end function create

    public function show($id){
        $product = Product::find($id);
        if($product == null){
            return redirect()->route('products');
        }else{
            return view('admin.products.show', compact('product'));
        }    
    }//end function show 
    public function delete($id){
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('products');
        } else {
             $product ->delete();
            $alert = alert('success', 'Product deleted successfully', 'toast');
            return redirect()->route('products')->with($alert);
           
        }
    }
    public function edit($id){
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('products');
        } else {
            return view('admin.products.edit', compact('product'));
        }
    }
    public function update(Request $request){
        if($request->img == null){
            $pro = Product::where('id', $request->id)->first();
            $images = $pro['img'];
        }else{
            $this->validate($request, [
                'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);
            $path_img = $request->img;
            $images = image($path_img);
        }
        $this->validate($request, [
            'name' => ['required', 'string', 'max:190', 'min:5'],
            'price' => ['required', 'numeric', 'digits_between:1,10'],
            'description' => ['nullable', 'string', 'max:190', 'min:5'],
            'notes' => ['nullable', 'string', 'max:190', 'min:5'],
            'categories_id' => ['required'],
        ]);

        Product::where('id',$request->id)->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'description' => $request['description'],
            'img' =>   $images,
            'notes' => $request['notes'],
            'categories_id' => $request['categories_id'],
        ]);
        $alert = alert('success', 'Product updated successfully', 'toast');
        return redirect("admin/products/{$request->id}/edit")->with($alert);
    }

    public function search(Request $request){
        $q = $request->search;
        $products = Product::where('name', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->orWhere('quantity', 'like', "%$q%")
            ->orWhere('unit_price', 'like', "%$q%")
            ->orWhere('selling_price', 'like', "%$q%")
            ->orWhere('notes', 'like', "%$q%")
            ->paginate(paginate_conut)
            ->setPath('');
        $products->appends(array(
            'search' => $q
        ));
        return view('admin.products.index', compact('products'));
    }//end function search
    
    
}
