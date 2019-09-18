<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function souscription(){
		return $this->belongsTo('App\Models\Investissement','souscription_id');
	}

	public function suivant(){
		return $this->belongsTo('App\Models\Comment');
	}

	public function precedent(){
		return $this->belongsTo('App\Models\Comment');
	}

	public function role(){
		return $this->belongsTo('App\Models\Role');
	}
}
