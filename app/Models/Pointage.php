<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pointage extends Model
{
    //

	protected $guarded = [];
	protected $dates=['debut','fin'];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function mois(){
		return $this->belongsTo('App\Models\Moi');
	}

	public function fiche(){
		return $this->belongsTo('App\Models\Fiche');
	}

	public function livraison(){
		return $this->belongsTo('App\Models\Livraison');
	}

	public function bulletin(){
		return $this->belongsTo('App\Models\Bulletin');
	}

	public function facture(){
		return $this->belongsTo('App\Models\Facture');
	}
}
