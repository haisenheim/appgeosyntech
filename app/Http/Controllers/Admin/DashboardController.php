<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Objectifs\Obtobagent;
use App\Models\Objectifs\Obtobclient;
use App\Models\Objectifs\Obtpartenaire;
use App\Models\Objectifs\Tobagent;
use App\Models\Secteur;
use App\Models\Tpartenaire;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

	public function __invoke()
	{
		$obj_clients = Obtobclient::all()->where('annee',date('Y'));
		$nb_clients = Client::all()->where('active',true)->count();

		$obj_frns = Obtpartenaire::all()->where('annee',date('Y'));
		$frns = Tpartenaire::all();

		$obj_agents = Obtobagent::all()->where('annee',date('Y'));
		$tob_agents = Tobagent::all();
		$agents = User::all()->where('role_id',8)->where('active',true);
		$nb_agents = $agents->count();
		$nb_cdd = $agents->filter(function($value, $key){
			return $value->contract?($value->contract->tcontrat_id == 1):false;
		})->count();
		$nb_cdi = $agents->filter(function($value, $key){
			return $value->contract?($value->contrat->tcontract_id == 2):false;
		})->count();
		$nb_cdp = $agents->filter(function($value, $key){
			return $value->contract?($value->contract->tcontrat_id == 3):false;
		})->count();
		$data = [0=>$nb_agents, 1=>0, 2=>$nb_cdd, 3=>$nb_cdi, 4=>$nb_cdp];
		return view('/Admin/dashboard')->with(compact('obj_clients','frns','obj_frns','nb_agents','nb_clients','obj_agents','tob_agents','data'));
	}
}
