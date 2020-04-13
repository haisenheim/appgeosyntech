<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use App\Models\Moi;



class SalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $moi_id = request('moi_id')?request('moi_id'):date('m');
	    $annee = request('annee')?request('annee'):date('Y');
	    $mois = Moi::all();

	    $bulletins = Bulletin::all()->where('moi_id',$moi_id)->where('annee',$annee);
	    return view('Admin/Salaires/index')->with(compact('bulletins','annee','moi_id','mois'));
    }

	public function show($token)
	{
		//
		$bulletin = Bulletin::where('token',$token)->first();
		return view('Admin/Bulletins/show')->with(compact('bulletin'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


}
