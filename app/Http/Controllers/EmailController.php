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
}