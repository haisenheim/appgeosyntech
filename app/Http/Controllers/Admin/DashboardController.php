<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Objectifs\Obtobclient;
use App\Models\Secteur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

	public function __invoke()
	{
		$obj_clients = Obtobclient::all()->where('annee',date('Y'));
		$nb_clients = Client::all()->where('active',true)->count();
		return view('/Admin/dashboard')->with(compact('obj_clients','nb_clients'));
	}
}
