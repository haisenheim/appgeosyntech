<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cession extends Model
{
    //
	protected $guarded = [];

	public function actif(){
		return $this->belongsTo('App\Models\Actif');
	}

	public function creance(){
		return $this->belongsTo('App\Models\Creance');
	}

	public function comments(){
		return $this->hasMany('App\Models\Comment');
	}

	public function angel(){
		return $this->belongsTo('App\User');
	}
}
