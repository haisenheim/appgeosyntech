<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Organisme;
use App\Models\Pay;
use App\Models\Torganisme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $entreprises = Entreprise::all();
	    $pays = Pay::all();
	    return view('Admin/Organismes/index')->with(compact('organismes','pays'));
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
		//$ville = new Organisme();
		$data = [
			'name'=>$request['name'],
			'address'=>$request['address'],
			'phone'=>$request['phone'],

			'pay_id'=>$request['pay_id'],
			'description'=>$request['description'],
			'email'=>$request['email'],
			'token'=>sha1(Auth::user()->id. date('Ymdhis'))
		];

		/*$ville->name = $request['name'];

		$ville->address = $request['address'];
		$ville->phone = $request['phone'];
		$ville->type_id = $request['type_id'];
		$ville->email = $request['email'];
		$ville->description = $request['description'];
		$ville->token = sha1(Auth::user()->id. date('Ymdhis'));*/

		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/entreprises')) {
					mkdir(public_path('img') . '/entreprises');
				}
				$token = sha1(date('ydmhis'));
				if (file_exists(public_path('img') . '/entreprises/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/entreprises/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/entreprises'), $name);
				$data['imageUri'] = 'entreprises/' . $name;
			}

		}

		$entreprise = Organisme::create($data);
		if($entreprise){
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
				'entreprise_id' => $entreprise->id,
				'pay_id'=>$entreprise->pay_id,
				'creator_id'=>Auth::user()->id


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
		$request->session()->flash('success','L\'entreprise financier a été correctement enregistré !!!');
		return back();
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        //
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
