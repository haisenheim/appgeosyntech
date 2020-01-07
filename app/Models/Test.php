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

	public function reponses(){
		return $this->hasMany('App\Models\Reponse');
	}
}