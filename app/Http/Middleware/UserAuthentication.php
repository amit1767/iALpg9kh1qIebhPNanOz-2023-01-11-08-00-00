<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class UserAuthentication
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
        if(!empty(Session::get('AuthUser')) && Session::get('LoggedInUserRole') != "Standard User"){
            if(Session::get('LoggedInUserId')){
                return $next($request);
            }else{
                Session::forget('AuthUser');
                Session::forget('LoggedInUserId');
                Session::forget('LoggedInUserRole');
                Session::flush();

                return redirect()->route('login')->with('error', 'Your are not authorized');
            }
        }
        return redirect()->route('login');
    }
}
