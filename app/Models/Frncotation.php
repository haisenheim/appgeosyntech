<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Frncotation extends Model
{
    //
    protected $guarded = [];
	//protected $dates = ['filled_at'];

	public function mois(){
		return $this->belongsTo('App\Models\Moi', 'moi_id');
	}

	public function fournisseur(){
		return $this->belongsTo('App\Models\Fournisseur', 'fournisseur_id');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet', 'projet_id');
	}

	public function proforma(){
		return $this->hasOne('App\Models\Proforma','frncotation_id');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}

	public function transcotations(){
		return $this->hasMany('App\Models\Transcotation','frncotation_id');
	}

	/*public function origine(){
		return $this->belongsTo('App\Models\Ville','origine_id');
	}

	public function destination(){
		return $this->belongsTo('App\Models\Ville','destination_id');
	}*/

	public function lignes(){
		return $this->hasMany('App\Models\Lcotation','frncotation_id');
	}

}
