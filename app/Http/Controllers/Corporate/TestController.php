<?php

namespace App\Http\Controllers\Corporate;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Centre;

use App\User;
use Illuminate\Support\Facades\Hash;


use App\Models\Pay;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $agendas = Agenda::all()->where('consultant_id',Auth::user()->id);
	    //$pays = Pay::all();
	    return view('Corporate/Agenda/index')->with(compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

	public function getAgendaItems(){
		$items = Agenda::all()->where('owner_id');

		return response()->json($items);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




	public function store(Request $request)
	{

		$data = [
			'name'=>$request['name'],
			'address'=>$request['address'],
			'phone'=>$request['phone'],

			'pay_id'=>Auth::user()->pay_id,
			'creator_id'=>Auth::user()->id,
			'agence_id'=>Auth::user()->agence_id,
			'description'=>$request['description'],
			'email'=>$request['email'],
			'token'=>sha1(Auth::user()->id. date('Ymdhis'))
		];



		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/centres')) {
					mkdir(public_path('img') . '/centres');
				}
				$token = sha1(date('ydmhis'));
				if (file_exists(public_path('img') . '/centres/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/centres/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/centres'), $name);
				$data['imageUri'] = 'centres/' . $name;
			}

		}

		$centre = Centre::create($data);
		if($centre){
			Validator::make($data, [
				'email' => [
					'required',
					Rule::unique('users')
				],
			]);
			$user_data = array(
				'last_name' => $request->last_name,
				'first_name' => $request->first_name,
				'role_id' => 4,
				'email' => $request->user_email,
				'password' => Hash::make($request->password),
				'male' => $request->gender,
				'address' => $request->user_address,
				'phone' => $request->user_phone,
				'remember_token' => sha1(Auth::user()->id. date('Ymdhis')),
				'centre_id' => $centre->id,
				'pay_id'=>$centre->pay_id,
				'creator_id'=>Auth::user()->id,
				'token'=> sha1(Auth::user()->id . date('YmHisd'))


			);

			if($request->user_imageUri){
				$file = $request->user_imageUri;
				$ext = $file->getClientOriginalExtension();
				$arr_ext = array('jpg','png','jpeg','gif');
				if(in_array($ext,$arr_ext)) {
					if (!file_exists(public_path('img') . '/users')) {
						mkdir(public_path('img') . '/users');
					}
					$token = sha1(date('ydmhis'));
					if (file_exists(public_path('img') . '/users/' . $token . '.' . $ext)) {
						unlink(public_path('img') . '/users/' . $token . '.' . $ext);
					}
					$name = $token . '.' . $ext;
					$file->move(public_path('img/users'), $name);
					$user_data['imageUri'] = 'users/' . $name;
				}
			}

			User::create($user_data);
		}
		$request->session()->flash('success','Le centre  a été correctement enregistré !!!');
		return back();
	}

	public function disable($token){
		$centre = Centre::updateOrCreate(['token'=>$token],['active'=>0]);
		$centre->users()->update(['active'=>0]);
		//User::updateOrCreate(['centre_id'=>$centre->id],['active'=>0]);

		return back();
	}

	public function enable($token){
		$centre = Centre::updateOrCreate(['token'=>$token],['active'=>1]);
		$centre->users()->update(['active'=>1]);
		//User::updateOrCreate(['centre_id'=>$centre->id],['active'=>1]);
		return back();
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
	    $centre = Centre::where('token',$token)->first();

	    return view('Corporate/Centres/show')->with(compact('centre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay $pay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay $pay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
        //
    }
}
