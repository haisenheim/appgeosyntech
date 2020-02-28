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

            if(Auth::user()->role_id==6){
                return redirect('consultant/dashboard');
            }

            if(Auth::user()->role_id==3){
                return redirect('adminag/formations');
            }

	        if(Auth::user()->role_id==5){
		        $entreprise = Entreprise::find(Auth::user()->entreprise_id);
		        Session::put('corporate', $entreprise);
		        return redirect('corporate/formations');
	        }



	        if(Auth::user()->role_id==4){
		        return redirect('formations');
	        }
	        if(Auth::user()->role_id==7){
		        return redirect('contributeur/formations');
	        }
	        if(Auth::user()->role_id==2){
		        return redirect('national/dashboard');
	        }
	        if(Auth::user()->role_id==9){
		        $entreprise = Centre::find(Auth::user()->centre_id);
		        Session::put('centre', $entreprise);
		        return redirect('mch/formations');
	        }
	        if(Auth::user()->role_id==8){
		        $entreprise = Entreprise::find(Auth::user()->entreprise_id);
		        Session::put('corporate', $entreprise);
		        return redirect('mcp/formations');
	        }
	        if(Auth::user()->role_id==10){

		        return redirect('/');
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
