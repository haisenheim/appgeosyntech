<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Jalon extends Model
{
    //

	protected $guarded = [];


	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function proforma(){
		return $this->belongsTo('App\Models\Proforma');
	}

	public function facture(){
		return $this->hasOne('App\Models\Facture');
	}


	public function getMontantAttribute(){
		return $this->pourcentage * $this->proforma->montant /100;
	}


}
