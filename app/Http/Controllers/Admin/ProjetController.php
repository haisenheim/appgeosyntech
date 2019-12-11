<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Numero;
use App\Http\Controllers\Controller;
use App\Models\Earlie;
use App\Models\Facture;
use App\Models\Investissement;
use App\Models\Paiement;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Exception;

use PDF;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $projets = Projet::orderBy('created_at','desc')->paginate(20);
	    return view('/Admin/Projets/index')->with(compact('projets'));
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


	private function facturer($step, $projet_id){

		 $projet = Projet::find($projet_id);
		$num =str_pad(Numero::facture(),8,0,STR_PAD_LEFT);
		$facture_consultant = Facture::where('consultant',1)->where('moi_id',date('m'))->where('annee',date('Y'))->where('owner_id',$projet->expert_id)->first();
		if(!$facture_consultant){
			$facture_consultant = Facture::updateOrCreate(['name'=>$num.'EXP-'.date('Y'), 'moi_id'=>date('m'), 'annee'=>date('Y'), 'owner_id'=>$projet->expert_id, 'consultant'=>1,'token'=>sha1(Auth::user()->id.date('HsmdYi').'CONSULTANT')]);
		}

		$fapp_id =0;
		if($projet->owner){
			if($projet->owner->creator_id){
				if($projet->owner->creator->role_id==7) {
					$facture_apporteur = Facture::where('apporteur', 1)->where('moi_id', date('m'))->where('annee', date('Y'))->where('owner_id', $projet->owner->creator_id)->first();
					if (!$facture_apporteur) {
						$facture_apporteur = Facture::updateOrCreate(['name' => $num . 'APP-' . date('Y'), 'moi_id' => date('m'), 'annee' => date('Y'), 'owner_id' => $projet->owner->creator_id, 'apporteur' => 1, 'token' => sha1(Auth::user()->id . date('HsmdYi') . 'Apporteur')]);

					}
					$fapp_id = $facture_apporteur->id;
				}

			}
		}

		$facture_alliages = Facture::where('alliages',1)->where('moi_id',date('m'))->where('annee',date('Y'))->first();
		if(!$facture_alliages){
			$facture_alliages = Facture::updateOrCreate(['name'=>$num.'ALT-'.date('Y'), 'moi_id'=>date('m'), 'annee'=>date('Y'),  'alliages'=>1,'token'=>sha1(Auth::user()->id.date('HsmdYi').'ALLIAGES')]);
		}


		$paiement = Paiement::updateOrCreate(['moi_id'=>date('m'), 'annee'=>date('Y'), 'owner_id'=>$projet->owner_id,'projet_id'=>$projet->id,'step'=>$step,
			'montant'=>$projet->traite,'status'=>1,'facture_consultant_id'=>$facture_consultant->id,'facture_apporteur_id'=>$fapp_id,'facture_alliages_id'=>$facture_alliages->id, 'name'=>'Premier paiement dans le projet '.$projet->name,
			'montant_consultant'=>$projet->comexpert,'montant_apporteur'=>$projet->commission, 'montant_alliages'=>$projet->comalliages,
			'user_id'=>Auth::user()->id,'token'=>sha1(Auth::user()->id.date('HsmdYi').'Projet_etape1'.$projet->id)]);



		return $paiement;
	}

	/**
	 * Validation du premier paiement
	 */

	public function validateDiagInterne(Request $request, $token){
		$projet = Projet::where('token',$token)->first();
		if($projet->validated_step >= 1){
			$request->session()->flash('danger','Impossible de payer doublement pour la même étape!!!');
			return back();
		}
		$projet = Projet::updateOrCreate(['token'=>$token],['validated_step'=>1]);

		$paiement = $this->facturer(1,$projet->id);
		$data = [
			'title' => 'Paiement Premiere etape',
			'heading' => 'Paiement ETAPE 1 - '.$projet->name,

			'paiement'=>$paiement
		];

		$pdf = PDF::loadView('pdf_view',$data);
		//$request->session()->flash('success','Premier paiement enregistré avec succès!!!');
		return $pdf->download('recu-etape1-'. $projet->name.'.pdf');

	}

	/**
	 * Validation du deuxieme paiement
	 */

	public function validateDiagExterne(Request $request, $token){
		$projet = Projet::updateOrCreate(['token'=>$token],['validated_step'=>2]);
		if($projet->validated_step >= 2){
			$request->session()->flash('danger','Impossible de payer doublement pour la même étape!!!');
			return back();
		}
		$paiement = $this->facturer(2,$projet->id);
		$data = [
			'title' => 'Paiement Premiere etape',
			'heading' => 'Paiement ETAPE 2 - '.$projet->name,

			'paiement'=>$paiement
		];

		$pdf = PDF::loadView('pdf_view',$data);
		//$request->session()->flash('success','Premier paiement enregistré avec succès!!!');
		return $pdf->download('recu-etape 2 - '. $projet->name.'.pdf');
		//$request->session()->flash('success','Deuxieme paiement enregistré avec succès!!!');
		//return redirect()->back();
	}

	/**
	 * Validation du troisieme paiement
	 */

	public function validateDiagStrategique(Request $request, $token){
		$projet= Projet::updateOrCreate(['token'=>$token],['validated_step'=>3]);
		if($projet->validated_step >= 3){
			$request->session()->flash('danger','Impossible de payer doublement pour la même étape!!!');
			return back();
		}
		$paiement = $this->facturer(3,$projet->id);
		$data = [
			'title' => 'Paiement Premiere etape',
			'heading' => 'Paiement ETAPE 3 - '.$projet->name,

			'paiement'=>$paiement
		];

		$pdf = PDF::loadView('pdf_view',$data);
		//$request->session()->flash('success','Premier paiement enregistré avec succès!!!');
		return $pdf->download('recu-etape 3 - '. $projet->name.'.pdf');
		//$request->session()->flash('success','Troisieme paiement enregistré avec succès!!!');
		//return redirect()->back();
	}


	/**
	 * Validation du quatrieme paiement
	 */

	public function validateMontageFinancier(Request $request, $token){
		$projet = Projet::updateOrCreate(['token'=>$token],['validated_step'=>4]);
		if($projet->validated_step >= 4){
			$request->session()->flash('danger','Impossible de payer doublement pour la même étape!!!');
			return back();
		}
		$paiement = $this->facturer(4,$projet->id);
		$data = [
			'title' => 'Paiement Premiere etape',
			'heading' => 'Paiement ETAPE 4 - '.$projet->name,

			'paiement'=>$paiement
		];

		$pdf = PDF::loadView('pdf_view',$data);
		//$request->session()->flash('success','Premier paiement enregistré avec succès!!!');
		return $pdf->download('recu-etape 4 - '. $projet->name.'.pdf');
		//$request->session()->flash('success','Quatrieme paiement enregistré avec succès!!!');
		//return redirect()->back();
	}

	/*
	 * Bloquer le dossier
	 */
	public function disable(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['active'=>0]);
		$request->session()->flash('warning','Dossier bloqué avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Debloquer le dossier
	 */
	public function enable(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['active'=>1]);
		$request->session()->flash('success','Dossier débloqué avec succès!!!');
		return redirect()->back();
	}

	/*
	 *
	 */
	public function closeDoc(Request $request, $token){
		Investissement::updateOrCreate(['token'=>$token],['doc_juridique'=>0]);
		$request->session()->flash('success',' Fermeture de la documentation juridique!!!');
		return redirect()->back();
	}

	public function openDoc(Request $request, $token){
		Investissement::updateOrCreate(['token'=>$token],['doc_juridique'=>1]);
		$request->session()->flash('success',' Ouverture de la documentation juridique!!!');
		return redirect()->back();
	}

	/*
	 * Valider l'ordre de virement
	 */
	public function validateOrdre(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['ordrevirement_validated'=>1]);
		$request->session()->flash('success',' Ordre de virement validé!!!');
		return redirect()->back();
	}

	/*
	 * Valider l'ordre de virement
	 */
	public function unvalidateOrdre(Request $request, $token){
		Projet::updateOrCreate(['token'=>$token],['ordrevirement_validated'=>0]);
		$request->session()->flash('warning',' Ordre de virement rejeté!!!');
		return redirect()->back();
	}

	public function createLetter($token){
		$invest = Investissement::where('token',$token)->first();
		$letter = $invest->lettre;
		if($letter){
			// Creating the new document...
			$phpWord = new \PhpOffice\PhpWord\PhpWord();

			/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
			$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...

			$section->addText(
				'La présente lettre d’intention décrit les principales conditions et '
				.'modalités selon lesquelles l’investissement envisagé dans le projet  '. $invest->projet->name .'  pourrait être réalisé. '
			);

			$section->addText(
				'Elle ne constitue en aucun cas un engagement ferme et irrévocable des parties de procéder à cet investissement. '
			);

			$section->addText(
				'Cette lettre d’intention a été préparée sur la base et en l’état des informations reçues de la Société à ce jour, et particulièrement du business plan qui ont été préparés par les Fondateurs.'
			);

			$choix = '';
			if($invest->lettre->personnel){
				$choix = 'Mon compte personnel';
			}else{
				if($invest->angel->entreprise){
					$choix= $invest->angel->entreprise->name;
				}else{
					if($invest->angel->organisme){
						$choix = $invest->angel->organisme->name;
					}
				}
			}

			$section->addText(
				'Le montant total de l’investissement étant estimé à '. $invest->projet->montant .' ' . $invest->projet->devise->name.', je, soussigné, '. $invest->angel?$invest->angel->name:' Inconnu' .', agissant pour'. $invest->lettre->personnel?' Mon propre compte':' le compte de '.$choix.', manifeste le souhait de participer à cette opération sous forme de '. $invest->lettre->type->name .'  à hauteur de '.$invest->lettre->montant .' ' . $invest->lettre->devise->name
			);



			// Saving the document as OOXML file...
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			try{
				$objWriter->save(public_path('files/docs').'/Lettre_intention.docx');
			}catch (Exception $e){

			}

			return response()->download(public_path('files/docs').'/Lettre_intention.docx');



		}else{
			return back();
		}

	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
	    $projet = Projet::where('token',$token)->first();

	    $experts = User::all()->where('role_id',2);
	    return view('/Admin/Projets/show')->with(compact('projet','experts'));
    }

	public function addExpert(Request $request){
		$projet = Projet::find($request->id);
		$projet->expert_id = $request->expert_id;
		$projet->save();

		return redirect()->back();
	}



	public function getChoicesJson(Request $request){
		$projet = Projet::where('token',$request->id)->first();
		$choices = $projet->choices;

		$choix = [];
		foreach($choices as $choice){
			$choix[] = $choice->choice_id;
		}
		return response()->json($choix);
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
