<?php

namespace App\Models\Objectifs;

use Illuminate\Database\Eloquent\Model;

class Obdelaiclient extends Model
{
    //
	protected $timestamps = false;

	public function client(){
		return $this->belongsTo('App\Models\Client','client_id');
	}
}
