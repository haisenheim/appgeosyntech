<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tactif extends Model
{
    //
	protected $guarded =[];

	public function actifs(){
		return $this->hasMany('App\Models\Actif');
	}
	
	public function root(){
		return $this->belongsTo('App\Models\Tactif','parent');
	}

	public function children(){
		return $this->hasMany('App\Models\Tactif','parent');
	}
}
