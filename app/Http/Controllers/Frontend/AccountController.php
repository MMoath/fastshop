<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth.check');
    }

    public function index(){
        $active_nav =0;
        $user = User::find(userId());
        if(!$user)
            return abort('404');
        return view('frontend.account.profile',compact('active_nav','user'));
    }

    public function update(Request $request){
        if (Auth::user()->id == $request->id) {
            if (Auth::user()->mobile == $request->mobile) {
                $unique = '';
            } else {
                $unique = 'unique:users,mobile';
            }
            if ($request->picture == null) {
                $image = Auth::user()->picture;
            } else {
                $this->validate($request, [
                    'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                ]);
                $image = time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('imges\users'), $image);

            }
            $this->validate($request, [
                'name' => ['required', 'string', 'max:190', 'min:10'],
                'gender' => ['required'],
                'mobile' => ['required', 'digits_between:7,11', $unique],
            ]);
            User::where('id', $request->id)->update([
                'name' => $request['name'],
                'gender' => $request['gender'],
                'mobile' => $request['mobile'],
                'picture' => $image,
            ]);
        } else {
            $alert = alert('error', 'Sorry , there is mismatched data. ', 'sweet');
            return redirect()->route('welcome')->with($alert);
        }
        $alert = alert('success', 'Edited successfully', 'sweet');
        return redirect()->route('profile')->with($alert);

    }

    public function changePassword(Request $request){
        $this->validate($request, ['password' => ['required', 'min:8']]);
        User::where('id', $request->id)->update(['password' => Hash::make($request['password'])]);
        $alert = alert('success', 'Password has been modified successfully', 'sweet');
        return redirect()->route('profile')->with($alert);
    }
}
