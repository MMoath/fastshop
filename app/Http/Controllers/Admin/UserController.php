<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::paginate(15);
        return view("admin.users.index", compact('users'));
    }
    
    public function add(){     
        return view("admin.users.add");
    }

    public function creat(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:190','min:10'], 
            'gender'=>['required'],
            'email' => ['required', 'string', 'max:190','min:10', 'unique:users,email'],
            'mobile'=>['required', 'digits_between:7,11','unique:users,mobile'],
            'password'=>['required','min:8'],
            'role'=>['required','between:1,2'],
            'account_status'=> ['required'],
        ]);
      
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'mobile' => $request['mobile'],
            'picture' => 'imges\users\user.png',
            'role' => $request['role'],
            'account_status' => $request['account_status'],
        ]);
        $alert = alert('success', 'Operation accomplished successfully', 'toast');
        return redirect()->back()->with($alert);
    }

    public function show($id){
        $user = user::findOrfail($id);
        return view("admin.users.show",compact('user'));

    }

    public function delete(Request $request){
        $id = $request->delete_user;
        user::destroy($id);
        $alert = alert('success', 'User account has been deleted successfully','toastr');
        return redirect()->route('details.user')->with($alert);
    }

    public function update(Request $request){
        if(Auth::user()->id == $request->id){
            if(Auth::user()->mobile == $request->mobile){ 
                $unique='';
            }
            else{
                $unique = 'unique:users,mobile';
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
            ]);

        }else{
            User::where('id',$request->id)->update([
                'role' => $request['role'],
                'account_status' => $request['account_status'],
            ]);
        }
        $alert = alert('success', 'User data has been modified successfully', 'toast');
        return redirect()->back()->with($alert);
      
    }

    public function changePassword(Request $request){
        $this->validate($request,['password' => ['required', 'min:8']]);
        User::where('id', $request->id)->update(['password' => Hash::make($request['password'])]);
        $alert = alert('success', 'Password has been modified successfully', 'toast');
        return redirect()->back()->with($alert);
    }



}
