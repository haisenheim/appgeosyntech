<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AngelTag extends Model
{
    //
	protected $table ='angels_tags';

	protected $guarded = [];
	//public $timestamps = false;

	public function tag(){
		return $this->belongsTo('App\Models\Tags');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}
