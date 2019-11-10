@extends('......layouts.commercial')

@section('content')

    <div style="padding: 20px;" class="container-fluid">
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
                    <h6 class="widget-user-desc"> {{ $client->phone }} - <small>{{ $client->email }}</small></h6>
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
                          Dossiers de demande financements complets <span class="float-right badge bg-success"> {{ $client->projets->where('validated_step',4)->count() }}</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Dossiers de demande financements incomplets <span class="float-right badge bg-danger"> {{ $client->projets->where('validated_step','!=',4)->count() }}</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Cessions d'actifs <span class="float-right badge bg-info"> {{ $client->actifs->count() }}</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">DOSSIERS CLIENTS</h5>
                    </div>
                    <div class="card-body">
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
                                      MONTANT
                                  </th>
                                  <th>
                                      Progression
                                  </th>

                              </tr>
                          </thead>
                          <tbody>


                               @foreach($client->projets as $projet)
                                    <tr>
                                        <td>#</td>
                                        <td>
                                        <span class="text-bold text-lg-left">{{ $projet->name }}</span>- <small>{{ $projet->created_at?date_format($projet->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> <br/>
                                        <?= $projet->active?'<span class="badge badge-success">ACTIF</span>':'<span class="badge badge-danger">Bloqué</span>' ?>

                                        </td>

                                        <td>{{$projet->montant}} {{ $projet->devise->name }}</td>
                                        <td class="project_progress">
                                      <div class="progress progress-sm">
                                          <div class="progress-bar progress-bar-striped bg-{{$projet->progresscolor}}" role="progressbar" aria-volumenow="{{$projet->progress }}" aria-volumemin="0" aria-volumemax="100" style="width: {{$projet->progress .'%'}} ">
                                          </div>
                                      </div>
                                      <small>
                                         Complet à {{$projet->progress}}%
                                      </small>
                                  </td>



                                    </tr>
                               @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>




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
      "autoWidth": false,
    });
  });
</script>


@endsection