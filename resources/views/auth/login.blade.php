<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>GM | GEOSYNTECH MANAGEMENT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="GEOSYNTECH ERP By ALLIAGES TECHNOLOGIES" name="description" />
        <meta content="CLEMENT ESSOMBA" name="author" />
        <!-- App favicon -->

        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
        <!-- Bootstrap Css -->
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg bg-pattern" style="background-color: #FFFFFF">
        <div class="home-btn d-none d-sm-block">
            <a href="/"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="/" class="logo"><img src="{{ asset('img/logo-alliages.png') }}" height="170" alt="Ici le logo" ></a>
                            <h1 style="font-weight: 900; text-shadow: 2px 1px #eee; font-size: 40px; font-family: 'Eras'; color: #000000; " class="mb-4">ALLIAGES ERP</h1>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">

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
                                                    <input name="password" type="password" class="form-control" id="password" placeholder="Saisir votre mot de passe">
                                                </div>


                                                <div class="mt-4">
                                                    <button class="btn btn-dark btn-block waves-effect waves-light" type="submit">Se Connecter</button>
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
