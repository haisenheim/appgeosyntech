@extends('layouts.angel')

@section('content-header')
     <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">CESSIONS D'ACTIFS</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">

                <div class="row">
                    @foreach($dossiers as $projet)


                     <div class="col-md-3 col-sm-12">


                    <!-- small card -->
                    <div class="small-box bg-success">
                      <div style="background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}')  cover;" class="inner">
                        <h3>{{ $projet->prix }}<sup style="font-size: 20px">{{ $projet->devise->abb }}</sup></h3>

                        <p>{{ $projet->name }}</p>
                      </div>

                      <a data-target="#viewModal" data-toggle="modal" href="#" class="small-box-footer">
                        Je suis intéressé(e) <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>


            <!-- Widget: user widget style 1 -->
                        <a style="color:#555" href="/angel/actifs/{{ $projet->token  }}">
                            <div class="card card-widget widget-user">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header text-white"
                                   style="background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}') center center;">
                                   <div style="background: #EEEEEE;">
                                   <h3 style="font-weight:900; color: #4caf50;" class="widget-user-username text-right"><?= $projet->name ?></h3>
                                    <h5 style="font-weight: 700;color: #4caf50;" class="widget-user-desc text-right">{{ $projet->owner->name }}</h5>
                                   </div>

                              </div>
                              <div class="widget-user-image">
                                <img class="img-circle" src="{{$projet->user?$projet->user->imageUri? asset('img/'.$projet->user->imageUri):asset('img/avatar.png'):asset('img/avatar.png')}}" alt="User Avatar">
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
            </div>

@endsection

@section('action')

@endsection