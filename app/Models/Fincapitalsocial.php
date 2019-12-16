<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fincapitalsocial extends Model
{
    //
	protected $guarded = [];
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function earlie(){
		return $this->belongsTo('App\Models\Earlie');
	}

	public function infrastructure(){
		return $this->belongsTo('App\Models\Infrastructure');
	}

	public function repartcapitalsocials(){
		return $this->hasMany('App\Models\Repartcapitalsocial');
	}


}
