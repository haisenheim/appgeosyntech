<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prevresultat extends Model
{
    //
	protected $guarded =[];
	//public $timestamps = false;

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	protected function getMbAttribute(){
		return ($this->ca - $this->cv);
	}
	protected function getVaAttribute(){
		return $this->getMbAttribute() + $this->pi + $this->ps + $this->sp + $this->ape - $this->taxes - $this->cf;
	}
}
