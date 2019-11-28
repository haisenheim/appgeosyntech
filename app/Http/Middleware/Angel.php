<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Angel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role_id != 4){

            return redirect('/login');
        }
	   // dd($request->path());
	    $path = explode('/',$request->path());
	    if(in_array('mailbox',$path)){
		    Session::put('slides', 4);
	    }
        return $next($request);
    }
}
