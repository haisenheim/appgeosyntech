<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrepriseFormation extends Model
{
	//

	protected $guarded = [];
	protected $table ='entreprises_formations';
	//public $timestamps = false;

	public function formation(){
		return $this->belongsTo('App\Models\Formation');
	}

	public function entreprise(){
		return $this->belongsTo('App\Models\Entreprise');
	}

	public function comptes(){
		return $this->hasMany('App\Models\CompteFormation','enteprise_formation_id');
	}

}