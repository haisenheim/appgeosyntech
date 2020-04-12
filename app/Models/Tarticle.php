<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tarticle extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function articles(){
		return $this->hasMany('App\Models\Article');
	}

}
