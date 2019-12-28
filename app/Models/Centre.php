<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
	//

	protected $guarded = [];
	//public $timestamps = false;

	public function users(){
		return $this->hasMany('App\Models\User');
	}

}