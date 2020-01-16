<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompteFormation extends Model
{
	//

	protected $guarded = [];
	protected $table = 'comptes_formations';
	//public $timestamps = false;

	public function compte(){
		return $this->belongsTo('App\User','compte_id');
	}

	public function formation(){
		return $this->belongsTo('App\Models\EntrepriseFormation');
	}

}