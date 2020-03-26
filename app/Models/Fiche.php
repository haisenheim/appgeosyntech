<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Fiche extends Model
{
    //

	protected $guarded = [];
	protected $dates = ['jour'];



	public function commande(){
		return $this->belongsTo('App\Models\Commande');
	}

	public function client(){
		return $this->belongsTo('App\Models\Client');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function pointages(){
		return $this->hasMany('App\Models\Pointage');
	}




}
