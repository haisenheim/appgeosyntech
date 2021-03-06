<!DOCTYPE html>
<html>
@include('includes.head')


<body style="font-size: .9rem" class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div id="bg-image" style="background-size: cover; background-image: url('{{ asset("img/background/img3.jpg")  }}'); background-repeat: no-repeat; background-position: center; bottom: 0; min-height: 100%;filter: blur(8px);-webkit-filter:blur(8px);"></div>
<div class="wrapper" id="full-wrapper" style="width: 100%; position: absolute; top: 0;">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/dashboard" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <?php $active = \Illuminate\Support\Facades\Session::get('active'); ?>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Rechercher" aria-label="Search">
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

          <span class="badge  navbar-badge"> <img style="max-height: 20px; max-width: 20px;" src="<?= Auth::user()->imageUri?asset('img/'. Auth::user()->imageUri):asset('img/avatar.png') ?>" class="img-circle" alt="{{ auth()->user()->username }}"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <small style="font-size: 0.7rem" class="dropdown-item dropdown-header"><?= Auth::user()->username ?> - <?= Auth::user()->email ?></small>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#user-profil-form">
            <i class="fas fa-pencil-alt mr-2"></i> Mon Profil

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
  <aside class="main-sidebar elevation-4 sidebar-dark-danger">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-dark">
      <img src="{{asset('img/logo.png')}}" alt="NM" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text text-danger text-bold"> GEOSYNTECH</span>
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
            <a href="/admin/dashboard" class="nav-link {{ $active==1?'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                TABLEAU DE BORD

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/admin/articles/" class="nav-link {{ $active==2?'active':'' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                CATALOGUE
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/clients" class="nav-link {{ $active==3?'active':'' }}">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                CLIENTS
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/fournisseurs" class="nav-link {{ $active==4?'active':'' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                PRESTATAIRES
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/projets" class="nav-link {{ $active==5?'active':'' }}">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                GESTION DE PROJETS
              </p>
            </a>
          </li>


          <li  class="nav-item has-treeview">
            <a href="#" class="nav-link {{ $active==6?'active':'' }}">
              <i class="nav-icon fas fa-search"></i>
              <p>
                 ANALYSE DATA
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/analyses/produits" class="nav-link">
                    <i class="far fa-circle text-danger nav-icon"></i>
                    <p>PRODUITS</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="/admin/analyses/achats" class="nav-link">
                  <i class="far fa-circle text-info nav-icon"></i>
                  <p>ACHATS</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/analyses/transit" class="nav-link">
                      <i class="far fa-circle text-success nav-icon"></i>
                      <p>TRANSIT</p>
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
  <div class="content-wrapper" style="margin-bottom: 5%">
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   