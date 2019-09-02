@extends('layouts.app')


@section('content')
    <link rel="stylesheet" href="{{asset('css/login.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/util.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}"/>

<div class="" style="background-color: #666666; margin-top:-25px">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">

                                            <span class="login100-form-title p-b-30" style="margin-bottom: 13px">Création du compte</span>

                                                {{ csrf_field() }}

                                                 <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} wrap-input100 validate-input">

                                                    <input id="last_name" type="text" class="input100" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                                    <span class="focus-input100"></span>
                                                    <span class="label-input100">NOM</span>
                                                        @if ($errors->has('last_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>

                                                 <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} wrap-input100 validate-input">

                                                    <input id="first_name" type="text" class="input100" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                                    <span class="focus-input100"></span>
                                                    <span class="label-input100">PRENOM</span>
                                                        @if ($errors->has('first_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>

                                                 <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} wrap-input100 validate-input">

                                                    <input id="phone" type="text" class="input100" name="phone" value="{{ old('phone') }}" required>
                                                    <span class="focus-input100"></span>
                                                    <span class="label-input100">TELEPHONE</span>
                                                        @if ($errors->has('phone'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>


                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} wrap-input100 validate-input">

                                                    <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required autofocus>
                                                    <span class="focus-input100"></span>
                                                    <span class="label-input100">EMAIL</span>
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


                                                <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }} wrap-input100 validate-input">

                                                    <input id="password-confirm" type="password" class="input100" name="password-confirm"  required autofocus>
                                                    <span class="focus-input100"></span>
                                                    <span class="label-input100">CONFIRMATION</span>
                                                        @if ($errors->has('password-confirm'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>



                                                					<div class="container-login100-form-btn">
                                                                    			<button class="login100-form-btn">
                                                                    				ENREGISTRER
                                                                    			</button>
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