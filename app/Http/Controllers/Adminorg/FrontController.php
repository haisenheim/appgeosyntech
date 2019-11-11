<?php

namespace App\Http\Controllers\Angel;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use App\User;

class FrontController extends Controller
{
    public function __invoke()
    {
	    $dossiers = Projet::all();
        return view('/Angel/index')->with(compact('dossiers'));
    }
}
