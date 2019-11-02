<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flettre extends Model
{
	//

	protected $guarded = [];
	public $timestamps = false;

	public function lettres(){
		return $this->hasMany('App\Models\Lettre','forme_id');
	}
}