<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Devise;
use App\Models\Pay;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $devises = Agence::all();
	    $pays = Pay::all();
	    return view('Admin/Agences/index')->with(compact('devises','pays'));
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
		//dd($request->imageUri);

		if($request['password']!= $request['cpassword']){
			$request->session()->flash('danger','Les mots de passe ne correspondent pas !');
			return redirect()->back();
		}

		$ville =[];
		$ville['name']=$request->name;
		$ville['address'] = $request->agphone;


		$ville['ville_id'] = $request->ville_id;
		$ville['phone'] = $request->agphone;
		$ville['token'] = sha1(date('hmdYsi'.Auth::user()->id));

		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$ext = Str::lower($ext);
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/agences')) {
					mkdir(public_path('img') . '/agences');
				}
				$token = sha1(Auth::user()->id. date('ydmhis'));
				if (file_exists(public_path('img') . '/agences/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/agences/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/agences'), $name);
				$ville['imageUri'] = 'agences/' . $name;
			}
		}

		$ville = Agence::create($ville);

		$user = new User();
		$user->first_name = $request['first_name'];
		$user->last_name = $request['last_name'];
		$user->phone = $request['phone'];
		$user->address = $request['address'];
		$user->email = $request['email'];
		$user->pay_id = $ville->ville->pay_id;
		$user->ville_id = $ville->ville->id;
		$user->password= Hash::make(($request['password']));
		$user->role_id =9;
		$user->moi_id=date('m');
		$user->annee=date('Y');
		$user->male = $request['male']=='on'?1:0;
		$user->active = 1;
		$user->agence_id= $ville->id;
		$user->token = sha1(Auth::user()->id . date('Yhmdhis'));

		$user->save();
		$request->session()->flash('success','L\'agence a été correctement enregistrée !!!');
		return back();


	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
	public function show($token)
	{
		//
		$agence = Agence::where('token',$token)->first();
		return view('Admin/Agences/show')->with(compact('agence'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay $pay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay $pay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        //
    }
}
