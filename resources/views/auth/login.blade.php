<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>OTC | OBAC TRAINING CENTER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-primary bg-pattern">
        <div class="home-btn d-none d-sm-block">
            <a href="/"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="/" class="logo"><img src="{{ asset('assets/img/logo.png') }}" height="24" alt="logo"></a>
                            <h5 class="font-size-16 text-white-50 mb-4">OBAC TRAINING CENTER</h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Se connecter à OTC pour continuer</h5>
                                    <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                         {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="username">EMAIL</label>
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Saisir votre adresse email">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="password">MOT DE PASSE</label>
                                                    <input name="password" type="password" class="form-control" id="password" placeholder="Saisir votre mot de passw">
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
