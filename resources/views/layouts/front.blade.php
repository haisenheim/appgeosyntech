<!DOCTYPE html>
<html>
@include('includes.header-front')

<body>
    <div class="header">
                <div class="" style="" id="">
                    <ul style="float: right; margin-right: 65px; margin-bottom: 0" class="navbar-right list-inline">
                        <li class="list-inline-item">
                            <a href="/login">Se connecter</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/register">Créer un compte</a>
                        </li>

                    </ul>
                </div>
    		</div>
    		<div class="nav navbar navbar-dark navbar-expand-md">
                <div class="container">
                				<a class="navbar-brand" style="background: none; text-indent: 0" href="">OBAC ALERT</a>
                			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                			        <span class="navbar-toggler-icon"></span>
                			    </button>
                			    <div class="collapse navbar-collapse" id="navbarNav">
                			        <ul class="navbar-nav ml-auto">
                			            <li class="nav-item">
                			                <a class="nav-link" href="/">ACCUEIL</a>
                			            </li>
                			             <li class="nav-item">
                			                <a class="nav-link" href="/projets">TOUS LES PROJETS</a>
                			            </li>
                			            <li class="nav-item">
                			                <a class="nav-link" href="/about">A PROPOS</a>
                			            </li>
                			            <li class="nav-item">
                			                <a class="nav-link" href="http://cabinet-obac.com">OBAC</a>
                			            </li>
                			            <li class="nav-item">
                			                <a class="nav-link scroll-link" href="/contact">CONTACT</a>
                			            </li>
                			        </ul>
                			    </div>
                		    </div>
    		</div>

    <div class="content-header">
       @yield('content-header')

    </div>

    <section class="content">

       <div class="container">
            @include('includes.flash-message')
       </div>
        <div style="">
             @yield('content')
        </div>

    </section>



 @include('includes.footer-front')



</body>
</html>
