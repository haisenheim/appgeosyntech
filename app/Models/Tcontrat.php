<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tcontrat extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function contrats(){
		return $this->hasMany('App\Models\Contrat');
	}




}
