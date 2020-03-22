<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Livraison extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;

	public function ligne(){
		return $this->belongsTo('App\Models\Cligne');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}




}
