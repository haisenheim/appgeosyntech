<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tclient extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;

	public function clients(){
		return $this->hasMany('App\Models\Client');
	}


}
