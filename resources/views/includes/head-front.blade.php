<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>OTC | OBAC TRAINING CENTER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="OBAC TRAINING CENTER" name="description" />
        <meta content="Themesdesign" name="Clement ESSOMBA" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

        <!-- slick css -->
        <link href="{{ asset('assets/libs/slick-slider/slick/slick.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/slick-slider/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="{{ asset('assets/libs/jqvmap/jqvmap.min.css')}} " rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/footer-front.css') }}" rel="stylesheet" type="text/css" />

        <script>
          document.addEventListener("DOMContentLoaded", function(){
          $('.preloader-background').delay(1000).fadeOut('slow');

          $('.preloader-wrapper')
            .delay(1000)
            .fadeOut();
          });
        </script>

        <style>
            .carousel-item {
              height: 80vh;
              min-height: 350px;
              background: no-repeat center center scroll;
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }

            #nav-search-input::placeholder{
                color: #FFFFFF;
            }


            .preloader-background {
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #eee;
                position: fixed;
                z-index: 100;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
              }

              .topnav .navbar #topnav-menu-content .nav-link.active, .topnav .navbar #topnav-menu-content .dropdown.active>a{
                  color:#28a745;
              }

              .topnav .navbar #topnav-menu-content .dropdown-item.active, .topnav .navbar #topnav-menu-content .dropdown-item:hover {
                  color:#28a745;
              }
        </style>

    </head>