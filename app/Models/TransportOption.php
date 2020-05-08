<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TransportOption extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;
	protected $table = 'transport_options';


	public function transcotations(){
		return $this->hasMany('App\Models\Transcotation','transport_option_id');
	}

}
