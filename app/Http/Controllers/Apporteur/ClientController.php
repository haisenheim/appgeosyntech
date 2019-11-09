<?php

namespace App\Http\Controllers\Apporteur;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Pay;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all()->where('role_id',3)->where('creator_id',Auth::user()->id);
        // dd($villes);
        // echo "Bonjour tout le monde!!";
        return view('Apporteur/Clients/index')->with(compact('users'));

    }

	public function getFinances(){
		$users = User::all()->where('role_id',3)->where('creator_id',Auth::user()->id);
		$projets = collect([]);
		foreach($users as $client){
			$projets= $projets->merge(Projet::all()->where('owner_id',$client->id));
		}

		$projets = $projets->groupBy('annee',function($item){
			return collect($item)->groupBy('moi_id')->toArray();
		});

		$projets->toArray();

		dd($projets);
		return view('Apporteur/Clients/finances')->with(compact('projets'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$roles = Role::all();
        $pays = Pay::all();
        return view('admin/clients/create')->with(compact('pays'));
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
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->email = $request['email'];
        $user->pay_id = Auth::user()->pay_id;
	    if($request->password != $request->cpassword){

		    return back();
	    }
        $user->password=Hash::make($request['password']);
        $user->role_id =3;
        $user->moi_id=date('m');
        $user->annee=date('Y');
	    $user->creator_id = Auth::user()->id;
        $user->male = $request['male']=='on'?1:0;
        $user->active = 1;

	    if($request->imageUri){
		    $file = $request->imageUri;
		    $ext = $file->getClientOriginalExtension();
		    $arr_ext = array('jpg','png','jpeg','gif');
		    if(in_array($ext,$arr_ext)) {
			    if (!file_exists(public_path('img') . '/users')) {
				    mkdir(public_path('img') . '/users');
			    }
			    $token = sha1(date('ydmhis'));
			    if (file_exists(public_path('img') . '/users/' . $token . '.' . $ext)) {
				    unlink(public_path('img') . '/users/' . $token . '.' . $ext);
			    }
			    $name = $token . '.' . $ext;
			    $file->move(public_path('img/users'), $name);
			    $user->imageUri = 'users/' . $name;
		    }

	    }

        $user->save();
        session('message','Le client a été correctement enregistré !!!');
        return redirect('/apporteur/clients');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
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
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
