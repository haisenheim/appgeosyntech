<?php

namespace App\Http\Controllers\Angel;

use App\Http\Controllers\Controller;
use App\Models\Cession;
use App\Models\Investissement;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $cessions = Cession::all()->where('angel_id',Auth::user()->id)->sortBy('created_at',null,true);
	    //dd($cessions);
	    return view('Angel/Cessions/index')->with(compact('cessions'));
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
	    $projet = Cession::where('token',$request->token)->first();
	    if($projet){
		    $inv = Cession::create([

			    'actif_id'=>$projet->id,
			    'angel_id'=>Auth::user()->id,
			    'entreprise_id'=>Auth::user()->entreprise_id,
			    'organisme_id'=>Auth::user()->organisme_id,
			    'token'=>sha1(Auth::user()->id . date('Yhmdis'))
		    ]);
		    $request->session()->flash('success','Votre demande a été correctement initialisé !!!');
	    }

	    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function show(Investissement $investissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Investissement $investissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investissement $investissement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investissement $investissement)
    {
        //
    }
}
