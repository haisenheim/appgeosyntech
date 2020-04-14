<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Certificat extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;


	public function user(){
		return $this->belongsTo('App\User');
	}

	public function Tcertificat(){
		return $this->belongsTo('App\Models\Tcertificat');
	}




}
