


@extends('layouts.ra')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">APPROVISIONNEMENTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/ra/dashboard">SM</a></li>
              <li class="breadcrumb-item">APPROVISIONNEMENTS</li>
              <li class="breadcrumb-item active">ENTREES EN STOCK</li>
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
                  <h3 class="card-title">ENTREES EN STOCK <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>

                               <th>&numero;</th>
                               <th>DATE</th>
                               <th>NOMBRE D'ELEMENT</th>

                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($entrees as $liv)

                               <tr>

                                   <td>{{ $liv->name }}</td>

                                   <td>{{ date_format($liv->created_at,'d/m/Y') }}  </td>
                                   <td>{{ number_format($liv->nombre, 0,',','.') }}</td>

                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/ra/approvisionnements/{{ $liv->token }}"><i class="fa fa-eye"></i></a></li>
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
                        <h4 class="modal-title">NOUVELLE ENTREE EN STOCK</h4>
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
                                              <label  for="article_id">ARTICLE</label>
                                              <select class="form-control mb-2" id="article_id">
                                                  <option value="0">CHOISIR</option>
                                                  @foreach($articles as $poste)
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



                                      <div style="margin-top: 35px;" class="col-auto">
                                          <button  id="btn-add" class="btn btn-outline-secondary mt-2"><i class="fa fa-plus-square"></i></button>
                                      </div>
                                  </div>
                              </form>



                              <table id="tab-lines" class="table table-bordered table-striped table-condensed table-hover">
                                <thead>
                                    <tr>

                                        <th>ARTICLE</th>
                                        <th>QUANTITE</th>

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
        var article_id = $('#article_id').val();
        var article = $('#article_id option:selected').text();

        var quantity = $('#quantity').val();


        if(article_id &&  quantity ){

            var tr = '<tr data-article='+ article_id +' data-quantity='+ quantity  +'>'+

            '<td>'+ article +'</td><td>'+ quantity +'</td><td><span style="padding: 2px;font-size: 0.6rem" title="Retirer cette ligne" class="remove btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i></span></td></tr>';

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
            elt.article_id = $(this).data('article');

            elt.quantity = $(this).data('quantity');

            data.push(elt);
        });

        if(data.length){
            $('#save-spinner').show();
            $('#btn-store').hide();
             $.ajax({
            url:'/ra/approvisionnement/save',
            type:'post',
            dataType:'json',
            data:{lignes:data},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
            },
            success:function(dt){
                window.location.href='/ra/approvisionnements/'+dt.token
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