<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Competence extends Model
{
    //

	protected $guarded = [];




	public function formations(){
		return $this->belongsToMany('App\User','competences_users');
	}




}
