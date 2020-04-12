<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;

	public function dispositions(){
		return $this->hasMany('App\Models\Ldispo');
	}

	public function type(){
		return $this->belongsTo('App\Models\Tarticle','tarticle_id');
	}

	public function unite(){
		return $this->belongsTo('App\Models\Unite');
	}


}
