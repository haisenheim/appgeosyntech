<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tdocument extends Model
{
    //
	protected $guarded = [];
	public $timestamps = false;

	public function etape(){
		return $this->belongsTo('App\Models\Step');
	}


}
