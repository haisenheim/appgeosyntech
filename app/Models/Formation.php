<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    //

	protected $guarded = ['id'];

	public function modules(){
		return $this->hasMany('App\Models\Module');
	}

	public function contributeur(){
		return $this->belongsTo('App\User','owner_id');
	}

	public function pays(){
		return $this->belongsToMany('App\Models\Pay','formations_pays');
	}

	public function consultants(){
		return $this->belongsToMany('App\User','consultants_formations');
	}
}
