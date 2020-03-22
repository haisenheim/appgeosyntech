<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tprime extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function primes(){
		return $this->hasMany('App\Models\Prime');
	}




}
