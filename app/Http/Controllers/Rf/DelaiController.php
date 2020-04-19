<?php

namespace App\Http\Controllers\Rf;

use App\Http\Controllers\Controller;

use App\Models\Category;

use App\Models\Delai;
use App\Models\Pay;
use App\Models\Secteur;
use App\Models\Tdepense;
use Illuminate\Http\Request;


class DelaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $delais = Delai::all();
	    return view('Rf/Delais/index')->with(compact('delais'));
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
		//dd($request->imageUri);

		$ville =[];
		$ville['name']=$request->name;
		$ville['nombre'] = $request->nombre;

		$ville = Delai::create($ville);

		$request->session()->flash('success','Le delai a été correctement enregistré !!!');
		return back();


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
		return view('Admin/Secteurs/show')->with(compact('secteur'));
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
