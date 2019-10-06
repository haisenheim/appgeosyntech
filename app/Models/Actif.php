<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actif extends Model
{
    //

	protected $guarded = [];

	public function tactif(){
		return $this->belongsTo('App\Models\Tactif','tactif_id');
	}

	public function ville(){
		return $this->belongsTo('App\Models\Ville');
	}

	public function owner(){
		return $this->belongsTo('App\User','owner_id');
	}
	public function consultant(){
		return $this->belongsTo('App\User','expert_id');
	}

	public function cessions(){
		return $this->hasMany('App\Models\Cessions');
	}
}
