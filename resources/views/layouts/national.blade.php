<!DOCTYPE html>
<html>
@include('includes.head-tl3')

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/national/dashboard" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" data-toggle="modal" data-target="#obac-contact-form" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">





      <!-- Profil Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">

          <span class="badge  navbar-badge"> <img style="max-height: 20px; max-width: 20px;" src="<?= Auth::user()->imageUri?asset('img/'. Auth::user()->imageUri):asset('img/avatar.png') ?>" class="img-circle" alt="User Image"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <small style="font-size: 0.7rem" class="dropdown-item dropdown-header"><?= Auth::user()->name ?> - <?= Auth::user()->email ?></small>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item nav-profil-link" data-toggle="modal" data-target="#user-profil-form">
            <i class="fas fa-pencil-alt mr-2"></i> Mon Profil

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item nav-contact-obac-link" data-toggle="modal" data-target="#obac-contact-form">
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
  <aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-info">
      <img src="{{asset('img/logo-obac.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text" style="font-weight: 700; font-size: 11px">OBAC TRAINING CENTER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= Auth::user()->imageUri?asset('img/'. Auth::user()->imageUri):asset('img/avatar.png') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= Auth::user()->name ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item">
            <a href="/national/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                TABLEAU DE BORD
              </p>
            </a>
          </li>


            <li class="nav-item">
            <a href="/national/experts" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                CONSULTANTS
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/national/contributeurs" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                CONTRIBUTEURS
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/national/centres" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                ECOLES PARTENAIRES
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/national/entreprises" class="nav-link">
              <i class="nav-icon fas fa-bank"></i>
              <p>
                CLIENTS CORPORATE
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="/national/members" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                CLIENTS ORDINAIRES
              </p>
            </a>
          </li>

          <li  class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                 FORMATIONS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/national/formations" class="nav-link">
                    <i class="far fa-circle text-danger nav-icon"></i>
                    <p>CONTRIBUTIONS</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/national/chaires" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>CHAIRE OBAC</p>
                    </a>
                </li>


            </ul>
          </li>


          <li  class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                 FINANCES
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/national/finances/performance" class="nav-link">
                    <i class="far fa-circle text-danger nav-icon"></i>
                    <p>PERFORMANCE</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/national/finances/creances-client" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>CREANCES CLIENT</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/national/finances/factures/non-payees" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>FACTURES A PAYER</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/national/finances/factures/payees" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>FACTURES PAYEES</p>
                    </a>
                </li>
            </ul>
          </li>

          <li  class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                PARAMETRES
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul style="overflow-y: scroll;" class="nav nav-treeview">

              <li class="nav-item">
                <a href="/national/villes" class="nav-link">
                  <i class="far fa-circle text-info nav-icon"></i>
                  <p>Villes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/national/users" class="nav-link">
                  <i class="far fa-circle text-primary nav-icon"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>


            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       @yield('content-header')
       @yield('nav_actions')
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

       <div class="container">
            @include('includes.flash-message')
       </div>
       <div class="">
            <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
            @yield('content')

       </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('includes.footer')
</body>
</html>
