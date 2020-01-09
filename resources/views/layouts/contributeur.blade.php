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
        <a href="#" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#obac-contact-form">Contact</a>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php $active = \Illuminate\Support\Facades\Session::get('active'); //dd($slides); ?>
      <!-- Actions Dropdown Menu -->
      <li class="nav-item dropdown">
        @yield('nav_actions')
      </li>

   

      <!-- Profil Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">

          <span class="badge  navbar-badge"> <img style="max-height: 20px; max-width: 20px;" src="<?= Auth::user()->imageUri?asset('img/'.Auth::user()->imageUri):asset('img/avatar.png') ?>" class="img-circle" alt="User Image"></span>
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
      <img src="{{asset('img/logo-obac.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">OBAC ALERT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= Auth::user()->imageUri?asset('img/'.Auth::user()->imageUri):asset('img/avatar.png') ?>" class="img-circle elevation-2" alt="User Image">
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
            <a href="/contributeur/formations" class="nav-link {{ $active==2?'active':'' }}">
              <i class="nav-icon text-success fas fa-users"></i>
              <p>
                MES FORMATIONS
              </p>
            </a>
          </li>
          <li  class="nav-item has-treeview">
            <a href="#" class="nav-link {{ $active==3?'active':'' }}">
              <i class="nav-icon fa fa-coins text-info"></i>
              <p>
                FINANCES
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/contributeur/finances/creances" class="nav-link">
                    <i class="far fa-circle text-danger nav-icon"></i>
                    <p>CREANCES</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="/contributeur/finances/payees" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FACTURES PAYEEs</p>
                </a>
                </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/contributeur/mailbox" class="nav-link {{ $active==5?'active':'' }}">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                MESSAGERIE
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/contributeur/manuel" class="nav-link {{ $active==4?'active':'' }}">
              <i class="nav-icon text-success fas fa-book-open"></i>
              <p>
                MANUEL UTILISATEUR
              </p>
            </a>
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
    <div style="height: 180px; " class="content-head bg-gradient-info">
        <div>
           <h1 style="margin-top: 3%" class="content-title text-center">@yield('page-title')</h1>
             @yield('nav_actions')
        </div>
     </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

       <div class="container">
            @include('includes.flash-message')
       </div>
       <div style="margin-top: 20px" class="">

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
 @yield('scripts')
</body>
</html>
