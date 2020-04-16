<?php

namespace App\Http\Controllers\Ro;

use App\Http\Controllers\Controller;

use App\Models\Client;
use App\Models\Partenaire;
use App\Models\Tpartenaire;
use Illuminate\Support\Facades\Auth;


class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	    $partenaires = Partenaire::all();
	    $types = Tpartenaire::all();


        return view('Ro/Partenaires/index')->with(compact('partenaires','types'));

    }


	public function store(){
		//$data = [];
		$data = ['name'=>request('name'),'address'=>request('address'),'email'=>request('email'),'phone'=>request('phone'),'tpartenaire_id'=>request('tparteniare_id'),'user_id'=>Auth::user()->id,
				'semaine'=>date('W'),'moi_id'=>date('m'),'annee'=>date('Y')
		];

		$token = sha1(date('Ymdihs') . Auth::user()->id );
		$data['token'] = $token;

		if(request('imageUri')){
			$file = request('imageUri');
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/partenaires')) {
					mkdir(public_path('img') . '/partenaires');
				}

				if (file_exists(public_path('img') . '/partenaires/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/partenaires/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/partenaires'), $name);
				$data['imageUri'] = 'partenaires/' . $name;
			}
		}

		$partenaire = Partenaire::create($data);
		request()->session()->flash('success', 'Partenaire créé !!!');
		return redirect()->back();

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
        $partenaire = Partenaire::where('token',$token)->first();


        return view('Ro/Partenaires/show')->with(compact('partenaire'));
    }




}
