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
	public  function getEbeAttribute(){
		return $this->getVaAttribute()  - $this->salaires;
	}

	protected function getReAttribute(){
		return $this->getEbeAttribute() +$this->rap +$this->tc - $this->dap;
	}

	protected function getRfAttribute(){
		return $this->pf +$this->rapf +$this->tcf - $this->dapf - $this->cfi;
	}
	protected function getRexAttribute(){
		return $this->pe +$this->pci +$this->rape + $this->tce - $this->vce -$this->dape - $this->ce;
	}

	protected function getRcaiAttribute(){
		return $this->getReAttribute() + $this->getRfAttribute() + $this->getRexAttribute();
	}

	public function getRnAttribute(){
		return $this->getRcaiAttribute() - $this->participations - $this->impots;
	}
}
