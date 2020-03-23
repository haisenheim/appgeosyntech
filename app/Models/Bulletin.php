<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bulletin extends Model
{
    //

	protected $guarded = [];

	public function owner(){
		return $this->belongsToMany('App\User','user_id');
	}

	public function livraison(){
		return $this->belongsToMany('App\Models\Livraison');
	}

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function pointages(){
		return $this->hasMany('App\Models\Pointage');
	}




}
