@extends('......layouts.owner')

@section('page-title')
CESSIONS D'ACTIFS
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">



        <div class="card">
        <div class="card-header">

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
                      <th>
                          ACTIF
                      </th>
                      <th style="width: 20%">PRIX DE VENTE</th>
                      <th style="width: 20%">
                          CONSULTANT
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($dossiers as $projet)
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }}</span>- <small>{{ $projet->created_at?date_format($projet->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> <br/>
                            <?= $projet->active?'<span class="badge badge-success">ACTIF</span>':'<span class="badge badge-danger">Bloqué</span>' ?>

                            </td>

                            <td>{{ $projet->prix . $projet->devise->abb }}</td>

                            <td>{{$projet->consultant?$projet->consultant->name:'-'}}</td>



                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-xs" href="/owner/actifs/{{ $projet->token  }}">
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
              "autoWidth": false
            });
          });
        </script>



    </div>

@endsection

@section('nav_actions')
<main>
    <nav class="floating-menu">
        <ul class="main-menu">
            <li>
                <a title="Nouveau Dossier" href="/owner/actifs/create" class="ripple">
                    <i class="fa fa-plus-circle fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

@endsection