<?php

namespace App\Http\Controllers\Rf;

use App\Http\Controllers\Controller;
use App\Models\Certificat;
use App\User;
use Illuminate\Http\Request;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $users= \App\User::all()->where('role_id',8);


        return view('Rf/Users/index')->with(compact('users'));

    }

	public function showCertif($token){
		$cert = Certificat::where('token',$token)->first();
		return response()->file(public_path('files').'/'.$cert->path);
		//$now = Carbon::now();
		//$week = $now->month;
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
        $user = User::where('token',$token)->first();

        return view('Rf/Users/show')->with(compact('user'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ville $ville)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ville $ville)
    {
        //
    }
}
