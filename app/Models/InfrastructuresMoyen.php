<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfrastructuresMoyen extends Model
{
    //
	protected $guarded = [];
	public $timestamps = false;
	protected $table ='infrastructures_moyens';

	public function moyen(){
		return $this->belongsTo('App\Models\Moyen');
	}

	public function infrastructure(){
		return $this->belongsTo('App\Models\Infrastructure');
	}
}
