<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EtapeProjet extends Model
{
    //

	protected $guarded = [];
	public $timestamps = false;
	public $table ='projets_etapes';
	protected $dates = ['debut','fin'];


	public function etape(){
		return $this->belongsTo('App\Models\Etape','etape_id');
	}

	public function projet(){
		return $this->belongsTo('App\Models\Projet','projet_id');
	}

	public function grpa(){
		return $this->belongsTo('App\Models\Client','groupe1');
	}

	public function grpb(){
		return $this->belongsTo('App\Models\Client','groupe2');
	}

	public function esa(){
		return $this->belongsTo('App\Models\Client','entreprise1');
	}

	public function esb(){
		return $this->belongsTo('App\Models\Client','entreprise2');
	}
}
