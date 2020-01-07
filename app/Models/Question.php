<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	//

	protected $guarded = [];
	public $timestamps = false;

	public function choices(){
		return $this->hasMany('App\Models\Choice');
	}

	public function module(){
		return $this->belongsTo('App\Models\Module');
	}
}