<?php

namespace App\Http\Controllers\Ro;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

	public function __invoke()
	{
		return view('/Ro/dashboard');
	}
}
