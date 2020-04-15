<?php

namespace App\Http\Controllers\Rf;

use App\Http\Controllers\Controller;

use App\Models\Client;





class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	    $clients = Client::all();


        return view('Rf/Clients/index')->with(compact('clients'));

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
        $client = Client::where('token',$token)->first();


        return view('Rf/Clients/show')->with(compact('client'));
    }




}
