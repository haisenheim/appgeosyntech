<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
	protected $guarded = [];
	public $timestamps = false;

	public function angels(){
		return $this->belongsToMany('App\User','angels_tags');
	}

	public function projets(){
		return $this->belongsToMany('App\Models\Projet','tags_projets');
	}
}
