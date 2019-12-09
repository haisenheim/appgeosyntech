<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Facture;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

	public function fillFacture( $token)
	{
		$facture = Facture::where('token',$token)->first();
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

		$pdf = PDF::loadView('Admin/Commercials/recu',$data);

		//$request->session()->flash('success','Premier paiement enregistré avec succès!!!');
		return $pdf->download('RECU - Facture -'. $facture->name.'.pdf');

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
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
	    $projet = Actif::where('token',$token)->first();
	    //dd($projet);

	    $experts = User::all()->where('role_id',2);
	    return view('/Admin/Actifs/show')->with(compact('projet','experts'));
    }

	public function addExpert(Request $request){
		$projet = Actif::find($request->id);
		$projet->expert_id = $request->expert_id;
		$projet->save();

		return redirect()->back();
	}

	public function disable($id){
		$projet = Actif::find($id);
		$projet->active = 0;
		$projet->save();

		return redirect()->back();
	}

	public function enable($id){
		$projet = Actif::find($id);
		$projet->active = 1;
		$projet->save();

		return redirect()->back();
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
