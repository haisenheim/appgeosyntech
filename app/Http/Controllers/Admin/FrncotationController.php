<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;


use App\Models\Domaine;
use App\Models\Etape;
use App\Models\Fournisseur;
use App\Models\Frncotation;
use App\Models\ImportOption;
use App\Models\Pay;
use App\Models\Produit;
use App\Models\Projet;
use App\Models\Region;
use App\Models\Transcotation;
use App\Models\TransportOption;
use App\Models\Unit;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class FrncotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cotations = Frncotation::orderBy('created_at','desc')->paginate(12);
	    $fournisseurs = Fournisseur::all()->where('transitaire',false);
	    //$ioptions = ImportOption::all();
	    //$toptions = TransportOption::all();
	    $villes = Ville::all();

        return view('/Admin/Frncotations/index')->with(compact('cotations','fournisseurs','villes'));
    }



	//Sauvegarde du diagnostic externe
	public function saveProduits(Request $request){

		$dossier = Projet::where('token',$request->token)->first();


		// $id=$dossier->id;
		return response()->json($dossier);

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
	    $data = ['semaine'=>date('W'),'moi_id'=>date('m'),'annee'=>date('Y'),'user_id'=>Auth::user()->id,
	            'fournisseur_id'=>$request->fournisseur_id,
		        'expected_informations'=>$request->expected_informations,
		    'token'=>sha1(Auth::user()->id . date('Ymsidh')),
	    ];

	    $projet = Frncotation::create($data);
	    $request->session()->flash('success','Cotation créée !!!');
	    return redirect('/admin/frncotations/'.$projet->token);
    }



	public function addProduit(){
		$dom = DB::table('lcotations')->where(['frncotation_id'=>request('frncotation_id'),'produit_id'=>request('produit_id')])->get();
		if($dom->count()){
			request()->session()->flash('warning','Produit déjà existant !!!');
			return redirect()->back();
		}
		DB::table('lcotations')->insert(['frncotation_id'=>request('frncotation_id'),
			'price'=>request('price'),'quantity'=>request('quantity'),'produit_id'=>request('produit_id')]);
		request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}




	public function removeProduit($did){

			DB::table('lcotations')->delete($did);
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


	    $projet = Frncotation::where(['token'=>$token])->first();
	    return view('Admin/Frncotations/show')->with(compact('projet','produits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {
        //
	    $projet = Earlie::where('token',$token)->first();
	    //DB::table('earlies')->where('token',$token)->update(['name'=>]);
	    $villes = Ville::all()->where('pay_id',$projet->owner->pay_id);
	    return view('Owner/Earlies/edit')->with(compact('projet','villes'));
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
