<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    //
	protected $guarded = [];
	public $timestamps = false;


	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}
}
