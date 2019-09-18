<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
	//

	protected $guarded = [];
	public $timestamps = false;

	public function villes(){
		return $this->hasMany('App\Models\Ville');
	}
}