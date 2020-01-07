<?php

namespace App\Http\Controllers\Contributeur;

use App\Http\Controllers\Controller;
use App\Models\Bilan;
use App\Models\Choice;
use App\Models\ChoicesProjet;
use App\Models\Concurrent;
use App\Models\Cour;
use App\Models\Devise;
use App\Models\Environnement;
use App\Models\Formation;
use App\Models\Investissement;
use App\Models\Modele;
use App\Models\Module;
use App\Models\Moi;
use App\Models\ProduitsProjet;
use App\Models\Projet;
use App\Models\Question;
use App\Models\Reportbilan;
use App\Models\Reportresultat;
use App\Models\Resultat;
use App\Models\Segment;
use App\Models\Tags;
use App\Models\TagsProjet;
use App\Models\Tinvestissement;
use App\Models\Tprojet;
use App\Models\Variante;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prevbilan;
use App\Models\Prevresultat;
use App\Models\Prevtresorerie;
use PHPUnit\Framework\Exception;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $formations = Formation::orderBy('created_at','desc')->where('owner_id',Auth::user()->id)->paginate(10);
        return view('/Contributeur/Formations/index')->with(compact('formations'));
    }


	public function getTestModule($token){
		$module = Module::where('token',$token)->first();

		return view('Contributeur/Formations/module_test')->with(compact('module'));
	}


	public function saveQuestion(Request $request){
		$token = $request->token;
		$module = Module::where('token',$token)->first();
		$choices = $request->donnees;
		$question = ['name'=>$request->name, 'module_id'=>$module->id];
		$question = Question::create($question);
		foreach($choices as $ch){
			$choice = new Choice();
			$choice->question_id = $question->id;
			$choice->name = $ch['name'];
			$choice->ok = $ch['ok'];
			$choice->save();
		}

		return response()->json($question);
	}

	public function store(Request $request)
	{
		//dd($request->all());
		$formation = new Formation();
		$formation->name=$request->name;
		$formation->description = $request->description;
		$formation->owner_id = Auth::user()->id;
		$formation->chaire_obac =0;
		//$formation->free = isset($request['free'])?1:0;
		//$formation->interne = isset($request['interne'])?1:0;
		$token = sha1(Auth::user()->id. date('ydmhis'));
		$formation->token = $token;
		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/formations')) {
					mkdir(public_path('img') . '/formations');
				}

				if (file_exists(public_path('img') . '/formations/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/formations/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/formations'), $name);
				$formation->imageUri = 'formations/' . $name;
			}
		}

		$formation->save();

		$request->session()->flash('success','La formation a été correctement enregistrée !!!');
		return back();
	}

	public function addModule(Request $request){
		$token = $request->token;
		$data = $request->except(['_token','token']);
		$formation = Formation::where('token',$token)->first();
		$data['token'] = sha1($formation->id . Auth::user()->id . date('Yhsimd'));
		$data['formation_id'] = $formation->id;
		$data['free'] = isset($request->free)?1:0;
		$data['owner_id'] = Auth::user()->id;

		$data = Module::create($data);

		return back();
	}


	public function addCours(Request $request){
		$token = $request->token;
		$data = $request->except(['_token','token']);
		$module = Module::where('token',$token)->first();
		$token = sha1($module->id . Auth::user()->id . date('Yhsimd'));
		$data['token'] = $token;
		$data['module_id'] = $module->id;

		$data['owner_id'] = Auth::user()->id;

		if($request->audioUri){
			$file = $request->audioUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('mp3');
			if(in_array($ext,$arr_ext)) {
				if(!file_exists(public_path('podcasts')))
					mkdir(public_path('podcasts'),0777,true);
				$file->move(public_path('podcasts'),$token.'.'.$ext);
				$data['audioUri'] = $token.'.'.$ext;
			}else{
				$request->session()->flash('danger','L\'extension de votre fichier audio n\'est pas correcte !!!');
				return back();
			}

		}

		if($request->videoUri){
			$file = $request->videoUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('mp4');
			if(in_array($ext,$arr_ext)) {
				if(!file_exists(public_path('videos')))
					mkdir(public_path('videos'),0777,true);
				$file->move(public_path('videos'),$token.'.'.$ext);
				$data['videoUri'] = $token.'.'.$ext;
			}else{
				$request->session()->flash('danger','L\'extension de votre fichier video n\'est pas correcte !!!');
				return back();
			}

		}

		if($request->pdfUri){
			$file = $request->pdfUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('pdf');
			if(in_array($ext,$arr_ext)) {
				if(!file_exists(public_path('pdf')))
					mkdir(public_path('pdf'),0777,true);
				$file->move(public_path('pdf'),$token.'.'.$ext);
				$data['pdfUri'] = $token.'.'.$ext;
			}else{
				$request->session()->flash('danger','L\'extension de votre fichier pdf video n\'est pas correcte !!!');
				return back();
			}
		}

		$data = Cour::create($data);

		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Pay  $pay
	 * @return \Illuminate\Http\Response
	 */
	public function show($token)
	{
		//
		$formation = Formation::where('token',$token)->first();

		return view('Contributeur/Formations/show')->with(compact('formation'));
	}



	public function showModule($token)
	{
		//
		$module = Module::where('token',$token)->first();

		return view('Contributeur/Formations/show_module')->with(compact('module'));
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
