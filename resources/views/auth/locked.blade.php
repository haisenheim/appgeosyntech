<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>OTC | OBAC TRAINING CENTER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

        <!-- Bootstrap Css -->
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-success bg-pattern">
        <div class="home-btn d-none d-sm-block">
            <a href="/"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5 pt-5">
            <div class="container">


                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">ECRAN DE VERROUILLAGE</h5>


                                    <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                         {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <img src="{{ asset(auth()->user()->imageUri?auth()->user()->imageUri:'img/avatar.png')  }}" class="rounded-circle avatar-lg img-thumbnail mx-auto d-block" alt="thumbnail">
                                                </div>


                                                <div class="form-group mb-4">
                                                    <label for="password">MOT DE PASSE</label>
                                                    <input required="required" name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Saisir votre mot de passw">

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Se souvenir de moi</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="/reset-password" class="text-muted"><i class="mdi mdi-lock"></i> Vous avez oublié votre mot de passe?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Se Connecter</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="/contact" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Contacter nous pour avoir un compte</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
