<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Classement extends Model
{
    //

	protected $guarded = [];

	protected $dates = ['debut','fin'];


	public function category(){
		return $this->belongsTo('App\Models\Category');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}








}
