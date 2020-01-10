<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class National
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
        if(Auth::user()->role_id != 2){
            return redirect('/login');
        }

	    $path = explode('/',$request->path());

	    if(in_array('experts',$path)){
		    Session::put('active', 2);
	    }
	    if(in_array('contributeurs',$path)){
		    Session::put('active', 3);
	    }
	    if(in_array('formations',$path) || in_array('chaire',$path)){
		    Session::put('active', 4);
	    }
	    if(in_array('members',$path) || in_array('entreprises',$path) || in_array('centres',$path)){
		    Session::put('active', 5);
	    }

	    if(in_array('finances',$path)){
		    Session::put('active', 6);
	    }
	    if(in_array('users',$path) || in_array('agences',$path) || in_array('villes',$path)){
		    Session::put('active', 7);
	    }
	    if(in_array('dashboard',$path)){
		    Session::put('active', 1);
	    }

        return $next($request);


    }
}
