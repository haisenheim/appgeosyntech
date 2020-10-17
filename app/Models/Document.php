<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function type(){
		return $this->belongsTo('App\Models\Tdocument','tdocument_id');
	}

	public function user(){
		return $this->belongsTo('App\User','user_id');
	}

}
