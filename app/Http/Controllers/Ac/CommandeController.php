<?php

namespace App\Http\Controllers\Rc;

use App\Http\Controllers\Controller;

use App\Models\Category;

use App\Models\Commande;
use App\Models\Pay;
use App\Models\Secteur;
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
