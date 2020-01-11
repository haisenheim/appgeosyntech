@extends('......layouts.consultant')

@section('page-title')
MESSAGES ENVOYES
@endsection

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
                  <a href="/consultant/mailbox" class="nav-link">
                    <i class="fas fa-inbox"></i> Boîte de reception
                    <span class="badge bg-success float-right">{{ $receptions->where('lu',0)->count() }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/consultant/inbox/created" class="nav-link">
                    <i class="far fa-envelope"></i> Envois
                    <span class="badge bg-warning float-right">{{ $envois->where('lu',0)->where('active',1)->count() }}</span>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Corbeille
                    <span class="badge bg-danger float-right">{{ $envois->where('active',0)->count() }}</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Boîte d'envoi</h3>

              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">

              <div class="table-responsive mailbox-messages">
                <table id="table-mgs" class="table table-hover table-striped">
                  <thead>
                      <tr>
                        <th></th>
                        <th>Destinataire</th>
                        <th>Objet</th>

                        <th>Date</th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>

                  @foreach($envois as $envoi)

                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <input type="checkbox" value="" id="check2">
                        <label for="check2"></label>
                      </div>
                    </td>


                    <td style="font-weight: {{ $envoi->lu?100:800 }}" class="mailbox-name"><a href="/consultant/mailbox/{{ $envoi->token }}">{{ $envoi->destinataire->name }}</a></td>
                    <td class="mailbox-subject"> {{ $envoi->subject }}
                    </td>

                    <td class="mailbox-date">{{ date_format($envoi->created_at, 'd/m/Y H:i') }}</td>
                    <td> <a href="/consultant/mailbox/disable/{{ $envoi->token }}"><i class="fa fa-trash"></i></a></td>
                  </tr>
                  @endforeach


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
       <div class="modal-header bg-info">
         <h4 class="modal-title">NOUVEAU MESSAGE</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form enctype="multipart/form-data" role="form" action="{{route('consultant.mailbox.store')}}" method="post">
         {{csrf_field()}}

           <div class="card">
                <div class="card-body">

                <div class="form-group">
                <label for="">PAYS</label>
                <select name="pay_id" class="form-control" id="pay_id">
                    <option value="0">CHOIX DU PAYS DU CONSULTANT</option>
                    @foreach($pays as $p)
                        <option value="{{ $p->id }}">{{ $p->name  }}</option>
                    @endforeach
                </select>

                </div>
                <div class="form-group">
                    <label for="">CONSULTANT</label>
                    <select name="receptor_id" class="form-control" id="receptor_id">

                    </select>
                </div>
                <div class="form-group">
                  <input name="subject" required="true" class="form-control" placeholder="Objet:">
                </div>
                <div class="form-group">
                    <textarea name="body" id="compose-textarea"  cols="30" style="height: 300px"></textarea>
                </div>


                <button type="submit" class="btn btn-info btn-sm btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                </div>
           </div>

         </form>
       </div>

     </div>
     <!-- /.modal-content -->
   </div>
       <!-- /.modal-dialog -->
</div>

<script>
	$("#pay_id").on('change',function(){
		// console.log($("#sector_id").val());
		var url = '/get-consultants-pay';
		$.ajax({
			url:url,
			type:'get',
			dataType:'Json',
			data:{ id:$("#pay_id").val()},

			success: function(data){
				$("#receptor_id").html("");
				var option = '';
				//console.log('data  :' + data);
				var dat =Object.entries(data);
				//console.log(dat);


				for(var i=0; i<dat.length;i++ ){
					option=option+'<option value='+ dat[i][1].id +'>'+ dat[i][1].last_name +'  '+ dat[i][1].first_name +'</option>';
					$("#receptor_id").html(option);
					//console.log(option);
				}

			}
		});
	});
</script>




    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}"/>
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>


   <!-- Page Script -->
   <script>
     $(function () {
       //Add text editor
       $('#compose-textarea').summernote({
             height: 300
       })
     })
   </script>


<!-- AdminLTE for demo purposes -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<!-- jQuery -->

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
      "autoWidth": false
    });
  });
</script>

@endsection