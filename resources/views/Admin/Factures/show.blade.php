@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $facture->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $facture->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <?php $client= $facture->projet->client ?>
    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">

                <div class="card-body">
                    <?= $facture->avec_tva?'<span class="badge badge-info">AVEC TVA</span>':'' ?>
                    <ul class="list-inline pull-right">
                        <li class="list-inline-item">
                            <a class="btn btn-danger btn-xs" href="/facture/print/{{ $facture->token}}"><i class="fa fa-print"></i> imprimer </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-success btn-xs" href="#" data-target="#modalEdit" data-toggle="modal"><i class="fa fa-edit"></i>Editer </a>
                        </li>
                    </ul>
                    <div class="table-responsive">
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>&numero;</th>
                               <th>DESIGNATION</th>
                               <th>QUANTITES</th>
                               <th>PRIX UNITAIRE</th>
                               <th>PRIX TOTAL HT</th>

                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1 ?>
                           @foreach($facture->proforma->frncotation->lignes as $ligne)

                               <tr>
                                   <td>{{ $i++ }}</td>
                                   <td>{{ $ligne->produit?$ligne->produit->name:'-' }}</td>

                                   <td>{{ number_format($ligne->quantity, 0,',','.') }}</td>
                                   <td>{{ \App\Helpers\CurrencyFr::format($ligne->pu) }}</td>
                                   <td>{{ \App\Helpers\CurrencyFr::format($ligne->montant) }}</td>

                               </tr>

                           @endforeach
                           <tr>
                                <td colspan="4">TOTAL</td>
                                <th style="padding-right: 10px; text-align: right; "><?= number_format($facture->montant,0,',','.') ?></th>

                           </tr>

                       </tbody>
                   </table>
                   </div>
                   <hr/>
                    <div class="row mt-3">
                        <div class="col-md-4 col-sm-12 well">
                            <h6>NOTE COMPLEMENTAIRES :</h6>
                            <?= $facture->note ?>
                        </div>
                        <div class="col-md-4 col-sm-12 well">
                            <h6 class="text-bold">NET A PAYER EN LETTRE :</h6>
                            <?= $facture->net_en_lettre ?>
                        </div>
                        <div class="col-md-4 col-sm-12 well">
                            <h6>LETTRE D'EXONERATION :</h6>
                            <?= $facture->lettre_tva ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">{{ $client->name }} </h5>

                </div>
                <div class="card-body">

                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Adresse: {{ $client->address }}</h5></li>
                            <li class="list-group-item"><h6><i class="fa fa-mobile"></i> {{ $client->phone }}</h6></li>
                            <li class="list-group-item"><h6><i class="fa fa-envelope"></i> {{ $client->email }}</h6></li>
                     </ul>
                    </div>

                </div>
            </div>


        </div>


    </div>

    <div class="modal fade" id="modalEdit">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">EDITION DE LA FACTURE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="/admin/facture/save" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="facture_id" value="{{ $facture->id }}"/>
                          <div class="card-body">
                            <div class="row">

                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="jour">DATE DE FACTURATION</label>
                                      <input type="date" class="form-control" name="jour" id="jour"/>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group" style="margin-top: 40px">
                                      <label for="jour">
                                      <input type="checkbox"  name="avec_tva" id="jour"/> AVEC TVA </label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="jour">NET EN LETTRE</label>
                                      <input required="required" type="text" class="form-control" name="net_en_lettre" id="jour"/>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="jour">LETTRE DE TVA</label>
                                      <input type="text" class="form-control" name="lettre_tva" id="jour"/>
                                    </div>
                                </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12 col-sm-12">
                                  <div class="form-group">
                                    <label for="elm1">NOTE COMPLEMENTAIRE</label>
                                    <textarea class="form-control" name="note" id="elm1" cols="30" rows="5"></textarea>
                                  </div>
                              </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>

                      </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
          </div>
        </div>
     


<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
          <!--tinymce js-->
<script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
        <!-- init js -->
<script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
<script>
  $(function () {
    $(".datatable").DataTable();
    //$('textarea').tinymce();

  });
</script>
@endsection