<?php

namespace App\Models\Objectifs;

use Illuminate\Database\Eloquent\Model;

class Obtobclient extends Model
{
    //
	protected $timestamps = false;

	public function type(){
		return $this->belongsTo('App\Models\Objectifs\Tobclient','tobclient_id');
	}
}
