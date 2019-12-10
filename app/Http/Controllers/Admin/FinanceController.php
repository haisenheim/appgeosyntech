<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actif;
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
    public function getCreancesApporteur($token)
    {
        //
	    $apporteur = User::where('token',$token)->first();
	    $factures = Facture::orderBy('created_at','desc')->where('apporteur',1)->where('owner_id',$apporteur->id)->where('filled',0)->paginate(12);

	    return view('Admin/Commercials/creances')->with(compact('factures','apporteur'));
    }

	public function getPayeesApporteur($token)
	{
		//
		$apporteur = User::where('token',$token)->first();
		$factures = Facture::orderBy('created_at','desc')->where('apporteur',1)->where('owner_id',$apporteur->id)->where('filled',1)->paginate(12);

		return view('Admin/Commercials/payees')->with(compact('factures','apporteur'));
	}

	public function showFactureApporteur( $token)
	{
		$facture = Facture::where('token',$token)->first();
		return view('Admin/Commercials/facture')->with(compact('facture'));
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
			$pdf = PDF::loadView('Admin/Alliages/recu',$data);
		}else{
			$pdf = PDF::loadView('Admin/Commercials/recu',$data);
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

	    return view('Admin/Experts/creances')->with(compact('factures','apporteur'));
    }

	public function getPayeesConsultant($token)
	{
		//
		$apporteur = User::where('token',$token)->first();
		$factures = Facture::orderBy('created_at','desc')->where('consultant',1)->where('owner_id',$apporteur->id)->where('filled',1)->paginate(12);

		return view('Admin/Experts/payees')->with(compact('factures','apporteur'));
	}

	public function showFactureConsultant( $token)
	{
		$facture = Facture::where('token',$token)->first();
		return view('Admin/Experts/facture')->with(compact('facture'));
		//
	}


	public function getCreancesAlliages()
	{
		//

		$factures = Facture::orderBy('created_at','desc')->where('alliages',1)->where('filled',0)->paginate(12);

		return view('Admin/Alliages/creances')->with(compact('factures'));
	}

	public function getPayeesAlliages()
	{
		//

		$factures = Facture::orderBy('created_at','desc')->where('alliages',1)->where('filled',1)->paginate(12);

		return view('Admin/Alliages/payees')->with(compact('factures'));
	}

	public function showFactureAlliages( $token)
	{
		$facture = Facture::where('token',$token)->first();
		return view('Admin/Alliages/facture')->with(compact('facture'));
		//
	}


	public function getPerformance(){
		$paiements = Paiement::all();
		$paiements = $paiements->sortByDesc('annee');
		$paiements = $paiements->groupBy('moi_id',function($item){
			return $item['annee'];
		});

		return view('Admin/Finances/performance')->with(compact('paiements'));
	}

	public function test(){
		dd(Projet::with('moi')->get());
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
