<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Depense;
use App\Models\Objectifs\Obdelaiclient;
use App\Models\Objectifs\Obtobagent;
use App\Models\Objectifs\Obtobclient;
use App\Models\Objectifs\Obtobresult;
use App\Models\Objectifs\Obtpartenaire;
use App\Models\Objectifs\Tobagent;
use App\Models\Objectifs\Tobresult;
use App\Models\Paiement;
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
			return $value->contract?($value->contract->tcontrat_id == 2):false;
		})->count();
		$nb_cdp = $agents->filter(function($value, $key){
			return $value->contract?($value->contract->tcontrat_id == 3):false;
		})->count();
		$data = [0=>$nb_agents, 1=>0, 2=>$nb_cdd, 3=>$nb_cdi, 4=>$nb_cdp];

		$obj_delaiclients = Obdelaiclient::all()->where('annee',date('Y'));
		$clients = Client::all();


		$results = $this->getResult();

		return view('/Admin/dashboard')->with(compact('obj_clients','frns','obj_frns','nb_agents','nb_clients','obj_agents','tob_agents','data','clients','obj_delaiclients'))
			->with(compact('results'));
	}

	private function getResult(){

			$paiements = Paiement::all()->where('annee',date('Y'))->sortByDesc('created_at');
			$depenses = Depense::all()->where('annee',date('Y'))->sortByDesc('created_at');


		$ca = 0;
		foreach($paiements as $paiement){
			$ca = $ca + $paiement->montant;
		}

		$cv = 0;

		$cf = 0;
		foreach($depenses as $depense){
			if($depense->bulletin_id){
				$cv = $cv + $depense->montant;
			}else{
				if($depense->bill_id){
					$cv = $cv + $depense->montant;
				}

				else{
					if($depense->tdepense->variable){
						$cv = $cv + $depense->montant;
					}else{
						$cf = $cf + $depense->montant;
					}

				}
			}
		}



		$obj1 = Obtobresult::where('annee',date('Y'))->where('tobresult_id',1)->first();
		$obj1 = $obj1?$obj1->objectif:0;
		$obj2 = Obtobresult::where('annee',date('Y'))->where('tobresult_id',2)->first();
		$obj2 = $obj2?$obj2->objectif:0;
		$obj3 = Obtobresult::where('annee',date('Y'))->where('tobresult_id',3)->first();
		$obj3 = $obj3?$obj3->objectif:0;
		$t1 = Tobresult::find(1);
		$t2 = Tobresult::find(2);
		$t3 = Tobresult::find(3);

		$data = [
			1=>['name'=>$t1->name,'objectif'=>$obj1,'realisation'=>$ca,'ecart'=>$ca-$obj1],
			2=>['name'=>$t2->name,'objectif'=>$obj2,'realisation'=>$cv,'ecart'=>$cv-$obj2],
			3=>['name'=>"MARGE BRUTE",'objectif'=>$obj1-$obj2,'realisation'=>$ca-$cv,'ecart'=>($ca-$obj1)-($cv-$obj2)],
			4=>['name'=>$t3->name,'objectif'=>$obj3,'realisation'=>$cf,'ecart'=>$cf-$obj3],
			5=>['name'=>"VALEUR AJOUTEE",'objectif'=>$obj1-$obj2-$obj3,'realisation'=>$ca-$cv-$cf,'ecart'=>($ca-$obj1)-($cv-$obj2)-($cf-$obj3)],

			];

		return $data;
	}


}
