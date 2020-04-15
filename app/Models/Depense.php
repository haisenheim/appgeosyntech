<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Depense extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;
	protected $dates = ['jour'];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function Tdepense(){
		return $this->belongsTo('App\Models\Tdepense');
	}

	public function mois(){
		return $this->belongsTo('App\Models\Moi','moi_id');
	}




}
