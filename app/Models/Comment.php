<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

}
