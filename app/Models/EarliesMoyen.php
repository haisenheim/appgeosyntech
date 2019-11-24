<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarliesMoyen extends Model
{
    //
	protected $guarded = [];
	public $timestamps = false;
	protected $table ='earlies_moyens';
	public function moyen(){
		return $this->belongsTo('App\Models\Moyen');
	}

	public function earlie(){
		return $this->belongsTo('App\Models\Earlie');
	}
}
