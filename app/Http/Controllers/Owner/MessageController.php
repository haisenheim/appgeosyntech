<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Pay;
use App\Models\Projet;
use App\Models\Ville;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
        //
        $receptions = Message::all()->where('receptor_id',Auth::user()->id);
	    $envois = Message::all()->where('sender_id',Auth::user()->id);
	    //$investissemens = Pay::all();
       // dd($villes);
       // echo "Bonjour tout le monde!!";
       // $request->session()->flash('message','Liste des villes!!!');
        return view('Owner/Messages/index')->with(compact('receptions','envois'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pays = Pay::all();
        return view('Admin/Villes/create')->with(compact('pays'));
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

	        $message = $request->input();
	        $message['token'] = sha1(Auth::user()->id . date('Ymdhsi'));
	        $message['annee']= date('Y');
	        $message['moi_id'] = date('m');
	        $message['sender_id'] = Auth::user()->id;
	        $message['role_id'] = Auth::user()->role_id;
	        Message::createOrUpdate([$message]);

            $request->session()->flash('success','votre message a été envoyé !!!');
            return redirect('/owner/messages');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        $message = Message::where('token',$token)->first();
        return view('Owner/Messages/show')->with(compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function edit(Ville $ville)
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
