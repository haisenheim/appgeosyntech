@extends('......layouts.angel')
@section('content')


 <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-default">
                <h1 style="font-size: 2.5rem; padding-top: 20px;" class="widget-user-username">Opportunités d'investissements</h1>

              </div>
              <div class="widget-user-image">

                <img class="img-circle elevation-2" src="{{asset('img/logo-obac.png')}}" alt="User Avatar">
              </div>

              <div class="card-footer">

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