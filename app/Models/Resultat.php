<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    //
	protected $guarded = [];

	public function annee(){
		return $this->belongsTo('App\Models\Annee');
	}
}
