<?php

namespace App\Http\Controllers\Ro;

use App\Http\Controllers\Controller;
use App\User;




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


        return view('Ro/Users/index')->with(compact('users'));

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
        $user = User::where('token',$token)->first();

        return view('Ro/Users/show')->with(compact('user'));
    }



}
