@extends('......layouts.admin')

@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">POSTES</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">Postes</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

          <div class="container">
                <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">BASE DE DONNEES DES POSTES <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="list-inline">
                             @foreach($postes as $ville)
                              <li class="list-inline-item index-item">
                               <ul class="list-inline " style="margin-left: 10px">
                                    <li class="list-inline-item">{!! $ville->name !!}</li>
                                    <li class="list-inline-item"><a title="afficher" class="badge badge-info" href="#"><i class="fa fa-eye"></i></a></li>
                                    <li class="list-inline-item"><a title="supprimer" class="badge badge-danger" href="#"><i class="fa fa-trash"></i></a></li>
                               </ul>
                        @endforeach
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>
          </div>

           <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVEAU POSTE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="/admin/postes" method="post">
                        {{csrf_field()}}

                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">NOM</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom du poste">
                                    </div>
                                </div>

                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button id="btn-save" type="submit" class="btn btn-success btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>


<style>
    .table th,
    .table td {
      padding: 0.35rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  </style>



@endsection

@section('scripts')
    <script>
            $('#btn-save').click(function(e){
                //console.log('ok');
                e.preventDefault();
                var data = [];
                data.push({name:$('#name').val()});
                var secteurs = [];
                $('.secteur_id').each(function(){
                   secteurs.push($(this).data('id'))
                });
                data.push(data);

                 $.ajax({
                     url:'/admin/post',
                     dataType:'json',
                     type:'get',
                     data:data,
                     success:function(dt){
                         window.location.href='/admin/postes';
                     }
                 });


            })
      </script>
@endsection