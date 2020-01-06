<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Entreprise;
use App\Models\Formation;
use App\Models\Module;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Organisme;
use App\Models\Pay;
use App\Models\Torganisme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $formations = Formation::all()->where('chaire_obac',0)->sortByDesc('created_at')->paginate(10);

	    return view('Admin/Formations/index')->with(compact('formations'));
    }


	public function disable($token){
		$user = Formation::updateOrCreate(['token'=>$token],['active'=>0]);

		return back();
	}

	public function enable($token){
		$user = Formation::updateOrCreate(['token'=>$token],['active'=>1]);

		return back();
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
		//dd($request->all());
		$formation = new Formation();
		$formation->name=$request->name;
		$formation->description = $request->description;
		$formation->owner_id = Auth::user()->id;
		$formation->chaire_obac =0;
		$formation->free = isset($request['free'])?1:0;
		$formation->interne = isset($request['interne'])?1:0;
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

	    return view('Admin/Formations/show')->with(compact('formation'));
    }



	public function showModule($token)
	{
		//
		$module = Module::where('token',$token)->first();

		return view('Admin/Formations/show_module')->with(compact('module'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay $pay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay $pay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        //
    }
}
