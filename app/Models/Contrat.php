<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contrat extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;
	//public $dates = ['fin','debut'];
	protected $dates = ['debut','fin'];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function Tcontrat(){
		return $this->belongsTo('App\Models\Tcontrat');
	}



	public function ante(){
		return $this->belongsTo('App\Models\Certificat','parent');
	}




}
