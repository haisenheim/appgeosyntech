<?php

namespace App\Http\Controllers\Angel;

use App\Http\Controllers\Controller;
use App\Models\Investissement;
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
	    //$projets =  Projet::all()->where('owner_id',Auth::user()->id);
	    $users = collect([]);

		    $invests = Investissement::all()->where('angel_id',Auth::user()->id);
		    foreach($invests as $inv){
			    if($inv->projet){
				    $users = $users->add($inv->projet->owner);
			    }
			    if($inv->earlie){
				    $users = $users->add($inv->earlie->owner);
			    }

		    }


	    $angels= $users->unique();

        return view('Angel/Messages/index')->with(compact('receptions','envois','angels'));

    }

	public function getInvestissements(Request $request){
		$id = $request->query('id');
		$investissements = Investissement::all()->where('angel_id',$id);
		foreach($investissements as $inv){
			$inv->projet;
		}

		return response()->json(compact('investissements'));
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
	        Message::create($message);

            $request->session()->flash('success','votre message a été envoyé !!!');
            return redirect('/angel/mailbox');


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
	    $receptions = Message::all()->where('receptor_id',Auth::user()->id);
	    $envois = Message::all()->where('sender_id',Auth::user()->id);
        return view('Angel/Messages/show')->with(compact('message','receptions','envois'));
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
