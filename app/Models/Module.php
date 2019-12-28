<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
	protected $guarded = ['id'];

	public function cours(){
		return $this->hasMany('App\Models\Cours');
	}

	public function contributeur(){
		return $this->belongsTo('App\User','owner_id');
	}

	public function formation(){
		return $this->belongsTo('App\Models\Formation');
	}
}
