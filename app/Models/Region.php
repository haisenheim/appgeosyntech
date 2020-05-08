<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Region extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function projets(){
		return $this->hasMany('App\Models\Projet');
	}

}
