<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class ProfilController extends Controller
{
    public function __invoke($id)
    {
        return view('/admin/profile', ['user' => User::findOrFail($id)]);
    }
}
