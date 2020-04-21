<?php

namespace App\Models\Objectifs;

use Illuminate\Database\Eloquent\Model;

class Obtobresult extends Model
{
    //
	protected $timestamps = false;

	public function type(){
		return $this->belongsTo('App\Models\Objectifs\Tobresult','tobresult_id');
	}
}
