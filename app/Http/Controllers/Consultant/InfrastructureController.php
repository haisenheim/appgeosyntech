<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Concurrent;
use App\Models\Environnement;
use App\Models\Environnment;
use App\Models\Etape;
use App\Models\Infrastructure;
use App\Models\Modepaiement;
use App\Models\Moi;
use App\Models\Moyen;
use App\Models\InfrastructuresMoyen;
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

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dossiers = Infrastructure::orderBy('created_at','desc')->where('expert_id',Auth::user()->id)->paginate(12);
        return view('/Consultant/Infrastructures/index')->with(compact('dossiers'));
    }

	public function getChoicesJson(Request $request){
		$projet = Infrastructure::where('token',$request->id)->first();
		$choices = $projet->choices;

		$choix = [];
		foreach($choices as $choice){
			$choix[] = $choice->choice_id;
		}
		return response()->json($choix);
	}


	public function getProduitsJson(Request $request){
		$projet = Infrastructure::where('token',$request->id)->first();
		$choices = $projet->produits;

		$produits = [];
		foreach($choices as $choice){
			$produits[] = $choice->produit_id;
		}
		return response()->json($produits);
	}

	public function updatePlanJson(Request $request){
		$projet = Infrastructure::where('token',$request->id)->first();
		$projet->plan_id = $request->plan_id;

		$projet->save();
		return response()->json($projet);
	}


	//Creation du diagnostic externe
	public function createDiagExterne($token){
		$projet = Infrastructure::where('token',$token)->first();
		return view('/Consultant/Infrastructures/create_diag_externe')->with(compact('projet'));
	}

	//Sauvegarde du diagnostic externe
	public function saveDiagExterne(Request $request){

			$dossier = Infrastructure::where('token',$request->token)->first();
			$segments = $request->segments;
			$concurrents=$request->concurrents;

			//dd($request->env);

			if($dossier){
				if($dossier->concurrents){
					Concurrent::where('infrastructure_id',$dossier->id)->delete();
				}
				for($i=0; $i<count($concurrents); $i++){
					$concurrent = new Concurrent();
					$concurrent->infrastructure_id=$dossier->id;
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
				if($dossier->segments){
					Segment::where('infrastructure_id',$dossier->id)->delete();
				}

				for($i=0; $i<count($segments); $i++){
					$concurrent = new Segment();
					$concurrent->infrastructure_id=$dossier->id;
					$concurrent->name=$segments[$i]['qui'];
					$concurrent->quoi=$segments[$i]['quoi'];
					$concurrent->quand=$segments[$i]['quand'];
					$concurrent->ou=$segments[$i]['ou'];
					$concurrent->combien=$segments[$i]['combien'];
					$concurrent->pourquoi=$segments[$i]['pourquoi'];
					$segment = $concurrent->save();
				}


				$env = $request->env;
				if($dossier->environnement){
					Environnement::where('infrastructure_id',$dossier->id)->delete();
				}
				$environnement = new Environnement();
				$env['infrastructure_id'] = $dossier->id;
				$env['user_id'] = Auth::user()->id;
				$environnement = Environnement::create($env);
				if($environnement){
					$dossier->etape=2;
					$dossier->save();
				}
				return response()->json($dossier);
			}else{
				return response('Jojo',500);
			}
			// $id=$dossier->id;


	}


	//Creation du diagnostic strategique
	public function createDiagStrategique($token){
		$projet = Infrastructure::where('token',$token)->first();
		return view('/Consultant/Infrastructures/create_diag_strategique')->with(compact('projet'));
	}




	//Creation du diagnostic strategique
	public function createPlanFinancier($token){

		$moyens = Moyen::all();
		$projet = Infrastructure::where('token',$token)->first();
		return view('/Consultant/Infrastructures/create_plan_financier')->with(compact('projet','moyens'));
	}


	/***
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 *  Sauvegarde du plan financier
	 */

	public function savePlanFinancier(Request $request){
		//dd($request);
		$projet = Infrastructure::where('token',$request->token)->first();
		$projet->montant_investissement = $request->montage['montant'];
		$projet->bfr= $request->montage['bfr'];
		$projet->etape =4;
		$projet->save();
		$bilans = $request->bilans;
		foreach($bilans as $bilan){
			$bilan['infrastructure_id']=$projet->id;
			$bilan['user_id'] = Auth::user()->id;
			Prevbilan::create($bilan);
		}

		$tresos = $request->tresoreries;
		foreach($tresos as $tr){
			$tr['infrastructure_id']=$projet->id;

			Prevtresorerie::create($tr);
		}

		$resultats = $request->resultats;
		foreach($resultats as $res) {
			$res['infrastructure_id'] = $projet->id;
			$res['token']=$request->_csrf;
			Prevresultat::create($res);
		}



		$moyens = $request->moyens;
		foreach($moyens as $moyen){
			$m = new InfrastructuresMoyen();
			$m->infrastructure_id=$projet->id;
			$m->moyen_id = $moyen['moyen_id'];
			$m->montant = $moyen['montant'];
			$m->save();
		}

		return response()->json($projet);
	}


	public function saveTeaser(Request $request){
		$projet = Infrastructure::where('token',$request->projet_token)->first();
		$data = $request->all();

		$teaser = new Teaser();
		$teaser->problematique = $data['problematique'];
		$teaser->chiffres = $data['chiffres'];
		$teaser->contexte = $data['contexte'];
		$teaser->focus_realisations=$data['focus_realisations'];
		$teaser->strategie = $data['strategie'];
		$teaser->marche = $data['marche'];
		$teaser->infrastructure_id = $projet->id;
		$teaser->user_id = Auth::user()->id;
		$teaser->save();
		//dd($request->all());
		//Teaser::create($data);
		return redirect()->back();
	}


	//Sauvegarde du diagnostic strategique
	public function saveDiagStrategique(Request $request){
		$token = $request->token;
		$projet = Infrastructure::where('token',$token)->first();
		//dd($request->token);

		$swot = new Swot();
		$swot->infrastructure_id= $projet->id;
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
			$ressouce->infrastructure_id = $projet->id;
			$ressouce->save();
		}
		return response()->json($projet);
	}



	public function getModesJson(Request $request){
		$mode = Modepaiement::find($request->id);

		return response()->json($mode);
	}

	public function addMode(Request $request){
		$projet = Infrastructure::where('token',$request->projet_token)->first();
		$projet->modepaiement_id = $request->mode_id;
		$projet->validated_step=1;
		$projet->save();
		return redirect()->back();
	}

	public function synthese1(Request $request){

		//dd($request->synthese1);
		$projet = Infrastructure::where('token',$request->projet_token)->first();
		$projet->synthese_diagnostic_interne = $request->synthese1;
		$projet->save();
		return redirect()->back();
	}


	/**
	 * Enregistrement de la synthese du diagnostic externe
	 */

	public function synthese2(Request $request){

		//dd($request->synthese1);
		$projet = Infrastructure::where('token',$request->projet_token)->first();
		$projet->synthese_diagnostic_externe = $request->synthese2;
		$projet->save();
		return redirect()->back();
	}
	/**
	 * Enregistrement de la synthese du diagnostic strategique
	 */

	public function synthese3(Request $request){

		//dd($request->synthese1);
		$projet = Infrastructure::where('token',$request->projet_token)->first();
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
		$projet = Infrastructure::where('token',$token)->first();
		//$modes = Modepaiement::all()->where('active',1);
		$mois = Moi::all();

		return view('/Consultant/Infrastructures/show')->with(compact('projet','mois'));
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
