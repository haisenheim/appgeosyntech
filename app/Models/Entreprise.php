<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
	//

	protected $guarded = [];
	//public $timestamps = false;

	public function users(){
		return $this->hasMany('App\User');
	}

	public function formations(){
		return $this->belongsToMany('App\Models\Formation','entreprises_formations');
	}

	public function inscriptions(){
		return $this->hasMany('App\Models\EntrepriseFormation', 'entreprise_id');
	}




}