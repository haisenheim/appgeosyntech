<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investissement;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $projets = Infrastructure::orderBy('created_at','desc')->paginate(10);
	    return view('/Admin/Infrastructures/index')->with(compact('projets'));
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
	 * Validation du premier paiement
	 */

	public function validateDiagInterne(Request $request, $token){

		Infrastructure::updateOrCreate(['token'=>$token],['validated_step'=>1]);
		$request->session()->flash('success','Premier paiement enregistré avec succès!!!');

		return redirect()->back();
	}

	/**
	 * Validation du deuxieme paiement
	 */

	public function validateDiagExterne(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['validated_step'=>2]);
		$request->session()->flash('success','Deuxieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}

	/**
	 * Validation du troisieme paiement
	 */

	public function validateDiagStrategique(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['validated_step'=>3]);
		$request->session()->flash('success','Troisieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}


	/**
	 * Validation du quatrieme paiement
	 */

	public function validateMontageFinancier(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['validated_step'=>4]);
		$request->session()->flash('success','Quatrieme paiement enregistré avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Bloquer le dossier
	 */
	public function disable(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['active'=>0]);
		$request->session()->flash('warning','Dossier bloqué avec succès!!!');
		return redirect()->back();
	}

	/*
	 * Debloquer le dossier
	 */
	public function enable(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['active'=>1]);
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
		Infrastructure::updateOrCreate(['token'=>$token],['ordrevirement_validated'=>1]);
		$request->session()->flash('success',' Ordre de virement validé!!!');
		return redirect()->back();
	}

	/*
	 * Valider l'ordre de virement
	 */
	public function unvalidateOrdre(Request $request, $token){
		Infrastructure::updateOrCreate(['token'=>$token],['ordrevirement_validated'=>0]);
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
     * @param  \App\Models\Infrastructure  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
	    $projet = Infrastructure::where('token',$token)->first();

	    $experts = User::all()->where('role_id',2);
	    return view('/Admin/Infrastructures/show')->with(compact('projet','experts'));
    }

	public function addExpert(Request $request){
		$projet = Infrastructure::find($request->id);
		$projet->expert_id = $request->expert_id;
		$projet->save();

		return redirect()->back();
	}



	public function getChoicesJson(Request $request){
		$projet = Infrastructure::where('token',$request->id)->first();
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
     * @param  \App\Models\Infrastructure  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Infrastructure $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infrastructure  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infrastructure $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infrastructure  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
