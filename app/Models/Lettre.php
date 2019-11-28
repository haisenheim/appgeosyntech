<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lettre extends Model
{
    //
	protected $guarded =['id'];


	public function angel(){
		return $this->belongsTo('App\Models\User','angel_id');
	}

	public function type(){
		return $this->belongsTo('App\Models\Flettre','forme_id');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function actif(){
		return $this->belongsTo('App\Models\Actif');
	}

}
