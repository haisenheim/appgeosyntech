<?php

namespace App\Http\Controllers\Adminag;

use App\Helpers\Numero;
use App\Http\Controllers\Controller;
use App\Models\Earlie;
use App\Models\Facture;
use App\Models\Investissement;
use App\Models\Paiement;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Exception;
use PDF;

class EarlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $projets = Earlie::orderBy('created_at','desc')->where('agence_id',Auth::user()->agence_id)->paginate(20);
	    return view('/Adminag/Earlies/index')->with(compact('projets'));
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





	/*
	 * Bloquer le dossier
	 */
	public function disable(Request $request, $token){
		Earlie::updateOrCreate(['token'=>$token],['active'=>0]);
		$request->session()->flash('warning','Dossier bloqué avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Debloquer le dossier
	 */
	public function enable(Request $request, $token){
		Earlie::updateOrCreate(['token'=>$token],['active'=>1]);
		$request->session()->flash('success','Dossier débloqué avec succès!!!');
		return redirect()->back();
	}





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
	    $projet = Earlie::where('token',$token)->first();

	    $experts = User::all()->where('role_id',2)->where('agence_id',Auth::user()->agence_id);
	    return view('/Admin/Earlies/show')->with(compact('projet','experts'));
    }

	public function addExpert(Request $request){
		$projet = Earlie::find($request->id);
		$projet->expert_id = $request->expert_id;
		$projet->save();

		return redirect()->back();
	}



	public function getChoicesJson(Request $request){
		$projet = Earlie::where('token',$request->id)->first();
		$choices = $projet->choices;

		$choix = [];
		foreach($choices as $choice){
			$choix[] = $choice->choice_id;
		}
		return response()->json($choix);
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
