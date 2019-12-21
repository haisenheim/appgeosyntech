<?php

namespace App\Http\Controllers\Adminag;

use App\Http\Controllers\Controller;
use App\User;

class ProfilController extends Controller
{
    public function __invoke($id)
    {
        return view('/Adminag/profile', ['user' => User::findOrFail($id)]);
    }
}
