<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public function sendEmail(Request $request)
	{
		$data['title'] = "This is Test Mail Tuts Make";

		Mail::send('emails.email', $data, function($message) {


			$message->to('ormsystem2018@gmail.com', 'FRONT OFFICE')

				->subject('Un mail en provenance du front office');
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