<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Metier extends Model
{
    //

	protected $guarded = [];




	public function formations(){
		return $this->belongsToMany('App\Models\Formation','formations_metiers');
	}

	public function secteur(){
		return $this->belongsTo('App\Models\Secteur');
	}


}
