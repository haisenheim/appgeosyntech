@extends('......layouts.national')
@section('content')

 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des dossiers</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <div class="card-body p-0">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 38%">
                          Projet
                      </th>
                      <th>Cout du projet</th>
                      <th style="width: 20%">
                          Consultant
                      </th>
                      <th>
                          Progression
                      </th>

                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($projets as $projet)
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }}</span>- <small>{{ $projet->created_at?date_format($projet->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> <br/>
                            <?= $projet->active?'<span class="badge badge-success">ACTIF</span>':'<span class="badge badge-danger">Bloqué</span>' ?> -
                            <?= $projet->public?'<span class="badge badge-info">PUBLIC</span>':'<span class="badge badge-warning">PRIVE</span>' ?>
                            </td>
                            <td>
                                {{$projet->montant}} <sup>{{ $projet->devise->abb }}</sup>
                            </td>

                            <td>{{$projet->consultant?$projet->consultant->name:'-'}}</td>
                            <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar progress-bar-striped bg-{{$projet->progresscolor}}" role="progressbar" aria-volumenow="{{$projet->progress }}" aria-volumemin="0" aria-volumemax="100" style="width: {{$projet->progress .'%'}} ">
                              </div>
                          </div>
                          <small>
                             Complet à {{$projet->progress}}%
                          </small>
                      </td>


                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-xs" href="/national/dossiers/{{ $projet->token  }}">
                              <i class="fas fa-folder">
                              </i>
                              Afficher
                          </a>

                          @if($projet->active)

                          <a class="btn btn-danger btn-xs" href="#">
                              <i class="fas fa-lock">
                              </i>
                              Désactiver
                          </a>
                          @else
                          <a class="btn btn-success btn-xs" href="#">
                              <i class="fas fa-unlock">
                              </i>
                              Activer
                          </a>
                         @endif
                      </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>
          <div class="">
              <ul class="pagination justify-content-end">
              {{ $projets->links() }}
          </ul>
          </div>
        </div>
        <!-- /.card-body -->
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