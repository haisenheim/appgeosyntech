<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;

class ProfilController extends Controller
{
    public function __invoke()
    {
        return view('/owner/profile');
    }
}
