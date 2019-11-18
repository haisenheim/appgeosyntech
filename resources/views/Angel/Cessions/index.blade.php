@extends('......layouts.angel')
@section('content-header')
 <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">INVESTISSEMENTS DANS LES CESSIONS D'ACTIFS</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">

        <div class="card">
        <div class="card-header">
            <h3>INVESTISSEMENTS DANS LES CESSIONS D'ACTIFS</h3>
        </div>

        <div class="card-body p-0">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 38%">
                          Actif
                      </th>
                      <th style="width: 20%">
                          Propriétaire
                      </th>


                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($cessions as $cession)
                        <?php $projet= $cession->actif ?>
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }} - <b>{{ $projet->prix }} {{ $projet->devise->abb }}</b></span>- <small>{{ $cession->created_at?date_format($cession->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> <br/>

                            </td>

                            <td>{{$projet->owner?$projet->owner->name:'-'}}</td>


                              <td class="project-actions text-right">
                                    @if($cession->validated)
                                          <a class="btn btn-success btn-xs" href="/angel/cessions/{{ $cession->token  }}">
                                              <i class="fas fa-search">
                                              </i>
                                             Afficher
                                          </a>
                                  @endif


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