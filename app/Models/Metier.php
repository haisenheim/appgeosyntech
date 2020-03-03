<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Metier extends Model
{
    //

	protected $guarded = [];




	public function formations(){
		return $this->hasMany('App\Models\Formation','metier_id');
	}

	public function secteur(){
		return $this->belongsTo('App\Models\Secteur');
	}


}
