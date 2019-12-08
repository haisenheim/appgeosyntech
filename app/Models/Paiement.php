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

	public function facture_apporteur(){
		return $this->belongsTo('App\Models\Facture','facture_apporteur_id');
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

	public function projet(){
		return $this->belongsTo('App\Models\Projet','projet_id');
	}

	public function earlie(){
		return $this->belongsTo('App\Models\Earlie','earlie_id');
	}

	public function actif(){
		return $this->belongsTo('App\Models\Actif','actif_id');
	}

	public function creance(){
		return $this->belongsTo('App\Models\Creance','creance_id');
	}

	public function infrastructure(){
		return $this->belongsTo('App\Models\Infrastructure','infrastructure_id');
	}


}
