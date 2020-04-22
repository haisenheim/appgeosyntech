<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Moi;
use App\Models\Objectifs\Obdelaiclient;
use App\Models\Objectifs\Obtobagent;
use App\Models\Objectifs\Obtobbilan;
use App\Models\Objectifs\Obtobclient;
use App\Models\Objectifs\Obtobresult;
use App\Models\Objectifs\Obtobtresorerie;
use App\Models\Objectifs\Obtpartenaire;
use App\Models\Objectifs\Tobagent;
use App\Models\Objectifs\Tobbilan;
use App\Models\Objectifs\Tobclient;
use App\Models\Objectifs\Tobresult;
use App\Models\Objectifs\Tobtresorerie;
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

	public function finances(){
		$obj_results = Obtobresult::all()->where('annee',date('Y'));
		$tobresults = Tobresult::all();

		$obj_bilans = Obtobbilan::all()->where('annee',date('Y'));
		$tobbilans = Tobbilan::all();

		$obj_delaiclients = Obdelaiclient::all()->where('annee',date('Y'));
		$clients = Client::all()->where('active',true);

		return view('Admin/Objectifs/finances')->with(compact('obj_results','tobresults','obj_bilans','tobbilans','obj_delaiclients','clients'));
	}

	public function treso(){
		$obj_tresos = Obtobtresorerie::all()->where('annee',date('Y'));
		$tobtresos = Tobtresorerie::all();
		$mois = Moi::all();

		return view('Admin/Objectifs/treso')->with(compact('obj_tresos','tobtresos','mois'));
	}

	public function save(){
		$field = request('field');
		$table = request('table');
		$value = request('val');
		$objectif = request('objectif');
		$annee = date('Y');
		DB::table($table)->updateOrInsert(['annee'=>$annee, $field=>$value],['objectif'=>$objectif]);

		return response()->json('ok');
	}

	public function saveTreso(){
		//$field = request('field');
		//$table = request('table');
		$value = request('val');
		$objectif = request('objectif');
		$moi_id = request('moi_id');
		$annee = date('Y');
		DB::table('obtobtresoreries')->updateOrInsert(['annee'=>$annee, 'tobtresorerie_id'=>$value,'moi_id'=>$moi_id],['objectif'=>$objectif]);

		return response()->json('ok');
	}
}
