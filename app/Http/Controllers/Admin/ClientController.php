<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Client;

use App\Models\Pay;
use App\Models\Secteur;
use App\Models\Tclient;
use App\Models\Ville;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	    $clients = Client::all()->groupBy(function($q){
		    return $q->tclient?$q->tclient->name:null;
	    });

	    //dd($clients);

		$secteurs = Secteur::all();
	    $villes = Ville::all();
	    $pays = Pay::all();
	    $tclients = Tclient::all();
        return view('Admin/Clients/index')->with(compact('clients','tclients','pays','villes','secteurs'));

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
        $client = Client::where('token',$token)->first();

        return view('Admin/Clients/show')->with(compact('client'));
    }


	public function store(Request $request)
	{
		//
		//  dd($request['imageUri']);
		$data=['name'=>$request->name,'phone'=>$request->phone,'email'=>$request->email,'address'=>$request->address,'ville_id'=>$request->ville_id,
				'pay_id'=>$request->pay_id,'secteur_id'=>$request->secteur_id,'semaine'=>date('W'),'moi_id'=>date('m'),'annee'=>date('Y'),'sigle'=>$request->sigle,
				'code'=>$request->code,'tclient_id'=>$request->tclient_id
		];
		$token = sha1(Auth::user()->id. date('ydmhis'));
		$data['token']=$token;
		$data['user_id'] = Auth::user()->id;
		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/clients')) {
					mkdir(public_path('img') . '/clients');
				}

				if (file_exists(public_path('img') . '/clients/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/clients/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/clients'), $name);
				$data['imageUri'] = 'clients/' . $name;
			}
		}

		$client = Client::create($data);


		$user = new User();
		$user->first_name = $request['first_name'];
		$user->last_name = $request['last_name'];
		$user->phone = $request['user_phone'];

		$user->email = $request['user_email'];
		$user->pay_id = $request->pay_id;
		// $user->role_id = $request['role_id'];
		$user->password= Hash::make('geoclient');
		$user->role_id = 6;
		$user->moi_id=date('m');
		$user->annee=date('Y');
		$user->client_id = $client->id;
		// $user->male = $request['male']=='on'?1:0;
		$user->active = 1;

		$user->token = sha1(Auth::user()->id . date('Yhmdhis'));



		$user->save();
		$request->session()->flash('success','Le client a été correctement enregistré !!!');
		return redirect('/admin/clients');


	}

	public function save(Request $request)
	{
		//
		//  dd($request['imageUri']);
		$client = Client::where('token',$request->token)->first();
		//dd($client);
		$data=['name'=>$request->name,'phone'=>$request->phone,'email'=>$request->email,'address'=>$request->address,
			'ville_id'=>$request->ville_id?$request->ville_id:$client->ville_id,
			'pay_id'=>$request->pay_id?$request->pay_id:$client->pay_id,'secteur_id'=>$request->secteur_id?$request->secteur_id:$client->secteur_id,'tclient_id'=>$request->tclient_id?$request->tclient_id:$client->tclient_id
		];
		$token = sha1(Auth::user()->id. date('ydmhis'));
		//$data['token']=$token;
		//$data['created_by'] = Auth::user()->id;
		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/clients')) {
					mkdir(public_path('img') . '/clients');
				}

				if (file_exists(public_path('img') . '/clients/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/clients/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/clients'), $name);
				$data['imageUri'] = 'clients/' . $name;
			}
		}

		$client = Client::updateOrCreate(['id'=>$client->id],$data);

		$request->session()->flash('success','Le client a été correctement enregistré !!!');
		return redirect('/admin/clients');


	}
}
