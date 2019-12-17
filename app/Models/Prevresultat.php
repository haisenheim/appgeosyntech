<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prevresultat extends Model
{
    //
	protected  $guarded =[];
	//public $timestamps = false;

	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function getPositionAttribute(){
		if($this->projet_id){
			$ps = Prevresultat::all()->where('projet_id',$this->projet_id)->sortBy('annee');
			$position=0;
			$i=0;
			foreach($ps as $p){
				if($p->id==$this->id){
					$position=$i;
					break;
				}
				$i++;
			}

			return $position;
		}

		if($this->earlie_id){
			$ps = Prevresultat::all()->where('earlie_id',$this->earlie_id)->sortBy('annee');
			$position=0;
			$i=0;
			foreach($ps as $p){
				if($p->id==$this->id){
					$position=$i;
					break;
				}
				$i++;
			}


			return $position;
		}

		if($this->infrastructure_id){
			$ps = Prevresultat::all()->where('infrastructure_id',$this->infrastructure_id)->sortBy('annee');
			$position=0;
			$i=0;
			foreach($ps as $p){
				if($p->id==$this->id){
					$position=$i;
					break;
				}
				$i++;
			}

			return $position;
		}

		return -1;

	}

	public function getMbAttribute(){
		return ($this->ca - $this->cv);
	}
	public function getVaAttribute(){
		return $this->getMbAttribute() + $this->pi + $this->ps + $this->sp + $this->ape - $this->taxes - $this->cf;
	}
	public  function getEbeAttribute(){
		return $this->getVaAttribute()  - $this->salaires;
	}

	/*public function getReAttribute(){
		return $this->getEbeAttribute() +$this->rap +$this->tc - $this->dap;
	}*/
	public function getReAttribute(){
		return $this->getEbeAttribute() - $this->dap;
	}

	/*public function getRfAttribute(){
		return $this->pf +$this->rapf +$this->tcf - $this->dapf - $this->cfi;
	}*/
	public function getRfAttribute(){
		return $this->pf  - $this->cfi;
	}
	/*public function getRexAttribute(){
		return $this->pe +$this->pci +$this->rape + $this->tce - $this->vce -$this->dape - $this->ce;
	}*/
	public function getRexAttribute(){
		return $this->pe  - $this->ce;
	}
	public function getRcaiAttribute(){
		return $this->getReAttribute() + $this->getRfAttribute() + $this->getRexAttribute();
	}

	public function getRnAttribute(){
		return $this->getRcaiAttribute() - $this->participations - $this->impots;
	}

	public function getItAttribute(){
		if($this->projet_id){
			$fcs = Fincapitalsocial::where('projet_id',$this->projet_id)->first();

			return $this->getEbeAttribute() * $fcs->taux_imposition;
		}

		if($this->earlie_id){
			$fcs = Fincapitalsocial::where('earlie_id',$this->earlie_id)->first();

			return $this->getEbeAttribute() * $fcs->taux_imposition;
		}

		if($this->infrastructure_id){
			$fcs = Fincapitalsocial::where('infrastructure_id',$this->infrastructure_id)->first();

			return $this->getEbeAttribute() * $fcs->taux_imposition;
		}

		return 0;

	}

	public function getReapiAttribute(){
		return $this->getEbeAttribute() - $this->getItAttribute();
	}

	
	
	
	/*public function getFluxtresodispoAttribute(){
		return $this->getReapiAttribute() + $this->dap + $this->cession_actifs1 - $this->_getVaribfr1();
	}*/

	//-----------------------------Calcul du benefice par action --------------------------------------------------------
	public function getBenefparactionAttribute(){
		if($this->projet_id){
			$fcs = Fincapitalsocial::where('projet_id',$this->projet_id)->first();
			return $fcs->nba_aoc?round($this->getRnAttribute()/$fcs->nba_aoc,2):0;
		}
		if($this->earlie_id){
			$fcs = Fincapitalsocial::where('earlie_id',$this->earlie_id)->first();
			return $fcs->nba_aoc?round($this->getRnAttribute()/$fcs->nba_aoc,2):0;
		}
		if($this->infrastructure_id){
			$fcs = Fincapitalsocial::where('infrastructure_id',$this->infrastructure_id)->first();
			return $fcs->nba_aoc?round($this->getRnAttribute()/$fcs->nba_aoc,2):0;
		}

		return -1;

	}



	public  function getTauxdistribAttribute(){
		return $this->getBenefparactionAttribute()?round($this->mt_dernier_dvd_brut_action/$this->getBenefparactionAttribute(),2):0;
	}



	public function getFluxtresodispoAttribute(){
		if($this->projet_id){
			$projet = Projet::find($this->projet_id);
			$rp = Repartcapitalsocial::where('fincapitalsocial_id',$projet->fincapitalsocial->id)->where('annee',$this->annee)->first();
			$cession=0;
			if($rp){
				$cession = $rp->cession;
			}
			return $this->getReapiAttribute() + $this->dap + $cession - $projet->variations['bfr'][$this->getPositionAttribute()];
		}

		if($this->earlie_id){
			$projet = Earlie::find($this->earlie_id);
			$rp = Repartcapitalsocial::where('fincapitalsocial_id',$projet->fincapitalsocial->id)->where('annee',$this->annee)->first();
			$cession=0;
			if($rp){
				$cession = $rp->cession;
			}
			return $this->getReapiAttribute() + $this->dap + $cession - $projet->variations['bfr'][$this->getPositionAttribute()];
		}

		if($this->infrastructure_id){
			$projet = Infrastructure::find($this->infrastructure_id);
			$rp = Repartcapitalsocial::where('fincapitalsocial_id',$projet->fincapitalsocial->id)->where('annee',$this->annee)->first();
			$cession=0;
			if($rp){
				$cession = $rp->cession;
			}
			return $this->getReapiAttribute() + $this->dap + $cession - $projet->variations['bfr'][$this->getPositionAttribute()];
		}


		return -1;
	}


	public  function getFactactuAttribute(){
		if($this->projet_id){
			$projet = Projet::find($this->projet_id);
			return 1/pow((1+$projet->fincapitalsocial->cmpc), $this->getPositionAttribute());
		}

		if($this->earlie_id){
			$projet = Earlie::find($this->earlie_id);
			return 1/pow((1+$projet->fincapitalsocial->cmpc), $this->getPositionAttribute());
		}

		if($this->infrastructure_id){
			$projet = Infrastructure::find($this->infrastructure_id);
			return 1/pow((1+$projet->fincapitalsocial->cmpc), $this->getPositionAttribute());
		}

		return -1;

	}

	public  function getFtdaAttribute()
	{
		return $this->getFluxtresodispoAttribute() * $this->getFactactuAttribute();
	}


		//---------------------------Calcul du benefice par action -------------------------------------------------------


	public function getBpaAttribute(){
			if($this->projet_id){
				$projet = Projet::find($this->projet_id);
				return $projet->fincapitalsocial->nba_aoc?$this->getRnAttribute()/$projet->fincapitalsocial->nba_aoc:0;
			}

			if($this->earlie_id){
				$projet = Earlie::find($this->earlie_id);
				return $projet->fincapitalsocial->nba_aoc?$this->getRnAttribute()/$projet->fincapitalsocial->nba_aoc:0;
			}

			if($this->infrastructure_id){
				$projet = Infrastructure::find($this->infrastructure_id);
				return $projet->fincapitalsocial->nba_aoc?$this->getRnAttribute()/$projet->fincapitalsocial->nba_aoc:0;
			}

			return -1;

		}

	public  function getMt_prev_dvdAttribute(){
		if($this->projet_id){
			$projet=Projet::find($this->projet_id);
			return $this->getTauxdistribAttribute() * $projet->rn;
		}

		if($this->earlie_id){
			$projet=Earlie::find($this->earlie_id);
			return $this->getTauxdistribAttribute() * $projet->rn;
		}

		if($this->infrastructure_id){
			$projet=Infrastructure::find($this->infrastructure_id);
			return $this->getTauxdistribAttribute() * $projet->rn;
		}

		return -1;
	}
	public function getMt_dvd_actuAttribute(){
		return $this->getMt_prev_dvdAttribute() * $this->getFactactuAttribute();
	}
}
