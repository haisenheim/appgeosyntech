<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Agenda extends Model
{
    //

	protected $guarded = [];


	public function member(){
		return $this->belongsTo('App\User','member_id');
	}

	public function centre(){
		return $this->belongsTo('App\Models\Centre','centre_id');
	}

	public function entreprise(){
		return $this->belongsTo('App\Models\Entreprise','entreprise_id');
	}

	public function consultant(){
		return $this->belongsTo('App\User','consultant_id');
	}

	public function formation(){
		return $this->belongsTo('App\Models\Formation','formation_id');
	}

	public function owner(){
		return $this->belongsTo('App\User','owner_id');
	}


}
