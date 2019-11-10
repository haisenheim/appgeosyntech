@extends('......layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">

                <div class="card card-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-gradient-info">
                    <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="<?= $client->imageUri?asset('img/'.$client->imageUri):asset('img/avatar.png') ?>" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{ $client->name }}</h3>
                    <h5 class="widget-user-desc">Lead Developer</h5>
                  </div>
                  <div class="card-footer p-0">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Dossiers de financements <span class="float-right badge bg-primary"> {{ $client->projets->count() }}</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Cessions d'actifs <span class="float-right badge bg-info"> {{ $client->actifs->count() }}</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Dossiers de financements clôturés <span class="float-right badge bg-success">12</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Cessions d'actif clôturées <span class="float-right badge bg-danger">842</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h2>{{ $client->name }}</h2>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">DOSSIERS CLIENTS</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection