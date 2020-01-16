<?php

namespace App\Http\Controllers\Corporate;

use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('Corporate/dashboard');
    }
}
