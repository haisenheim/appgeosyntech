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
       <a href="#" class="brand-link navbar-success" style="color: #FFFFFF; width: 500px">
             <img src="{{asset('img/logo-obac.png')}}" class="brand-image img-circle elevation-3"
                  style="opacity: .8">
             <span class="brand-text font-weight-light">OBAC ALERT  </span> - <strong> {{ \Illuminate\Support\Facades\Auth::user()->entreprise->name }} </strong>
           </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/adminentr/" class="nav-link">Accueil</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
            <a href="/adminentr/dossiers" class="nav-link">
               DOSSIERS
            </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
            <a href="/adminentr/angels" class="nav-link">
               BUSINESS ANGELS
            </a>
      </li>




      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
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
    <div style="height: 300px;" class="content-header bg-gradient-gray">
        <div>
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
