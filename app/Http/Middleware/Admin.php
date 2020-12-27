<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        if(Auth::user()->role_id != 1){
            return redirect('/login');
        }
	    Session::put('active', 1);
	    $path = explode('/',$request->path());
	    if(in_array('analyses',$path)){
		    Session::put('active', 6);
	    }
	    if(in_array('clients',$path)){
		    Session::put('active', 3);
	    }
	    if(in_array('articles',$path)){
		    Session::put('active', 2);
	    }
	    if(in_array('fournisseurs',$path)){
		    Session::put('active', 4);
	    }
	    if(in_array('projets',$path)){
		    Session::put('active', 5);
	    }
	    if(in_array('dashboard',$path)){
		    Session::put('active', 1);
	    }

        return $next($request);
    }
}
