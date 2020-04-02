<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	/*
	 *  Login action
	 */

	public function login()
	{
		if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
			$user = Auth::user();
			$success['token'] = $user->createToken('appToken')->accessToken;
			//After successfull authentication, notice how I return json parameters
			return response()->json([
				'success' => true,
				'token' => $success,
				'user' => $user
			]);
		} else {
			//if authentication is unsuccessfull, notice how I return json parameters
			return response()->json([
				'success' => false,
				'message' => 'Invalid Email or Password',
			], 401);
		}
	}


	/**
	 * Register api.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'first_name' => 'required',
			'last_name' => 'required',
			'phone' => 'required|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required',
		]);
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'message' => $validator->errors(),
			], 401);
		}
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$input['token'] = sha1(date('Yhimds'));
		$user = User::create($input);
		$success['token'] = $user->createToken('appToken')->accessToken;
		return response()->json([
			'success' => true,
			'token' => $success,
			'user' => $user
		]);
	}


	/*
	 * Logout Action
	 */
	public function logout(Request $res)
	{
		if (Auth::user()) {
			dd(Auth::user());
			$user = Auth::user()->token();
			$user->revoke();

			return response()->json([
				'success' => true,
				'message' => 'Logout successfully'
			]);
		}else {
			return response()->json([
				'success' => false,
				'message' => 'Unable to Logout'
			]);
		}
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
