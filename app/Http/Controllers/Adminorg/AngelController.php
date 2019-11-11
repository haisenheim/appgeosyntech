<?php

namespace App\Http\Controllers\Adminorg;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Devise;
use App\Models\Flettre;
use App\Models\Investissement;
use App\Models\Lettre;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AngelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $angels = User::all()->where('role_id',4)->where('organisme_id',Auth::user()->organisme_id);
	   // $investissements = Investissement::orderBy('created_at','desc')->where('angel_id',Auth::user()->id)->paginate(8);
	    return view('Adminorg/Angels/index')->with(compact('angels'));
    }

	public function investissements(){
		$angels = User::all()->where('role_id',4)->where('organisme_id',Auth::user()->organisme_id);
		$investissements = collect([]);
		foreach($angels as $angel){
			$investissements = $investissements->merge($angel->investissements);
		}
		debug($investissements);
		return view('Adminorg/Investissements/index')->with(compact('investissements'));
	}

	public function getInvestissements($token){
		$investissement = Investissement::where('token',$token)->first();
		return view('Adminorg/Investissements/show')->with(compact('investissement'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
	    //dd($request['imageUri']);
	    $user = new User();
	    $user->first_name = $request['first_name'];
	    $user->last_name = $request['last_name'];
	    $user->phone = $request['phone'];
	    $user->address = $request['address'];
	    $user->email = $request['email'];
	    $user->pay_id = Auth::user()->pay_id;
	    $user->password=Hash::make($request['password']);
	    $user->role_id =4;
	    $user->organisme_id = Auth::user()->organisme_id;
	    $user->moi_id=date('m');
	    $user->annee=date('Y');
	    $user->male = $request['male']=='on'?1:0;
	    // $user->senior = $request['senior']=='on'?1:0;
	    $user->active = 1;
	    $user->token= sha1(Auth::user()->id . date('YmHisd'). 'Angel');

	    if($request->imageUri){
		    $file = $request->imageUri;
		    $ext = $file->getClientOriginalExtension();
		    $arr_ext = array('jpg','png','jpeg','gif');
		    if(in_array($ext,$arr_ext)) {
			    if (!file_exists(public_path('img') . '/users')) {
				    mkdir(public_path('img') . '/users');
			    }
			    $token = sha1(Auth::user()->id . date('ydmhis'));
			    if (file_exists(public_path('img') . '/users/' . $token . '.' . $ext)) {
				    unlink(public_path('img') . '/users/' . $token . '.' . $ext);
			    }
			    $name = $token . '.' . $ext;
			    $file->move(public_path('img/users'), $name);
			    $user->imageUri = 'users/' . $name;
		    }
	    }

	    $user->save();
	    session('message','Le compte a été correctement créé !!!');
	    return redirect('/adminorg/angels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($p)
    {
        //

	   // dd($p);
	    $devises = Devise::all();
	    $formes = Flettre::all();
	    $investissement = Investissement::all()->where('token',$p)->first();
	    return view('/Angel/Dossiers/show')->with(compact('investissement','devises','formes'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        //
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
