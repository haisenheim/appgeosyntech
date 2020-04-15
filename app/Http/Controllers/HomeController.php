<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usr = Auth::user();
        //dd($usr);
        if(!empty($usr)){
            if(Auth::user()->role_id==1){
                return  redirect('admin/dashboard');
            }

            if(Auth::user()->role_id==2){
                return redirect('rh/dashboard');
            }

            if(Auth::user()->role_id==3){
                return redirect('rc/dashboard');
            }

	        if(Auth::user()->role_id==4){

		        return redirect('ra/dashboard');
	        }

	        if(Auth::user()->role_id==5){
		        return redirect('ro/dashboard');
	        }
	        if(Auth::user()->role_id==6){
		        return redirect('ac/dashboard');
	        }
	        if(Auth::user()->role_id==9){
		        return redirect('rf/dashboard');
	        }

            else{
                return redirect('/login');
            }
        }


	    return redirect('/login');
    }

	public function about(){

		return view('Front/about');
	}
}
