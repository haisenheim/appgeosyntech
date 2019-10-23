<?php



?>
<!DOCTYPE html>
<html>
@include('includes.head')
<body style="">
<div class="image-fond--"></div>
<div class="contenu">
<nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 0; box-shadow: 0 7px 7px #CCC ">
    <div class="container-fluid" style="color: #4b6584">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"  aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder"><i class=""  style="color: red ;font-size: 34px"><img class="logo-obac" src="{{asset('img/logo-obac.png')}}" alt=""/></i> &nbsp;&nbsp; OBAC ALERT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/consultant/dashboard"><i class="fa fa-home"></i></a>
                </li>

                <li>
                    <a href="/consultant/dossiers/"><i class="fa fa-th-large" ></i>&nbsp; DOSSIERS</a>
                </li>
                <li>
                    <a href="/consultant/actifs/"><i class="fa fa-book" ></i>&nbsp; CESSIONS</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                 <span style="padding: 10px; position: absolute; top:2px; right: 30px;">
                      @yield("action")
                 </span>

                 </li>
               <li>
                <span style="color: white; box-shadow: none; padding: 10px 0 0 0 " class=" btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                   <i class="glyphicon glyphicon-user"></i>&nbsp;<?= \Illuminate\Support\Facades\Auth::user()->name ?>
               </span>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                       <li>
                           <a href="/profil"><i class="fa fa-user"></i>&nbsp; MON PROFIL</a>
                       </li>
                       <li>
                           <a href="/logout"><i class="fa fa-undo"></i>&nbsp; DECONNEXION</a>
                       </li>
                   </ul>
               </li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<h5 style="background-color: #4caf50; color: #FFFFFF; margin-top: -9px;margin-bottom: 0; padding-top: 15px" class="page-header"><span style="margin-left:30px ">ESPACE DU CONSULTANT - <span class="" style="text-shadow: 1px 1px 2px black">OBAC</span></span> <span class="page-title pull-right" style="margin-right: 30px"><?= !empty($title)?$title:'' ?></span> </h5>
<div class="container">

</div>
<div class="container-fluid" id="front-wrapper" style="margin-bottom: 1px">
    <div class="container">
        @include('includes.flash-message')
    </div>
    <div class="" style="background-color: #AAAAAA; min-height: 200px; padding: 0 -15px">
        @yield('page_header')
    </div>
    <div class="">
        @yield('content')
    </div>
     @include('includes.footer')
</div>


</div>
</body>
</html>

<style>
    .navbar-inverse .navbar-nav > li > a{
        color: #FFFFFF;
        font-size: 12px;
    }

    .navbar-inverse .navbar-nav > li >a > i{

        font-size: 20px;
    }
</style>



