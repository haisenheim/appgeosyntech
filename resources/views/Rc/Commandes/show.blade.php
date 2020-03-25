@extends('......layouts.rc')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $commande->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $commande->name }} - <span style="font-size: smaller">{{ date_format($commande->created_at,'d/m/Y') }}</span></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">
                <div class="card-header">



                </div>
                <div class="card-body">
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>

                               <th>POSTE</th>
                               <th>QUANTITE</th>
                               <th>DEBUT</th>
                               <th>FIN</th>
                               <th>NIVEAU</th>
                               @if($commande->step['level']==3)
                                <th></th>
                               <th></th>
                               @endif
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($commande->lignes as $liv)

                               <tr>

                                   <td>{{ $liv->poste?$liv->poste->name:'-' }}</td>


                                   <td>{{ number_format($liv->quantity, 0,',','.') }}</td>
                                   <td>{{ date_format($liv->debut,'d/m/Y') }}</td>
                                   <td>{{ date_format($liv->fin,'d/m/Y') }}</td>
                                   <td><span class="badge badge-{{ $liv->level['color'] }}">{{ $liv->level['name'] }}</span></td>
                                   @if($commande->step['level']==3)
                                   <td>
                                       <div class="progress">
                                           <div class="progress-bar bg-{{ $liv->etat['color'] }}" role="progressbar" style="width: <?= $liv->etat['progress'].'%' ?>;" aria-valuenow="{{ $liv->etat['progress'] }}" aria-valuemin="0" aria-valuemax="100">{{ $liv->etat['progress'] }}%</div>
                                       </div>
                                   </td>


                                   <td>
                                       <ul class="list-inline">
                                            <li class="list-inline-item"><a class="btn btn-xs btn-info btn-add" data-poste="{{ $liv->poste->name }}" data-id="{{ $liv->id }}" data-toggle="modal" data-target="#addLivraison" title="Afficher" href="#"><i class="fa fa-eye"></i></a></li>
                                       </ul>
                                   </td>
                                  @endif
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="addLivraison">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">NOUVELLE AFFECTATION</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                       <div>
                            <div style="margin: 10px auto; max-width: 150px" class="">
                              <img id="user-img" style="max-height: 100px; max-width:100px; border-radius: 50%" src="<?= asset('img/avatar.png') ?>" class="img-circle elevation-2">
                            </div>
                        </div>
                      <form action="/rc/ligne/add" method="post">
                          {{csrf_field()}}
                          <input type="hidden" id="cligne_id" name="cligne_id" />


                          <div class="form-row align-items-center">

                              <div class="col-auto">
                                  <div class="mt-3 mr-sm-2">
                                      <label  for="poste">POSTE</label>
                                       <input disabled type="text" class="form-control" id="poste">
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <div class="mt-3 mr-sm-2">
                                      <label  for="user_id">AGENT</label>
                                      <select required="required" class="form-control mb-2" name="user_id" id="user_id"></select>

                                  </div>
                              </div>
                              <div class="col-auto">
                                  <div class="mt-3 mr-sm-2">
                                      <label  for="montant">COUT</label>
                                       <input  type="number" class="form-control" name="montant" id="montant">
                                  </div>
                              </div>

                              <div style="margin-top: 30px;" class="col-auto">
                                  <button type="submit" class="btn btn-primary mt-2">Valider</button>
                              </div>
                          </div>
                      </form>

                      <ul id="cl" class="list-inline">

                      </ul>

                    </div>

                </div>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
     </div>
     
@endsection

@section('scripts')
<script>

    $('.btn-add').click(function(){
        //console.log('ok');
        var id = $(this).data('id');
        $('#cligne_id').val(id);
        $('#poste').val($(this).data('poste'));
        $.ajax({
            url:'/rc/ligne/get',
            type:'get',
            dataType:'json',
            data:{id:id},
            success:function(data){
            var users = Object.values(data);
            var html ='<option> Selectionner un agent </option>';
            $('#user_id').html('');
            console.log(users);
            for(var i=0;i<users.length;i++){
                html = html + '<option value="'+ users[i].id +'">'+ users[i].first_name +'  '+users[i].last_name +'</option>';

            }

             $('#user_id').html(html);
            }
        })
    });

    $('#user_id').change(function(){

        $.ajax({
            url:'/rc/user/get',
            type:'get',
            dataType:'json',
            data:{id:$('#user_id').val()},
            success:function(data){
            var user = data.user;
            var link =document.location.origin+'/'+user.imageUri;
            $('#user-img').prop('src',link);

            var competences = user.competences;
            var lst = '';
            for(var i=0;i<competences.length;i++){
                lst = lst + '<li class="list-inline-item index-item">'+ competences[i].name +'</li>';
            }
            $('#cl').html(lst);

            }
        });
    });

  $(function () {
    $(".datatable").DataTable();

  });
</script>
@endsection