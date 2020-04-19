<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Certificat extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;
	//public $dates = ['fin','debut'];
	protected $dates = ['debut','fin'];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function Tcertificat(){
		return $this->belongsTo('App\Models\Tcertificat');
	}

	public function partenaire(){
		return $this->belongsTo('App\Models\Partenaire');
	}

	public function ante(){
		return $this->belongsTo('App\Models\Certificat','parent');
	}


	public function getRemainingDaysAttribute(){
		 $certificat = Certificat::find($this->id);
		 $today = Carbon::today();
		 $fin = $certificat->fin;
		$fin = Carbon::parse($fin);
		$nb = $fin->diffInDays($today);

		return $nb;
	}

	public function getExpiredAttribute(){
		 //$nb = $this->getRemainingDaysAttribute();
		$certificat = Certificat::find($this->id);
		$today = Carbon::today();
		$fin = $certificat->fin;
		$fin = Carbon::parse($fin);
		if($fin->greaterThan($today)){
			return false;
		}else{
			return true;
		}
	}

}
