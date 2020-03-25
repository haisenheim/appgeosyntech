<!doctype html>
<html lang="fr">
    <?php use Illuminate\Support\Facades\Auth; ?>
    <head>
        <meta charset="utf-8" />
        <title>SM | SITRAD - MANAGEMENT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- slick css -->
        <link href="{{ asset('assets/libs/slick-slider/slick/slick.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/slick-slider/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="{{ asset('assets/libs/jqvmap/jqvmap.min.css') }} " rel="stylesheet" />
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

                <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <style>
            .pull-right{
                float: right;
            }

            .index-item{
                border: 1px #ccc solid;
                padding: 8px;
                border-radius: 10px;
                margin-top:5px;
            }

            .img-center{
                margin: 5px auto;
                max-width: 150px;
            }

            td>ul.list-inline{
                margin-bottom: 0;
            }

            .btn.btn-xs{
                font-size: 0.7rem;
                padding: 4px;
            }

           .card> div.card-header{
                background-color: #fff;
            }
        </style>

    </head>