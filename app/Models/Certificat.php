<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Certificat extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;
	//public $dates = ['fin','debut'];
	protected $dates = ['debut','fin'];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function Tcertificat(){
		return $this->belongsTo('App\Models\Tcertificat');
	}

	public function partenaire(){
		return $this->belongsTo('App\Models\Partenaire');
	}

	public function ante(){
		return $this->belongsTo('App\Models\Certificat','parent');
	}




}
