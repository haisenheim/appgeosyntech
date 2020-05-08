<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Forder;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class ForderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cotations = Forder::orderBy('created_at','desc')->paginate(12);
	    $fournisseurs = Fournisseur::all();
	    $projets = Projet::all();

        return view('/Admin/Forders/index')->with(compact('cotations','fournisseurs','projets'));
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
	            'fournisseur_id'=>$request->fournisseur_id,'projet_id'=>$request->projet_id,'name'=>str_pad(date('ymdW').Auth::user()->id,10,'0',STR_PAD_RIGHT),
		        'note_speciale'=>$request->note_speciale,'modalites_paiement'=>$request->modalites_paiement,
		    'token'=>sha1(Auth::user()->id . date('Ymsidh')),'jour'=>$request->jour,
	    ];

	    $projet = Forder::create($data);
	    $request->session()->flash('success','Bon de Commande créé !!!');
	    return redirect('/admin/forders/'.$projet->token);
    }



	public function addProduit(){
		$dom = DB::table('lforders')->where(['forder_id'=>request('forder_id'),'produit_id'=>request('produit_id')])->get();
		if($dom->count()){
			request()->session()->flash('warning','Produit déjà existant !!!');
			return redirect()->back();
		}
		DB::table('lforders')->insert(['forder_id'=>request('forder_id'),
			'price'=>request('price'),'quantity'=>request('quantity'),'produit_id'=>request('produit_id')]);
		request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}

	public function removeProduit($did){
			DB::table('lforders')->delete($did);
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
	    $projet = Forder::where(['token'=>$token])->first();
	    return view('Admin/Forders/show')->with(compact('projet','produits'));
    }


}
