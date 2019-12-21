<?php

namespace App\Http\Controllers;

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
                return redirect('consultant/dashboard');
            }

            if(Auth::user()->role_id==3){
                return redirect('owner/dossiers');
            }

            if(Auth::user()->role_id==4){
                return redirect('angel/investissements/dossiers');
            }
	        if(Auth::user()->role_id==5){
		        return redirect('adminentr/angels');
	        }
	        if(Auth::user()->role_id==6){
		        return redirect('adminorg/dossiers');
	        }
	        if(Auth::user()->role_id==7){
		        return redirect('apporteur/clients');
	        }
	        if(Auth::user()->role_id==8){
		        return redirect('national/cashboard');
	        }
	        if(Auth::user()->role_id==9){
		        return redirect('adminag/dashboard');
	        }
            else{
                return view('home');
            }
        }


        return view('home');
    }

	public function about(){

		return view('Front/about');
	}
}
