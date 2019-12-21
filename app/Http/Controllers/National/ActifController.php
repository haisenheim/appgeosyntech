<?php

namespace App\Http\Controllers\National;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $projets = Actif::all()->whereHas('user', function($q){
		    $q->where('condition', '=', Auth::user()->agence_id);
	    });

	    return view('/National/Actifs/index')->with(compact('projets'));
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
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
	    $projet = Actif::where('token',$token)->first();
	    //dd($projet);

	    $experts = User::all()->where('role_id',2);
	    return view('/National/Actifs/show')->with(compact('projet','experts'));
    }

	public function addExpert(Request $request){
		$projet = Actif::find($request->id);
		$projet->expert_id = $request->expert_id;
		$projet->save();

		return redirect()->back();
	}

	public function disable($id){
		$projet = Actif::find($id);
		$projet->active = 0;
		$projet->save();

		return redirect()->back();
	}

	public function enable($id){
		$projet = Actif::find($id);
		$projet->active = 1;
		$projet->save();

		return redirect()->back();
	}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
