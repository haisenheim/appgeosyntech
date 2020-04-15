<?php

namespace App\Http\Controllers\Rf;
use App\Http\Controllers\Controller;
use App\Models\Depense;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Tdepense;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $debut = request('debut');
	    $fin = request('fin');

	    if($debut && $fin){
		    $paiements = Paiement::all()->whereBetween('created_at',[$debut,$fin])->sortByDesc('created_at');
		   // return view('Rf/Depenses/index')->with(compact('depenses'));
	    }else{
		    $paiements = Paiement::all()->where('moi_id',date('m'))->where('annee',date('Y'))->sortByDesc('created_at');
	    }



	    return view('Rf/Paiements/index')->with(compact('paiements'));
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
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
	public function show($token)
	{
		//
		$paiement = Paiement::where('token',$token)->first();
		return view('Rf/Paiements/show')->with(compact('paiement'));
	}



}
