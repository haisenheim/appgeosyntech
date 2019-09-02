@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/login.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/util.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}"/>

<div class="" style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">

                                            <span class="login100-form-title p-b-43" style="margin-bottom: 43px">Se connecter pour continuer</span>

                                                {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} wrap-input100 validate-input">

                                                    <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required autofocus>
                                                    <span class="focus-input100"></span>
                                                    <span class="label-input100">ADRESSE EMAIL</span>
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>

                                                <div class="wrap-input100 validate-input form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                                        <input id="password" type="password" class="input100" name="password" required>
                                                        <span class="focus-input100"></span>
                                                         <span class="label-input100">MOT DE PASSE</span>
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif

                                                </div>

                                                <div class="flex-sb-m w-full p-t-3 p-b-32">
                                                						<div class="contact100-form-checkbox">
                                                							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                							<label class="label-checkbox100" for="ckb1">
                                                								Se rappeler de moi
                                                							</label>
                                                						</div>

                                                						<div>
                                                							<a href="{{ route('password.request') }}" class="txt1">
                                                								Mot de passe oublié?
                                                							</a>
                                                						</div>
                                                					</div>

                                                					<div class="container-login100-form-btn">
                                                                    			<button class="login100-form-btn">
                                                                    				Se connecter
                                                                    			</button>
                                                                    		</div>

                                                                    		<div class="text-center p-t-46 p-b-20">
                                                                    			<a href="{{ route('register') }}" class="txt2">
                                                                    				ou alors créer un compte
                                                                    			</a>
                                                                    		</div>

                                                                    		<div class="login100-form-social flex-c-m">
                                                                    			<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                                                                    				<i class="fa fa-facebook-f" aria-hidden="true"></i>
                                                                    			</a>

                                                                    			<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                                                                    				<i class="fa fa-twitter" aria-hidden="true"></i>
                                                                    			</a>
                                                                    </div>

                 </form>
                <div class="login100-more" style="background-image:  url('{{asset('img/logo-obac.png')}}');">
                </div>
            </div>
        </div>
    </div>

</div>


<!--===============================================================================================-->
	<script src="{{asset('js/login/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/login/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/login/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('js/login/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/login/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/login/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('js/login/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/login/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/login/main.js')}}"></script>

@endsection
