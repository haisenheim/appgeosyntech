<?php

namespace App\Http\Controllers\Angel;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Cession;
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
        $dossiers = Actif::orderBy('created_at','desc')->paginate(12);
        return view('/Angel/Actifs/index')->with(compact('dossiers'));
    }



	public function subscribe($token){
		$actif = Actif::where('token',$token)->first();
		$cession = Cession::all()->where('angel_id',Auth::user()->id)->where('actif_id',$actif->id)->first();
		if(!$cession){
			$cession = new Cession();
			$cession->angel_id = Auth::user()->id;
			$cession->actif_id = $actif->id;
			$cession->save();
		}

		return back();
	}

	public function unsubscribe($token){
		$actif = Actif::where('token',$token)->first();
		$cessions = Cession::all()->where('angel_id',Auth::user()->id)->where('actif_id',$actif->id);
		foreach($cessions as $cession){
			Actif::destroy($cession->id);
		}

		return back();
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


		return view('/Angel/Actifs/show')->with(compact('projet'));
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
