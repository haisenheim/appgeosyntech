<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Secteur extends Model
{
    //

	protected $guarded = [];




	public function formations(){
		return $this->hasMany('App\Models\Formation','secteur_id');
	}

	public function metiers(){
		return $this->hasMany('App\Models\Metier','secteur_id');
	}


}
