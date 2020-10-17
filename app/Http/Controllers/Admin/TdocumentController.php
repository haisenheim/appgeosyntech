<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Category;
use App\Models\Competence;
use App\Models\Devise;
use App\Models\Metier;
use App\Models\Pay;
use App\Models\Secteur;
use App\Models\Step;
use App\Models\Tdocument;

use Illuminate\Http\Request;

class TdocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $types = Tdocument::all();
	    $steps = Step::all();
	    return view('Admin/Tdocuments/index')->with(compact('types','steps'));
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
		$ville['etape_id'] = $request->etape_id;

		$ville = Tdocument::create($ville);

		$request->session()->flash('success','Le type de document a été correctement enregistré !!!');
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
