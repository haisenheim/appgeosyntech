<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Modele extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function role(){
		return $this->belongsTo('App\Models\Role');
	}

}
