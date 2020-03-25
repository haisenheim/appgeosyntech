@extends('......layouts.rc')


@section('page-title')
    <?php $user = $livraison->user; $client = $livraison->client; ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $user->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">


        <div class="col-md-3 col-sm-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">{{ $user->name }} </h5>
                </div>
                <div class="card-body">
                        <div style="padding: 10px auto">
                            <div  class="img-center">
                              <img style="max-height: 100px; max-width:100px; border-radius: 50%" src="<?= $user->imageUri?asset('img/'. $user->imageUri):asset('img/avatar.png') ?>" class="img-circle elevation-2">
                            </div>
                        </div>
                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Adresse: {{ $user->address }}</h5></li>
                            <li class="list-group-item"><h6><i class="fa fa-mobile"></i> {{ $user->phone }}</h6></li>
                            <li class="list-group-item"><h6><i class="fa fa-envelope"></i> {{ $user->email }}</h6></li>
                            <li class="list-group-item"><h6><i class="mdi mdi-google-classroom"></i> {{ $user->classe?$user->classe->category->name:'-' }}</h6></li>
                       </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>COMPETENCES</h4>
                </div>
                <div class="card-body">
                    <ul class="list-inline">
                             @foreach($user->competences as $ville)
                              <li class="list-inline-item index-item">

                               <ul class="list-inline " style="margin-left: 10px">
                                    <li class="list-inline-item">{!! $ville->name !!}</li>
                               </ul>
                               </li>
                            @endforeach

                    </ul>
                </div>
            </div>


        </div>
        <div class="col-md-6 col-sm-12">

            <div class="card">
               <div class="card-header">
                    <h4 class="card-title">PRIMES <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-cog"></i></a></h4>
               </div>
                <div class="card-body">
                    <table class="table table-striped table-condensed table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>PRIME</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <?php $somme =0; ?>
                        <tbody>
                            @foreach($livraison->primes as $pr)
                                <?php $somme = $somme + $pr->montant ?>
                                <tr>
                                    <td>{{ $pr->tprime->name }}</td>
                                    <td>{{ number_format($pr->montant,0,',','.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>TOTAL</th>
                                <th>{{ number_format($somme,0,',','.') }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">{{ $client->name }} </h5>
                    <span style="float: right" class="badge badge-<?= !$client->active?'danger':'success' ?>"><?= !$client->active?'compte bloqué':'compte actif' ?></span>


                </div>
                <div class="card-body">
                        <div style="padding: 10px auto">
                            <div class="">
                              <img style="max-height: 100px; max-height:100px; border-radius: 50%" src="<?= $client->imageUri?asset('img/'. $client->imageUri):asset('img/avatar.png') ?>" class="img-circle elevation-2">
                            </div>
                        </div>
                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Adresse: {{ $client->address }}</h5></li>
                            <li class="list-group-item"><h6><i class="fa fa-mobile"></i> {{ $client->phone }}</h6></li>
                            <li class="list-group-item"><h6><i class="fa fa-envelope"></i> {{ $client->email }}</h6></li>

\                        </ul>
                    </div>
                    <div class="index-item">
                        <h5>Utilisateurs</h5>
                        <ul class="list-group">
                            @foreach($client->users as $user)
                                <li class="list-group-item">{{ $user->name }}- <span style="font-size: smaller">{{ $user->email }}</span> <span class="pull-right">{{ $user->role->name }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>






     <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">GESTION DES PRIMES</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        {{csrf_field()}}
                        <input type="hidden" id="id" value="{{ $livraison->id }}"/>
                          <div class="card-body">
                             <form>
                                  <div class="form-row align-items-center">

                                      <div class="col-auto">
                                          <div class="mt-3 mr-sm-2">
                                              <label  for="prime_id">PRIME</label>
                                              <select class="form-control mb-2" id="prime_id">
                                                  <option value="0">CHOISIR</option>
                                                  @foreach($types as $poste)
                                                  <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-auto">
                                          <div class="mt-3 mr-sm-2">
                                              <label  for="montant">MONTANT</label>
                                                  <input type="number"  class="form-control" id="montant" placeholder="montant">

                                          </div>
                                      </div>



                                      <div style="margin-top: 35px;" class="col-auto">
                                          <button  id="btn-add" class="btn btn-outline-secondary mt-2"><i class="fa fa-plus-square"></i></button>
                                      </div>
                                  </div>
                              </form>



                              <table id="tab-lines" class="table table-bordered table-striped table-condensed table-hover">
                                <thead>
                                    <tr>

                                        <th>PRIME</th>
                                        <th>MONTANT</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                              </table>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <div class="row">
                                <div class="col-md-4 col-sm-12"></div>
                                 <div class="col-md-4 col-sm-12">
                                    <button id="btn-store" type="submit" class="btn btn-info btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>

                                        <div id="save-spinner" style="display: none" class="bs-spinner mt-4 mt-lg-0">

                                            <div class="spinner-grow mr-2 mt-2" style="width: 3rem; height: 3rem;" role="status">
                                                <span class="sr-only">Enregistrement en cours...</span>
                                            </div>
                                        </div>

                                 </div>
                            </div>

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
     $(document).ready(function(){$(".datatable").DataTable();});
     $('#btn-add').click(function(e){
        e.preventDefault();
        var prime_id = $('#prime_id').val();
        var prime = $('#prime_id option:selected').text();

        var montant = $('#montant').val();


        if(montant && prime_id){

            var tr = '<tr data-prime='+ prime_id  +' data-montant='+ montant +'>'+

            '<td>'+ prime +'</td><td>'+ montant +'</td><td><span style="padding: 2px;font-size: 0.6rem" title="Retirer cette ligne" class="remove btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></span></td></tr>';

            $('#tab-lines').find('tbody').append(tr);

            $('.remove').click(function(){
                $(this).parent().parent().remove();
            });

        }else{
            alert('Ajout impossible. Verifiez les informations');
        }

     });

     $('#btn-store').click(function(e){
        e.preventDefault();

        var data =[];

        $('#tab-lines').find('tbody').find('tr').each(function(){
            var elt = {};

            elt.prime_id = $(this).data('prime');
            elt.montant = $(this).data('montant');

            data.push(elt);
        });

        if(data.length){
            $('#save-spinner').show();
            $('#btn-store').hide();
             $.ajax({
            url:'/rc/commande/livraison/add-primes',
            type:'post',
            dataType:'json',
            data:{primes:data,id:$('#id').val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
            },
            success:function(dt){
                 window.location.href='/rc/commande/livraison/'+dt.livraison.token
            }
        });
        }


     })
</script>
@endsection