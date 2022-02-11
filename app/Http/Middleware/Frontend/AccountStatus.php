<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() === null) {
            Auth::guard()->logout();
            return redirect('/');
        }
        if (Auth::user()->role > 1) {
            if (Auth::user()->account_status == 1) {
                return $next($request);
            } else {
                Auth::guard()->logout();
                $alert = alert('error', 'The account is not activated, please see the system administrator', 'sweet');
                return redirect()->route('welcome')->with($alert);
            }
        }
        return redirect('/'); 
    }
}
