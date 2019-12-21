<?php

namespace App\Http\Controllers\National;

use App\Http\Controllers\Controller;
use App\Models\Secteur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

	public function __invoke()
	{
		return view('/National/dashboard');
	}
}
