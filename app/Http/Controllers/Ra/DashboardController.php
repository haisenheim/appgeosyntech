<?php

namespace App\Http\Controllers\Ra;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

	public function __invoke()
	{
		return view('/Ra/dashboard');
	}
}
