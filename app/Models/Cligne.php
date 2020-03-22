<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cligne extends Model
{
    //

	protected $guarded = [];
	protected $dates = ['debut','fin'];
	public $timestamps = false;


	public function commande(){
		return $this->belongsTo('App\Models\Commande');
	}

	public function poste(){
		return $this->belongsTo('App\Models\Poste');
	}

	public function livraison(){
		return $this->hasMany('App\Models\Livraison');
	}



}
