<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repartcapitalsocial extends Model
{
    //
	protected $guarded = [];
	public function fincapitalsocial(){
		return $this->belongsTo('App\Models\Fincapitalsocial');
	}
}
