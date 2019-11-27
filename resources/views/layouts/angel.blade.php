<!DOCTYPE html>
<html>
@include('includes.head-tl3')

<body class="layout-navbar-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-dark navbar-success">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="{{asset('img/logo-obac.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">OBAC ALERT</span>
      </a>

      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">ACCUEIL</a>
        </li>

        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">MES INVESTISSEMENTS</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

            <!-- Level two dropdown-->
            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">LEVEE DE FONDS</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="/angel/investissements/dossiers" class="dropdown-item">PROJETS INDUSTRIELS ET DE SERVICE</a>
                </li>
                <li>
                  <a tabindex="-1" href="/angel/investissements/projets" class="dropdown-item">PROJETS EN PHASE DE DEMARRAGE</a>
                </li>

              </ul>
            </li>





            <!-- Level two dropdown-->
            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">CESSIONS</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="/angel/cessions/actifs" class="dropdown-item">CESSIONS D'ACTIFS</a>
                </li>
                <li>
                  <a tabindex="-1" href="/angel/cessions/creances" class="dropdown-item">CESSIONS DE CREANCES</a>
                </li>

              </ul>
            </li>
            <!-- End Level two -->

            <!-- Level two dropdown-->
            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">FINANCEMENTS STRUCTURES</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="/angel/concessions/partenariats" class="dropdown-item">Partenariats Public-Privé </a>
                </li>
                <li>
                  <a tabindex="-1" href="#" class="dropdown-item">Ressources Naturelles</a>
                </li>

              </ul>
            </li>

          </ul>
        </li>

        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">OPPORTUNITES D'INVESTISSEMENT</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">LEVEE DE FONDS</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="/angel/dossiers" class="dropdown-item">PROJETS INDUSTRIELS ET DE SERVICE</a>
                </li>
                <li>
                  <a tabindex="-1" href="/angel/projets" class="dropdown-item">PROJETS EN PHASE DE DEMARRAGE</a>
                </li>

              </ul>
            </li>

            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">CESSIONS</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="/angel/actifs" class="dropdown-item">CESSIONS D'ACTIFS</a>
                </li>
                <li>
                  <a tabindex="-1" href="/angel/creances" class="dropdown-item">CESSIONS DE CREANCES</a>
                </li>

              </ul>
            </li>

            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">FINANCEMENTS STRUCTURES</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="/angel/partenariats" class="dropdown-item">Partenariats Pulic-Privé</a>
                </li>
                <li>
                  <a tabindex="-1" href="#" class="dropdown-item">Ressources Naturelles</a>
                </li>

              </ul>
            </li>


          </ul>
        </li>


        <li class="nav-item d-none d-sm-inline-block">
          <a href="/angel/mailbox" class="nav-link">MESSAGERIE</a>
        </li>
      </ul>


    <?php
        use \Illuminate\Support\Facades\Auth;
     ?>
       <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
             <!-- Notifications Dropdown Menu -->
                   <li class="nav-item dropdown">
                     <a class="nav-link" data-toggle="dropdown" href="#">
                       <i class="far fa-bell"></i>
                       <span class="badge badge-warning navbar-badge">12</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                       <span class="dropdown-item dropdown-header">12 Notifications</span>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item">
                         <i class="fas fa-envelope mr-2"></i> 4 nouveaux projets
                         <span class="float-right text-muted text-sm">3 mins</span>
                       </a>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item">
                         <i class="fas fa-users mr-2"></i>8 cessions d'actifs
                         <span class="float-right text-muted text-sm">12 hours</span>
                       </a>


                     </div>
                   </li>

               <!-- Actions Dropdown Menu -->
               <li class="nav-item dropdown">
                 @yield('nav_actions')
               </li>
               <!-- Profil Dropdown Menu -->
               <li class="nav-item dropdown">
                 <a class="nav-link" data-toggle="dropdown" href="#">
                   <span class="badge  navbar-badge"> <img style="max-height: 20px; max-width: 20px;" src="<?= Auth::user()->imageUri?asset('img/'.Auth::user()->imageUri):asset('img/avatar.png') ?>" class="img-circle"></span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                   <small style="font-size: 0.7rem" class="dropdown-item dropdown-header"><?= Auth::user()->name ?> - <?= Auth::user()->email ?></small>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item">
                     <i class="fas fa-pencil-alt mr-2"></i> Mon Profil
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="/angel/tags" class="dropdown-item">
                       <i class="far fa-circle text-info mr-2"></i>
                       Mots Clefs
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item">
                     <i class="fas fa-envelope mr-2"></i> Contacter OBAC

                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="/logout" class="dropdown-item">
                     <i class="fas fa-switch-off mr-2"></i> Se Déconnecter
                   </a>



                 </div>
               </li>


             </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="">
<div style="height: 300px;" class="content-header">
            <?php $slides = \Illuminate\Support\Facades\Session::get('slides'); //dd($slides); ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div style="min-height: 300px; background: url('{{$slides['projet']->imageUri? asset('img/'.$slides['projet']->imageUri):asset('img/logo-obac.png')}}'); background-size: cover">
                            <div class="carousel-content">
                                <div class="carousel-title">{{ $slides['projet']->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div  class="carousel-item">
                        <div style="min-height: 300px; background: url('{{$slides['actif']->imageUri? asset('img/'.$slides['actif']->imageUri):asset('img/logo-obac.png')}}'); background-size: cover">
                            <div style=" " class="carousel-content">


                            </div>

                        </div>
                    </div>

                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

     </div>

    <!-- Main content -->
    <section class="content">
       <div class="container">
            @include('includes.flash-message')
       </div>
        <div style="">
            <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
             @yield('content')
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->



   @include('includes.footer')
</div>


</body>
</html>
