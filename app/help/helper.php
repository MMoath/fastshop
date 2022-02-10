<?php

use App\Models\Admin\Category;
use App\Models\Frontend\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
* function number one of th alert 
* $alert =alert('this is function','info'); the key of  call function
* message type is toast or sweet
*/   
function alert($type,$message,$message_type){  
    $notification = array(
        'alert-type' => $type,
        'message' => $message,
        'message_type'=> $message_type,
    );
    return  $notification;   
}

/*
* function of move and save image 
*   $path_img = $request->img; // the key of call function
*/
function image($path_image)
{
    $image = time() . '.' . $path_image->extension();
    $path_image->move(public_path('imges\products'), $image);
    return  $image;
}

/*
* function of get the Category
*   
*/
function categories(){
    $categories = Category::select('id', 'name')->get();;
    return  $categories;
}

/*
* Function Of GET User Id
*    
*/
function userId(){
    $user = Auth::user()->id;
    return  $user;
}

/*
* Function Of GET User 
*    
*/
function user()
{
    $user = User::find(userId());
    return  $user;
}

/*
* Function Of GET Product In Cart For User If Auth Is Suecsse
*   
*/
function yourCart(){
    $user = Auth::user()->id;
    $cart_item = Cart::where('user_id',$user)->paginate(100);
    return  $cart_item;
}

/*
* function of SUM the price product of users
*   
*/
function sumPrice(){
    $user = User::find(userId());
    $cart_item = $user->products->sum('price');
    return  $cart_item;
}





