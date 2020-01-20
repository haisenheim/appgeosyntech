<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	//

	protected $guarded = [];
	//public $timestamps = false;

	public function owner(){
		return $this->belongsTo('App\User','owner_id');
	}

	public function module(){
		return $this->belongsTo('App\Models\Module');
	}

	public function reponses(){
		return $this->hasMany('App\Models\Reponse');
	}

	public function first(){
		return $this->hasOne('App\Models\Test','premier_id');
	}
}