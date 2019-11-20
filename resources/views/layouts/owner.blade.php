<!DOCTYPE html>
<html>
@include('includes.head-tl3')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-dark navbar-success fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
       <a href="#" class="brand-link navbar-success" style="color: #FFFFFF">
             <img src="{{asset('img/logo-obac.png')}}" class="brand-image img-circle elevation-3"
                  style="opacity: .8">
             <span class="brand-text font-weight-light">OBAC ALERT</span>
           </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">ACCUEIL</a>
      </li>

       <li class="nav-item dropdown">
         <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">MES DOSSIERS</a>
         <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <!-- Level two dropdown-->
            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">LEVEE DE FONDS</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="/owner/dossiers" class="dropdown-item">PME</a>
                </li>
                <li>
                  <a tabindex="-1" href="/owner/projets" class="dropdown-item">EARLY STAGE</a>
                </li>

              </ul>
            </li>
            <!-- End Level two -->
           <!-- Level two dropdown-->
           <li class="dropdown-submenu dropdown-hover">
             <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">CESSIONS</a>
             <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
               <li>
                 <a tabindex="-1" href="/owner/actifs" class="dropdown-item">CESSIONS D'ACTIFS</a>
               </li>
               <li>
                 <a tabindex="-1" href="/owner/creances" class="dropdown-item">CESSIONS DE CREANCES</a>
               </li>

             </ul>
           </li>
           <!-- End Level two -->


            <!-- Level two dropdown-->
           <li class="dropdown-submenu dropdown-hover">
             <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">FINANCEMENTS STRUCTURES</a>
             <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
               <li>
                 <a tabindex="-1" href="/owner/ressources" class="dropdown-item">RESSOURCES NATURELLES</a>
               </li>
               <li>
                 <a tabindex="-1" href="/owner/partenariats" class="dropdown-item">PPP</a>
               </li>

             </ul>
           </li>
           <!-- End Level two -->


         </ul>
       </li>

           <li class="nav-item d-none d-sm-inline-block dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#"> MES DOSSIERS </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="/owner/dossiers" class="dropdown-item">
                 LEVEES DE FONDS
              </a>

              <div class="dropdown-divider"></div>
              <a href="/owner/actifs" class="dropdown-item">
                CESSIONS D'ACTIFS
              </a>
              <div class="dropdown-divider"></div>
              <a href="/owner/financements" class="dropdown-item">
                FINANCEMENTS STRUCTURES
              </a>


            </div>
          </li>

          <li class="nav-item d-none d-sm-inline-block dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#"> MODELES DE DOCUMENT </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="/owner/letter/pacte-associes" class="dropdown-item">
                 PACTE D'ASSOCIES
              </a>

              <div class="dropdown-divider"></div>
              <a href="/owner/letter/contrat-pret" class="dropdown-item">
                CONTRAT DE PRET
              </a>
              <div class="dropdown-divider"></div>
              <a href="/owner/letter/contrat-cession-actif" class="dropdown-item">
                CONTRACT DE CESSION D'ACTIF
              </a>

              <div class="dropdown-divider"></div>
              <a href="/owner/letter/contrat-cession-creance" class="dropdown-item">
                CONTRAT DE CESSION DE CREANCE
              </a>
              <div class="dropdown-divider"></div>
              <a href="/owner/letter/contrat-concession" class="dropdown-item">
                CONTRACT DE CONCESSION
              </a>
            </div>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <a href="/owner/mailbox" class="nav-link">
               MESSAGERIE
            </a>
          </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">CONTACT</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
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
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div style="" class="">

    <div style="height: 240px; " class="content-head bg-gradient-success">
        <div>
           <h1 class="content-title text-center">@yield('page-title')</h1>
             @yield('nav_actions')
        </div>
     </div>



    <!-- Main content -->
    <section class="content">

       <div class="container">
            @include('includes.flash-message')
       </div>
        <div style="background: url({{asset('img/logo-obac.png')}}); background-size: cover">
            <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
             @yield('content')
        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



 @include('includes.footer')
</div>
<!-- ./wrapper -->


</body>
</html>
