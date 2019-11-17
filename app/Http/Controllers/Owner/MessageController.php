<?php

namespace App\Http\Controllers\Owner;

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
        $receptions = Message::all()->where('receptor_id',Auth::user()->id)->sortBy('created_at',null,true);
	    $envois = Message::all()->where('sender_id',Auth::user()->id);
	    $projets =  Projet::all()->where('owner_id',Auth::user()->id);
	    $users = collect([]);
	    foreach($projets as $projet){
		    $invests = $projet->investissements;
		    foreach($invests as $inv){
			    $users = $users->add($inv->angel);
		    }
	    }

	    $angels= $users->unique();

        return view('Owner/Messages/index')->with(compact('receptions','envois','angels'));

    }

	public function getInvestissements(Request $request){
		$id = $request->query('id');
		$investissements = Investissement::all()->where('angel_id',$id);
		foreach($investissements as $inv){
			$inv->projet;
		}

		return response()->json($investissements);
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
	        Message::create($message);

            $request->session()->flash('success','votre message a été envoyé !!!');
            return redirect('/owner/mailbox');


    }


	public function reply(Request $request)
    {
        //
        //dd($request->imageUri);

	        $msg = Message::where('token',$request->message_id)->first();

	        //$message = $request->input();
	        $message['token'] = sha1(Auth::user()->id . date('Ymdhsi'));
	        $message['annee']= date('Y');
	        $message['moi_id'] = date('m');
	        $message['sender_id'] = Auth::user()->id;
	        $message['role_id'] = Auth::user()->role_id;
	        $message['body']=$request->body;
	        $message['replied_id'] = $msg->id;
	        $message['subject'] = $msg->subject;
	        $message['receptor_id'] = $msg->sender_id;
	        $message['reply']=1;
	        $message['investissement_id']=$msg->investissement_id;
	        $message['cession_id'] = $msg->cession_id;
	        $message['concession_id']=$msg->concession_id;
	        Message::create($message);

            $request->session()->flash('success','votre message a été envoyé !!!');
            return redirect('/owner/mailbox');


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
	    $msg = Message::updateOrCreate(['token'=>$token],['lu'=>1]);
	    $receptions = Message::all()->where('receptor_id',Auth::user()->id);
	    $envois = Message::all()->where('sender_id',Auth::user()->id);
	    $projets =  Projet::all()->where('owner_id',Auth::user()->id);
	    $users = collect([]);
	    foreach($projets as $projet){
		    $invests = $projet->investissements;
		    foreach($invests as $inv){
			    $users = $users->add($inv->angel);
		    }
	    }

	    $angels= $users->unique();

        return view('Owner/Messages/show')->with(compact('message','envois','receptions','angels'));
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
