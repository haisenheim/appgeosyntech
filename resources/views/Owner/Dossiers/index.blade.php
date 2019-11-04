@extends('......layouts.owner')


@section('content')
    <div style="padding-top: 30px" class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 style="" class="card-title">GESTION DES PROJETS INDUSTRIELS</h3>
            </div>
            <div class="card-body">
                 <div class="row">
                     @foreach($dossiers as $projet)
                          <div class="col-md-3">
                            <!-- Widget: user widget style 1 -->
                            <a style="color:#555" href="/owner/dossiers/{{ $projet->token  }}">
                             <div class="card card-widget widget-user">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header text-white"
                                   style="background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}') center center;">
                                    <h3 style="font-weight: 900; color: #4caf50;" class="widget-user-username text-right"><?= $projet->name ?></h3>
                                    <h6 style="font-weight: 500;" class="widget-user-desc text-right">{{ $projet->consultant?$projet->consultant->name:'Aucun Consultant lié' }}</h6>
                              </div>
                              <div class="widget-user-image">
                                <img class="img-circle" src="{{$projet->consultant?$projet->consultant->imageUri? asset('img/'.$projet->consultant->imageUri):asset('img/avatar.png'):asset('img/avatar.png')}}" alt="User Avatar">
                              </div>
                              <div class="card-body">

                              </div>
                              <div style="padding: .75rem 1.25rem;" class="card-footer">
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
            </div>
            <div class="card-footer">
                 <div class="">
                    <ul class="pagination justify-content-end">
                      {{ $dossiers->links() }}
                    </ul>
                 </div>
            </div>
        </div>
     </div>

@endsection

@section('nav_actions')
<main>
    <nav class="floating-menu">
        <ul class="main-menu">
            <li>
                <a href="/owner/" class="ripple">
                    <i class="fas fa-home fa-lg"></i>
                </a>
            </li>

            <li>
                <a href="/owner/dossiers/create" class="ripple">
                    <i class="fa fa-plus-circle fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

@endsection