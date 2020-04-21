<?php

namespace App\Models\Objectifs;

use Illuminate\Database\Eloquent\Model;

class Obtpartenaire extends Model
{
    //
	public $timestamps = false;

	public function type(){
		return $this->belongsTo('App\Models\Tpartenaire','tpartenaire_id');
	}
}
