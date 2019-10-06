@extends('......layouts.angel')
@section('content')


 <div class="card ">


              <div class="card-body">
                    <h1 style="" class="page-header">Opportunités</h1>
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Projets d'investissement</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Acquisitions d'Actifs</a>
                      </li>

                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                      <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                        <div class="row">
                            @foreach($projets as $dossier)
                                 <div class="col-md-4 col-sm-12">
                                            <!-- Widget: user widget style 1 -->
                                            <div class="card card-widget widget-user">
                                              <!-- Add the bg color to the header using any of the bg-* classes -->
                                              <div class="widget-user-header text-white"
                                                   style="background: url('{{$dossier->imageUri?asset("img/".$dossier->imageUri):asset("img/logo-obac.png")}}') center center;">
                                                <h3 class="widget-user-username text-right">{{$dossier->name}}</h3>
                                                <h5 class="widget-user-desc text-right">Par {{$dossier->owner->name}}</h5>
                                              </div>
                                              <div class="widget-user-image">
                                                <img class="img-circle" src="{{isset($dossier->owner)?$dossier->owner->imageUri?asset("img/".$dossier->owner->imageUri):asset("img/avatar.png"):asset("img/avatar.png")}}" alt="User Avatar">
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
                            @endforeach
                        </div>

                      </div>
                      <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">

                      </div>

                    </div>





                     <table class="table table-striped projects" id="table-projets">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 38%">
                                        Projet
                                    </th>

                                    <th style="width: 20%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                 @foreach($projets as $dossier)
                                      <tr>
                                      <?php $projet = $dossier->projet ?>
                                          <td style="padding: 0" class="attachment-block"><img class="attachment-img" src="{{asset($projet->imageUri?'img/'.$projet->imageUri:'img/logo-obac.png')}}" alt=""></td>
                                          <td>
                                          <span class="text-bold text-lg-left">{{ $projet->name }}</span>- <small>{{ $projet->created_at?date_format($projet->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> <br/>

                                          <?= $projet->public?'<span class="badge badge-info">PUBLIC</span>':'<span class="badge badge-warning">PRIVE</span>' ?> - <small class="text-{{$projet->typecolor}}">{{$projet->type?$projet->type->name:'-'}}</small>
                                          </td>



                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-xs" href="/angel/opportunites/{{ $projet->token  }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Afficher
                                        </a>
                                    </td>
                                      </tr>
                                 @endforeach
                            </tbody>
                        </table>
                  </div>

 </div>






<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}} "></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {

    $('#table-projets').DataTable({
      "paging": true,
      "lengthChange": false,

      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection