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

	public function pointages(){
		return $this->hasMany('App\Models\Pointage');
	}




}
