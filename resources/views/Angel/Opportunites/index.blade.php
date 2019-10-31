@extends('......layouts.angel')
@section('content-header')
 <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">OPPORTUNITES D'INVESTISSEMENT</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <h4>PROJETS DE LEVEES DE CAPITAUX</h4>
                <div class="row">
                    @foreach($projets as $projet)

                         <div class="col-md-3">
                            <!-- Widget: user widget style 1 -->
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
                                <button data-name="<?= $projet->name ?>" data-toggle="modal" data-target="#IpM" class="btn-block btn-success btn-sm btn-p">CE PROJET M'INTERESSE</button>
                              </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endforeach
                </div>
                    <div class="">
                        <ul class="pagination justify-content-end">
                        {{ $projets->links() }}
                    </ul>
                  </div>

          <hr/>
            <h4>CESSIONS D'ACTIFS</h4>
                <div class="row">
                    @foreach($actifs as $projet)

                         <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <a style="color:#555" href="/angel/actifs/{{ $projet->token  }}">
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
                      <span class="description-text">{{$projet->prix}} FCFA</span>
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
                        {{ $actifs->links() }}
                    </ul>
                  </div>
    </div>

    <div  class="modal fade modal-lg" id="IpM">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4  class="modal-title project-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>


    <script>
        $('#btn-p').click(function(e){
            e.preventDefault();
            $('.project_name').text($(this).data('name'));
        });
    </script>

@endsection