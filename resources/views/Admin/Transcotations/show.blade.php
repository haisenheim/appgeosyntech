@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 style="color: orange" class="mb-0 font-size-18">{{$projet->transitaire->sigle }} <span>COTATION DU </span> <span>{{ date_format($projet->created_at,'d/m/Y') }}</span></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">GSM</a></li>
                        <li class="breadcrumb-item active">{{ $projet->transitaire?$projet->transitaire->name:'-' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">

            <div class="card">
                <div class="card-header">
                    <ul class="list-inline pull-right">
                        <li class="list-inline-item">
                            <a href="/transitaire-cotation/print/{{ $projet->token }}" title="imprimer" class="btn tbn-xs btn-danger"><i class="mdi mdi-printer"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                      <div style="border: 1px solid #7c8a96;" class="card">
                        <div class="card-header bg-secondary">
                            <h6 style="font-weight: bolder" class=" text-white">A- DETAIL DES PRODUITS <a  class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-produit"><i class="fa fa-plus-circle"></i></a></h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Pos.</th>
                                                <th>Designation</th>
                                                <th>Unites</th>
                                                <th colspan="2">Quantites</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; $som=0; ?>
                                            @if($projet->lignes->count())
                                                @foreach($projet->lignes as $prdt)
                                                    <?php //dd($prdt) ?>
                                                    <tr>
                                                      <td>{{ $i++ }}</td>
                                                      <td>
                                                          <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                              <li style="font-weight: bolder">{{ $prdt->produit->name }}</li>
                                                              <li>HS CODE: <span class="text-info">{{ $prdt->produit->code }}</span></li>
                                                              <li>
                                                                   <ul class="list-inline">
                                                                        <li class="list-inline-item">DIMENSIONS : </li>
                                                                        <li class="list-inline-item">Largeur(m) : <span class="text-info">{{ $prdt->produit->largeur }}</span></li>
                                                                        <li class="list-inline-item">Longueur(m) : <span class="text-info">{{ $prdt->produit->longueur }}</span></li>
                                                                        <li class="list-inline-item">Diametre(cm) : <span class="text-info">{{ $prdt->produit->diametre }}</span></li>
                                                                   </ul>
                                                              </li>
                                                          </ul>
                                                      </td>
                                                      <td>
                                                          <ul style="list-style: none; padding: 0; margin-bottom: 0">
                                                            <li>Area (m²) : <span class="text-info">{{ $prdt->area }}</span></li>
                                                            <li>volume (m³) : <span class="text-info">{{ $prdt->produit->volume }}</span></li>
                                                            <li>weigth (Kg ) : <span class="text-info">{{ $prdt->produit->poids }}</span></li>
                                                          </ul>
                                                      </td>

                                                      <td>{{ number_format($prdt->quantity,2,',','.') }} <br/> Rouleaux</td>
                                                      <td>
                                                        <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                            <li class="text-info">{{ number_format($prdt->area * $prdt->quantity,2,',','.') }} m² </li>
                                                            <li class="text-info">{{ number_format($vg=$prdt->produit->volume * $prdt->quantity,2,',','.') }} m³ </li>
                                                            <li class="text-info">{{ number_format($pg=$prdt->produit->poids * $prdt->quantity,2,',','.') }} Kg </li>
                                                        </ul>

                                                      </td>
                                                      <td>
                                                        <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                            <li>Prix (€/m²) : <span class="text-info">{{ number_format($prdt->price,2,',','.') }} €</span></li>
                                                            <li></li>
                                                            <li>Montant total: <span class="text-info">{{ number_format( ($aux=$prdt->price * $prdt->area * $prdt->quantity),2,',','.' ) }} €</span></li>
                                                        </ul>
                                                      </td>
                                                      <td><a class="badge badge-danger" href="/admin/transcotation/remove-produit/{{$prdt->id}}"><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                    <?php $som=$som+$aux; ?>
                                                @endforeach
                                                <tr>
                                                    <th colspan="5" style="text-align: right; font-weight: bolder">TOTAL</th>
                                                    <th colspan="2" style="text-align: right; font-weight: bolder; padding-right: 20px" class="bg-warning">{{ number_format($som,2,',','.') }} €</th>
                                                </tr>


                                            @else
                                                <tr>
                                                    <th colspan="6">AUCUN PRODUIT</th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div>
                     </div>

                      <div style="border: 1px solid #7c8a96;" class="card">
                        <div class="card-header bg-secondary">
                            <h6 style="font-weight: bolder" class=" text-white">B- DETAILS D'IMPORTATION</h6>
                        </div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <ul class="list-group">
                                    <li class="list-group-item"><span class="label">Origine : </span><span class="value text-info">{{ $projet->origine->name }}/{{ $projet->origine->pay->name }}</span></li>
                                    <li class="list-group-item"><span class="label">Volume de gros : </span><span class="value text-info">{{ number_format($projet->gross_volume,2,',','.') }} m³</span></li>
                                    <li class="list-group-item"><span class="label">Poids de gros : </span><span class="value text-info">{{ number_format($projet->gross_weigth,2,',','.') }} kg</span></li>
                                </ul>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <ul class="list-group">
                                    <li class="list-group-item"><span class="label">Option de livraison : </span><span class="value text-info">{{ $projet->ioption?$projet->ioption->name:'-'  }}</span></li>
                                    <li class="list-group-item"><span class="label">Mode de transport : </span><span class="value text-info">{{ $projet->toption?$projet->toption->name:'-'  }}</span></li>
                                    <li class="list-group-item">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">Empaquetage : </li>
                                            <li class="list-inline-item"><span class="label">40' : </span><span class="value text-info">{{ $projet->ft40 }}</span></li>
                                            <li class="list-inline-item"><span class="label">20' : </span><span class="value text-info">{{ $projet->ft20 }}</span></li>
                                            <li class="list-inline-item"><span class="label">Palettes : </span><span class="value text-info">{{ $projet->pallets }}</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <div style="border: 1px solid #7c8a96;" class="card">
                                <div class="card-header bg-secondary">
                                    <h6 style="font-weight: bolder" class=" text-white">C- INFORMATIONS COMPLEMENTAIRES</h6>
                                </div>
                                <div class="card-body">
                                    <P>
                                        <?= $projet->expected_informations ?>
                                    </P>
                                </div>
                            </div>
                        </div>
                     </div>

                </div>
            </div>
        </div>




        <div class="modal fade" id="modal-produit">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">ASSOCIER UN PRODUIT</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/transcotation/add-produit" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="transcotation_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">
                             <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="produit_id" required="required" id="">
                                        <option value="">SELECTIONNER UN PRODUIT</option>
                                        @foreach($produits as $dom)
                                            <option value="{{ $dom->id }}">{{ $dom->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" required="required" name="quantity" placeholder="Saisir la quantite. Exple: 56.93"/>
                                </div>
                             </div>

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" required="required" name="price" placeholder="Saisir le prix. Exple: 16.40"/>
                                </div>
                             </div>

                         </div>


                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> ENREGISTRER</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>



    </div>

    <style>
        .card .card-header.bg-secondary{
        padding: 5px 15px;
        }
        .card .card-header.bg-secondary h6{margin-bottom: 0; line-height: 2}
    </style>
     
@endsection

@section('script')
<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>
@endsection