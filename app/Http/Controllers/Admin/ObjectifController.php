<?php

namespace App\Http\Controllers\Admin;

use App\Models\Objectifs\Obtobclient;
use App\Models\Objectifs\Tobclient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ObjectifController extends Controller
{
    //
	public function clients(){
		$obj_clients = Obtobclient::all()->where('annee',date('Y'));
		$types = Tobclient::all();
		return view('Admin/Objectifs/clients')->with(compact('obj_clients','types'));
	}

	public function save(){
		$field = request('field');
		$table = request('table');
		$value = request('val');
		$objectif = request('objectif');
		$annee = date('Y');
		DB::table($table)->updateOrInsert(['annee'=>$annee, $field=>$value],['objectif'=>$objectif]);
		/*$ligne = Obtobclient::where('annee',date('Y'))->where('tobclient_id',request('tobclient_id'))->first();
		if($ligne){
			$ligne->objectif = request('objectif');
			$ligne->save();
		}else{
			$ligne = Obtobclient::create(['annee'=>date('Y'),'tobclient_id'=>request('tobclient_id'),'objectif'=>request('objectif')]);

		}*/
		return response()->json('ok');
	}
}
