<?php

namespace App\Models\Objectifs;

use Illuminate\Database\Eloquent\Model;

class Obtobbilan extends Model
{
    //
	protected $timestamps = false;

	public function type(){
		return $this->belongsTo('App\Models\Objectifs\Tobbilan','tobbilan_id');
	}
}
