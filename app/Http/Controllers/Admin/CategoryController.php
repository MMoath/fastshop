<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }//end construct

    public function index(){
        $Category = Category::orderby('id', 'desc')->paginate(10);
        return view('admin.categories.index', compact('Category'));
    }//end index

    public function create(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:190', 'min:3', 'unique:categories,name'],
            'picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['nullable', 'string', 'max:190', 'min:5',],
            'notes' => ['nullable', 'string', 'max:190', 'min:5',]
        ]);

        if ($request->picture != null) {
            $image = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('imges\categories'), $image);
        } else {
            $image = 'default.jpg';
        }

        Category::create([
            'name' => $request['name'],
            'picture' =>  $image,
            'description' => $request['description'],
            'notes' => $request['notes'],
            'created_by' => Auth::user()->id,
        ]);
        $alert = alert('success', 'Operation accomplished successfully', 'toast');
        return redirect()->route('admin.categories')->with($alert);
    }//end create

    public function delete($id){
        $product = Product::where('categories_id', $id)->count();
        if ($product > 0) {
            $alert = alert('error', 'The item has links, you cant delete', 'sweet');
            return redirect()->route('admin.categories')->with($alert);
        } else {

            $category = Category::find($id);
            if ($category->picture != 'default.jpg') {
                $thumbnail_path = public_path() . '\imges\categories' . '/' . $category->picture; // name of image
                File::delete($thumbnail_path); // delete yhumbnail from Storage

            }
            $category->delete();
            $alert = alert('success', 'Operation accomplished successfully', 'toast');
            return redirect()->route('admin.categories')->with($alert);
        }
    }//end delete

    public function edit($id){
        $category =  Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }//end edit

    public function update(Request $request){
        $old_name = Category::where('id', $request->id)->first();
        if ($request->name != $old_name->name) {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:190', 'min:3', 'unique:categories,name'],
            ]);
        }
        if ($request->picture == null) {
            $image =  $old_name->picture;
        } else {
            $this->validate($request, [
                'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);
            $image = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('imges\categories'), $image);
        }
        $this->validate($request, [
            'description' => ['nullable', 'string', 'max:190', 'min:5',],
            'notes' => ['nullable', 'string', 'max:190', 'min:5',]
        ]);
        Category::where('id', $request->id)->update([
            'name' => $request['name'],
            'picture' => $image,
            'description' => $request['description'],
            'notes' => $request['notes'],
        ]);
        $alert = alert('success', 'Operation accomplished successfully', 'toast');
        return redirect('admin/categories/' . $request->id . '/edit')->with($alert);
    }//end update
}
