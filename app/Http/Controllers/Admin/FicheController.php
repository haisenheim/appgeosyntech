<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;

use App\Models\Fiche;

use App\Models\Moi;



class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $moi_id = request('moi_id');
	    $annee = request('annee');
	    $client_id = request('client_id');
	    $mois = Moi::all();
	    $clients = Client::all();

	    $fiches = Fiche::all()->where('moi_id',$moi_id)->where('annee',$annee)->where('client_id',$client_id);
	    $client = Client::find($client_id);
	    return view('Admin/Fiches/index')->with(compact('fiches','annee','moi_id','mois','clients','client'));
    }

	public function show($token)
	{
		//
		$fiche = Fiche::where('token',$token)->first();
		return view('Admin/Fiches/show')->with(compact('fiche'));
	}


}
