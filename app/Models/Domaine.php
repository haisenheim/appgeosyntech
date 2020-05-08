<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Domaine extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function produits(){
		return $this->belongsToMany('App\Models\Projet');
	}

}
