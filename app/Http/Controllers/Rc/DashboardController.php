<?php

namespace App\Http\Controllers\Rc;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

	public function __invoke()
	{
		return view('/Rc/dashboard');
	}
}
