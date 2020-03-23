<?php

namespace App\Http\Controllers\Rc;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classement;
use App\Models\Client;
use App\Models\Competence;
use App\Models\Pay;
use App\Models\Secteur;
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
        //
	    //$users= \App\User::all()->where('role_id',8);
	    $pays = Pay::all();
	    $clients = Client::all();


        return view('Rc/Clients/index')->with(compact('clients','pays'));

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
      //  dd($request['imageUri']);

	    $data=['name'=>$request->name,'phone'=>$request->phone,'email'=>$request->email];
	    $token = sha1(Auth::user()->id. date('ydmhis'));
	    $data['token']=$token;
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
        $user->address = $request['user_address'];
        $user->email = $request['user_email'];
        $user->pay_id = $request->pay_id;
       // $user->role_id = $request['role_id'];
        $user->password= Hash::make('sitrad');
        $user->role_id = 6;
        $user->moi_id=date('m');
        $user->annee=date('Y');
	    $user->client_id = $client->id;
       // $user->male = $request['male']=='on'?1:0;
        $user->active = 1;
	    $user->token = sha1(Auth::user()->id . date('Yhmdhis'));

	    if($request->user_imageUri){
		    $file = $request->user_imageUri;
		    $ext = $file->getClientOriginalExtension();
		    $arr_ext = array('jpg','png','jpeg','gif');
		    if(in_array($ext,$arr_ext)) {
			    if (!file_exists(public_path('img') . '/users')) {
				    mkdir(public_path('img') . '/users');
			    }
			    $token = sha1(Auth::user()->id. date('ydmhis'));
			    if (file_exists(public_path('img') . '/users/' . $token . '.' . $ext)) {
				    unlink(public_path('img') . '/users/' . $token . '.' . $ext);
			    }
			    $name = $token . '.' . $ext;
			    $file->move(public_path('img/users'), $name);
			    $user->imageUri = 'users/' . $name;
		    }
	    }


        $user->save();
          $request->session()->flash('success','Le client a été correctement enregistré !!!');
            return redirect('/rc/users');


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
	    //dd($user->competences);
	    $secteurs = Secteur::all();
        return view('Rc/Clients/show')->with(compact('client','secteurs'));
    }


	public function addSecteur(){
		$competence = DB::table('clients_secteurs')->where(['secteur_id'=>request('secteur_id'),'client_id'=>request('client_id')])->first();
		//dd($competence);
		if(!$competence){
			DB::table('clients_secteurs')->insert(['secteur_id'=>request('secteur_id'),'client_id'=>request('client_id')]);
			request()->session()->flash('success','Ok !!!');
		}else{
			request()->session()->flash('warning','Secteur present !!!');
		}

		return redirect()->back();
	}




	public function deleteSecteur($client_id,$secteur_id){
		DB::table('clients_secteurs')->where(['secteur_id'=>$secteur_id,'client_id'=>$client_id])->delete();
		return redirect()->back();
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ville $ville)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ville $ville)
    {
        //
    }
}
