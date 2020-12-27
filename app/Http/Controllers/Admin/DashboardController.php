<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Depense;
use App\Models\Moi;
use App\Models\Objectifs\Obdelaiclient;
use App\Models\Objectifs\Obtobagent;
use App\Models\Objectifs\Obtobclient;
use App\Models\Objectifs\Obtobresult;
use App\Models\Objectifs\Obtobtresorerie;
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
		return view('/Admin/dashboard');
	}



}
