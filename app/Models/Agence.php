<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Agence extends Model
{
    //

	protected $guarded = [];


	public function ville(){
		return $this->belongsTo('App\Models\Ville');
	}

	public function consultants(){
		return $this->hasMany('App\User','agence_id');
	}

	public function cessions(){
		return $this->hasMany('App\Models\Cession');
	}

	public function actifs(){
		return $this->hasMany('App\Models\Actif');
	}

	public function projets(){
		return $this->hasMany('App\Models\Projet');
	}

	public function earlies(){
		return $this->hasMany('App\Models\Earlie');
	}

	public function infrastructures(){
		return $this->hasMany('App\Models\Infrastructure');
	}
}
