<?php

namespace App\Http\Controllers\Admin;

use App\Models\Objectifs\Obtobclient;
use App\Models\Objectifs\Tobclient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObjectifController extends Controller
{
    //
	public function clients(){
		$obj_clients = Obtobclient::all()->where('annee',date('Y'));
		$types = Tobclient::all();
		return view('Admin/Objectifs/clients')->with(compact('obj_clients','types'));
	}

	public function saveClients(){
		$ligne = Obtobclient::where('annee',date('Y'))->where('tobclient_id',request('tobclient_id'))->first();
		if($ligne){
			$ligne->objectif = request('objectif');
			$ligne->save();
		}else{
			$ligne = Obtobclient::create(['annee'=>date('Y'),'tobclient_id'=>request('tobclient_id'),'objectif'=>request('objectif')]);

		}
		return response()->json('ok');
	}
}
