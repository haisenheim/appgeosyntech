<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Comment;
use App\Models\Devise;
use App\Models\Flettre;
use App\Models\Investissement;
use App\Models\Lettre;
use App\Models\Projet;
use App\Models\TagsProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PDF;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

	public function printit($token){
		$dossier = Projet::where('token',$token)->first();
		/*$choices = $dossier->choices;

		$choix = [];
		foreach($choices as $choice){
			$choix[] = $choice->choice_id;
		}

		$choix = json_encode($choix);

		//var_dump($choix);




				$data = ['choix'=>$choix];

				$payload = $data;
		//var_dump($payload);

		// Prepare new cURL resource
				$ch = curl_init('http://orm.test/api/carto');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLINFO_HEADER_OUT, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		// Set HTTP Header for POST request


		// Submit the POST request
				$result = curl_exec($ch);

		// Close cURL session handle
				curl_close($ch);

		//var_dump($result);
		//die();*/



		$data =['dossier'=>$dossier];
		$pdf = PDF::loadView('Utils/Dossiers/printit',$data);
		return $pdf->stream($dossier->name.'.pdf');
	}

	public function getOwner(Request $request){
		$user = Auth::user();

	}

	public function getChoicesJson(Request $request){
		$projet = Projet::where('token',$request->id)->first();
		$choices = $projet->choices;

		$choix = [];
		foreach($choices as $choice){
			$choix[] = $choice->choice_id;
		}
		return response()->json($choix);
	}


	public function getProduitsJson(Request $request){
		$projet = Projet::where('token',$request->id)->first();
		$choices = $projet->produits;

		$produits = [];
		foreach($choices as $choice){
			$produits[] = $choice->produit_id;
		}
		return response()->json($produits);
	}

	public function getInvestissementOwner(){}

	public function getInvestissementsProjets(Request $request){
		$id = $request->query('id');
		$angel = Auth::user();
		$investissements = Investissement::all()->where('angel_id',$angel->id);
		//dd($investissements);
		$projets =  collect([]);
		foreach($investissements as $investissement){
			if($investissement->projet->owner_id==$id){
				$projets->add($investissement);
			}
			//debug($projets);
		}

		//dd($projets);
		$projets = $projets->unique();

		return response()->json($projets);
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
    public function show($p)
    {
        //

	   // dd($p);
	    $devises = Devise::all();
	    $formes = Flettre::all();
	    $investissement = Investissement::all()->where('token',$p)->first();
	    return view('/Angel/Dossiers/show')->with(compact('investissement','devises','formes'));
    }


	public function addComment(Request $request){
		$comment = new Comment();
		$projet = Investissement::where('token', $request->token)->first();
		$comment->investissement_id = $projet->id;
		$comment->role_id = 4;
		$comment->body = $request->message;
		$comment->author_id = Auth::user()->id;
		$comment->save();
		return back();
	}

	public function saveLetter(Request $request){
		$projet = Investissement::where('token', $request->token)->first();
		if($projet->lettre){
			$lettre = $projet->lettre;
			$data = [];
			//$data['id']=$lettre->id;
			$data['type_remboursement']= $request->type_remboursement;
			$data['forme_id'] = $request->forme_id;
			$data['montant'] = $request->montant;
			$data['pct_participation']=$request->pct_participation;
			$data['pct_engagement']=$request->pct_engagement;
			$data['duree_engagement']=$request->duree_engagement;
			$data['mt_engagement']=$request->mt_engagement;
			$data['devise_id']=$request->devise_id;
			$data['personnel']=$request->personnel;
			$data['pct_pret']=$request->pct_pret;
			$data['duree_pret']=$request->duree_pret;
			$data['lieu'] = $request->lieu;
			Lettre::updateOrCreate(['investissement_id'=>$lettre->investissement_id],$data);
		}else{
			$lettre =new Lettre();
			$lettre->investissement_id = $projet->id;
			$lettre->type_remboursement= $request->type_remboursement;
			$lettre->forme_id = $request->forme_id;
			$lettre->montant = $request->montant;
			$lettre->pct_participation=$request->pct_participation;
			$lettre->pct_engagement=$request->pct_engagement;
			$lettre->duree_engagement=$request->duree_engagement;
			$lettre->mt_engagement=$request->mt_engagement;
			$lettre->devise_id=$request->devise_id;
			$lettre->personnel=$request->personnel;
			$lettre->pct_pret=$request->pct_pret;
			$lettre->duree_pret=$request->duree_pret;
			$lettre->lieu = $request->lieu;
			$lettre->save();
		}

		return back();
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
