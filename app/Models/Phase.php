<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Phase extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;


	public function etapes(){
		return $this->hasMany('App\Models\Etape');
	}

}
