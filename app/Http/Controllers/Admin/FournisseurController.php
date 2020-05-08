<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;

use App\Models\Fournisseur;
use App\Models\Pay;
use App\Models\Secteur;
use App\Models\Tclient;
use App\Models\Ville;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	    $clients = Fournisseur::all();

	    //dd($clients);

		$secteurs = Secteur::all();
	    $villes = Ville::all();
	    $pays = Pay::all();

        return view('Admin/Fournisseurs/index')->with(compact('clients','pays','villes','secteurs'));

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
        $client = Fournisseur::where('token',$token)->first();

        return view('Admin/Fournisseurs/show')->with(compact('client'));
    }


	public function store(Request $request)
	{
		//
		//  dd($request['imageUri']);
		$data=['name'=>$request->name,'phone'=>$request->phone,'email'=>$request->email,'address'=>$request->address,'ville_id'=>$request->ville_id,
				'pay_id'=>$request->pay_id,'secteur_id'=>$request->secteur_id,'semaine'=>date('W'),'moi_id'=>date('m'),'annee'=>date('Y'),'sigle'=>$request->sigle,
				'code'=>$request->code
		];
		$token = sha1(Auth::user()->id. date('ydmhis'));
		$data['token']=$token;
		$data['user_id'] = Auth::user()->id;
		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/fournisseurs')) {
					mkdir(public_path('img') . '/fournisseurs');
				}

				if (file_exists(public_path('img') . '/fournisseurs/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/fournisseurs/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/fournisseurs'), $name);
				$data['imageUri'] = 'fournisseurs/' . $name;
			}
		}

		$client = Fournisseur::create($data);


		$user = new User();
		$user->first_name = $request['first_name'];
		$user->last_name = $request['last_name'];
		$user->phone = $request['user_phone'];

		$user->email = $request['user_email'];
		$user->pay_id = $request->pay_id;
		// $user->role_id = $request['role_id'];
		$user->password= Hash::make('geofournisseur');
		$user->role_id = 7;
		$user->moi_id=date('m');
		$user->annee=date('Y');
		$user->fournisseur_id = $client->id;
		// $user->male = $request['male']=='on'?1:0;
		$user->active = 1;

		$user->token = sha1(Auth::user()->id . date('Yhmdhis'));



		$user->save();
		$request->session()->flash('success','Le client a été correctement enregistré !!!');
		return redirect('/admin/fournisseurs/');


	}

	public function save(Request $request)
	{
		//
		//  dd($request['imageUri']);
		$client = Fournisseur::where('token',$request->token)->first();
		//dd($client);
		$data=['name'=>$request->name,'phone'=>$request->phone,'email'=>$request->email,'address'=>$request->address,
			'ville_id'=>$request->ville_id?$request->ville_id:$client->ville_id,
			'pay_id'=>$request->pay_id?$request->pay_id:$client->pay_id,'secteur_id'=>$request->secteur_id?$request->secteur_id:$client->secteur_id
		];
		$token = sha1(Auth::user()->id. date('ydmhis'));
		//$data['token']=$token;
		//$data['created_by'] = Auth::user()->id;
		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/fournisseurs')) {
					mkdir(public_path('img') . '/fournisseurs');
				}

				if (file_exists(public_path('img') . '/fournisseurs/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/fournisseurs/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/fournisseurs'), $name);
				$data['imageUri'] = 'fournisseurs/' . $name;
			}
		}

		$client = Fournisseur::updateOrCreate(['id'=>$client->id],$data);

		$request->session()->flash('success','Le client a été correctement enregistré !!!');
		return redirect('/admin/fournisseurs/');


	}
}
