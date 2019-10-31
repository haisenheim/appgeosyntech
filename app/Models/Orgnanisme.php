<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
	//

	protected $guarded = [];
	//public $timestamps = false;

	public function users(){
		return $this->hasMany('App\Models\User');
	}

	public function type(){
		return $this->belongsTo('App\Models\Torganisme');
	}
}