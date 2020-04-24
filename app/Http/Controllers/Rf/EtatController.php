<?php

namespace App\Http\Controllers\Rf;

use App\Http\Controllers\Controller;

use App\Models\Depense;
use App\Models\Paiement;
use Illuminate\Http\Request;


class EtatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCompteResultat()
    {
	    $debut = request('debut');
	    $fin = request('fin');

	    if($debut && $fin){
		    $paiements = Paiement::all()->whereBetween('created_at',[$debut,$fin])->sortByDesc('created_at');
		    $depenses = Depense::all()->whereBetween('jour',[$debut,$fin])->sortByDesc('created_at');

		    // return view('Rf/Depenses/index')->with(compact('depenses'));
	    }else{
		    $paiements = Paiement::all()->where('moi_id',date('m'))->where('annee',date('Y'))->sortByDesc('created_at');
		    $depenses = Depense::all()->where('moi_id',date('m'))->where('annee',date('Y'))->sortByDesc('created_at');
	    }

	    $ca = 0;
	    foreach($paiements as $paiement){
		    $ca = $ca + $paiement->montant;
	    }

	    $cv = 0;
	    $salaires = 0;
	    $cf = 0;
	    foreach($depenses as $depense){
		    if($depense->bulletin_id){
			    $cv = $cv + $depense->montant;
		    }else{
			    if($depense->bill_id){
				    $cv = $cv + $depense->montant;
			    }

			    else{
				    if($depense->tdepense->variable){
					    $cv = $cv + $depense->montant;
				    }else{
					    $cf = $cf + $depense->montant;
				    }

			    }
		    }
	    }

	    return view('Rf/Etats/compte_resultat')->with(compact('ca','cv','cf'));
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
		$ville['variable'] = $request->variable;

		$ville = Tdepense::create($ville);

		$request->session()->flash('success','Le type de depense a été correctement enregistré !!!');
		return back();


	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
	public function show($token)
	{
		//
		$secteur = Secteur::where('token',$token)->first();
		return view('Admin/Secteurs/show')->with(compact('secteur'));
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
