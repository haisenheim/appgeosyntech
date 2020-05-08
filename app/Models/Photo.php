<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Photo extends Model
{
    //

	protected $guarded = [];
	protected $table = 'images';
	//public $timestamps = false;



	public function livraison(){
		return $this->belongsTo('App\Models\Livraison');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}





}
