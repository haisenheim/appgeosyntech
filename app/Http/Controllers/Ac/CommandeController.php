<?php

namespace App\Http\Controllers\Ac;

use App\Http\Controllers\Controller;


use App\Models\Cligne;
use App\Models\Commande;
use App\Models\Pay;

use App\Models\Poste;
use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $secteurs = Secteur::all();
	    $postes = Poste::all();
	    $commandes = Commande::all()->where('client_id',Auth::user()->client_id)->sortByDesc('created_at');
	    return view('Ac/Commandes/index')->with(compact('commandes','postes','secteurs'));
    }

	public function save(){

		$lignes = request('lignes');
		$n = Auth::user()->client_id .date('whsi');

		$commande = Commande::create([
			'client_id'=>Auth::user()->client_id,
			'token'=> sha1(Auth::user()->id).date('Ymdihs'),
			'name'=>str_pad($n,6,'0',STR_PAD_LEFT).'/'.date('y'),
			'moi_id'=>date('m'),
			'annee'=>date('Y')

		]);
		$i=1;
		foreach($lignes as $ligne){

			Cligne::create([
				'commande_id'=>$commande->id,
				'secteur_id'=>$ligne['secteur_id'],
				'poste_id'=>$ligne['poste_id'],
				'quantity'=>$ligne['quantity'],

				'debut'=>$ligne['debut'],
				'fin'=>$ligne['fin'],
				'token'=>sha1(Auth::user()->id . date('dhYmis') . $i)
			]);
		}

		return response()->json(compact('commande'));
	}



	public  function valider($token){
		$commande = Commande::where('token',$token)->first();
		$commande->validated=1;
		$commande->save();
		request()->session()->flash('info','Demande validée !!!');
		return redirect()->back();
	}

	public  function disable($token){
		$commande = Commande::where('token',$token)->first();
		$commande->active=0;
		$commande->save();
		request()->session()->flash('info','Demande annulée !!!');
		return redirect()->back();
	}

	public  function envoyer($token){
		$commande = Commande::where('token',$token)->first();
		$commande->ordered=1;
		$commande->ordered_by = Auth::user()->id;
		$commande->ordered_at = new \DateTime();
		$commande->save();
		request()->session()->flash('success','Demande envoyée, commande confirmée !!!');
		return redirect()->back();
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
		$commande = Commande::where('token',$token)->first();
		return view('Ac/Commandes/show')->with(compact('commande'));
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
