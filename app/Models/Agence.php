<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Agence extends Model
{
    //

	protected $guarded = [];


	public function ville(){
		return $this->belongsTo('App\Models\Ville');
	}

	public function consultants(){
		return $this->hasMany('App\User','agence_id');
	}


}
