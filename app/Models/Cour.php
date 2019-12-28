<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    //
	protected $guarded = ['id'];



	public function contributeur(){
		return $this->belongsTo('App\User','owner_id');
	}

	public function module(){
		return $this->belongsTo('App\Models\Module');
	}
}
