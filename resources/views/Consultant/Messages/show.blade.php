@extends('......layouts.consultant')
@section('page-title')
{{ $message->expediteur->name }} - <b> <small> {{ $message->subject }}</small> </b>
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
                    <span class="badge bg-primary float-right">{{ $receptions->where('lu',0)->count() }}</span>
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
          <div class="card card-success card-outline">

            <div class="card-body p-0">

                <div class="mailbox-read-info">
                <h5><b> <small> {{ $message->subject }}</small> </b></h5>
                <h6>De: {{ $message->expediteur->name }} - {{ $message->expediteur->email }}
                  <span class="mailbox-read-time float-right">{{ date_format($message->created_at, 'd/m/Y H:i') }}</span></h6>
              </div>

              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">

                  <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#replyModal" data-container="body" title="Repondre">
                    <i class="fas fa-reply"></i></button>
                </div>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                 <?= $message->body ?>
              </div>
              <!-- /.mailbox-read-message -->

            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section>

<div class="modal fade" id="replyModal">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header bg-info">
         <h4 class="modal-title">REPONSE A {{ $message->expediteur->name }}</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form enctype="multipart/form-data" role="form" action="/consultant/mailbox/reply" method="post">
         {{csrf_field()}}

           <div class="card">
                <div class="card-body">
                <input type="hidden" name="message_id" value="{{ $message->token }}" />
                <input type="hidden" name="reply" value="1" />


                <div class="form-group">
                <label for="">DESTINATAIRE</label>
                <input type="text" disabled class="form-control" value="{{ $message->expediteur->name }}"/>

                </div>

                <div class="form-group">
                  <input value="Re : {{ $message->subject }}"  class="form-control" placeholder="Objet:">
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
                    <option value="0">CHOIX DU PAYS DU CONTRIBUTEUR</option>
                    @foreach($pays as $p)
                        <option value="{{ $p->id }}">{{ $p->name  }}</option>
                    @endforeach
                </select>

                </div>
                <div class="form-group">
                    <label for="">CONTRIBUTEUR</label>
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
		var url = '/get-contributeurs-pay';
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
       $('textarea').summernote({
             height: 300
       })
     })
   </script>




@endsection