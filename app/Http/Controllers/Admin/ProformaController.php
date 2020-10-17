<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;


use App\Models\Facture;
use App\Models\Jalon;
use App\Models\Lcotation;
use App\Models\Produit;
use App\Models\Proforma;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class ProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cotations = Proforma::orderBy('created_at','desc')->paginate(12);
	    $clients = Client::all();


        return view('/Admin/Proformas/index')->with(compact('cotations','clients'));
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
	    $projet = Projet::find($request->projet_id);
	    $frncotation = $projet->frncotations->last();
	    $data = ['semaine'=>date('W'),'moi_id'=>date('m'),'annee'=>date('Y'),'user_id'=>Auth::user()->id,
	            'client_id'=>$projet->client_id,'name'=>str_pad(date('ymdW').Auth::user()->id,10,'0',STR_PAD_RIGHT),
		        'note_speciale'=>$request->note_speciale,'modalites_paiement'=>$request->modalites_paiement,
		    'token'=>sha1(Auth::user()->id . date('Ymsidh')),'debut'=>$request->debut,'fin'=>$request->fin, 'projet_id'=>$projet->id,
		    'frncotation_id'=>$frncotation->id
	    ];

	    $proforma = Proforma::updateOrCreate(['frncotation_id'=>$frncotation->id],$data);
	    $lignes = $request->lignes;
	    for($i=0;$i<count($lignes);$i++){
		    DB::table('lcotations')->where('id',$lignes[$i]['id'])->update(['pu'=>$lignes[$i]['pu'],
			    'pct_design'=>$lignes[$i]['pct_design'],
			    'pct_transit'=>$lignes[$i]['pct_transit'],
			    'pct_marge'=>$lignes[$i]['pct_marge'],

		    ]);
	    }

	    $jalons = $request->jalons;

	    for($i=0;$i<count($jalons);$i++){
		   $jalon = Jalon::create(['proforma_id'=>$proforma->id,'projet_id'=>$projet->id, 'ordre'=>$i,'pourcentage'=>$jalons[$i]['pourcentage'],'name'=>$jalons[$i]['name']]);
		    $facture = Facture::create(['name'=>date('ymdh'). $jalon->id % 100, 'jalon_id'=>$jalon->id,'proforma_id'=>$proforma->id,'projet_id'=>$projet->id,'token'=>sha1(date('Ymdhsi'). $jalon->id)]);
	    }

	    return response()->json($proforma);
	    //$request->session()->flash('success','Cotation créée !!!');
	    //return redirect('/admin/proformas/'.$projet->token);
    }

	public function getFacture($token){
		$facture = Facture::where('token',$token)->first();

		return view('Admin/Factures/show')->with(compact('facture'));
	}

	public function getAllFactures(){
		$factures = Facture::all()->sortByDesc('jalon_id');
		return view('Admin/Factures/show')->with(compact('factures'));
	}

	public function saveFacture(Request $request){
		$facture = Facture::find($request->facture_id);
		$facture->avec_tva = isset($request->avec_tva)?1:0;
		$facture->jour = $request->jour;
		$facture->net_en_lettre = $request->net_en_lettre;
		$facture->lettre_tva = $request->lettre_tva;
		$facture->note = $request->note;
		$facture->save();
		$request->session()->flash('success','Ok!');
		return redirect()->back();
	}



	public function addProduit(){
		$dom = DB::table('lproformas')->where(['proforma_id'=>request('proforma_id'),'produit_id'=>request('produit_id')])->get();
		if($dom->count()){
			request()->session()->flash('warning','Produit déjà existant !!!');
			return redirect()->back();
		}
		DB::table('lproformas')->insert(['proforma_id'=>request('proforma_id'),
			'price'=>request('price'),'quantity'=>request('quantity'),'produit_id'=>request('produit_id')]);
		request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}




	public function removeProduit($did){

			DB::table('lproformas')->delete($did);
			request()->session()->flash('warning','Ok !!!');
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
        //
		$produits = Produit::all();
	    $projet = Proforma::where(['token'=>$token])->first();
	    return view('Admin/Proformas/show')->with(compact('projet','produits'));
    }


}
