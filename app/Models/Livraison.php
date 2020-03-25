<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Livraison extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;
	protected $dates = ['debut','fin'];

	public function ligne(){
		return $this->belongsTo('App\Models\Cligne');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}

	public function poste(){
		return $this->belongsTo('App\Models\Poste');
	}

	public function client(){
		return $this->belongsTo('App\Models\Client');
	}

	public function primes(){
		return $this->hasMany('App\Models\Primes');
	}


	public function setTokenAttribute()
	{

			$this->attributes['token'] = sha1(Auth::user()->id.date('Yhdmsi'));


	}

}
