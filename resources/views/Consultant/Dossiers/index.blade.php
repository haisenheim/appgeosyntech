@extends('......layouts.consultant')
@section('content-header')
 <h3 class="page-header">GESTION DES PROJETS INDUSTRIELS</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">
                    @foreach($dossiers as $projet)

            <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <a style="color:#555" href="/consultant/dossiers/{{ $projet->token  }}">
             <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}') center center;">
                    <h3 style="font-weight: 900" class="widget-user-username text-right"><?= $projet->name ?></h3>
                    <h5 style="font-weight: 700" class="widget-user-desc text-right">{{ $projet->owner->name }}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{$projet->user?$projet->user->imageUri? asset('img/'.$projet->user->imageUri):asset('img/avatar.png'):asset('img/avatar.png')}}" alt="User Avatar">
              </div>
              <div class="card-body">

              </div>
              <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="description-block">
                          <h5 class="description-header"><i class="fa fa-map-marker"></i></h5>
                          <span class="description-text">{{ $projet->ville->name  }}</span>
                        </div>
                    </div>

                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="description-block">
                      <h5 class="description-header"><i class="fa fa-coins"></i></h5>
                      <span class="description-text">{{$projet->montant}} FCFA</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            </a>
            <!-- /.widget-user -->
          </div>

                    @endforeach

                </div>
                    <div class="">
                        <ul class="pagination justify-content-end">
                        {{ $dossiers->links() }}
                    </ul>
                    </div>
            </div>

@endsection