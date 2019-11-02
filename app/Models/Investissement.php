<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investissement extends Model
{

    //

	protected $guarded = [];

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function angel(){
		return $this->belongsTo('App\User','angel_id');
	}

	public function comments(){
		return $this->hasMany('App\Models\Comment','investissement_id');
	}

	public function lettre(){
		return $this->hasOne('App\Models\Lettre','investissement_id');
	}
}
