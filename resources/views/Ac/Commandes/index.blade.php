


@extends('layouts.ac')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">BASE DES COMMANDES CLIENT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/ac/dashboard">SM</a></li>
              <li class="breadcrumb-item">CLIENTS</li>
              <li class="breadcrumb-item active">COMMANDES</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection

@section('content')

    <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">COMMANDES <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>CLIENT</th>
                               <th>&numero;</th>
                               <th>DATE</th>
                               <th>NOMBRE D'AGENT</th>
                               <th>STATUT</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($commandes as $liv)

                               <tr>
                                   <td>{{ $liv->client?$liv->client->name:'-' }}</td>
                                   <td>{{ $liv->name }}</td>

                                   <td>{{ date_format($liv->created_at,'d/m/Y') }}  </td>
                                   <td>{{ number_format($liv->nombre, 0,',','.') }}</td>
                                   <td> <span class="badge badge-{{ $liv->etat['color'] }}">{{ $liv->etat['name'] }}</span> </td>
                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/ac/commandes/{{ $liv->token }}"></a></li>
                                       </ul>
                                   </td>
                               </tr>

                           @endforeach
                       </tbody>
                   </table>

                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>

           <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVELLE DEMANDE DE RECRUTEMENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        {{csrf_field()}}
                          <div class="card-body">
                             <form>
                                  <div class="form-row align-items-center">
                                      <div class="col-auto">
                                          <div class="mt-3 mr-sm-2">
                                              <label  title="Secteur d'activite" for="secteur_id">SECTEUR</label>
                                              <select class="form-control mb-2" id="secteur_id">
                                                  <option value="0">CHOISIR</option>
                                                  @foreach($secteurs as $secteur)
                                                  <option value="{{ $secteur->id }}">{{ $secteur->name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-auto">
                                          <div class="mt-3 mr-sm-2">
                                              <label  for="poste_id">POSTE</label>
                                              <select class="form-control mb-2" id="poste_id">
                                                  <option value="0">CHOISIR</option>
                                                  @foreach($postes as $poste)
                                                  <option value="{{ $poste->id }}">{{ $poste->name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-auto">
                                          <div class="mt-3 mr-sm-2">
                                              <label  for="quantity">QUANTITE</label>
                                                  <input type="number"  class="form-control" id="quantity" placeholder="Nombre">

                                          </div>
                                      </div>

                                      <div class="col-auto">
                                          <div class="mt-3 mr-sm-2">
                                              <label for="debut">DU</label>
                                                  <input type="date"  class="form-control" id="debut">
                                          </div>
                                      </div>

                                      <div class="col-auto">
                                          <div class="mt-3 mr-sm-2">
                                              <label  for="fin">AU</label>
                                                  <input type="date"  class="form-control" id="fin">
                                          </div>
                                      </div>

                                      <div class="col-auto">
                                          <button style="margin-top: 20px;" id="btn-add" class="btn btn-outline-secondary mt-2"><i class="fa fa-plus-square"></i></button>
                                      </div>
                                  </div>
                              </form>



                              <table id="tab-lines" class="table table-bordered table-striped table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>SECTEUR</th>
                                        <th>POSTE</th>
                                        <th>QUANTITE</th>
                                        <th>DU</th>
                                        <th>AU</th>
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
     $(document).ready(function(){$(".datatable").DataTable();});
     $('#btn-add').click(function(e){
        e.preventDefault();
        var poste_id = $('#poste_id').val();
        var poste = $('#poste_id option:selected').text();
        var secteur_id = $('#secteur_id').val();
        var secteur = $('#secteur_id option:selected').text();
        var quantity = $('#quantity').val();
        var debut = $('#debut').val();
        var fin = $('#fin').val();

        if(poste_id && secteur_id && quantity && debut && fin){

            var tr = '<tr data-poste='+ poste_id +' data-secteur='+ secteur_id +' data-quantity='+ quantity +' data-debut='+ debut +' data-fin='+ fin +'>'+

            '<td>'+ secteur +'</td><td>'+ poste +'</td><td>'+ quantity +'</td><td>'+ debut +'</td><td>'+ fin +'</td><td><span style="padding: 2px;font-size: 0.6rem" title="Retirer cette ligne" class="remove btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></span></td></tr>';

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
            elt.secteur_id = $(this).data('secteur');
            elt.poste_id = $(this).data('poste');
            elt.quantity = $(this).data('quantity');
            elt.debut = $(this).data('debut');
            elt.fin = $(this).data('fin');
            data.push(elt);
        });

        if(data.length){
            $('#save-spinner').show();
            $('#btn-store').hide();
             $.ajax({
            url:'/ac/commande/save',
            type:'post',
            dataType:'json',
            data:{lignes:data},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
            },
            success:function(dt){
                window.location.href='/ac/commandes/'+dt.token
            }
        });
        }

        $.ajax({
            url:'/ac/commande/save',
            type:'post',
            dataType:'json',
            data:{lignes:data},
            success:function(dt){
                window.location.href='/ac/commandes/'+dt.token
            }
        });
     })
</script>
@endsection