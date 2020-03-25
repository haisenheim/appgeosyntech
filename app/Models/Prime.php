<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Prime extends Model
{
    //

	protected $guarded = [];

	public function livraison(){
		return $this->belongsTo('App\Models\Livraison');
	}

	public function secteur(){
		return $this->belongsTo('App\Models\Secteur');
	}

	public function poste(){
		return $this->belongsTo('App\Models\Poste');
	}

	public function tprime(){
		return $this->belongsTo('App\Models\Tprime');
	}



}
