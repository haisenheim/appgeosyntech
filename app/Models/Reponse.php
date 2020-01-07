<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
	//

	protected $guarded = [];
	public $timestamps = false;

	public function test(){
		return $this->belongsTo('App\Models\Test');
	}

	public function question(){
		return $this->belongsTo('App\Models\Question');
	}
}