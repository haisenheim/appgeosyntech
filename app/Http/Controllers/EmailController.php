<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public function sendEmail(Request $request)
	{
		$data['title'] = $request->email;
		$data['message'] = $request->message;
		$data['name']= $request->name;


		Mail::send('email', $data, function($message) use ($request) {


			$message->to('ormsystem2018@gmail.com', 'FRONT OFFICE')

				->subject($request->objet);
		});

		if (Mail::failures()) {
			$request->session()->flash('danger','Echec !!!');
			return back();
		}else{
			$request->session()->flash('danger','Echec !!!');
			return back();
		}
	}



	public function contact(Request $request){

		Mail::send('email', ['name'=>$request->name, 'email'=>$request->email, 'message'=>$request->message, 'objet'=>$request->objet], function ($message) use($request) {

			$message->from($request->email, 'Email du frontOffice');

			$message->to('admin@obac-alert.com')->subject($request->objet);

		});

		//dd(Mail::failures());

		return redirect()->action('IndexController@contact')->withConfirmation("Votre message a bien été envoyé");

	}
}