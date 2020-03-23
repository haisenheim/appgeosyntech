<?php

namespace App\Http\Controllers\Ac;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use App\Models\Poste;
use App\Models\Secteur;

use Illuminate\Http\Request;


class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $postes = Poste::all();
		$secteurs = Secteur::all();
	    return view('Ac/Postes/index')->with(compact('postes','secteurs'));
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

		$ville =[];
		$ville['name']=$request->name;
		$s = Poste::create($ville);

		$request->session()->flash('success','Le poste a été correctement enregistré !!!');
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
		$secteur = Secteur::where('token',$token)->first();
		return view('Ac/Secteurs/show')->with(compact('secteur'));
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
