<?php

namespace App\Http\Controllers\Rf;

use App\Http\Controllers\Controller;

use App\Models\Client;


use Illuminate\Support\Facades\DB;




class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	    $clients = Client::all();


        return view('Rf/Clients/index')->with(compact('clients'));

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
        $client = Client::where('token',$token)->first();


        return view('Rf/Clients/show')->with(compact('client'));
    }


	public function addSecteur(){
		$competence = DB::table('clients_secteurs')->where(['secteur_id'=>request('secteur_id'),'client_id'=>request('client_id')])->first();
		//dd($competence);
		if(!$competence){
			DB::table('clients_secteurs')->insert(['secteur_id'=>request('secteur_id'),'client_id'=>request('client_id')]);
			request()->session()->flash('success','Ok !!!');
		}else{
			request()->session()->flash('warning','Secteur present !!!');
		}

		return redirect()->back();
	}




	public function deleteSecteur($client_id,$secteur_id){
		DB::table('clients_secteurs')->where(['secteur_id'=>$secteur_id,'client_id'=>$client_id])->delete();
		return redirect()->back();
	}


}
