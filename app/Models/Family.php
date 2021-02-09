<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Family extends Model
{
    //

	protected $guarded = [];
	protected $table = 'families';

	public function articles(){
		return $this->hasMany('App\Models\Produit','family_id');
	}


}
