<?php

namespace App\Http\Controllers\Corporate;

use App\Http\Controllers\Controller;

use App\Models\Entreprise;
use App\Models\EntrepriseFormation;
use App\Models\Formation;
use App\Models\Module;
use App\User;


use App\Models\Pay;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $formations = Formation::all()->where('chaire_obac',0)->sortByDesc('created_at')->paginate(10);

	    return view('Corporate/Formations/index')->with(compact('formations'));
    }


	public function getOurFormations(){

		//$entreprise = Entreprise::find(Auth::user()->entreprise_id);
		//dd($entreprise);
		$inscriptions = EntrepriseFormation::all()->where('entreprise_id', Auth::user()->entreprise_id)->sortByDesc('created_at')->paginate(10);
		return view('Corporate/Formations/nos_formations')->with(compact('inscriptions'));
	}

	public function getFormation($token){
		$formation = Formation::where('token',$token)->first();
		$formation = EntrepriseFormation::where('entreprise_id',Auth::user()->entreprise_id)->where('formation_id',$formation->id)->first();
		return view('Corporate/Formations/show')->with(compact('formation'));
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






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
	    $formation = Formation::where('token',$token)->first();

	    return view('Corporate/Formations/show')->with(compact('formation'));
    }



	public function showModule($token)
	{
		//
		$module = Module::where('token',$token)->first();

		return view('Corporate/Formations/show_module')->with(compact('module'));
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

	public function getTestModule($token){
		$module = Module::where('token',$token)->first();
		return view('Corporate/Formations/module_test')->with(compact('module'));
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
