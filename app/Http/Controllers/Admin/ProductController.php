<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index',compact('products'));
       
    }
    public function add(){
        return view('admin.products.add');
    }
    public function create(Request $request){
        if($request['categories_id'] == "No Category"){
            $alert = alert('warning', 'Categories must be added first', 'sweet');
            return redirect()->route('Categories')->with($alert);

        }

        $this->validate($request, [
            'name' => ['required', 'string', 'max:190', 'min:5'],
            'price' => ['required','numeric', 'digits_between:1,10'],
            'description' => ['nullable', 'string', 'max:190', 'min:5'],
            'img' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
            'notes' => ['nullable', 'string', 'max:190', 'min:5'],
            'categories_id' => ['required', 'min:1'],    
        ]);

        $path_img = $request->img;

        Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'description' => $request['description'],
            'img' => image($path_img),
            'notes' => $request['notes'],
            'categories_id' =>$request['categories_id'],
            'created_by' => Auth::user()->id,
        ]);
        $alert = alert('success', 'Product added successfully', 'toast');
        return redirect()->route('products')->with($alert);
        
    }
    public function view($id){
        $product = Product::find($id);
        if($product == null){
            return redirect()->route('products');
        }else{
            return view('admin.products.show', compact('product'));
        }
       
    }
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
    
}
