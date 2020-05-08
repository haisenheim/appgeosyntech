<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
	//

	protected $guarded = [];
	//public $timestamps = false;



	public function representant(){
		return $this->hasOne('App\User','fournisseur_id');
	}

	public function secteur(){
		return $this->belongsTo('App\Models\Secteur','secteur_id');
	}

	public function pays(){
		return $this->belongsTo('App\Models\Pay','pay_id');
	}

	public function base(){
		return $this->belongsTo('App\Models\Ville','ville_id');
	}



}