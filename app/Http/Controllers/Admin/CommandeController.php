<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cligne;
use App\Models\Commande;
use App\Models\Livraison;

use App\User;



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
	    return view('Admin/Commandes/index')->with(compact('commandes'));
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
		$fil = User::all()->filter(function($item){
			return $item->free;
		});
		$users = $fil->toArray();

		//dd($users);
		return response()->json($users);
	}

	public function getLivraison($token){
		$livraison = Livraison::where('token',$token)->first();

		return view('Admin/Commandes/livraison')->with(compact('livraison'));
	}



	public function showLigne($token){
		$ligne = Cligne::where('token',$token)->first();
		return view('Admin/Commandes/ligne')->with(compact('ligne'));
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
		return view('Admin/Commandes/show')->with(compact('commande'));
	}


}
