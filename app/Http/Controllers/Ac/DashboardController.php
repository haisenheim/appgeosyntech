<?php

namespace App\Http\Controllers\Ac;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

	public function __invoke()
	{
		return view('/Ac/dashboard');
	}
}
