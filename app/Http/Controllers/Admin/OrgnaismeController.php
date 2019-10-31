<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devise;
use App\Models\Organisme;
use App\Models\Pay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganismeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $organismes = Organisme::orderBy('created_at','desc')->paginate(10);
	    return view('Admin/Organismes/index')->with(compact('organismes'))->with('success');
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
		//dd($request->imageUri);
		$ville = new Organisme();
		$ville->name = $request['name'];

		$ville->address = $request['address'];
		$ville->phone = $request['phone'];
		$ville->type_id = $request['type_id'];
		$ville->email = $request['email'];
		$ville->description = $request['description'];
		$ville->token = sha1(Auth::user()->id. date('Ymdhis'));

		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/organismes')) {
					mkdir(public_path('img') . '/organismes');
				}
				$token = sha1(date('ydmhis'));
				if (file_exists(public_path('img') . '/organismes/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/organismes/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/organismes'), $name);
				$ville->imageUri = 'organismes/' . $name;
			}

		}

		$ville->save();
		$request->session()->flash('success','L\'organisme financier a été correctement enregistré !!!');
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
