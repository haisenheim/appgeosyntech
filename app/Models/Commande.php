<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Commande extends Model
{
    //

	protected $guarded = [];

	protected $dates = ['debut','fin'];


	public function client(){
		return $this->belongsTo('App\Models\Client');
	}

	public function lignes(){
		return $this->hasMany('App\Models\Cligne');
	}

	public function factures(){
		return $this->hasMany('App\Models\Facture');
	}






}
