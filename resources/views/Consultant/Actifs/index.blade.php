@extends('......layouts.consultant')

@section('page_header')
    <h3 class="page-header">GESTION DES CESSIONS D'ACTIFS</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">

                <div class="row">
                    @foreach($dossiers as $projet)
                    <div class="col-sm-12 col-md-3">
                    <div class="widget widget-success">
                        <div style="padding-left: 10px" class="widget-header">
                             <h5 class="widget-title">{{ $projet->name }}</h5>
                        </div>
                        <div class="widget-content">
                            <div class="">
                                <div class="">
                                    <span style="font-weight: 600; font-size: 1.3rem" class="text-primary"><i class="fa fa-th-large"></i> {{  $projet->tactif->name }}</span>
                                </div>
                                <div class="text text-danger text-bold"> <i class="fa fa-credit-card"></i> {{ $projet->prix }} </div>
                                <div class="">
                                    <span class=""><i class="fa fa-user"></i> {{  $projet->owner->name }}</span>
                                </div>
                            </div>
                            <div>
                                <span class=""><i class="fa fa-map-marker"></i> {{ $projet->ville->name  }}</span>
                                <span class="pull-right"><a class="btn btn-success btn-xs" href="/consultant/actifs/{{ $projet->token  }}"> Afficher </a></span>
                            </div>
                        </div>
                    </div>
                     </div>
                    @endforeach

            <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('../dist/img/photo1.png') center center;">
                <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
                <h5 class="widget-user-desc text-right">Web Designer</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>

                </div>
            </div>

@endsection

@section('action')

@endsection