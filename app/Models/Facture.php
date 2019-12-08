<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Facture extends Model
{
    //
    protected $guarded = [];
	protected $dates = ['filled_at'];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function owner(){
		return $this->belongsTo('App\User', 'owner_id');
	}

	public function lignes(){
		return $this->hasMany('App\Models\Paiement');
	}
}
