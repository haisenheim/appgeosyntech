<?php

namespace App\Http\Controllers\Contributeur;

use App\Http\Controllers\Controller;
use App\Models\Formation;
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



    public function index()
    {
        //
        $receptions = Message::all()->where('receptor_id',Auth::user()->id)->sortBy('created_at',null,true);
	    $envois = Message::all()->where('sender_id',Auth::user()->id);
	    $pays = Pay::all();
        return view('Contributeur/Messages/index')->with(compact('receptions','envois','pays'));

    }


	public function getSent()
	{
		//
		dd(Auth::user());
		$envois = Message::all()->where('sender_id',Auth::user()->id)->sortBy('created_at',null,true);
		$receptions = Message::all()->where('receptor_id',Auth::user()->id);
		$pays = Pay::all();
		return view('Contributeur/Messages/sent')->with(compact('receptions','envois','pays'));

	}


	public function disable($token){
		$message =  Message::updateOrCreate(['token'=>$token],['active'=>0]);

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

	        $message = $request->except('pay_id');
	        $message['token'] = sha1(Auth::user()->id . date('Ymdhsi'));
	        $message['annee']= date('Y');
	        $message['moi_id'] = date('m');
	        $message['sender_id'] = Auth::user()->id;
	        $message['role_id'] = Auth::user()->role_id;
	        Message::create($message);

            $request->session()->flash('success','votre message a été envoyé !!!');
            return redirect('/contributeur/mailbox');


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
	        Message::create($message);

            $request->session()->flash('success','votre message a été envoyé !!!');
            return redirect('/contributeur/mailbox');


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
	    $pays = Pay::all();


        return view('Contributeur/Messages/show')->with(compact('message','envois','receptions','pays'));
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
