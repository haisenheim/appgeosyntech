<?php

namespace App\Models\Objectifs;

use Illuminate\Database\Eloquent\Model;

class Obtobtresorerie extends Model
{
    //
	public $timestamps = false;

	public function type(){
		return $this->belongsTo('App\Models\Objectifs\Tobtresorerie','tobtresorerie_id');
	}
}
