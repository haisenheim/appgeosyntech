<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concession extends Model
{

    //

	protected $guarded = [];

	public function infrastructure(){
		return $this->belongsTo('App\Models\Infrastructure');
	}

	public function angel(){
		return $this->belongsTo('App\User','angel_id');
	}

	public function messages(){
		return $this->hasMany('App\Models\Messages','concession_id');
	}

	public function lettre(){
		return $this->hasOne('App\Models\Lettre','concession_id');
	}
}
