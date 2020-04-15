<?php

namespace App\Http\Controllers\Rf;
use App\Http\Controllers\Controller;
use App\Models\Facture;


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



}
