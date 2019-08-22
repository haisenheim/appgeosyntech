<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concurrent extends Model
{
    //
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}
}
