<?php

namespace App\Http\Controllers\Rh;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Bulletin;
use App\Models\Category;
use App\Models\Client;
use App\Models\Competence;
use App\Models\Devise;
use App\Models\Fiche;
use App\Models\Metier;
use App\Models\Moi;
use App\Models\Pay;
use App\Models\Secteur;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
	    return view('Rh/Fiches/index')->with(compact('fiches','annee','moi_id','mois','clients','client'));
    }

	public function show($token)
	{
		//
		$fiche = Fiche::where('token',$token)->first();
		return view('Rh/Fiches/show')->with(compact('fiche'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request)
	{
		//
		//dd($request->imageUri);

		$ville =[];
		$ville['name']=$request->name;
		$ville['minimum'] = $request->minimum;

		$ville = Category::create($ville);

		$request->session()->flash('success','La categorie a été correctement enregistrée !!!');
		return back();


	}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay $pay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay $pay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        //
    }
}
