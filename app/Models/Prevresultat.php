<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prevresultat extends Model
{
    //
	protected $guarded =[];
	//public $timestamps = false;

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}
}
