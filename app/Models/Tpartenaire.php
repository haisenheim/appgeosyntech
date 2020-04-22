<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tpartenaire extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;

	public function partenaires(){
		return $this->hasMany('App\Models\Partenaire');
	}


}
