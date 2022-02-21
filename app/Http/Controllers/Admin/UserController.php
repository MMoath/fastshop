<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }//end construct

    public function index(){
        $users = User::where('id','!=',userId())->orderby('id','desc')->paginate(paginate_conut);
        return view("admin.users.index", compact('users'));
    }//end index
    
    public function add(){     
        return view("admin.users.add");
    } // end of add

    public function show($id){
        $user = user::findOrfail($id);
        return view("admin.users.show", compact('user'));
    }//end of show 

    public function create(Request $request){
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
            'picture' => 'user.png',
            'role' => $request['role'],
            'account_status' => $request['account_status'],
        ]);
        $alert = alert('success', 'Operation accomplished successfully', 'toast');
        return redirect()->route('admin.users')->with($alert);
    }//end of create

    public function delete(Request $request){
        $id = $request->delete_user;
        if ($id->picture != 'user.png') {
            $thumbnail_path = public_path() . '\imges\users' . '/' . $id->picture; // name of image
            File::delete($thumbnail_path); // delete yhumbnail from Storage

        }
        user::destroy($id);
        $alert = alert('success', 'User account has been deleted successfully','toastr');
        return redirect()->route('admin.users')->with($alert);
    }//end of delete

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
        $alert = alert('success', 'Updated successfully', 'toast');
        return redirect()->back()->with($alert);
      
    }

    public function changePassword(Request $request){
        $this->validate($request,['password' => ['required', 'min:8']]);
        User::where('id', $request->id)->update(['password' => Hash::make($request['password'])]);
        $alert = alert('success', 'Updated successfully', 'toast');
        return redirect()->back()->with($alert);
    }//end of change password

    public function search(Request $request){
      
        $users = User::where('id', '!=', userId())->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('id', 'like', '%' . $request->search . '%')
                    ->orWhere('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('gender', 'like', '%' . $request->search . '%')
                     ->orWhere('mobile', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(paginate_conut);
        //    ->setPath('');
        $users->appends ( array (
                'search' => $request->search ));

        return view("admin.users.index", compact('users'));
    }//end of search



}
