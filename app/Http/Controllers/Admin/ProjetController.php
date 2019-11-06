<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investissement;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $projets = Projet::all();

	    return view('/Admin/Projets/index')->with(compact('projets'));
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
	 * Validation du premier paiement
	 */

	public function validateDiagInterne(Request $request, $token){

		Projet::updateOrCreate(['token'=>$token],['validated_step'=>1]);
		$request->session()->flash('success','Premier paiement enregistré avec succès!!!');

		return redirect()->back();
	}

	/**
	 * Validation du deuxieme paiement
	 */

	public function validateDiagExterne(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['validated_step'=>2]);
		$request->session()->flash('success','Deuxieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}

	/**
	 * Validation du troisieme paiement
	 */

	public function validateDiagStrategique(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['validated_step'=>3]);
		$request->session()->flash('success','Troisieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}


	/**
	 * Validation du quatrieme paiement
	 */

	public function validateMontageFinancier(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['validated_step'=>4]);
		$request->session()->flash('success','Quatrieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Bloquer le dossier
	 */
	public function disable(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['active'=>0]);
		$request->session()->flash('warning','Dossier bloqué avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Debloquer le dossier
	 */
	public function enable(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['active'=>1]);
		$request->session()->flash('success','Dossier débloqué avec succès!!!');
		return redirect()->back();
	}

	/*
	 *
	 */
	public function closeDoc(Request $request, $token){
		Investissement::updateOrCreate(['token'=>$token],['doc_juridique'=>0]);
		$request->session()->flash('success',' Fermeture de la documentation juridique!!!');
		return redirect()->back();
	}

	public function openDoc(Request $request, $token){
		Investissement::updateOrCreate(['token'=>$token],['doc_juridique'=>1]);
		$request->session()->flash('success',' Ouverture de la documentation juridique!!!');
		return redirect()->back();
	}

	/*
	 * Valider l'ordre de virement
	 */
	public function validateOrdre(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['ordrevirement_validated'=>1]);
		$request->session()->flash('success',' Fermeture de la documentation juridique!!!');
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
	    $projet = Projet::where('token',$token)->first();

	    $experts = User::all()->where('role_id',2);
	    return view('/Admin/Projets/show')->with(compact('projet','experts'));
    }

	public function addExpert(Request $request){
		$projet = Projet::find($request->id);
		$projet->expert_id = $request->expert_id;
		$projet->save();

		return redirect()->back();
	}



	public function getChoicesJson(Request $request){
		$projet = Projet::find($request->id);
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
