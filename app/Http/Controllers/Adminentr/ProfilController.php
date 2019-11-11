<?php

namespace App\Http\Controllers\Angel;

use App\Http\Controllers\Controller;
use App\User;

class ProfilController extends Controller
{
    public function __invoke($id)
    {
        return view('/angel/profile', ['user' => User::findOrFail($id)]);
    }
}
