<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moyens_projet extends Model
{
    //
	protected $guarded = [];


	public $timestamps =false;
	public function moyen(){
		return $this->belongsTo('App\Models\Moyen');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}
}
