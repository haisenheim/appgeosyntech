@extends('......layouts.rf')


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
    <?php $client= $facture->partenaire ?>
    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">

                <div class="card-body">
                    <div style="float: left">
                        <ul class="list-inline">
                            <li class="list-inline-item"><span class="badge badge-{{ $facture->etat['color'] }}">{{ $facture->etat['name'] }}</span></li>
                        </ul>
                    </div>
                    <div class="" style="float: right;">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="btn btn-info btn-xs" title="Enregistrer un delai de paiement" href="#" data-toggle="modal" data-target="#modal-lg2"><i class="mdi mdi-av-timer"></i></a></li>
                            @if($facture->reste>0)
                               <li class="list-inline-item"><a class="btn btn-secondary btn-xs" title="Enregistrer un paiement" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-coins"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>DESIGNATION</th>

                               <th>MONTANT</th>

                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $total = 0 ?>
                           @foreach($facture->certificats as $liv)
                            <?php $total = $total + $liv->montant ?>
                               <tr>
                                   <td>{{ $liv->tcertificat?$liv->tcertificat->name:'-' }} - {{ $liv->name }} - {{ $liv->user?$liv->user->name:'-' }}</td>

                                   <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ number_format($liv->montant, 0,',','.') }}</td>
                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/rf/certificat/{{ $liv->token }}"><i class="fa fa-eye"></i></a></li>
                                       </ul>
                                   </td>
                               </tr>

                           @endforeach
                           <tr>
                                <td colspan="2">TOTAL</td>
                                <th style="padding-right: 10px; text-align: right; "><?= number_format($total,0,',','.') ?></th>
                                <td></td>
                           </tr>
                           <tr>
                                <td colspan="2">NET A PAYER</td>
                                 <th style="padding-right: 10px; text-align: right; "><?= number_format($facture->montant,0,',','.') ?></th>
                                 <td></td>
                           </tr>
                       </tbody>
                   </table>
                    <div class="card text-white" style="background-color: #888; border-color: #333;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    MONTANT: <span style="text-align: right;" class="value">{{ number_format($facture->montant,0,',','.') }} </span>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    TOTAL DES PAIEMENTS: <span style="text-align: right;" class="value">{{ number_format($facture->versement,0,',','.') }} </span>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    RESTE: <span style="text-align: right;" class="value">{{ number_format($facture->reste,0,',','.') }} </span>
                                </div>
                            </div>

                        </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12">

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

                </div>
            </div>


        </div>


    </div>

    <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVEAU PAIEMENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="/rf/bill/add-paiement" method="post">
                        {{csrf_field()}}

                          <div class="card-body">
                            <div class="row">
                            <input type="hidden" name="id" value="{{ $facture->token }}"/>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">MONTANT</label>
                                      <input type="number" class="form-control" id="name" name="montant" placeholder="Saisir le montant ">
                                    </div>
                                </div>

                            </div>


                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>

    <div class="modal fade" id="modal-lg2">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">DELAI DE PAIEMNT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="/rf/bill/add-delai" method="post">
                        {{csrf_field()}}

                          <div class="card-body">
                            <div class="row">
                            <input type="hidden" name="id" value="{{ $facture->token }}"/>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="delai_id">DELAI</label>
                                     <select name="delai_id" id="delai_id">
                                        @foreach($delais as $dela)
                                          <option value="{{ $dela->id }}">{{ $dela->name }}</option>
                                        @endforeach
                                     </select>
                                    </div>
                                </div>

                            </div>


                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>
     
@endsection

@section('script')
<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>
@endsection