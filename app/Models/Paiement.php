<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    //
	protected $guarded = [];
	public function facture_consultant(){
		return $this->belongsTo('App\Models\Facture','facture_consultant_id');
	}

	public function facture_contributeur(){
		return $this->belongsTo('App\Models\Facture','facture_contributeur_id');
	}

	public function facture_alliages(){
		return $this->belongsTo('App\Models\Facture','facture_alliages_id');
	}

	public function moi(){
		return $this->belongsTo('App\Models\Moi');
	}

	public function owner(){
		return $this->belongsTo('App\User','owner_id');
	}



}
