<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;


use App\Models\Domaine;
use App\Models\Etape;
use App\Models\Fournisseur;
use App\Models\Frncotation;
use App\Models\ImportOption;
use App\Models\Lcotation;
use App\Models\Pay;
use App\Models\Produit;
use App\Models\ProduitProjet;
use App\Models\Projet;
use App\Models\Region;
use App\Models\Transcotation;
use App\Models\TransportOption;
use App\Models\Unit;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
	    $projet_id = $request->projet_id;
	    $client_id = $request->client_id;
	    $produit_id = $request->produit_id;
	    $statut = $request->statut;
        $lignes = ProduitProjet::all();
	    $clients = Client::all();
	    $projets = Projet::all();

	    $lgns = collect();
	    foreach($projets as $prj){
		    $frn = $prj->frncotations->last();
		    if($frn){
			    foreach ($frn->lignes as $ligne) {
				    $lgns->add([
					    'code' => $ligne->produit ? $ligne->produit->code : '-',
					    'name' => $ligne->produit ? $ligne->produit->name : '-',
					    'produit_id' => $ligne->produit_id,
					    'quantity' => $ligne->quantity,
					    'projet' => Str::limit($prj->name, 40),
					    'projet_id' => $prj->id,
					    'client' => $prj->client ? $prj->client->sigle : '-',
					    'client_id' => $prj->client_id,
					    'statut' => 2,
					    'etat' =>'Execution',
					    'badge'=>'success'
				    ]);
			    }
		    }
	    }

	    foreach($lignes as $ligne){
		    $lgns->add([
			    'code'=>$ligne->produit?$ligne->produit->code:'-',
			    'name'=>$ligne->produit?$ligne->produit->name:'-',
			    'produit_id'=>$ligne->produit_id,
			    'quantity'=>$ligne->quantity,
			    'projet'=>Str::limit($ligne->projet?$ligne->projet->name:'-',40),
			    'projet_id'=>$ligne->projet_id,
			    'client'=>$ligne->projet->client?$ligne->projet->client->sigle:'-',
			    'client_id'=>$ligne->projet->client_id,
			    'statut'=>1,
			    'etat' =>'Creation',
			    'badge'=>'warning'
		    ]);
	    }



	    if($produit_id){
		   // $lignes = $lignes->where('produit_id',$produit_id);
		    $lgns = $lgns->filter(function($value,$key) use($produit_id){

			   $fal = $value['produit_id'] == $produit_id;
			    return $fal;
		    });

		    //dd($lgns->all());
	    }

	    if($statut){

		    $lgns = $lgns->filter(function($value,$key) use($statut){

			   $fal = $value['statut'] == $statut;
			    return $fal;
		    });
	    }

	    if($projet_id){
		    //$lignes = $lignes->where('projet_id',$projet_id);
		    $lgns = $lgns->filter(function($q) use($projet_id){
			    return $q['projet_id'] == $projet_id;
		    });
	    }

	    if($client_id){
		    /*$lignes = $lignes->filter(function($q) use($client_id){
			    return $q->projet?$q->projet->client_id == $client_id : false;
		    });*/
		   $lgns = $lgns->filter(function($q) use($client_id){
			    return $q['client_id'] == $client_id;
		    });
	    }

	    $prod = collect($lignes)->groupBy('produit_id');

	    $produits = collect();
	    foreach($prod as $k=>$v){
		    $produits->add(Produit::find($k));
	    }



	    if(!$projet_id && !$produit_id && !$client_id){
		    $lgns = collect();
		    return view('/Admin/Analyses/index')->with(compact('lgns','produits','clients','projets'));
	    }

        return view('/Admin/Analyses/index')->with(compact('lgns','produits','clients','projets'));
    }


	public function getAchats(Request $request)
	{
		//
		$projet_id = $request->projet_id;
		$client_id = $request->client_id;
		$produit_id = $request->produit_id;
		$statut = $request->statut;
		$lignes = Lcotation::all();
		$clients = Client::all();
		$projets = Projet::all();
		$lgns = collect();

		$prod = collect($lignes)->groupBy('produit_id');

		$produits = collect();
		foreach($prod as $k=>$v){
			$produits->add(Produit::find($k));
		}


		if(!$projet_id && !$produit_id && !$client_id){
			$lgns = collect();
			return view('/Admin/Analyses/achats')->with(compact('lgns','produits','clients','projets'));
		}


		foreach($projets as $prj){
			$frn = $prj->frncotations->last();
			if($frn){
				foreach ($frn->lignes as $ligne) {
					$lgns->add([
						'code' => $ligne->produit ? $ligne->produit->code : '-',
						'name' => $ligne->produit ? $ligne->produit->name : '-',
						'produit_id' => $ligne->produit_id,
						'quantity' => $ligne->quantity,
						'projet' => Str::limit($prj->name, 40),
						'projet_id' => $prj->id,
						'client' => $prj->client ? $prj->client->sigle : '-',
						'client_id' => $prj->client_id,
						'statut' => 2,
						'etat' =>'Execution',
						'badge'=>'success',
						'pu'=>$ligne->price,
						'pu_fcfa'=>$ligne->price_fcfa,
						'total'=>$ligne->total,
						'total_fcfa'=>$ligne->total_fcfa
					]);
				}
			}
		}

		foreach($projets as $projet){
			foreach($projet->elements as $ligne){
				$lgns->add([
					'code'=>$ligne->produit?$ligne->produit->code:'-',
					'name'=>$ligne->produit?$ligne->produit->name:'-',
					'produit_id'=>$ligne->produit_id,
					'quantity'=>$ligne->quantity,
					'projet'=>Str::limit($ligne->projet?$ligne->projet->name:'-',40),
					'projet_id'=>$ligne->projet_id,
					'client'=>$ligne->projet->client?$ligne->projet->client->sigle:'-',
					'client_id'=>$ligne->projet->client_id,
					'statut'=>1,
					'etat' =>'Creation',
					'badge'=>'warning',
					'pu'=>$ligne->pu,
					'pu_fcfa'=>$ligne->price_fcfa,
					'total'=>$ligne->total,
					'total_fcfa'=>$ligne->total_fcfa
				]);
			}
		}


		if($produit_id){
			//$lignes = $lignes->where('produit_id',$produit_id);
			$lgns = $lgns->filter(function($value,$key) use($produit_id){
				$fal = $value['produit_id'] == $produit_id;
				return $fal;
			});

		}

		if($projet_id){
			/*$lignes = $lignes->filter(function($q){
				return $q->frncotation?$q->frncotation->projet_id:-100;
			});*/
			$lgns = $lgns->filter(function($value,$key) use($projet_id){

				$fal = $value['projet_id'] == $projet_id;
				return $fal;
			});

		}

		if($client_id){
			/*$lignes = $lignes->filter(function($q){
				return $q->frncotation?$q->frncotation->projet->client_id:0;
			});*/
			$lgns = $lgns->filter(function($value,$key) use($client_id){

				$fal = $value['client_id'] == $client_id;
				return $fal;
			});

		}

		if($statut){

			$lgns = $lgns->filter(function($value,$key) use($statut){

				$fal = $value['statut'] == $statut;
				return $fal;
			});
		}

		return view('/Admin/Analyses/achats')->with(compact('lgns','produits','clients','projets'));
	}


	public function getTransit(Request $request)
	{
		//
		$projet_id = $request->projet_id;
		$client_id = $request->client_id;
		$produit_id = $request->produit_id;
		$transit_id = $request->transit_id;
		$lignes = Lcotation::all();
		if($produit_id){
			$lignes = $lignes->where('produit_id',$produit_id);
		}

		if($projet_id){
			$lignes = $lignes->filter(function($q){
				return $q->transcotation?$q->transcotation->projet_id:-100;
			});
		}

		if($client_id){
			$lignes = $lignes->filter(function($q){
				return $q->transcotation?$q->transcotation->projet->client_id:0;
			});
		}

		if($transit_id){
			$lignes = $lignes->filter(function($q){
				return $q->transcotation?$q->transcotation->projet->client_id:0;
			});
		}

		$prod = collect($lignes)->groupBy('produit_id');

		$produits = collect();
		foreach($prod as $k=>$v){
			$produits->add(Produit::find($k));
		}

		$clients = Client::all();
		$projets = Projet::all();
		$transitaires = Fournisseur::all()->where('secteur_id',15);

		return view('/Admin/Analyses/transits')->with(compact('lignes','produits','clients','projets','transitaires'));
	}
}
