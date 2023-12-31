<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class check_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('IsLoggedIn')==null || Session::get('IsLoggedIn')==false ){
            return redirect('/login'); 
        }else{
            return $next($request);
        }
        
    }
}
