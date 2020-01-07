<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
	//

	protected $guarded = [];
	public $timestamps = false;

	public function question(){
		return $this->belongsTo('App\Models\Question');
	}
}