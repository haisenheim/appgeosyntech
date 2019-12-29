@extends('......layouts.admin')
@section('content')

 <div class="card">
        <div class="card-header">
          <h3 class="card-title">FORMATIONS</h3>
        </div>

        <div class="card-body p-0">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 38%">
                          FORMATION
                      </th>
                      <th>Cout en ligne</th>
                      <th>Cout en présentiel</th>
                      <th style="width: 20%">
                          Contributeur
                      </th>


                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($formations as $formation)
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $formation->name }}</span>- <small>{{ $formation->created_at?date_format($formation->created_at,'d/m/Y'):'' }}</small><br/>
                            <?= $formation->active?'<span class="badge badge-success">ACTIVE</span>':'<span class="badge badge-danger">Bloquée</span>' ?> -
                            <?= $formation->free?'<span class="badge badge-info">GRATUITE</span>':'<span class="badge badge-warning">PAYANTE</span>' ?>
                            </td>
                            <td>
                                {{number_format($formation->prix_ligne,0,',','.')}}
                            </td>
                            <td>
                                {{number_format($formation->prix_presentiel,0,',','.')}}
                            </td>

                            <td>{{$formation->contributeur?$formation->contributeur->name:'-'}}</td>

                          <td class="project-actions text-right">
                                <ul>
                                    <li class="list-inline-item"> <a class="btn btn-primary btn-xs" href="/admin/formations/{{ $formation->token  }}"><i class="fas fa-folder"></i>Afficher</a></li>

                                           @if($projet->active)
                                               <li title="bloquer cette formation" class="list-inline-item"><a class="btn btn-danger btn-xs" href="/admin/formation/disable/{{ $formation->token }}"><i class="fa fa-lock"></i></a></li>
                                           @else
                                             <li title="débloquer ce formation" class="list-inline-item"><a class="btn btn-success btn-xs" href="/admin/formation/enable/{{ $user->token }}"><i class="fa fa-unlock"></i></a></li>
                                           @endif
                                </ul>
                           </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>
          <div class="">
              <ul class="pagination justify-content-end">
              {{ $formations->links() }}
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
      "autoWidth": false
    });
  });
</script>

@endsection