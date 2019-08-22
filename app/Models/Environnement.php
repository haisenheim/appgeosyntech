<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Environnement extends Model
{
    //
	protected $guarded = [];

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}
}
