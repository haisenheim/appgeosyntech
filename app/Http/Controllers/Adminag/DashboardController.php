<?php

namespace App\Http\Controllers\Adminag;

use App\Http\Controllers\Controller;
use App\Models\Secteur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

	public function __invoke()
	{
		return view('/Adminag/dashboard');
	}
}
