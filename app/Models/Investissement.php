<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investissement extends Model
{

    //

	protected $guarded = [];

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function angel(){
		return $this->belongsTo('App\Models\User','angel_id');
	}
}
