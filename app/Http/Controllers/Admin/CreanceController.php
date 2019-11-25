<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actif;
use App\Models\Creance;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;

class CreanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $dossiers = Creance::orderBy('created_at','desc')->paginate(10);

	    return view('/Admin/Creances/index')->with(compact('dossiers'));
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
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
	    $projet = Creance::where('token',$token)->first();
	    //dd($projet);

	    $experts = User::all()->where('role_id',2);
	    return view('/Admin/Creances/show')->with(compact('projet','experts'));
    }

	public function addExpert(Request $request){
		$projet = Creance::find($request->id);
		$projet->expert_id = $request->expert_id;
		$projet->save();

		return redirect()->back();
	}

	public function disable($id){
		$projet = Creance::where('token',$id)->first();
		$projet->active = 0;
		$projet->save();

		return redirect()->back();
	}

	public function enable($id){
		$projet = Creance::where('token',$id)->first();
		$projet->active = 1;
		$projet->save();

		return redirect()->back();
	}

	public function pay($id){
		$projet = Creance::where('token',$id)->first();
		$projet->validated = 1;
		$projet->save();

		return redirect()->back();
	}

	public function close($id){
		$projet = Creance::where('token',$id)->first();
		$projet->clos = 1;
		$projet->save();

		return redirect()->back();
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
