<?php

namespace App\Http\Controllers\Rc;

use App\Http\Controllers\Controller;

use App\Models\Category;

use App\Models\Cligne;
use App\Models\Commande;
use App\Models\Livraison;
use App\Models\Pay;
use App\Models\Secteur;
use App\User;
use Illuminate\Http\Request;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $commandes = Commande::all();
	    return view('Rc/Commandes/index')->with(compact('commandes'));
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

	public function getLigne(){
		$users = User::all()->filter(function($item){
			return $item->free;
		});

		//dd($users);
		return response()->json(compact('users'));
	}

	public function addLigne(){
		$ligne = Cligne::find(request('cligne_id'));
		Livraison::create(['user_id'=>request('user_id'),'cligne_id'=>request('cligne_id'),'poste_id'=>$ligne->poste_id,'commande_id'=>$ligne->commande_id,
		'debut'=>$ligne->debut, 'fin'=>$ligne->fin,'client_id'=>$ligne->commande->client_id,'montant'=>request('montant')
		]);
		request()->session()->flash('success','L\'agent a été correctement placé !!!');
		return redirect()->back();
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
		return view('Rc/Commandes/show')->with(compact('commande'));
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
