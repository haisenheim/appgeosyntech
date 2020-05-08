<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;


use App\Models\Produit;
use App\Models\Proforma;
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
	    $data = ['semaine'=>date('W'),'moi_id'=>date('m'),'annee'=>date('Y'),'user_id'=>Auth::user()->id,
	            'client_id'=>$request->client_id,'name'=>str_pad(date('ymdW').Auth::user()->id,10,'0',STR_PAD_RIGHT),
		        'note_speciale'=>$request->note_speciale,'modalites_paiement'=>$request->modalites_paiement,
		    'token'=>sha1(Auth::user()->id . date('Ymsidh')),'debut'=>$request->debut,'fin'=>$request->fin
	    ];

	    $projet = Proforma::create($data);
	    $request->session()->flash('success','Cotation créée !!!');
	    return redirect('/admin/proformas/'.$projet->token);
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
