<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    //

	protected $guarded = [];


	public function type(){
		return $this->belongsTo('App\Models\Tarticle','tarticle_id');
	}

	public function fournisseur(){
		return $this->belongsTo('App\Models\Fournisseur','fournisseur_id');
	}

	public function famille(){
		return $this->belongsTo('App\Models\Family','family_id');
	}


}
