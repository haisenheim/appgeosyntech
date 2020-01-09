<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Agence;
use App\Models\Comment;
use App\Models\Devise;
use App\Models\Earlie;
use App\Models\Flettre;
use App\Models\Investissement;
use App\Models\Lettre;
use App\Models\Projet;
use App\Models\TagsProjet;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use PDF;

class DiversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }





	public function getAudio($token){
		$path = public_path('podcasts').'/'.$token;
		//$path = Storage::disk('public')->get('podcasts/'.$token);
		return (new Response($path,200))->header('Content-Type','audio/mpeg');
	}

	public function readPdf($token){
		$path = public_path('pdf').'/'.$token;
		//dd($path);
		//$path = Storage::disk('public')->get('pdf/'.$token);
		//return (new Response($path,200))->header('Content-Type','application/pdf');

		return response()->setContent($path)->header('Content-Type','application/pdf');
	}


	public function getVillesByPay(Request $request){
		$villes = Ville::all()->where('pay_id',$request->pay_id)->toArray();
		//dd($villes);
		return response()->json($villes);
	}

	public function getAgencesByVille(Request $request){
		$agences = Agence::all()->where('ville_id',$request->ville_id)->toArray();
		//dd($villes);
		return response()->json($agences);
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


	public function printEarlie($token){
		$dossier = Earlie::where('token',$token)->first();

		$data =['dossier'=>$dossier];
		$pdf = PDF::loadView('Utils/Dossiers/printit',$data);
		return $pdf->stream($dossier->name.'.pdf');
	}

	public function printProjet($token){
		$dossier = Projet::where('token',$token)->first();

		$data =['dossier'=>$dossier];
		$pdf = PDF::loadView('Utils/Dossiers/printit',$data);
		return $pdf->stream($dossier->name.'.pdf');
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
