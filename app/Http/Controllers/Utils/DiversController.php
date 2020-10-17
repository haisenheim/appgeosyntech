<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Agence;
use App\Models\Agenda;
use App\Models\Comment;
use App\Models\Devise;
use App\Models\Earlie;
use App\Models\Facture;
use App\Models\Flettre;
use App\Models\Forder;
use App\Models\Frncotation;
use App\Models\Investissement;
use App\Models\Lettre;
use App\Models\Livraison;
use App\Models\Proforma;
use App\Models\Projet;
use App\Models\TagsProjet;
use App\Models\Transcotation;
use App\Models\Ville;
use App\User;
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


	public function readAudio($filename){

		/*$audioDir = public_path('audios');
		if (file_exists($filePath = $audioDir."/".$filename)) {

			if ($stream = fopen($filePath, 'r')) {
				while (!feof($stream)) {
					echo fread($stream, 1024);
				}
				fclose($stream);
			}
		}*/

		return response()->streamDownload(function () use ($filename) {
			$audioDir = public_path('audios');
			$filePath = $audioDir."/".$filename;
			if ($stream = fopen($filePath, 'r')) {
				while (!feof($stream)) {
					echo fread($stream, 1024);
					flush();
				}
				fclose($stream);
			}
		}, $filename);

	}


	public function getAudio($token){
		$path = public_path('podcasts').'/'.$token;
		//$path = Storage::disk('public')->get('podcasts/'.$token);
		return (new Response($path,200))->header('Content-Type','audio/mpeg');
	}

	public function readPdf($token){
		$path = public_path('pdf').'/'.$token;
		//return Response::make();
		//dd($path);
		//$path = Storage::disk('public')->get('pdf/'.$token);
		return (new Response($path,200))->header('Content-Type','application/pdf');
		//return response()->content($path)->header('Content-Type','application/pdf');
	}


	public function getConsultantsByPay(Request $request){
		$consultants = User::all()->where('pay_id',$request->id)->where('role_id',6);
		return response()->json($consultants);
	}

	public function getContributeursByPay(Request $request){
		$consultants = User::all()->where('pay_id',$request->id)->where('role_id',7);
		return response()->json($consultants);
	}

	public function getVillesByPay(Request $request){
		$villes = Ville::all()->where('pay_id',$request->pay_id)->toArray();
		//dd($villes);
		return response()->json($villes);
	}

	public function getAgendaItems(){
		$items = Agenda::all()->where('owner_id');

		return response()->json($items);
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




	public function printProjet($token){
		$dossier = Projet::where('token',$token)->first();

		$data =['dossier'=>$dossier];
		$pdf = PDF::loadView('Utils/Dossiers/printit',$data);
		return $pdf->stream($dossier->name.'.pdf');
	}

	public function printTranscotation($token){
		//dd(phpinfo());
		$projet = Transcotation::where('token',$token)->first();
		$data =['projet'=>$projet];
		$pdf = PDF::loadView('Utils/print_transcotation',$data);
		return $pdf->stream($projet->transitaire->sigle.'.pdf');
	}

	public function printFrncotation($token){
		//dd(phpinfo());
		$projet = Frncotation::where('token',$token)->first();
		$data =['projet'=>$projet];
		$pdf = PDF::loadView('Utils/print_frncotation',$data);
		return $pdf->stream($projet->fournisseur->sigle.'.pdf');
	}

	public function printProforma($token){
		//dd(phpinfo());
		$projet = Proforma::where('token',$token)->first();
		$data =['projet'=>$projet];
		$pdf = PDF::loadView('Utils/print_proforma',$data);
		return $pdf->stream($projet->client->sigle.$projet->name.'.pdf');
	}

	public function printFacture($token){

		$projet = Facture::where('token',$token)->first();
		$data =['facture'=>$projet];
		$pdf = PDF::loadView('Utils/print_facture',$data);
		return $pdf->stream($projet->name.'.pdf');
	}

	public function printForder($token){
		//dd(phpinfo());
		$projet = Forder::where('token',$token)->first();
		$data =['projet'=>$projet];
		$pdf = PDF::loadView('Utils/print_forder',$data);
		return $pdf->stream($projet->fournisseur->sigle.$projet->name.'.pdf');
	}

	public function printLivraison($token){
		//dd(phpinfo());
		$projet = Livraison::where('token',$token)->first();
		$data =['projet'=>$projet];
		$pdf = PDF::loadView('Utils/print_livraison',$data);
		return $pdf->stream('BL_'.$projet->client->sigle.$projet->name.'.pdf');
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
