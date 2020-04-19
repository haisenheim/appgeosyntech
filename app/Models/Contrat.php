<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contrat extends Model
{
    //

	protected $guarded = [];
	//public $timestamps = false;
	//public $dates = ['fin','debut'];
	protected $dates = ['debut','fin'];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function Tcontrat(){
		return $this->belongsTo('App\Models\Tcontrat');
	}



	public function ante(){
		return $this->belongsTo('App\Models\Contrat','parent');
	}

	public function getRemainingDaysAttribute(){
		$certificat = Contrat::find($this->id);
		$today = Carbon::today();
		$fin = $certificat->fin;
		$fin = Carbon::parse($fin);
		$nb = $fin->diffInDays($today);

		return $nb;
	}

	public function getExpiredAttribute(){
		//$nb = $this->getRemainingDaysAttribute();
		$certificat = Contrat::find($this->id);
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
