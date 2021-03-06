<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;
	protected $table = 'families';


	public function produits(){
		return $this->hasMany('App\Models\Produit');
	}

}
