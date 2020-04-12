<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Approvisionnement extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;


	public function lignes(){
		return $this->hasMany('App\Models\Lappro');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

}
