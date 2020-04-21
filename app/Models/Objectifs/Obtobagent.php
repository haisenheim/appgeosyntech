<?php

namespace App\Models\Objectifs;

use Illuminate\Database\Eloquent\Model;

class Obtobagent extends Model
{
    //
	public $timestamps = false;

	public function type(){
		return $this->belongsTo('App\Models\Objectifs\Tobagent','tobagent_id');
	}
}
