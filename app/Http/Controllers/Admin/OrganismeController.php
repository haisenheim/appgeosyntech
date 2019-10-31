<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devise;
use App\Models\Organisme;
use App\Models\Pay;
use App\Models\Torganisme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganismeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $organismes = Organisme::orderBy('created_at','desc');
	    $types = Torganisme::all();
	    $pays = Pay::all();
	    return view('Admin/Organismes/index')->with(compact('organismes','types','pays'))->with('success');
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
		$ville = new Organisme();
		$data = [
			'name'=>$request['name'],
			'address'=>$request['address'],
			'phone'=>$request['phone'],
			'type_id'=>$request['type'],
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
				if (!file_exists(public_path('img') . '/organismes')) {
					mkdir(public_path('img') . '/organismes');
				}
				$token = sha1(date('ydmhis'));
				if (file_exists(public_path('img') . '/organismes/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/organismes/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/organismes'), $name);
				$data['imageUri'] = 'organismes/' . $name;
			}

		}

		$organisme = Organisme::create($data);
		if($organisme){
			$user_data = array(
				'last_name' => $request->last_name,
				'first_name' => $request->first_name,
				'role_id' => 4,
				'email' => $request->user_email,
				'password' => Hash::make($request->password),
				'gender' => $request->gender,
				'address' => $request->user_address,
				'phone' => $request->user_phone,
				'token' => sha1(Auth::user()->id. date('Ymdhis')),
				'organisme_id' => $organisme->id,
				'pay_id'=>$organisme->pay_id,


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
		$request->session()->flash('success','L\'organisme financier a été correctement enregistré !!!');
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
