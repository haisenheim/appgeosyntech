<html>

<head>

		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>OBAC ALERT</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/media-queries.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/carousel.css')}}">


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset('front/ico/favicon.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('front/ico/apple-touch-icon-144-precomposed.png')}}">

         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
                <style type="text/css">
                    #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                       width: 100%; /* important! if you need full width display */
                       height: 640px;
                       margin-top: 60px;
                       border-radius: 5px;
                                   	/* ... */
                    }
                </style>


        <style>



            .header {
              width:100%;
              height:30px;
              font-size:10px;
              color:#FFFFFF;
              background: #212529;
              font-weight:bold;
            }

            .nav {
              width:100%;
              height:60px;
              font-size:20px;
              line-height:60px;
              background:#28a745;
              color:#fff;
              position:relative;
              margin-bottom:-60px;
              z-index:3;
              text-transform:uppercase;
            }


            .sticky {
              position:fixed;
              top:0;
              z-index: 999999;
              padding: 0;
              height: 60px;
            }
            .sticky a{
                font-weight: 900;
            }

            p {
              line-height:2;
            }
            .navbar-right a{
                color: #FFFFFF;
                text-decoration: none;
                border-bottom: none;
            }

            .content{
                margin-top: 60px;
                min-height: 75vh;
            }
        </style>
    </head>


