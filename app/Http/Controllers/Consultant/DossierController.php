<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
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

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dossiers = Projet::orderBy('created_at','desc')->where('expert_id',Auth::user()->id)->paginate(2);
        return view('/Consultant/Dossiers/index')->with(compact('dossiers'));
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


	public function getProduitsJson(Request $request){
		$projet = Projet::find($request->id);
		$choices = $projet->produits;

		$produits = [];
		foreach($choices as $choice){
			$produits[] = $choice->produit_id;
		}
		return response()->json($produits);
	}

	public function updatePlanJson(Request $request){
		$projet = Projet::find($request->id);
		$projet->plan_id = $request->plan_id;

		$projet->save();
		return response()->json($projet);
	}


	//Creation du diagnostic externe
	public function createDiagExterne($token){
		$projet = Projet::where('token',$token)->first();
		return view('/Consultant/Dossiers/create_diag_externe')->with(compact('projet'));
	}

	//Sauvegarde du diagnostic externe
	public function saveDiagExterne(Request $request){

			$dossier = Projet::where('token',$request->token)->first();
			$segments = $request->segments;
			$concurrents=$request->concurrents;

			//dd($request->env);

			if($dossier){
				for($i=0; $i<count($concurrents); $i++){
					$concurrent = new Concurrent();
					$concurrent->projet_id=$dossier->id;
					$concurrent->name=$concurrents[$i]['qui'];
					$concurrent->quoi=$concurrents[$i]['quoi'];
					$concurrent->quand=$concurrents[$i]['quand'];
					$concurrent->ou=$concurrents[$i]['ou'];
					$concurrent->combien=$concurrents[$i]['combien'];
					$concurrent->pourquoi=$concurrents[$i]['pourquoi'];
					$concurrent->ca=$concurrents[$i]['ca'];
					$concurrent->salaires=$concurrents[$i]['sal'];
					//$concurrent->ebe=$concurrents[$i]['ebe'];
					//$concurrent->va=$concurrents[$i]['va'];
					$concurrent->cv=$concurrents[$i]['cv'];
					$concurrent->cf=$concurrents[$i]['cf'];
					//$concurrent->marge_brute=$concurrents[$i]['mb'];
					$concurrent = $concurrent->save();
				}
				//dd($concurrent);

				for($i=0; $i<count($segments); $i++){
					$concurrent = new Segment();
					$concurrent->projet_id=$dossier->id;
					$concurrent->name=$segments[$i]['qui'];
					$concurrent->quoi=$segments[$i]['quoi'];
					$concurrent->quand=$segments[$i]['quand'];
					$concurrent->ou=$segments[$i]['ou'];
					$concurrent->combien=$segments[$i]['combien'];
					$concurrent->pourquoi=$segments[$i]['pourquoi'];
					$segment = $concurrent->save();
				}


				$env = $request->env;
				$environnement = new Environnement();
				$env['projet_id'] = $dossier->id;
				$env['user_id'] = Auth::user()->id;
				$environnement = Environnement::create($env);
				if($environnement){
					$dossier->etape=2;
					$dossier->save();
				}
			}
			// $id=$dossier->id;
			return response()->json($dossier);

	}


	//Creation du diagnostic strategique
	public function createDiagStrategique($token){
		$projet = Projet::where('token',$token)->first();
		return view('/Consultant/Dossiers/create_diag_strategique')->with(compact('projet'));
	}




	//Creation du diagnostic strategique
	public function createPlanFinancier($token){

		$moyens = Moyen::all();
		$projet = Projet::where('token',$token)->first();
		return view('/Consultant/Dossiers/create_plan_financier')->with(compact('projet','moyens'));
	}


	/***
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 *  Sauvegarde du plan financier
	 */

	public function savePlanFinancier(Request $request){
		//dd($request);
		$projet = Projet::find($request->token);
		$projet->montant_investissement = $request->montage['montant'];
		$projet->bfr= $request->montage['bfr'];
		$projet->etape =4;
		$projet->save();
		$bilans = $request->bilans;
		foreach($bilans as $bilan){
			$bilan['projet_id']=$projet->id;
			$bilan['user_id'] = Auth::user()->id;
			Prevbilan::create($bilan);
		}

		$tresos = $request->tresoreries;
		foreach($tresos as $tr){
			$tr['projet_id']=$projet->id;

			Prevtresorerie::create($tr);
		}

		$resultats = $request->resultats;
		foreach($resultats as $res) {
			$res['projet_id'] = $projet->id;
			$res['token']=$request->_csrf;
			Prevresultat::create($res);
		}



		$moyens = $request->moyens;
		foreach($moyens as $moyen){
			$m = new Moyens_projet();
			$m->projet_id=$projet->id;
			$m->moyen_id = $moyen['moyen_id'];
			$m->montant = $moyen['montant'];
			$m->save();
		}

		return response()->json($projet);
	}


	public function saveTeaser(Request $request){
		$projet = Projet::find($request->projet_token);
		$data = $request->all();

		$teaser = new Teaser();
		$teaser->problematique = $data['problematique'];
		$teaser->chiffres = $data['chiffres'];
		$teaser->contexte = $data['contexte'];
		$teaser->focus_realisations=$data['focus_realisations'];
		$teaser->strategie = $data['strategie'];
		$teaser->marche = $data['marche'];
		$teaser->projet_id = $projet->id;
		$teaser->user_id = Auth::user()->id;
		$teaser->save();
		//dd($request->all());
		//Teaser::create($data);
		return redirect()->back();
	}


	//Sauvegarde du diagnostic strategique
	public function saveDiagStrategique(Request $request){
		$token = $request->token;
		$projet = Projet::find($token);
		//dd($request->token);

		$swot = new Swot();
		$swot->projet_id= $projet->id;
		$swot->user_id = Auth::user()->id;
		$swot->synt_op = $request->swot['synop'];
		$swot->synt_men = $request->swot['synmen'];
		$swot->synt_forces = $request->swot['synforces'];
		$swot->synt_faiblesses = $request->swot['synfaiblesses'];
		$swot->save();


		$projet->etude_faisabilite = $request->faisabilite;
		$projet->objectifs_courts = $request->objectifs_courts;
		$projet->objectifs_moyens = $request->objectifs_moyens;
		$projet->objectifs_longs = $request->objectifs_longs;
		$projet->etape = 3;
		$projet->save();

		$ressouces = $request->organisation;
		//dd($ressouces);
		foreach($ressouces as $ress){
			$ressouce = new Ressource();
			$ressouce->name = $ress['nom'];
			//$ressouce->name = "toto";
			$ressouce->fonction = $ress['fonction'];
			$ressouce->responsabilite = $ress['role'];
			$ressouce->projet_id = $projet->id;
			$ressouce->save();
		}

		$etapes = $request->etapes;
		foreach($etapes as $et){
			$etape = new Etape();
			$etape->projet_id = $projet->id;
			$etape->name = $et['name'];
			$etape->action = $et['action'];
			$etape->save();
		}

		return response()->json($projet);
	}



	public function getModesJson(Request $request){
		$mode = Modepaiement::find($request->id);

		return response()->json($mode);
	}

	public function addMode(Request $request){
		$projet = Projet::where('token',$request->projet_token)->first();
		$projet->modepaiement_id = $request->mode_id;
		$projet->validated_step=1;
		$projet->save();
		return redirect()->back();
	}

	public function synthese1(Request $request){

		//dd($request->synthese1);
		$projet = Projet::where('token',$request->projet_token)->first();
		$projet->synthese_diagnostic_interne = $request->synthese1;
		$projet->save();
		return redirect()->back();
	}


	/**
	 * Enregistrement de la synthese du diagnostic externe
	 */

	public function synthese2(Request $request){

		//dd($request->synthese1);
		$projet = Projet::where('token',$request->projet_token)->first();
		$projet->synthese_diagnostic_externe = $request->synthese2;
		$projet->save();
		return redirect()->back();
	}
	/**
	 * Enregistrement de la synthese du diagnostic strategique
	 */

	public function synthese3(Request $request){

		//dd($request->synthese1);
		$projet = Projet::where('token',$request->projet_token)->first();
		$projet->synthese_diagnostic_strategique = $request->synthese3;
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
		$projet = Projet::where('token',$token)->first();
		$modes = Modepaiement::all()->where('active',1);

		return view('/Consultant/Dossiers/show')->with(compact('projet','modes'));
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
