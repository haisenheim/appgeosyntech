<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;

class AboutController extends Controller
{
    public function __invoke()
    {
        return view('about');
    }
}
