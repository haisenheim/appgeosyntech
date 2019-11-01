<!DOCTYPE html>
<html>
@include('includes.head-tl3')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-dark navbar-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
       <a href="#" class="brand-link navbar-success">
             <img src="{{asset('img/logo-obac.png')}}" class="brand-image img-circle elevation-3"
                  style="opacity: .8">
             <span class="brand-text font-weight-light">OBAC ALERT</span>
           </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/angel/" class="nav-link">Accueil</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
            <a href="/angel/investissements" class="nav-link">

               INVESTISSEMENTS
            </a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
            <a href="/angel/opportunites" class="nav-link">
               OPPORTUNITES
            </a>
          </li>



      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
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
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div style="" class="">
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
                            <div class="carousel-content">

                                <div class="actif-description">
                                    <?php $desc= $slides['actif']->description ?>
                                    <p><?= \Illuminate\Support\Str::limit($desc,20) ?></p>

                                    <a class="btn btn-primary btn-sm" href="/angel/actif/{{$slides['actif']->token}}">Consulter</a>
                                </div>
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
