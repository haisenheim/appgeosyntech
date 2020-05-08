<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Livraison extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;
	protected $dates = ['jour','created_at','updated_at'];


	public function user(){
		return $this->belongsTo('App\User');
	}

	public function client(){
		return $this->belongsTo('App\Models\Client');
	}

	public function fournisseur(){
		return $this->belongsTo('App\Models\Fournisseur');
	}

	public function transport_option(){
		return $this->belongsTo('App\Models\TransportOption','transport_option_id');
	}

	public function lignes(){
		return $this->hasMany('App\Models\Lignliv');
	}

	public function photos(){
		return $this->hasMany('App\Models\Photo','livraison_id');
	}




	/*public function setTokenAttribute()
	{

			$this->attributes['token'] = sha1(Auth::user()->id.date('Yhdmsi'));


	}*/

}
