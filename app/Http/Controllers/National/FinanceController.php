<?php

namespace App\Http\Controllers\National;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Centre;
use App\Models\Entreprise;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreancesCentre($token)
    {
        //
	    $centre = Centre::where('token',$token)->first();
	    $factures = Facture::orderBy('created_at','desc')->where('centre',1)->where('centre_id',$centre->id)->where('filled',0)->paginate(12);
	    return view('National/Centres/creances')->with(compact('factures','centre'));
    }

	public function getPayeesCentre($token)
	{
		//
		$centre = Centre::where('token',$token)->first();
		$factures = Facture::orderBy('created_at','desc')->where('centre',1)->where('centre_id',$centre->id)->where('filled',1)->paginate(12);
		return view('National/Centres/payees')->with(compact('factures','centre'));
	}

	public function showFactureCentre( $token)
	{
		$facture = Facture::where('token',$token)->first();
		return view('National/Centres/facture')->with(compact('facture'));
		//
	}

	public function fillFacture(Request $request, $token)
	{

		$facture = Facture::where('token',$token)->first();
		if($facture->filled){
			$request->session()->flash('danger','Impossible de payer doublement la même facture!!!');
			return back();
		}
		$facture->filled =1;
		$facture->filled_at = new \DateTime();
		$facture->filled_by = Auth::user()->id;
		$facture->save();
		$facture = Facture::where('token',$token)->first();
		$data = [
			'title' => 'RECU - PAIEMENT FACTURE - '.$facture->name,
			'heading' => 'RECU - PAIEMENT FACTURE - '.$facture->name,

			'facture'=>$facture
		];


		if($facture->alliages){
			$pdf = PDF::loadView('National/Alliages/recu',$data);
		}else{
			$pdf = PDF::loadView('National/Commercials/recu',$data);
		}
		return $pdf->stream('RECU - Facture -'. $facture->name.'.pdf');
		//$request->session()->flash('success','Premier paiement enregistré avec succès!!!');
		//return $pdf->download('RECU - Facture -'. $facture->name.'.pdf');

	}


	public function getCreancesConsultant($token)
    {
        //
	    $apporteur = User::where('token',$token)->first();
	    $factures = Facture::orderBy('created_at','desc')->where('consultant',1)->where('owner_id',$apporteur->id)->where('filled',0)->paginate(12);

	    return view('National/Experts/creances')->with(compact('factures','apporteur'));
    }

	public function getPayeesConsultant($token)
	{
		//
		$apporteur = User::where('token',$token)->first();
		$factures = Facture::orderBy('created_at','desc')->where('consultant',1)->where('owner_id',$apporteur->id)->where('filled',1)->paginate(12);

		return view('National/Experts/payees')->with(compact('factures','apporteur'));
	}

	public function showFactureConsultant( $token)
	{
		$facture = Facture::where('token',$token)->first();
		return view('National/Experts/facture')->with(compact('facture'));
		//
	}


	public function getCreancesAlliages()
	{
		//

		$factures = Facture::orderBy('created_at','desc')->where('alliages',1)->where('filled',0)->paginate(12);

		return view('National/Alliages/creances')->with(compact('factures'));
	}

	public function getPayeesAlliages()
	{
		//

		$factures = Facture::orderBy('created_at','desc')->where('alliages',1)->where('filled',1)->paginate(12);

		return view('National/Alliages/payees')->with(compact('factures'));
	}

	public function showFactureAlliages( $token)
	{
		$facture = Facture::where('token',$token)->first();
		return view('National/Alliages/facture')->with(compact('facture'));
		//
	}


	public function getPerformance(){
		$paiements = Paiement::all();
		$paiements = $paiements->sortByDesc('annee');
		$paiements = $paiements->groupBy('moi_id',function($item){
			return $item['annee'];
		});

		return view('National/Finances/performance')->with(compact('paiements'));
	}

	public function test(){
		$projets =Projet::with('mois')->get(['name','annee','moi_id'])->sortByDesc('moi_id')->groupBy(['annee',function($item){
			return $item['moi_id'];
		}], $preserveKeys = true);

		dd(Projet::with('mois')->get()->groupBy('mois.name'));
		foreach($projets as $k=>$v){
			var_dump($k); echo '<br/>';
			foreach($v as $c=>$m){
				foreach($m as $a=>$b){var_dump($a); echo '=>'; var_dump($b->name); echo '<br/>';}

			}

		}
		//die('la fin');
		$projets = Projet::all();
		$projets = $projets->sortByDesc('moi_id');
		$projets = $projets->groupBy(['annee',function($item){
			return $item['moi_id'];
		}], $preserveKeys = true);

		dd($projets);
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }










    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
