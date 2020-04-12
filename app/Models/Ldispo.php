<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ldispo extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;

	public function disposition(){
		return $this->belongsTo('App\Models\Disposition');
	}

	public function livraison(){
		return $this->belongsTo('App\Models\Livraison');
	}

	public function article(){
		return $this->belongsTo('App\Models\Article');
	}



}
