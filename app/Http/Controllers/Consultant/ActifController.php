<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Concurrent;
use App\Models\Environnement;
use App\Models\Environnment;
use App\Models\Etape;
use App\Models\Modepaiement;
use App\Models\Moyen;
use App\Models\Moyens_projet;
use App\Models\Prevbilan;
use App\Models\Prevresultat;
use App\Models\Prevtresorerie;
use App\Models\Projet;
use App\Models\Ressource;
use App\Models\Segment;
use App\Models\Swot;
use App\Models\Teaser;
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
        $dossiers = Actif::orderBy('created_at','desc')->where('expert_id',Auth::user()->id)->paginate(12);
        return view('/Consultant/Actifs/index')->with(compact('dossiers'));
    }



	public function saveTeaser(Request $request){

		$projet = Actif::find($request->id);
		$projet->teaser = $request->teaser;
		$projet->save();
		return redirect()->back();
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


		return view('/Consultant/Actifs/show')->with(compact('projet'));
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
