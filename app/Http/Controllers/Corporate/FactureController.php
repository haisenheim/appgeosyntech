<?php

namespace App\Http\Controllers\Corporate;

use App\Http\Controllers\Controller;

use App\Models\Facture;
use App\Models\Pay;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PDF;

class FactureController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $factures = Facture::orderBy('created_at','desc')->where('consultant',1)->where('owner_id',Auth::user()->id)->paginate(12);
        return view('Corporate/Factures/index')->with(compact('factures'));

    }

	public function getFactures()
	{
		$factures = Facture::orderBy('created_at','desc')->where('consultant',1)->where('owner_id',Auth::user()->id)->where('filled',0)->paginate(12);
		return view('Corporate/Factures/creances')->with(compact('factures'));
	}


	public function payees()
	{

		$factures = Facture::orderBy('created_at','desc')->where('consultant',1)->where('owner_id',Auth::user()->id)->where('filled',1)->paginate(12);

		return view('Corporate/Factures/payees')->with(compact('factures'));

	}



    public function show( $token)
    {
	    $facture = Facture::where('token',$token)->first();
	    return view('Corporate/Factures/show')->with(compact('facture'));
        //
    }

	public function printit( $token)
	{
		$facture = Facture::where('token',$token)->first();
		$data = [
			'title' => 'FACTURE - '.$facture->name,
			'heading' => 'FACTURE - '.$facture->name,

			'facture'=>$facture
		];
		$pdf = PDF::loadView('Corporate/Factures/print',$data);
		return $pdf->stream('Facture -'. $facture->name.'.pdf');
		//$request->session()->flash('success','Premier paiement enregistré avec succès!!!');
		//return $pdf->download('Facture -'. $facture->name.'.pdf');

		//return view('Apporteur/Factures/show')->with(compact('facture'));
		//
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
