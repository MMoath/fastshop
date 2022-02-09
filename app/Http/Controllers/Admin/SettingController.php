<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\User;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use App\Models\User;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.settings.index');
    }

    public function categoryIndex(){
        $Category = Category::paginate(10);
        return view('admin.settings.categories.index',compact('Category'));
        
    }

    public function categoryCreate(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:190', 'min:3', 'unique:categories,name'],
            'description' => ['nullable', 'string', 'max:190', 'min:5',],
            'notes' => ['nullable','string', 'max:190', 'min:5',]
        ]);
        Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'notes' => $request['notes'],
            'created_by' => Auth::user()->id,
        ]);
        $alert = alert('success', 'Operation accomplished successfully', 'toast');
        return redirect()->route('Categories')->with($alert);
        
    }
    
    public function categoryDelete($id){    
        $product = Product::where('categories_id',$id)->count();
        if($product >0){
            $alert = alert('error', 'The item has links, you cant delete','sweet');
            return redirect()->route('Categories')->with($alert);
        }else{
            Category::find($id)->delete();
            $alert = alert('success', 'Operation accomplished successfully','sweet');
            return redirect()->route('Categories')->with($alert);
        }   
    }
    public function categoryEdit($id)
    {
        $product = Product::where('categories_id', $id)->count();
        if ($product > 0) {
            $alert = alert('error', 'The item has links, you cant edit','sweet');
            return redirect()->route('Categories')->with($alert);
        } else {
            $category=  Category::find($id);
            return view('admin.settings.categories.edit',compact('category'));
        }
    }
    public function categoryUpdate(Request $request){
        $old_name = Category::where('id', $request->id)->first();
        if($request->name != $old_name->name ){
            $this->validate($request, [
                'name' => ['required', 'string', 'max:190', 'min:3', 'unique:categories,name'],
            ]);

        }
        $this->validate($request, [
            'description' => ['nullable', 'string', 'max:190', 'min:5',],
            'notes' => ['nullable', 'string', 'max:190', 'min:5',]
        ]);
        Category::where('id',$request->id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'notes' => $request['notes'],
        ]);
        $alert = alert('success', 'Operation accomplished successfully', 'toast');
        return redirect()->route('Categories')->with($alert);
    }
    
}
