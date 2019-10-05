<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actif extends Model
{
    //

	public function type(){
		return $this->belongsTo('App\Models\Tactif');
	}

	public function ville(){
		return $this->belongsTo('App\Models\Ville');
	}
}
