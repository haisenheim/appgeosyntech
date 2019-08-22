<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moyen extends Model
{
    //
	protected $guarded = [];
	public $timestamps = false;


	public function projets(){
		return $this->belongsToMany('App\Models\Projet','moyens_projets');
	}
}
