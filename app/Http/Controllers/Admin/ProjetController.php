<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Controllers\ExtendedController;
use App\Models\Client;


use App\Models\Comment;
use App\Models\Document;
use App\Models\Domaine;
use App\Models\Etape;
use App\Models\Fournisseur;
use App\Models\ImportOption;
use App\Models\Pay;
use App\Models\Produit;
use App\Models\Projet;
use App\Models\Region;
use App\Models\Tdocument;
use App\Models\TransportOption;
use App\Models\Unit;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;


class ProjetController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projets = Projet::orderBy('created_at','desc')->paginate(12);
	    $clients = Client::all();
	    $regions = Region::all();
	    $produits = Produit::all();
	    $pays = Pay::all();
        return view('/Admin/Projets/index')->with(compact('projets','clients','regions','pays','produits'));
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
	            'region_id'=>$request->region_id,'pay_id'=>$request->pay_id,'lieu'=>$request->lieu,'client_id'=>$request->client_id,
		        'demandeur_name'=>$request->demandeur_name,'demandeur_email'=>$request->demandeur_email,'demandeur_address'=>$request->demandeur_address,'demandeur_phone'=>$request->demandeur_phone,
		    'pf_name'=>$request->pf_name,'pf_email'=>$request->pf_email,'pf_address'=>$request->pf_address,'pf_phone'=>$request->pf_phone,
		    'token'=>sha1(Auth::user()->id . date('Ymsidh')),'name'=>$request->name,'maitreouvrage_id'=>$request->maitreouvrage_id,'cs_id'=>$request->cs_id,'ing_id'=>$request->ing_id,'contractant_id'=>$request->contractant_id
	    ];

	    $projet = Projet::create($data);
	    $request->session()->flash('success','Projet créé !!!');
	    return redirect('/admin/projets/'.$projet->token);
    }

	public function addDomaine(){
		$dom = DB::table('domaines_projets')->where(['projet_id'=>request('projet_id'),'domaine_id'=>request('domaine_id')])->get();
		if($dom->count()){
			request()->session()->flash('warning','Domaine present !!!');
			return redirect()->back();
		}
		DB::table('domaines_projets')->insert(['projet_id'=>request('projet_id'),'domaine_id'=>request('domaine_id')]);
		request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}

	public function removeDomaine($did,$token){
		$projet = Projet::where('token',$token)->first();
		$dom = DB::table('domaines_projets')->where(['projet_id'=>$projet->id,'domaine_id'=>$did])->get();
		if($dom->count()){
			DB::table('domaines_projets')->where(['projet_id'=>$projet->id,'domaine_id'=>$did])->delete();
			request()->session()->flash('warning','Ok !!!');
			return redirect()->back();
		}
		//DB::table('domaines_projets')->insert(['projet_id'=>request('projet_id'),'domaine_id'=>request('domaine_id')]);
		//request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}

	public function addComment(Request $request){

		$data = $request->except('_token');
		$data['user_id'] = Auth::user()->id;

		Comment::updateOrCreate($data);
		request()->session()->flash('success','Ok !!');
		return redirect()->back();

	}

	public function addDocument(Request $request){
		$type = Tdocument::find($request->type_id);
		$documents = Document::all()->where('tdocument_id',$type->id)->where('projet_id',$request->projet_id);
		//$dom = DB::table('produits_projets')->where(['projet_id'=>request('projet_id'),'produit_id'=>request('produit_id')])->get();
		$token = sha1(auth()->user()->id. date('Ymdhis'));
		$path = $this->entityDocumentCreate($request->path, Str::slug($type->name,'_'),$token);
		if($documents->count()){
			$document = new Document();
			$document->name = $type->name . '_'. $documents->count();
			$document->projet_id = $request->projet_id;
			$document->user_id = Auth::user()->id;
			$document->tdocument_id = $type->id;
			//$document->token = \Faker\Provider\Uuid::uuid();
			$document->token = $token;
			$document->path = $path;
			$document->save();
			request()->session()->flash('success','Document ajoute avec succes !!!');
			return redirect()->back();
		}
		$document = new Document();
		$document->name = $type->name;
		$document->projet_id = $request->projet_id;
		$document->user_id = Auth::user()->id;
		$document->token = $token;
		$document->path = $path;
		$document->tdocument_id = $type->id;
		$document->save();

		//$document->token = \Faker\Provider\Uuid::uuid();

		request()->session()->flash('success','Document ajoute avec succes !!!');
		return redirect()->back();
	}

	public function addProduit(){
		$dom = DB::table('produits_projets')->where(['projet_id'=>request('projet_id'),'produit_id'=>request('produit_id')])->get();
		if($dom->count()){
			request()->session()->flash('warning','Produit déjà existant !!!');
			return redirect()->back();
		}
		DB::table('produits_projets')->insert(['projet_id'=>request('projet_id'),'quantity'=>request('quantity'),'pu'=>request('pu'),'produit_id'=>request('produit_id'),'unit_id'=>request('unit_id')]);
		request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}

	public function removeProduit($did,$token){
		$projet = Projet::where('token',$token)->first();
		$dom = DB::table('produits_projets')->where(['projet_id'=>$projet->id,'produit_id'=>$did])->get();
		if($dom->count()){
			DB::table('produits_projets')->where(['projet_id'=>$projet->id,'produit_id'=>$did])->delete();
			request()->session()->flash('warning','Ok !!!');
			return redirect()->back();
		}
		return redirect()->back();
	}

	public function addEtape(){
		$dom = DB::table('projets_etapes')->where(['projet_id'=>request('projet_id'),'etape_id'=>request('etape_id')])->get();
		if($dom->count()){
			request()->session()->flash('warning','Etape déjà existante !!!');
			return redirect()->back();
		}
		DB::table('projets_etapes')->insert(['projet_id'=>request('projet_id'),'debut'=>request('debut'),
			'etape_id'=>request('etape_id'),'fin'=>request('fin'),'groupe1'=>request('groupe1'),'groupe2'=>request('groupe2'),
			'entreprise1'=>request('entreprise1'),'entreprise2'=>request('entreprise2')
			]);
		request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}

	public function removeEtape($did){

			DB::table('projets_etapes')->delete($did);
			request()->session()->flash('warning','Ok !!!');
			return redirect()->back();


	}




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $token)
    {
        //
		$produits = Produit::all();
	    $domaines = Domaine::all();
	    $etapes = Etape::all();
	    $units = Unit::all();
	    $clients = Client::all();
	    $fournisseurs = Fournisseur::all()->where('secteur_id','!=',15);
	    $transitaires = Fournisseur::all()->where('secteur_id',15);
	    $tdocuments = Tdocument::all();
	    $villes = Ville::all();
	    $ioptions = ImportOption::all();
	    $toptions = TransportOption::all();

	    $projet = Projet::where(['token'=>$token])->first();
	    return view('Admin/Projets/show')->with(compact('projet','produits','transitaires','etapes','domaines','units','clients','tdocuments','fournisseurs','villes','toptions','ioptions'));
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
