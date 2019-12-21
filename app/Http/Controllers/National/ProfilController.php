<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class ProfilController extends Controller
{
    public function __invoke($id)
    {
        return view('/National/profile', ['user' => User::findOrFail($id)]);
    }
}
