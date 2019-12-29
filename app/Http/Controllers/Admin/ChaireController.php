<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Formation;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Organisme;
use App\Models\Pay;
use App\Models\Torganisme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ChaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $formations = Formation::all()->where('chaire_obac',1)->sortByDesc('created_at')->paginate(10);

	    return view('Admin/Chaire/index')->with(compact('formations'));
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
		dd($request->all());
		$formation = new Formation();
		$formation->name=$request->name;
		$formation->description = $request->description;
		$formation->owner_id = Auth::user()->id;
		$formation->chaire_obac =1;
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        //
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
