<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Frontend\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
       return redirect()->route('welcome');
    }
}

