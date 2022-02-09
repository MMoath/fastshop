<?php

namespace App\Http\Middleware\frontend;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserCheckAuth
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
     
        if (!Auth::check()) {
            $alert = alert('info', 'You must be logged in first','sweet');
           return redirect()-> route('login')->with($alert);
        }
     
        return $next($request);
    }
}
