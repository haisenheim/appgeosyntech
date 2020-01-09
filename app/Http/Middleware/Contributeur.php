<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Contributeur
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
        if(Auth::user()->role_id != 7){
            return redirect('/login');
        }

	    $path = explode('/',$request->path());

	    if(in_array('manuel',$path)){
		    Session::put('active', 4);
	    }
	    if(in_array('finances',$path)){
		    Session::put('active', 3);
	    }
	    if(in_array('formations',$path)){
		    Session::put('active', 2);
	    }
	    if(in_array('mailbox',$path)){
		    Session::put('active', 5);
	    }
	    if(in_array('dashboard',$path)){
		    Session::put('active', 1);
	    }

        return $next($request);
    }
}
