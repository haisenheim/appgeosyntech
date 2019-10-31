<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torganisme extends Model
{
	//

	protected $guarded = [];
	public $timestamps = false;

	public function organismes(){
		return $this->hasMany('App\Models\Organisme');
	}
}