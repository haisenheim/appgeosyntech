<?php

namespace App\Http\Controllers\Rh;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Bulletin;
use App\Models\Category;
use App\Models\Competence;
use App\Models\Devise;
use App\Models\Metier;
use App\Models\Pay;
use App\Models\Secteur;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $moi_id = request('moi_id')?request('moi_id'):date('m');
	    $annee = request('annee')?request('annee'):date('Y');

	    $bulletins = Bulletin::all()->where('moi_id',$moi_id)->where('annee',$annee);
	    return view('Rh/Salaires/index')->with(compact('bulletins','annee','moi_id'));
    }

	public function show($token)
	{
		//
		$bulletin = Bulletin::where('token',$token)->first();
		return view('Rh/Bulletins/show')->with(compact('bulletin'));
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
		$ville['minimum'] = $request->minimum;

		$ville = Category::create($ville);

		$request->session()->flash('success','La categorie a été correctement enregistrée !!!');
		return back();


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
