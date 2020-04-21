<?php

namespace App\Http\Controllers\Admin;

use App\Models\Objectifs\Obtobagent;
use App\Models\Objectifs\Obtobclient;
use App\Models\Objectifs\Obtpartenaire;
use App\Models\Objectifs\Tobagent;
use App\Models\Objectifs\Tobclient;
use App\Models\Tpartenaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ObjectifController extends Controller
{
    //
	public function index(){
		$obj_clients = Obtobclient::all()->where('annee',date('Y'));
		$tobclients = Tobclient::all();

		$obj_agents = Obtobagent::all()->where('annee',date('Y'));
		$tobagents = Tobagent::all();

		$obj_partenaires = Obtpartenaire::all()->where('annee',date('Y'));
		$tpartenaires = Tpartenaire::all();
		return view('Admin/Objectifs/index')->with(compact('obj_clients','tobclients','obj_agents','tobagents','obj_partenaires','tpartenaires'));
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
