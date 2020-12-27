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
        <style>
            body, html{
                height: 100%;
            }
            *{
                box-sizing: border-box;
            }

            .bg-image{
                background-image: url("{{ asset('img/background/img6.jpg') }}");
                filter: blur(8px);
                -webkit-filter:blur(8px);
                height: 100%;
                background-position:center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .login-box{
                background-color: transparent;
                color: white;

                font-weight: bold;
                position: absolute;
                top:50%;
                left: 50%;
                transform: translate(-50%,-50%);
                z-index: 2;
                width: 35%;
                padding: 20px;
                text-align: center;
                border-radius: 50%;

            }
        </style>

    </head>

    <body>
    <div class="bg-image"></div>
        <div class="login-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-2">
                            <a href="/" class="logo"><img src="{{ asset('img/logo-light.jpg') }}" height="120" alt="Ici le logo" ></a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="justify-content-center">
                    <div style="width: 80%; margin-left: auto; margin-right: auto"  class="">
                        <div class="" style="background-color: transparent; border: none">
                            <div class="card-header" style="background-color: transparent">
                                <h1 class="text-center" style="font-weight: 900; text-shadow: 2px 1px #eee; font-size: 40px; font-family: 'Eras'; color: #000000; ">ALLIAGES ERP</h1>
                            </div>
                            <div class="card-body p-4">
                                <div class="p-2">

                                    <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                         {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-2">

                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Saisir votre adresse email">
                                                </div>
                                                <div class="form-group mb-2">

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
                            <div class="">
                                <h6 class="text-center"><span style="font-weight: 200; font-style: italic; color: orangered">By <img height="100" src="{{ asset('img/logo-alliages.png') }}" alt=""/></span></h6>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div>

    </body>
</html>
