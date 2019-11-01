@extends('......layouts.angel')
@section('content-header')
 <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">MES INVESTISSEMENTS</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">


         <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">MES INVESTISSEMENTS</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">PROJETS DE LEVEE DE FONDS</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                        <div class="row">
                    @foreach($investissements as $investissement)
                        <?php $projet = $investissement->projet ?>
                         <div class="col-md-3">
                            <!-- Widget: user widget style 1 -->
                             <div class="card card-widget widget-user position-relative">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header text-white"
                                   style="background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover">
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-primary">
                                            {{$projet->montant}} FCFA
                                        </div>
                                    </div>
                                    <h3 style="font-weight: 900" class="widget-user-username text-left"><?= $projet->name ?></h3>
                                    <h5 style="font-weight: 700" class="widget-user-desc text-right">{{ $projet->owner->name }}</h5>
                              </div>
                              <div class="widget-user-image">
                                <img class="img-circle" src="{{$projet->user?$projet->user->imageUri? asset('img/'.$projet->user->imageUri):asset('img/avatar.png'):asset('img/avatar.png')}}" alt="User Avatar">
                              </div>
                              <div class="card-body">

                              </div>
                              <div style="padding: .75rem 1rem" class="card-footer ">
                                <div class="row">
                                    <div class="col-md-12">
                                          <span class="description-text"><i class="fa fa-map-marker"></i> {{ $projet->ville->name  }}</span>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="btn-app">

                                      <span class="badge bg-info">{{ $projet->total }}</span>
                                      <i class="fas fa-users"></i> Users

                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="progress">
                                              <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="{{ $projet->pourcentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $projet->pourcentage }}%">
                                                <span class="sr-only">{{ $projet->pourcentage }}% recouvert</span>
                                              </div>
                                        </div>
                                    </div>
                                  <!-- /.col -->
                                </div>
                                <?php if($investissement->validated): ?>
                                <a href="/angel/dossiers/{{ $projet->token }}" class="btn btn-block btn-outline-success btn-xs btn-p">DATA ROOM</a>
                                <!-- /.row -->
                                <?php endif ?>
                              </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endforeach
                </div>
                <div class="">
                        <ul class="pagination justify-content-end">
                        {{ $investissements->links() }}
                    </ul>
                  </div>
                  </div>
                  <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
    </div>



    <script>
        $('.btn-p').click(function(e){
            e.preventDefault();
            $('.project-title').text($(this).data('name'));
            var token = $(this).data('token');
            var teaser = $('#teaser-'+token).html();
            $('#teaser-content').html(teaser);
        });
    </script>

@endsection