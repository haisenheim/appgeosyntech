<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tcertificat extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function certificats(){
		return $this->hasMany('App\Models\Certificat');
	}




}
