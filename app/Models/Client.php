<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	//

	protected $guarded = [];
	//public $timestamps = false;

	public function users(){
		return $this->hasMany('App\User');
	}



	public function commandes(){
		return $this->hasMany('App\Models\Commande', 'client_id');
	}




}