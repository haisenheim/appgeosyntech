<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	//

	protected $guarded = [];
	//public $timestamps = false;

	public function representant(){
		return $this->hasOne('App\User','client_id');
	}

	public function factures(){
		return $this->hasMany('App\Models\Facture', 'client_id');
	}

	public function secteur(){
		return $this->belongsTo('App\Models\Secteur');
	}

	public function pays(){
		return $this->belongsTo('App\Models\Pay','pay_id');
	}

	public function base(){
		return $this->belongsTo('App\Models\Ville','ville_id');
	}

	public function tclient(){
		return $this->belongsTo('App\Models\Tclient','tclient_id');
	}




}