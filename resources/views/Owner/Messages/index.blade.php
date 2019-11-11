@extends('......layouts.owner')


@section('content')



<section style="padding: 20px;" class="content">

      <div class="row">
        <div class="col-md-3">
          <a href="#" data-toggle="modal" data-target="#composeModal" class="btn btn-outline-danger btn-block mb-3">Composer</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Repertoires</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="fas fa-inbox"></i> Boîte de reception
                    <span class="badge bg-primary float-right">{{ $receptions->where('lu',0)->count() }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-envelope"></i> Envois
                  </a>
                </li>


                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Corbeille
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sujets</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-danger"></i>
                    Recherche de financements
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-warning"></i> Cessions d'actifs
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-primary"></i>
                    Concessions
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Boîte de reception</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table id="table-mgs" class="table table-hover table-striped">
                  <thead>
                      <tr>
                        <th></th>
                        <th>Expediteur</th>
                        <th>Objet</th>
                        <th>Date</th>
                      </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <input type="checkbox" value="" id="check2">
                        <label for="check2"></label>
                      </div>
                    </td>

                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                    </td>

                    <td class="mailbox-date">28 mins ago</td>
                  </tr>



                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section>

<div class="modal fade" id="composeModal">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header bg-success">
         <h4 class="modal-title">NOUVEAU MESSAGE</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form enctype="multipart/form-data" role="form" action="{{route('owner.mailbox.store')}}" method="post">
         {{csrf_field()}}

           <div class="card">
                <div class="card-body">

                <div class="form-group">
                  <input class="form-control" placeholder="To:">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Objet:">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px"></textarea>
                </div>


                <button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                </div>
           </div>
            <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#compose-textarea').summernote({
            height: 200,
            tabsize: 2,
            followingToolbar: true,
            lang:'fr-FR'
          });
        });
      </script>
         </form>
       </div>

     </div>
     <!-- /.modal-content -->
   </div>
       <!-- /.modal-dialog -->
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

    $('#table-mgs').DataTable({
      "paging": true,
      "lengthChange": false,

      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

@endsection