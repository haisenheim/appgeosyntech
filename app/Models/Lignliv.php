<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lignliv extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function livraison(){
		return $this->belongsTo('App\Models\Livraison');
	}

	public function produit(){
		return $this->belongsTo('App\Models\Produit');
	}



}
