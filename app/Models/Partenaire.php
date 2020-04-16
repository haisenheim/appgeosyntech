<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Partenaire extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;

	public function Tpartenaire(){
		return $this->belongsTo('App\Models\Tpartenaire');
	}

	public function mois(){
		return $this->belongsTo('App\Models\Moi','moi_id');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function certificats(){
		return $this->hasMany('App\Models\Certificat');
	}



}
