<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Secteur extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;

	public function approvisionnement(){
		return $this->belongsTo('App\Models\Approvisionnement');
	}

	public function article(){
		return $this->belongsTo('App\Models\Article');
	}


}
