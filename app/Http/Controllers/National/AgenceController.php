<?php

namespace App\Http\Controllers\National;

use App\Http\Controllers\Controller;
use App\Models\Agence;

use App\Models\Pay;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
	    return view('National/Agences/index')->with(compact('devises','pays'));
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
		$ville =[];
		$ville['name']=$request->name;
		$ville['address'] = $request->agphone;


		$ville['ville_id'] = $request->ville_id;
		$ville['phone'] = $request->agphone;
		$ville['token'] = sha1(date('hmdYsi'.Auth::user()->id));

		$ville = Agence::create($ville);

		$user = new User();
		$user->first_name = $request['first_name'];
		$user->last_name = $request['last_name'];
		$user->phone = $request['phone'];
		$user->address = $request['address'];
		$user->email = $request['email'];
		$user->pay_id = $ville->ville->pay_id;
		$user->password= Hash::make(($request['password']));
		$user->role_id =9;
		$user->moi_id=date('m');
		$user->annee=date('Y');
		$user->male = $request['male']=='on'?1:0;
		$user->active = 1;
		$user->agence_id= $ville->id;
		$user->token = sha1(Auth::user()->id . date('Yhmdhis'));

		if($request->imageUri){
			$file = $request->imageUri;
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

		$request->session()->flash('success','L\'agence a été correctement enregistrée !!!');
		return back();


	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        //
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
