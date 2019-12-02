@extends('......layouts.admin')

@section('page-title')
EVENEMENTS
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">



        <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th>
                          DESIGNATION
                      </th>
                      <th style="width: 20%">DEBUT</th>
                      <th style="width: 20%">
                         FIN
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($events as $projet)
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }}</span>
                            </td>

                            <td>{{ date_format($projet->start,'d/m/Y H:i' ) }}</td>
                            <td>{{ date_format($projet->end,'d/m/Y H:i' ) }}</td>




                      <td class="project-actions text-right">
                          <a class="btn btn-success btn-xs" href="/admin/events/{{ $projet->token  }}">
                              <i class="fas fa-search">
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
                <a title="Nouveau Dossier" href="/admin/events/create" class="ripple">
                    <i class="fa fa-plus-circle fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

@endsection