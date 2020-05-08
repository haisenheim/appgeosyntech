<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ImportOption extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;
	protected $table = 'import_options';


	public function transcotations(){
		return $this->hasMany('App\Models\Transcotation','import_option_id');
	}

}
