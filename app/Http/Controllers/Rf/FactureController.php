<?php

namespace App\Http\Controllers\Rf;
use App\Http\Controllers\Controller;
use App\Models\Facture;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;


class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $factures = Facture::all()->sortByDesc('created_at');
	    return view('Rf/Factures/index')->with(compact('factures'));
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
		$facture = Facture::where('token',$token)->first();
		return view('Rf/Factures/show')->with(compact('facture'));
	}

	public function addPaiement(){

		$facture = Facture::where('token',request('id'))->first();
		if($facture) {

			$paiement = Paiement::create(['name' => str_pad(date('ydm') . $facture->client_id, 10, '0', STR_PAD_LEFT), 'user_id' => Auth::user()->id,
				'client_id' => $facture->client_id,'montant'=>request('montant'),
				'token' => sha1(Auth::user()->id . date('Ymdhis')), 'moi_id' => date('m'), 'annee' => date('Y'),'semaine'=>date('w'),'facture_id'=>$facture->id
			]);

			request()->session()->flash('success','Paiement enregistré !!!');

			return redirect()->back();

		}
	}



}
