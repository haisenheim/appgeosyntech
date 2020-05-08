<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;


use App\Models\Domaine;
use App\Models\Etape;
use App\Models\Fournisseur;
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



class TranscotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cotations = Transcotation::orderBy('created_at','desc')->paginate(12);
	    $fournisseurs = Fournisseur::all()->where('transitaire',true);
	    $ioptions = ImportOption::all();
	    $toptions = TransportOption::all();
	    $villes = Ville::all();

        return view('/Admin/Transcotations/index')->with(compact('cotations','fournisseurs','villes','ioptions','toptions'));
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
	            'transitaire_id'=>$request->transitaire_id,'origine_id'=>$request->origine_id,'destination_id'=>$request->destination_id,'transport_option_id'=>$request->transport_option_id,
		        'ft40'=>$request->ft40,'ft20'=>$request->ft20,'pallets'=>$request->pallets,'expected_informations'=>$request->expected_informations,'import_option_id'=>$request->import_option_id,
		    'token'=>sha1(Auth::user()->id . date('Ymsidh')),
	    ];

	    $projet = Transcotation::create($data);
	    $request->session()->flash('success','Cotation créée !!!');
	    return redirect('/admin/transcotations/');
    }



	public function addProduit(){
		$dom = DB::table('lcotations')->where(['transcotation_id'=>request('transcotation_id'),'produit_id'=>request('produit_id')])->get();
		if($dom->count()){
			request()->session()->flash('warning','Produit déjà existant !!!');
			return redirect()->back();
		}
		DB::table('lcotations')->insert(['transcotation_id'=>request('transcotation_id'),
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


	    $projet = Transcotation::where(['token'=>$token])->first();
	    return view('Admin/Transcotations/show')->with(compact('projet','produits'));
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

	public function save(Request $request){

		$dossier = [];

		$file = $request->imageUri;
		if($file){
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)){
				if(!file_exists(public_path('img').'/earlies')){
					mkdir(public_path('img').'/earlies');
				}
				//dd($projet);
				if(file_exists(public_path('img').'/earlies/'.$request->token.'.'.$ext)){
					unlink(public_path('img').'/earlies/'.$request->token.'.'.$ext);
				}
				$name = $request->token.'.'.$ext;
				$file->move(public_path('img/earlies'), $name);
				//move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'membres'.DS.$name.'.'.$ext);
				$dossier['imageUri'] = 'earlies/'.$name;
			}
		}

		$dossier['name'] = $request->name;
		$dossier['code'] = $request->code;
		$dossier['representant'] = $request->representant;
		$dossier['address'] = $request->address;
		$dossier['phone'] = $request->phone;
		$dossier['email'] = $request->email;
		DB::table('earlies')->where('token',$request->token)->update($dossier);
		$request->session()->flash('info','Le dossier a été correctement mis à jour !!!');
		return redirect('/owner/projets/'.$request->token);


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
