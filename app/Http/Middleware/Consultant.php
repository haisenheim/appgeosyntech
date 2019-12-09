<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Consultant
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
	    if(in_array('finances',$path)){
		    Session::put('active', 6);
	    }
	    if(in_array('porteurs',$path)){
		    Session::put('active', 5);
	    }
	    if(in_array('partenariats',$path) || in_array('ressources',$path)){
		    Session::put('active', 4);
	    }
	    if(in_array('actifs',$path) || in_array('creances',$path)){
		    Session::put('active', 3);
	    }
	    if(in_array('projets',$path) || in_array('dossiers',$path)){
		    Session::put('active', 2);
	    }
	    if(in_array('dashboard',$path)){
		    Session::put('active', 1);
	    }


        return $next($request);
    }
}
