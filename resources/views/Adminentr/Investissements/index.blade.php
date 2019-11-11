@extends('......layouts.adminentr')
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
                      <th style="width: 20%">
                          Chargé d'affaires
                      </th>
                      <th>Date</th>

                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($investissements as $investissement)
                    <?php $projet = $investissement->projet ?>
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }}</span>- <small>{{ $projet->created_at?date_format($projet->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> -

                            <?= $projet->public?'<span class="badge badge-info">PUBLIC</span>':'<span class="badge badge-warning">PRIVE</span>' ?>
                            </td>

                            <td>{{$investissement->angel?$investissement->angel->name:'-'}}</td>
                            <td>{{ date_format($investissement->created_at,'d/m/Y') }}</td>


                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-xs" href="/adminentr/dossiers/{{ $investissement->token  }}">
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