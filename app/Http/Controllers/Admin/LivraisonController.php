<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Forder;
use App\Models\Fournisseur;
use App\Models\Lignliv;
use App\Models\Livraison;
use App\Models\Produit;
use App\Models\Projet;
use App\Models\TransportOption;
use Faker\Provider\tr_TR\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cotations = Livraison::orderBy('created_at','desc')->paginate(12);
	    $fournisseurs = Fournisseur::all();
	    $clients = Client::all();
	    $toptions = TransportOption::all();

        return view('/Admin/Livraisons/index')->with(compact('cotations','fournisseurs','clients','toptions'));
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
	    $data = ['semaine'=>date('W'),'moi_id'=>date('m'),'annee'=>date('Y'),'user_id'=>Auth::user()->id,'transport_option_id'=>$request->transport_option_id,
	            'fournisseur_id'=>$request->fournisseur_id,'client_id'=>$request->client_id,'name'=>str_pad(date('ymdW').Auth::user()->id,10,'0',STR_PAD_RIGHT),
		        'modalites_paiement'=>$request->modalites_paiement,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime(),'bcnum'=>$request->bcnum,
		    'token'=>sha1(Auth::user()->id . date('Ymsidh')),'jour'=>$request->jour,'presence_client'=>$request->presence_client,'presence_fournisseur'=>$request->presence_fournisseur,'observation'=>$request->observation
	    ];

	    $projet = Livraison::create($data);
	    $request->session()->flash('success','Bon de Livraison créé !!!');
	    return redirect('/admin/livraisons/'.$projet->token);
    }



	public function addProduit(){
		$dom = DB::table('lignlivs')->where(['livraison_id'=>request('livraison_id'),'produit_id'=>request('produit_id')])->get();
		if($dom->count()){
			request()->session()->flash('warning','Produit déjà existant !!!');
			return redirect()->back();
		}
		DB::table('lignlivs')->insert(['livraison_id'=>request('livraison_id'),'nombre'=>request('nombre'),
			'quantity'=>request('quantity'),'produit_id'=>request('produit_id')]);
		request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}

	public function addObs(){

		//DB::table('lignlivs')->update(['id'=>request('id')],['observations'=>request('observations')]);
		Lignliv::updateOrCreate(['id'=>request('id')],['observations'=>request('observations')]);
		request()->session()->flash('success','Ok !!!');
		return redirect()->back();
	}

	public function removeProduit($did){
			DB::table('lignlivs')->delete($did);
			request()->session()->flash('warning','Ok !!!');
			return redirect()->back();
	}

	public function addImg(){

		if(request('imageUri')){
			$file = request('imageUri');
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/livraisons')) {
					mkdir(public_path('img') . '/livraisons');
				}
				$token = sha1(Auth::user()->id. date('ydmhis'));
				if (file_exists(public_path('img') . '/livraisons/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/livraisons/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/livraisons'), $name);


				DB::table('images')->insert(['livraison_id'=>request('livraison_id'),'name'=>request('name'),'uri'=>'livraisons/'.$name,
					'created_at'=>new \DateTime(),'updated_at'=>new \DateTime(),'token'=>$token]);
				request()->session()->flash('success','Ok !!!');
				return redirect()->back();
			}
		}


		request()->session()->flash('danger','Echec !!!');
		return redirect()->back();
	}

	public function removeImg($did){
		DB::table('images')->delete($did);
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
	    $projet = Livraison::where(['token'=>$token])->first();
	    $fournisseurs = Fournisseur::all();
	    $clients= Client::all();
	    $toptions = TransportOption::all();
	    return view('Admin/Livraisons/show')->with(compact('projet','produits','fournisseurs','clients','toptions'));
    }


	public function save(Request $request)
	{
		//
		$livraison = Livraison::where('token',$request->token)->first();

		$data = ['transport_option_id'=>$request->transport_option_id?$request->transport_option_id:$livraison->transport_option_id,
			'fournisseur_id'=>$request->fournisseur_id?$request->fournisseur_id:$livraison->fournisseur_id,
			'client_id'=>$request->client_id?$request->client_id:$livraison->client_id,'bcnum'=>$request->bcnum,

			'modalites_paiement'=>$request->modalites_paiement,'updated_at'=>new \DateTime(),
			'jour'=>$request->jour?$request->jour:$livraison->jour,
			'presence_client'=>$request->presence_client,'presence_fournisseur'=>$request->presence_fournisseur,
			'observation'=>$request->observation
		];



		$projet = Livraison::updateOrCreate(['id'=>$livraison->id],$data);
		$request->session()->flash('success','Bon de Livraison créé !!!');
		return redirect('/admin/livraisons/'.$projet->token);
	}
}
