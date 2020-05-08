<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Etape extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function steps(){
		return $this->hasMany('App\Models\EtapeProjet','etape_id');
	}

	public function projet(){
		return $this->belongsToMany('App\Models\Projet','projets_etapes');
	}

	public function phase(){
		return $this->belongsTo('App\Models\Phase');
	}

}
