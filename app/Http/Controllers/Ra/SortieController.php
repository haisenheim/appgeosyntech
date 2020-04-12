<?php

namespace App\Http\Controllers\Ra;

use App\Http\Controllers\Controller;

use App\Models\Article;

use App\Models\Client;
use App\Models\Commande;

use App\Models\Disposition;

use App\Models\Ldispo;
use App\Models\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $sorties = Disposition::all();
	    $articles = Article::all();
	    $clients = Client::all();
	    return view('Ra/Sorties/index')->with(compact('sorties','articles','clients'));
    }


	public function getCommandesByClient(Request $request){
		$villes = Commande::all()->where('client_id',$request->client_id)->toArray();
		//dd($villes);
		return response()->json($villes);
	}

	public function getLivraisonsByCommande(Request $request){
		$villes = Livraison::all()->where('commande_id',$request->commande_id)->load(['User','Poste'])->toArray();
		//dd($villes);
		return response()->json($villes);
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
	public function save(Request $request)
	{
		//
		//dd($request->imageUri);

		$ville =[];
		$ville['name']=str_pad(date('hiydm').Auth::user()->id,10,'0',STR_PAD_LEFT);
		$ville['token'] = sha1(date('Yhmdis').Auth::user()->id);
		$ville['user_id'] = Auth::user()->id;
		$ville['client_id'] = $request->client_id;
		$ville['commande_id'] = $request->commande_id;
		$lignes = $request->lignes;
		//$ville['minimum'] = $request->minimum;

		$ville = Disposition::create($ville);
		for($i=0;$i<count($lignes);$i++){
			$l = new Ldispo();
			$l->livraison_id = $lignes[$i]['livraison_id'];
			$l->article_id = $lignes[$i]['article_id'];
			$l->quantity = $lignes[$i]['quantity'];
			$l->disposition_id = $ville->id;
			$l->save();
			$art = Article::find($lignes[$i]['article_id']);
			$art->quantity = $art->quantity - $lignes[$i]['quantity'];
			$art->save();
		}

		return response()->json($ville);


	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
	public function show($token)
	{
		//
		$entree = Approvisionnement::where('token',$token)->first();
		return view('Ra/Approvisionnements/show')->with(compact('entree'));
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
