<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth.check');
    }

    public function index(){
        $active_nav =0;
        $user = User::find(userId())->first();
        if(!$user)
            return abort('404');
        return view('frontend.account.profile',compact('active_nav','user'));
    }
}
