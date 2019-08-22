<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('/consultant/dashboard');
    }
}
