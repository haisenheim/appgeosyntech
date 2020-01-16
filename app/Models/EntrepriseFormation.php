<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
	//

	protected $guarded = [];
	//public $timestamps = false;

	public function users(){
		return $this->hasMany('App\User');
	}

	public function pay(){
		return $this->belongsTo('App\Models\Pay');
	}

}