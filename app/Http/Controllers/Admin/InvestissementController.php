<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investissement;
use Illuminate\Http\Request;


class InvestissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

	public function validateDoc($token){
		$invest = Investissement::where('token',$token)->first();
		$invest->obac_doc_juridique_validated =1;
		$invest->save();
		return back();
	}

	public function rejectDoc($token){
		$invest = Investissement::where('token',$token)->first();
		$invest->obac_doc_juridique_validated =0;
		$invest->save();
		return back();
	}

	public function displayDoc($token){
		$invest = Investissement::where('token',$token)->first();
		return response()->file($invest->doc_juridiqueUri);
	}

	public function validateJustificatif($token){
		$invest = Investissement::where('token',$token)->first();
		$invest->obac_justificatif_validated =1;
		$invest->save();
		return back();
	}

	public function rejectJustificatif($token){
		$invest = Investissement::where('token',$token)->first();
		$invest->obac_justificatif_validated =0;
		$invest->save();
		return back();
	}
	public function displayJustificatif($token){
		$invest = Investissement::where('token',$token)->first();
		return response()->file($invest->justificatifUri);
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
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function show(Investissement $investissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Investissement $investissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investissement $investissement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investissement  $investissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investissement $investissement)
    {
        //
    }
}
