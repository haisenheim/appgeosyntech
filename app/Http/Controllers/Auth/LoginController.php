<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

	protected function authenticated(Request $request, $user)
	{
		//
		if(Auth::user()->role_id==4) {
			$projet = DB::table('projets')->get(['name', 'montant', 'imageUri'])->last();
			$actif = DB::table('actifs')->get(['name', 'prix', 'imageUri', 'description', 'token'])->last();
			$slider = ['projet' => $projet, 'actif' => $actif];
			Session::put('slides', $slider);
		}
	}

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
