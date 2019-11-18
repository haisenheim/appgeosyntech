@extends('......layouts.owner')

@section('content-header')
     <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">GESTION DES CESSIONS D'ACTIFS</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">




                <div class="row">
                    @foreach($dossiers as $projet)


                     <div class="col-md-3 col-sm-12">
            <!-- Widget: user widget style 1 -->
                        <a style="color:#555" href="/owner/actifs/{{ $projet->token  }}">
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
                            <?= $projet->active?'<span class="badge badge-success">ACTIF</span>':'<span class="badge badge-danger">Bloqué</span>' ?> -

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