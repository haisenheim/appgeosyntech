<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tletrre extends Model
{
	//

	protected $guarded = [];
	public $timestamps = false;

	public function lettres(){
		return $this->hasMany('App\Models\Lettre');
	}
}