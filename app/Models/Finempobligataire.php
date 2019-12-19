<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finempobligataire extends Model
{
    //
	protected  $guarded = [];
	public function projet(){
		return $this->belongsTo('App\Models\Projet');
	}

	public function earlie(){
		return $this->belongsTo('App\Models\Earlie');
	}

	public function infrastructure(){
		return $this->belongsTo('App\Models\Infrastructure');
	}

	public function dossier(){

		if($this->projet_id){
			return Projet::find($this->projet_id);
		}
		if($this->earlie_id){
			return Earlie::find($this->earlie_id);
		}
		if($this->infrastructure_id){
			return Infrastructure::find($this->infrastructure_id);
		}
		return null;
	}



	// REMBOURSEMENT IN FINE

	//---------------------------------Calcul de la prime de remboursement ---------------------------------------------
	public function getPrimerembRifAttribute(){
		return $this->rif_pr - $this->rif_vf;
	}

	//------------------------------- Calcul du	Nombre théorique d’obligations à rembourser à année ---------------------
	public function getNbtoAttribute(){
		return $this->rss_dp?$this->rss_nbta/$this->rss_dp:0;
	}

	//-------------------------------Calcul du montant du coupon par obligation ----------------------------------------
	public function getMtcouponobligrifAttribute(){
		return $this->rif_vf * $this->rif_ti;
	}

	//------------------------------Calcul du montant de l'investissemnt -----------------------------------------------
	public function getMtinvestrifAttribute(){
		return $this->rif_nbta * $this->rif_vf;
	}

	//-----------------------------Calcul des interets a percevoir sur le pret -----------------------------------------
	public function getInteretsrifAttribute(){
		return $this->getMtinvestrifAttribute() * $this->rif_ti;
	}

	//---------------------Calcul du Remboursement du capital en tenant compte de la prime de remboursement ---------------
	public function getRembcprrifAttribute(){
		return $this->rif_nbta * $this->rif_pr;
	}

	//-------------------Calcul du Montant total à recevoir à la fin de la durée du prêt -------------------------------
	public function getMttfdprifAttribute(){
		return $this->getRembcprrifAttribute() + $this->getInteretsrifAttribute();
	}

	//REMBOURSEMENT PAR SERIES SENSIBLES EGALES

	//  --------------- Calcul de la prime de remboursement ------------------------------------------------------------
	public function getPrimerembrssAttribute(){
		return $this->rss_pr - $this->rss_vf;
	}


	//------------- Calcul du nombre de titres a rembourser ------------------------------------------------------------
	public function getNbtrembRssAttribute(){
		return $this->rss_dp?$this->rss_nbta/$this->rss_dp:0;
	}



	public function getArrayNbtrembrssAttribute(){
		$tab = [];
		$n = $this->rss_dp;
		$som=0;
		for($i=1;$i<=$n; $i++){
			$tab[$i]=$this->rss_dp?$this->rss_nbta/$this->rss_dp:0;
			$som = $som + $tab[$i];
		}
		$tab[0] = $som;
		return $tab;
	}



	//-----------------Calcul du Nombre d’obligation restant à rembourser -----------------------------------------------------------


	public function getArrayNborrssAttribute(){
		$tab = [];
		$tabr = $this->getArrayNbtrembrssAttribute();
		$n = $this->rss_dp;
		$tab[1]=$this->rss_nbta;

		for($i = 2; $i<=$n; $i++){
			$j=$i-1;
			$tab[$i] = $tab[$j] - $tabr[$i];

		}

		return $tab;
	}



	//---------------Calcul de l'amortissement -------------------------------------------------------------------------


	public function getArrayAmortissementrssAttribute(){
		$tab = [];
		$n= $this->rss_dp;
		$som=0;
		$tabr = $this->getArrayNbtrembrssAttribute();
		for($i = 1; $i<=$n; $i++){
			$tab[$i] = $tabr[$i] * $this->rss_pr;
			$som = $som + $tab[$i];
		}
		$tab[0]=$som;
		return $tab;
	}


	//------------------ Calcul des interets -------------------------------------------------------------------------

	public function getArrayInteretrssAttribute(){
		$tab = [];
		$n= $this->rss_dp;
		$som=0;
		$tabr = $this->getArrayNborrssAttribute();
		for($i = 1; $i<=$n; $i++){
			$tab[$i] = $tabr[$i] * $this->rss_ti * $this->rss_vf;
			$som = $som + $tab[$i];
		}
		$tab[0]=$som;
		return $tab;
	}



	//------------------------- Calcul des Annuites (Montant a precevoir chaque annee) -------------------------------------------------------------------


	public function getArrayAnnuiterssAttribute(){
		$tab = [];
		$n= $this->rss_dp;
		$tab1 = $this->getArrayInteretrssAttribute();
		$tab2 = $this->getArrayAmortissementrssAttribute();
		$som=0;
		for($i = 1; $i<=$n; $i++){
			$tab[$i] = $tab1[$i] + $tab2[$i];
			$som = $som + $tab[$i];
		}
		$tab[0]=$som;
		return $tab;
	}


	/*public function getArrayAnnuiterssAttribute(){
		$tab = [];
		$n= $this->rss_dp;
		$tab1 = $this->getArrayInteretrssAttribute();
		$tab2 = $this->getArrayAmortissementrssAttribute();
		$som=0;
		for($i = 1; $i<=$n; $i++){
			$tab[$i] = $tab1[$i] + $tab2[$i];
			$som = $som + $tab[$i];
		}
		$tab[0]=$som;
		return $tab;
	}*/


	// REMBOURSEMENT PAR ANNUITES SENSIBLEMENT CONSTANTES

	//------------------------Calcul de la prime de remboursement ------------------------------------------------------
	public function getPrimerembrascAttribute(){
		return $this->ras_pr - $this->ras_vf;
	}

	//------------------------------- Calcul du	Nombre théorique d’obligations à rembourser à année ---------------------
	public function getNbtorasAttribute(){
		return $this->ras_dp?round($this->ras_nbta/$this->ras_dp,2):0;
	}

	//---------------------------- Calcul de l'annuite constante / theorique -------------------------------------------------------

	//--A/ Dans le cas ou la prime de remboursement est egale a 0, on calcule l'annuite constante
	public function getAnnuiteConstanteRasAttribute(){

		$d= (1- pow(1+$this->ras_ti, -1*$this->ras_dp));
		$annuite = $d?round(($this->ras_nbta * $this->ras_vf))/$d:0;
		return $annuite;
	}


	//-----------------------------------------------------------------------------------------------------------------//
	//       Calcul des elements du tableau lorsque la prime de remboursement est egale a 0                            //
	//-----------------------------------------------------------------------------------------------------------------//

	//------------------------- Calcul du Nombre d’obligations vivantes ----------------------------------------------------/
	public function getNbov1AAttribute(){
		return $this->ras_nbta;
	}

	public function getNbov2AAttribute(){
		return $this->ras_nbta - $this->getNbtr1AAttribute();
	}

	public function getNbov3AAttribute(){
		return $this->getNbov2AAttribute() - $this->getNbtr2AAttribute();
	}

	/*public function getNbovnAAttribute(){
		//return $this->getNbovAAttribute() - $this->getNbtr2AAttribute();
	}*/



	// ------------------------------ Calcul du montant des interets ----------------------------------------------------
	public function getInterets1AAttribute(){
		return round($this->ras_nbta * $this->ras_vf * $this->ras_ti,2);
	}

	public function getInterets2AAttribute(){
		return round($this->getNbov2AAttribute() * $this->ras_vf * $this->ras_ti,2);
	}

	public function getInterets3AAttribute(){
		return round($this->getNbov3AAttribute() * $this->ras_vf * $this->ras_ti,2);
	}


	// ------------------------------------- Calcul de l'amortissement -------------------------------------------------
	public function getAmortissement1AAttribute(){
		return $this->getAnnuite_constanteRasAttribute() - $this->getInterets1AAttribute();
	}

	public function getAmortissement2AAttribute(){
		return $this->getNbtr2AAttribute() * $this->ras_pr;
	}

	public function getAmortissement3AAttribute(){
		return $this->getNbtr3AAttribute() * $this->ras_pr;
	}

	public function getAmortissementnAAttribute(){
		return $this->getNbtrnAAttribute() * $this->ras_pr;
	}



	//----------------------------------- Calcul des annuites ----------------------------------------------------------
	public function getAnnuite1AAttribute(){
		return $this->getAnnuiteConstanteRasAttribute();
	}

	public function getAnnuite2AAttribute(){
		return $this->getInterets2AAttribute() + $this->getAmortissement2AAttribute();
	}

	public function getAnnuite3AAttribute(){
		return $this->getInterets3AAttribute() + $this->getAmortissement3AAttribute();
	}


	//-------------------------------- Calul du nombre de titres rembourse --------------------------------------------
	public function getNbtr1AAttribute(){
		return $this->ras_pr? round($this->getAmortissement1AAttribute() / $this->ras_pr,2):0;
	}

	public function getNbtr2AAttribute(){
		return $this->getNbtr1AAttribute() * (1/(1-$this->ras_ti));
	}

	public function getNbtr3AAttribute(){
		return $this->getNbtr1AAttribute() * pow((1/(1-$this->ras_ti)), 2);
	}

	public function getNbtrnAAttribute(){
		return $this->getNbtr1AAttribute() * pow((1/(1-$this->ras_ti)), ($this->ras_dp-1));
	}



	//--B/ Dans le cas ou la prime de remboursement est differente de 0, on calcul l'annuite theorique et le nbre de titres theorique rembourse pour l'annee 1



	//----------- Annuite theorique ------------------------------------------------------------------------------------
	public function getAnnuite_theoriqueRasAttribute(){
		$ki = $this->ras_nbta * $this->ras_vf * $this->ras_ti;
		$a = $ki / (1 - pow((1+$this->tf()), -$this->ras_dp));
		return $a;
	}


	public function getTabRasAttribute(){
		$tab=[];

		$tab[1]['ov'] = $this->ras_nbta; //nombre d'obligations vivantes restantes la premiere annee
		$tab[1]['nttr'] = ($this->getAnnuite_theoriqueRasAttribute() - ($this->ras_nbta * $this->ras_vf * $this->ras_ti))/$this->ras_pr;       //nombre theorique de titres rembourses la premiere annee
		$tab[1]['nrtr'] = round($tab[1]['nttr'],0); // Nombre reel de titres rembourse la premiere annee
		$tab[1]['amortissement']= $tab[1]['nrtr'] * $this->ras_pr;
		$tab[1]['interets'] = $this->ras_nbta * $this->ras_vf * $this->ras_ti;
		$tab[1]['annuite'] = $tab[1]['amortissement'] + $tab[1]['interets'];

		$tab[0]['ov'] = $this->ras_nbta; //nombre d'obligations vivantes restantes la premiere annee
		$tab[0]['nttr'] = ($this->getAnnuite_theoriqueRasAttribute() - ($this->ras_nbta * $this->ras_vf * $this->ras_ti))/$this->ras_pr;       //nombre theorique de titres rembourses la premiere annee
		$tab[0]['nrtr'] = round($tab[1]['nttr'],0); // Nombre reel de titres rembourse la premiere annee
		$tab[0]['amortissement']= $tab[1]['nrtr'] * $this->ras_pr;
		$tab[0]['interets'] = $this->ras_nbta * $this->ras_vf * $this->ras_ti;
		$tab[0]['annuite'] = $tab[1]['amortissement'] + $tab[1]['interets'];

		//debug($tab); die();
		for($i=2; $i<=$this->ras_dp;$i++){
			$j= $i-1;
			$tab[$i]['ov'] = $tab[$j]['ov'] -  $tab[$j]['nrtr'] ; //nombre d'obligations vivantes restantes la premiere annee
			$tab[$i]['nttr'] = $tab[$j]['nttr'] *(1+$this->tf());       //nombre theorique de titres rembourses la premiere annee
			$tab[$i]['nrtr'] = round($tab[$i]['nttr'],0); // Nombre reel de titres rembourse la premiere annee
			$tab[$i]['amortissement']= $tab[$i]['nrtr'] * $this->ras_pr;
			$tab[$i]['interets'] = $tab[$i]['ov'] * $this->ras_vf * $this->ras_ti;
			$tab[$i]['annuite'] = $tab[$i]['amortissement'] + $tab[$i]['interets'];

			$tab[0]['ov']= $tab[0]['ov'] + $tab[$i]['ov'];
			$tab[0]['nttr']= $tab[0]['nttr'] + $tab[$i]['nttr'];
			$tab[0]['nrtr']= $tab[0]['nrtr'] + $tab[$i]['nrtr'];
			$tab[0]['amortissement']= $tab[0]['amortissement'] + $tab[$i]['amortissement'];
			$tab[0]['interets']= $tab[0]['interets'] + $tab[$i]['interets'];
			$tab[0]['annuite']= $tab[0]['annuite'] + $tab[$i]['annuite'];

		}

		// debug($tab); die();

		return $tab;

	}


	//-------------------------- Nombre de titres theorique rembourse pour l'annee 1 -----------------------------------------------------------
	public function getNbt_theoriqueAn1RasAttribute(){
		return $this->ras_pr?$this->getAnnuite_theoriqueRasAttribute()-($this->ras_nbta * $this->ras_vf * $this->ras_ti)/$this->ras_pr:0;
	}

	//-----------------------------------------------------------------------------------------------------------------//
	//       Calcul des elements du tableau lorsque la prime de remboursement est diffrente de 0                       //
	//-----------------------------------------------------------------------------------------------------------------//

	private function tf(){
		return $this->ras_pr?$this->ras_ti * $this->ras_vf / $this->ras_pr:0;
	}



	//----------------- Calcul du nombre de titres theoriques rembourse ------------------------------------------------------

	public function getNbt1theoRasBAttribute(){
		return $this->getNbt_theoriqueAn1RasAttribute();
	}

	public function getNbt2theoRasBAttribute(){
		return $this->getNbt1theoRasBAttribute() * (1+$this->tf());
	}

	public function getNbt3theoRasBAttribute(){
		return $this->getNbt1theoRasBAttribute() * pow((1+$this->tf()),2);
	}

	public function getNbtntheoRasBAttribute(){
		return $this->getNbt1theoRasBAttribute() * pow((1+$this->tf()),($this->ras_dp-1));
	}

	//-------------------- Calcul du nombre de titres reels rembourse ----------------------------------------------------------
	public function getNbt1reelRasBAttribute(){
		return round($this->getNbt1theoRasBAttribute());
	}

	public function getNbt2reelRasBAttribute(){
		return round($this->getNbt2theoRasBAttribute());
	}

	public function getNbt3reelRasBAttribute(){
		return round($this->getNbt3theoRasBAttribute());
	}

	public function getNbtnreelRasBAttribute(){
		return round($this->getNbtntheoRasBAttribute());
	}

	//--------------------- Calcul du nombre d'abligations vivantes ----------------------------------------------------------
	public function getNbov1RasBAttribute(){
		return $this->ras_nbta;
	}

	public function getNbov2RasBAttribute(){
		return $this->ras_nbta - $this->getNbt1reelRasBAttribute();
	}

	public function getNbov3RasBAttribute(){
		return $this->getNbov2RasBAttribute() - $this->getNbt2reelRasBAttribute();
	}

	public function getNbovnRasBAttribute(){
		return $this->getNbovnRasBAttribute() - $this->getNbtnreelRasBAttribute(); //********************** la periode pourrait mauvaise n-1
	}

	//----------------------------- Calcul des interets ----------------------------------------------------------------

	public function getInterets1RasBAttribute(){
		return $this->ras_nbta * $this->ras_vf * $this->ras_ti;
	}

	public function getInterets2RasBAttribute(){
		return $this->getNbov2RasBAttribute() * $this->ras_vf * $this->ras_ti;
	}

	public function getInterets3RasBAttribute(){
		return $this->getNbov3RasBAttribute() * $this->ras_vf * $this->ras_ti;
	}

	public function getInteretsnRasBAttribute(){
		return $this->getNbovnRasBAttribute() * $this->ras_vf * $this->ras_ti;
	}

	//-------------------------- Calcul de l'amortissement --------------------------------------------------------------
	public function getAmortissement1RasBAttribute(){
		return $this->getNbt1reelRasBAttribute() * $this->ras_pr;
	}

	public function getAmortissement2RasBAttribute(){
		return $this->getNbt2reelRasBAttribute() * $this->ras_pr;
	}

	public function getAmortissement3RasBAttribute(){
		return $this->getNbt3reelRasBAttribute() * $this->ras_pr;
	}

	public function getAmortissementnRasBAttribute(){
		return $this->getNbtnreelRasBAttribute() * $this->ras_pr;
	}


	//------------------------- Calcul des annuites ---------------------------------------------------------------------

	public function getAnnuites1RasBAttribute(){
		return $this->getInterets1RasBAttribute() + $this->getAmortissement1RasBAttribute();
	}

	public function getAnnuites2RasBAttribute(){
		return $this->getInterets2RasBAttribute() + $this->getAmortissement2RasBAttribute();
	}

	public function getAnnuites3RasBAttribute(){
		return $this->getInterets3RasBAttribute() + $this->getAmortissement3RasBAttribute();
	}

	public function getAnnuitesnRasBAttribute(){
		return $this->getInteretsnRasBAttribute() + $this->getAmortissementnRasBAttribute();
	}


}
