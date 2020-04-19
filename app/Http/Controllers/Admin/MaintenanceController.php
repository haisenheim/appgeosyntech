<?php

namespace App\Http\Controllers\Admin;

use App\Models\Modele;
use App\Models\Role;
use App\Http\Controllers\Controller;

class MaintenanceController extends Controller
{
    //
	public function index(){
		 return view('Maintenance/dashboard');
	}

	public function modeles(){
		$modeles = Modele::all();
		$roles = Role::all();
		return view('Maintenance/modeles')->with(compact('modeles','roles'));
	}

	public function saveModele(){
		$modele = Modele::create(['name'=>request('name'),'role_id'=>request('role_id')]);

		request()->session()->flash('success','OK !!!');
		return redirect()->back();

	}

}
