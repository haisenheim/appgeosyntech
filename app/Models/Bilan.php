<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    //
	protected $guarded = [];


	public function dossier(){
		return $this->belongsTo('App\Models\Projet');
	}
}
