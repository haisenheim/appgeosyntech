@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 style="color: orange" class="mb-0 font-size-18">{{ \Illuminate\Support\Str::limit($projet->name,50) }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">GEOSYNTECH</a></li>
                        <li class="breadcrumb-item active">{{ $projet->client->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <?php $client= $projet->client ?>
    <div class="row">
        <div class="col-md-12 col-sm-12">

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs nav-justified nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                <i class="dripicons-home mr-1 align-middle"></i> <span class="d-none d-md-inline-block">CREATION</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#facturation" role="tab">
                                <i class="mdi mdi-hexagon-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">FACTURATION</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#archives" role="tab">
                                <i class="mdi mdi-hexagon-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">ARCHIVES</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#observations" role="tab">
                                <i class="mdi mdi-account-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">OBSERVATIONS</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div style="border: 1px solid #7c8a96;" class="card">
                        <div class="card-header bg-secondary">
                            <h6 style="font-weight: bolder" class=" text-white">A-DETAIL PROJET</h6>
                        </div>
                        <div class="card-body">
                            <p class="text-info">{{ $projet->name }}</p>
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <ul class="list-group">
                                        <li class="list-group-item text-center" style="padding:0;font-weight: bolder " ><i class="mdi mdi-worker" style="font-size: 30px;"></i> MAITRISE D'OUVRAGE</li>
                                        <li class="list-group-item"><span class="label">MAITRE D'OUVRAGE : </span><span class="text-info value">{{ $projet->maitre->sigle }} - {{ $projet->maitre->name }}</span></li>
                                        <li class="list-group-item"><span class="label">C.S du Marché : </span> <span class="value text-info">{{ $projet->cs?($projet->cs->sigle.' - '.$projet->cs->name):'' }}</span></li>
                                        <li class="list-group-item"><span class="label">Ing. du Marché : </span> <span class="value text-info">{{ $projet->ing?($projet->ing->sigle.' - '.$projet->ing->name):'' }}</span></li>
                                        <li class="list-group-item"><span class="label">Contractant : </span> <span class="value text-info">{{ $projet->contractant?($projet->contractant->sigle.' - '.$projet->contractant->name):'' }}</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="font-weight: bolder; padding: 0 0 0 10px"><i class="mdi mdi-domain" style="font-size: 30px"></i> DOMAINES <a style="margin: 10px" class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-domaine"><i class="fa fa-plus-circle"></i></a></li>
                                        @if($projet->domaines->count())

                                            <li class="list-group-item">
                                                <ul class="list-inline">
                                                    @foreach($projet->domaines as $dom)
                                                     <li class="list-inline-item">
                                                        <ul class="list-inline " style="margin-left: 10px">
                                                            <li class="list-inline-item">{{ $dom->name }}</li>
                                                            <li class="list-inline-item"><a title="Supprimer" class="badge badge-danger" href="/admin/projet/remove-domaine/{{ $dom->id }}/{{ $projet->token }}"><i class="fa fa-trash"></i></a></li>
                                                       </ul>
                                                     </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="list-group-item">AUCUN DOMAINE</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                                <div class="divider" style="border-bottom: 1px solid gray;margin-top: 10px;"></div>
                                <ul style="margin-bottom: 0" class="list-inline">
                                   <li class="list-inline-item" style="font-weight: bolder; padding: 0 10px"><i class="mdi mdi-map-marker text-danger" style="font-size: 25px;"></i> SITE DE LOCALISATION : </li>
                                   <li class="list-inline-item text-info">{{ $projet->pays->name }}</li>
                                   <li class="list-inline-item text-info">REGION - {{ $projet->region?$projet->region->name:'' }}</li>
                                   <li class="list-inline-item text-info">LIEU DIT - {{ $projet->lieu }}</li>

                                </ul>
                                <div class="divider" style="border-bottom: 1px solid gray;"></div>

                        </div>
                     </div>

                      <div style="border: 1px solid #7c8a96;" class="card">
                        <div class="card-header bg-secondary">
                            <h6 style="font-weight: bolder" class=" text-white">B- DETAIL DES PRODUITS <a  class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-produit"><i class="fa fa-plus-circle"></i></a></h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php $i=0 ?>
                                            @if($projet->elements->count())
                                                @foreach($projet->elements as $prdt)
                                                    <?php //dd($prdt) ?>
                                                    <tr>
                                                      <th>{{ $i++ }}</th>
                                                      <th>{{ $prdt->produit->code }}</th>
                                                      <th>{{ $prdt->produit->name }}</th>
                                                      <th>{{ number_format($prdt->quantity,2,',','.') }}{{ $prdt->unit->symbole }}</th>
                                                      <th><a class="badge badge-danger" href="/admin/projet/remove-produit/{{$prdt->produit_id}}/{{$projet->token}}"><i class="fa fa-trash"></i></a></th>
                                                    </tr>
                                                @endforeach


                                            @else
                                                <tr>
                                                    <th colspan="6">AUCUN PRODUIT</th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>


                                </div>

                            </div>


                        </div>
                     </div>

                     <div style="border: 1px solid #7c8a96;" class="card">
                        <div class="card-header bg-secondary">
                            <h6 style="font-weight: bolder" class=" text-white">C- DETAIL DE SUIVI DU PROJET <a  class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-etape"><i class="fa fa-plus-circle"></i></a></h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php $i=0 ?>
                                            @if($projet->steps->count())
                                                <?php
                                                    $etaps = $projet->steps;
                                                    $phases = $etaps->groupBy(function($q){
                                                        return $q->etape->phase?$q->etape->phase->name:null;
                                                    });
                                                ?>
                                                <tr>
                                                    <th></th>
                                                    <th>DATE DEBUT</th>
                                                    <th>GROUPEMENT/ENTREPRISE &numero; 1</th>
                                                    <th>GROUPEMENT/ENTREPRISE &numero; 2</th>
                                                    <th>DATE DE FIN</th>
                                                    <th></th>
                                                </tr>
                                                @foreach($phases as $phase=>$etps)
                                                    <?php //dd($prdt) ?>
                                                    <tr><th colspan="6" class="text-center" style="font-weight: bolder">{{ $phase }}</th></tr>
                                                    @foreach($etps as $step)
                                                        <tr>
                                                            <td>{{ $step->etape->name }}</td>
                                                            <td> {{ $step->debut?date_format($step->debut,'d/m/Y'):'' }} </td>
                                                            <td class="text-info">{{$step->grpa?$step->grpa->sigle:''}}/{{$step->esa?$step->esa->sigle:''}}</td>
                                                            <td class="text-info">{{$step->grpb?$step->grpb->sigle:''}}/{{$step->esb?$step->esb->sigle:''}}</td>
                                                            <td>{{ $step->fin?date_format($step->fin,'d/m/Y'):'' }}</td>
                                                            <th><a class="badge badge-danger" href="/admin/projet/remove-etape/{{$step->id}}"><i class="fa fa-trash"></i></a></th>
                                                        </tr>

                                                    @endforeach

                                                @endforeach
                                            @else
                                                <tr>
                                                    <th colspan="6">AUCUNE ETAPE</th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </div>
                     </div>

                     <div style="border: 1px solid #7c8a96;" class="card">
                        <div class="card-header bg-secondary">
                            <h6 style="font-weight: bolder" class=" text-white">D- DETAILS DU CLIENT FINAL </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if($projet->client->imageUri)
                                    <div class="col-md-2 col-sm-12 text-center">
                                        <img style="height: 50px; width: 50px; padding: 5px; border: 50%" src="{{ asset('img/'.$projet->client->imageUri) }}" alt="Logo du client" class="avatar-circle"/>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>NOM</th>
                                                    <td class="text-info">{{ $projet->client->name  }}</td>
                                                </tr>
                                                <tr>
                                                    <th>SIGLE</th>
                                                    <td class="text-info">{{ $projet->client->sigle  }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-2 col-sm-12 text-center">
                                        <p class="text-info">{{ $projet->client->code }}</p>
                                    </div>
                                @else
                                    <div class="col-md-9 col-sm-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>NOM</th>
                                                    <td class="text-info">{{ $projet->client->name  }}</td>
                                                </tr>
                                                <tr>
                                                    <th>SIGLE</th>
                                                    <td class="text-info">{{ $projet->client->sigle  }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-3 col-sm-12 text-center">
                                        <p class="text-info">{{ $projet->client->code }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>DEMANDEUR DE LA COMMANDE</th>
                                            <th>POINTS FOCAUX</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bolder">NOM</td>
                                            <td class="text-info">{{ $projet->demandeur_name }}</td>
                                             <td class="text-info">{{ $projet->pt_name }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bolder">EAMIL</td>
                                            <td class="text-info">{{ $projet->demandeur_email }}</td>
                                             <td class="text-info">{{ $projet->pt_email }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bolder">TELEPHONE</td>
                                            <td class="text-info">{{ $projet->demandeur_phone }}</td>
                                             <td class="text-info">{{ $projet->pt_phone }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bolder">ADRESSE</td>
                                            <td class="text-info">{{ $projet->demandeur_address }}</td>
                                             <td class="text-info">{{ $projet->pt_address }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     </div>

                        </div>

                        <div class="tab-pane" id="facturation" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#frn" role="tab">
                                            <i class="dripicons-home mr-1 align-middle"></i> <span class="d-none d-md-inline-block">DC FOURNISSEURS</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#trans" role="tab">
                                            <i class="mdi mdi-hexagon-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">DC TRANSITAIRE</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#prix" role="tab">
                                            <i class="mdi mdi-hexagon-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">PRIX</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#proforma" role="tab">
                                            <i class="mdi mdi-hexagon-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">PROFORMA</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#bcfrn" role="tab">
                                            <i class="mdi mdi-hexagon-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">BC FOURNISSEUR </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#bctrans" role="tab">
                                            <i class="mdi mdi-hexagon-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">BC TRANSTAIRE </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#bl" role="tab">
                                            <i class="mdi mdi-hexagon-multiple-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">BONS DE LIVRAISON </span>
                                        </a>
                                    </li>
                                </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-3">
                                        <div class="tab-pane active" id="frn" role="tabpanel">

                                            <div class="card">
                                                <div class="card-header">
                                                  <h6 class="card-title">DEMANDES DE COTATION FOURNISSEUR<a class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-frncotation"><i class="fa fa-plus-circle"></i></a></h6>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                                                    <thead>
                                                    <tr>
                                                      <th>DATE</th>
                                                      <th>FOURNISSEUR</th>
                                                      <th>ORIGINE</th>
                                                      <th>VOLUME DE GROS</th>
                                                      <th>POIDS DE GROS</th>
                                                      <th>PRIX</th>
                                                      <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($projet->frncotations as $cotation)

                                                          <tr>
                                                              <td>{{ date_format($cotation->created_at,'d/m/Y') }}</td>
                                                              <td>{{ $cotation->fournisseur->sigle }}</td>
                                                              <td>{{ $cotation->origine?$cotation->origine->name:'' }}</td>
                                                              <td>{{ number_format($cotation->volume,2,',','.') }}</td>
                                                              <td>{{ number_format($cotation->poids,2,',','.') }}</td>
                                                               <td>{{ number_format($cotation->prix,2,',','.') }}</td>
                                                              <td style="min-width: 7%;">
                                                              <ul style="margin-bottom: 0" class="list-inline">
                                                                <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.frncotations.show',[$cotation->token])}}"><i class="fa fa-search"></i></a></li>
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
                                        <div class="tab-pane" id="trans" role="tabpanel">

                                             <div class="card">
                                                <div class="card-header">
                                                  <h3 class="card-title">DEMANDES DE COTATION TRANSITAIRE<a class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-transcotation"><i class="fa fa-plus-circle"></i></a></h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                                                    <thead>
                                                    <tr>
                                                      <th>DATE</th>
                                                      <th>TRANSITAIRE</th>
                                                      <th>ORIGINE</th>
                                                      <th>VOLUME DE GROS</th>
                                                      <th>POIDS DE GROS</th>
                                                      <th>PRIX</th>
                                                      <th>DC FOURNISSEUR</th>
                                                      <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($projet->transcotations as $cotation)

                                                          <tr>
                                                              <td>{{ date_format($cotation->created_at,'d/m/Y') }}</td>
                                                              <td>{{ $cotation->transitaire->sigle }}</td>
                                                              <td>{{ $cotation->origine?$cotation->origine->name:'' }}</td>
                                                              <td>{{ number_format($cotation->volume,2,',','.') }}</td>
                                                              <td>{{ number_format($cotation->poids,2,',','.') }}</td>
                                                               <td>{{ number_format($cotation->prix,2,',','.') }}</td>
                                                               <td><a href="/admin/frncotations/{{ $cotation->frncotation->token }}">{{ $cotation->frncotation->code }}</a> </td>
                                                              <td style="min-width: 7%;">
                                                              <ul style="margin-bottom: 0" class="list-inline">
                                                                <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.transcotations.show',[$cotation->token])}}"><i class="fa fa-search"></i></a></li>
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
                                        <div class="tab-pane" id="prix" role="tabpanel">
                                            @if(!$projet->proforma)
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="card-title">TABLEAU D'EVALUATION DES COUTS</h6>
                                                </div>
                                                <div class="card-body table-responsive">
                                                    <table class="table table-condensed table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td colspan="2"></td>

                                                                <th>DESIGNATION DES PRODUITS</th>
                                                                <th>FOURNISSEUR</th>
                                                                <th>DESIGN</th>
                                                                <th>TRANSIT</th>
                                                                <th>MARGE</th>
                                                                <th></th>
                                                                <th>PU</th>
                                                                <th>QUANTITE</th>
                                                                <th>S. TOTAL</th>
                                                                <th>ST DESIGN</th>
                                                                <th>ST TRANSIT</th>
                                                                <th>ST MARGE</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i=1; ?>
                                                            <input id="frncotation_id" type="hidden" value="{{ $projet->frncotations->last()->id }}"/>
                                                            <input type="hidden" id="projet_id" value="{{ $projet->id }}"/>
                                                            @foreach($projet->frncotations->last()->lignes as $prdt )
                                                                <tr data-produit_id="{{ $prdt->id }}" class="tr1" data-id="{{ $i }}">
                                                                    <td colspan="2" rowspan="2">{{ $i }}</td>

                                                                    <td class="text-primary">% de majoration des prix</td>
                                                                    <td class="text-primary" contenteditable="false">100</td>
                                                                    <td class="text-primary editable" contenteditable="true" id="pct-design{{$i}}">10</td>
                                                                    <td class="text-primary editable" contenteditable="true" id="pct-transit{{ $i }}">75</td>
                                                                    <td class="text-primary editable" contenteditable="true" id="pct-marge{{ $i }}">50</td>

                                                                    <td colspan="7"></td>
                                                                </tr>
                                                                <tr data-id="{{ $prdt->id }}">
                                                                    <td>{{ $prdt->produit->name }}</td>
                                                                    <td class="mt-prdt editable" id="prdt{{ $i }}" contenteditable="true">0</td>
                                                                    <td contenteditable="false" id="design{{ $i }}">0</td>
                                                                    <td contenteditable="false" id="transit{{ $i }}">0</td>
                                                                    <td contenteditable="false" id="marge{{ $i }}">0</td>
                                                                    <td contenteditable="false" id="dd{{ $i }}">0</td>
                                                                    <td contenteditable="false" id="pu{{ $i }}">0</td>
                                                                    <td contenteditable="false" id="quantity{{ $i }}">{{ $prdt->quantity }}</td>
                                                                    <td contenteditable="false" id="stotal{{ $i }}"></td>
                                                                    <td id="stotal-design{{ $i }}">0</td>
                                                                    <td id="stotal-transit{{ $i }}">0</td>
                                                                    <td id="stotal-marge{{ $i }}">0</td>

                                                                </tr>
                                                                <?php $i = $i +1; ?>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="10"></td>
                                                                <th id="total">0</th>
                                                                <td id="total-design">0</td>
                                                                <td id="total-transit">0</td>
                                                                <td id="total-marge">0</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="debut">DATE D'ETABLISSEMENT</label>
                                                                <input type="date" name="debut" id="debut" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="fin">DATE D'EXPIRATION</label>
                                                                <input type="date" name="fin" id="fin" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                  <label for="note_speciale">NOTE SPECIALE</label>
                                                                  <textarea class="form-control editor" name="note_speciale" id="note_speciale" cols="30" rows="10"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                  <label for="modalites_paiement">MODALITES DE PAIEMENT</label>
                                                                  <textarea class="form-control editor" name="modalites_paiement" id="modalites_paiement" cols="30" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <button id="btn-save" class="btn-orange btn-sm">ENREGISTRER</button>
                                                </div>
                                            </div>
                                            @else
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="card-title">TABLEAU D'EVALUATION DES COUTS</h6>
                                                </div>
                                                <div class="card-body table-responsive">
                                                    <table class="table table-condensed table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td colspan="2"></td>

                                                                <th>DESIGNATION DES PRODUITS</th>
                                                                <th>FOURNISSEUR</th>
                                                                <th>DESIGN</th>
                                                                <th>TRANSIT</th>
                                                                <th>MARGE</th>
                                                                <th></th>
                                                                <th>PU</th>
                                                                <th>QUANTITE</th>
                                                                <th>S. TOTAL</th>
                                                                <th>ST DESIGN</th>
                                                                <th>ST TRANSIT</th>
                                                                <th>ST MARGE</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i=1; ?>
                                                            <input id="frncotation_id" type="hidden" value="{{ $projet->frncotations->last()->id }}"/>
                                                            <input type="hidden" id="projet_id" value="{{ $projet->id }}"/>
                                                            @foreach($projet->frncotations->last()->lignes as $prdt )
                                                                <tr data-produit_id="{{ $prdt->id }}" class="tr1" data-id="{{ $i }}">
                                                                    <td colspan="2" rowspan="2">{{ $i }}</td>

                                                                    <td class="text-primary">% de majoration des prix</td>
                                                                    <td class="text-primary" contenteditable="false">100</td>
                                                                    <td class="text-primary editable" contenteditable="true" id="pct-design{{$i}}">{{ $prdt->pct_design }}</td>
                                                                    <td class="text-primary editable" contenteditable="true" id="pct-transit{{ $i }}">{{ $prdt->pct_transit }}</td>
                                                                    <td class="text-primary editable" contenteditable="true" id="pct-marge{{ $i }}">{{ $prdt->pct_marge }}</td>

                                                                    <td colspan="7"></td>
                                                                </tr>
                                                                <tr data-id="{{ $prdt->id }}">
                                                                    <td>{{ $prdt->produit->name }}</td>
                                                                    <td class="mt-prdt editable" id="prdt{{ $i }}" contenteditable="true">{{ $prdt->pu }}</td>
                                                                    <td contenteditable="false" id="design{{ $i }}">{{ $prdt->pu * $prdt->pct_design / 100 }}</td>
                                                                    <td contenteditable="false" id="transit{{ $i }}">{{ $prdt->pu * $prdt->pct_transit / 100 }}</td>
                                                                    <td contenteditable="false" id="marge{{ $i }}">{{ $prdt->pu * $prdt->pct_marge / 100 }}</td>
                                                                    <td contenteditable="false" id="dd{{ $i }}">0</td>
                                                                    <td contenteditable="false" id="pu{{ $i }}">{{ $prdt->pu * $prdt->quantity }}</td>
                                                                    <td contenteditable="false" id="quantity{{ $i }}">{{ $prdt->quantity }}</td>
                                                                    <td contenteditable="false" id="stotal{{ $i }}"></td>
                                                                    <td id="stotal-design{{ $i }}">0</td>
                                                                    <td id="stotal-transit{{ $i }}">0</td>
                                                                    <td id="stotal-marge{{ $i }}">0</td>

                                                                </tr>
                                                                <?php $i = $i +1; ?>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="10"></td>
                                                                <th id="total">0</th>
                                                                <td id="total-design">0</td>
                                                                <td id="total-transit">0</td>
                                                                <td id="total-marge">0</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="debut">DATE D'ETABLISSEMENT</label>
                                                                <input type="date" name="debut" id="debut" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="fin">DATE D'EXPIRATION</label>
                                                                <input type="date" name="fin" id="fin" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                  <label for="note_speciale">NOTE SPECIALE</label>
                                                                  <textarea class="form-control editor" name="note_speciale" id="note_speciale" cols="30" rows="10"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                  <label for="modalites_paiement">MODALITES DE PAIEMENT</label>
                                                                  <textarea class="form-control editor" name="modalites_paiement" id="modalites_paiement" cols="30" rows="10"><?= $projet->proforma ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <button id="btn-save" class="btn-orange btn-sm">ENREGISTRER</button>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane" id="proforma" role="tabpanel">
                                            <h6>PROFORMA</h6>
                                        </div>
                                        <div class="tab-pane" id="bcfrn" role="tabpanel">
                                            <h6>BON DE COMMANDE FOURNISSEUR</h6>
                                        </div>
                                        <div class="tab-pane" id="bctrans" role="tabpanel">
                                            <h6>BON DE COMMANDE TRANSITAIRE</h6>
                                        </div>
                                        <div class="tab-pane" id="bl" role="tabpanel">
                                            <h6>BON DE LIVRAISON</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="archives" role="tabpanel">

                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#etudes" role="tab">
                                                <i class="mdi mdi-kubernetes mr-1 align-middle"></i> <span class="d-none d-md-inline-block">ETUDES</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#fourniture" role="tab">
                                                <i class="mdi mdi-kubernetes mr-1 align-middle"></i> <span class="d-none d-md-inline-block">FOURNITURE</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#realisation" role="tab">
                                                <i class="mdi mdi-layers-triple  mr-1 align-middle"></i> <span class="d-none d-md-inline-block">REALISATION</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                     <div class="tab-content p3">
                                        <div class="tab-pane active" id="etudes" role="tabpanel">
                                            <h4 class="page-header">ETUDES <span style="float: right"><a data-target="#add-doc-etude" data-toggle="modal" class="btn btn-sm btn-orange" href="">Ajouter un document</a></span></h4>

                                            <div>
                                                <?php $docs = $projet->documents->filter(function($value, $key){return $value->type->etape_id == 2;}); ?>
                                                <ul class="list-group">
                                                @foreach($docs as $doc)
                                                    <li style="display: flex; flex-direction: row; justify-content: space-between;" class="list-group-item">
                                                        <a href="{{ asset('documents/'.$doc->path) }}"><span>{{ $doc->type->name }}</span></a>
                                                        <span> {{ $doc->user->name }}</span>
                                                        <span>{{ date_format($doc->created_at, 'd/m/Y H:i') }}</span>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="fourniture" role="tabpanel">
                                           <h4 class="page-header">FOURNITURE <span style="float: right"><a data-target="#add-doc-fourniture" data-toggle="modal" class="btn btn-sm btn-orange" href="">Ajouter un document</a></span></h4>

                                            <div>
                                                <?php $docs = $projet->documents->filter(function($value, $key){return $value->type->etape_id == 3;}); ?>
                                                <ul class="list-group">
                                                @foreach($docs as $doc)
                                                    <li style="display: flex; flex-direction: row; justify-content: space-between;" class="list-group-item">
                                                        <a href="{{ asset('documents/'.$doc->path) }}"><span>{{ $doc->type->name }}</span></a>
                                                        <span> {{ $doc->user->name }}</span>
                                                        <span>{{ date_format($doc->created_at, 'd/m/Y H:i') }}</span>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="realisation" role="tabpanel">
                                            <h4 class="page-header">REALISATIONS <span style="float: right"><a data-target="#add-doc-realisation" data-toggle="modal" class="btn btn-sm btn-orange" href="">Ajouter un document</a></span></h4>

                                            <div>
                                                <?php $docs = $projet->documents->filter(function($value, $key){return $value->type->etape_id == 4;}); ?>
                                                <ul class="list-group">
                                                @foreach($docs as $doc)
                                                    <li style="display: flex; flex-direction: row; justify-content: space-between;" class="list-group-item">
                                                        <a href="{{ asset('documents/'.$doc->path) }}"><span>{{ $doc->type->name }}</span></a>
                                                        <span> {{ $doc->user->name }}</span>
                                                        <span>{{ date_format($doc->created_at, 'd/m/Y H:i') }}</span>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="observations" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                  <h4><span style="float: right"><a data-target="#add-comment" data-toggle="modal" class="btn btn-sm btn-orange" href="">Commenter</a></span></h4>

                                    @foreach($projet->comments as $comment)

                                        <div class="post">
                                          <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="<?= $comment->user->imageUri?asset('img/'.$comment->user->imageUri) :asset('img/avatar.png') ?>" alt="user image">
                                            <span class="username">
                                              <a href="#">{{ $comment->user->name  }}</a>
                                            </span>
                                            <span class="description">Date de publication - {{ date_format($comment->user->created_at,'d/m/Y H:i:s') }}</span>
                                          </div>
                                          <!-- /.user-block -->
                                          <p>
                                            {{ $comment->description }}
                                          </p>


                                        </div>

                                    @endforeach

                                    <div class="post">
                                      <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="<?= asset('img/avatar.png') ?>" alt="user image">
                                        <span class="username">
                                          <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 7:45 PM today</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                      </p>

                                      <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                      </p>
                                    </div>

                                    <div class="post clearfix">
                                      <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                        <span class="username">
                                          <a href="#">Sarah Ross</a>
                                        </span>
                                        <span class="description">Sent you a message - 3 days ago</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                      </p>
                                      <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                                      </p>
                                    </div>

                                    <div class="post">
                                      <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                        <span class="username">
                                          <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 5 days ago</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                      </p>

                                      <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                                      </p>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="modal-domaine">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">ASSOCIER UN DOMAINE</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/projet/add-domaine" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">
                             <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="domaine_id" required="required" id="">
                                        <option value="">SELECTIONNER UN DOMAINE</option>
                                        @foreach($domaines as $dom)
                                            <option value="{{ $dom->id }}">{{ $dom->name }}</option>
                                        @endforeach
                                   </select>

                                 </div>
                             </div>

                         </div>


                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="add-doc-etude">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">AJOUTER UN DOCUMENT D'ETUDE</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/projet/add-document" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">
                             <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="type_id" required="required" id="">
                                        <option value="">SELECTIONNER LE TYPE DE DOCUMENT</option>
                                        @foreach($tdocuments->where('etape_id',2) as $tdoc)
                                            <option value="{{ $tdoc->id }}">{{ $tdoc->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Fichier</label>
                                    <input class="form-control" type="file" required="required" name="path"/>
                                </div>
                             </div>

                         </div>

                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>


        <div class="modal fade" id="add-doc-fourniture">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">AJOUTER UN DOCUMENT DE FOURNITURE</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/projet/add-document" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">
                             <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="type_id" required="required" id="">
                                        <option value="">SELECTIONNER LE TYPE DE DOCUMENT</option>
                                        @foreach($tdocuments->where('etape_id',3) as $tdoc)
                                            <option value="{{ $tdoc->id }}">{{ $tdoc->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Fichier</label>
                                    <input class="form-control" type="file" required="required" name="path"/>
                                </div>
                             </div>

                         </div>

                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="add-doc-realisation">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">AJOUTER UN DOCUMENT</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/projet/add-document" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">
                             <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="type_id" required="required" id="">
                                        <option value="">SELECTIONNER LE TYPE DE DOCUMENT</option>
                                        @foreach($tdocuments->where('etape_id',4) as $tdoc)
                                            <option value="{{ $tdoc->id }}">{{ $tdoc->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Fichier</label>
                                    <input class="form-control" type="file" required="required" name="path"/>
                                </div>
                             </div>

                         </div>

                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>

         <div class="modal fade" id="modal-transcotation">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVELLE DEMANDE DE COTATION TRANSITAIRE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.transcotations.store')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>
                          <div class="card-body">
                            <div class="row">

                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">TRANSITAIRE</label>
                                      <select required="required" name="transitaire_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($fournisseurs as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="pay_id">DEMANDE DE COTATION FOURNISSEUR</label>
                                      <select required="required" name="frncotation_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($projet->frncotations as $role)
                                                <option value="{{ $role->id }}">{{ $role->code }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">ORIGINE</label>
                                      <select required="required" name="origine_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($villes as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">DESTINATION</label>
                                      <select required="required" name="destination_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($villes as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">OPTION D'IMPORTATION</label>
                                      <select required="required" name="import_option_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($ioptions as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">MODE DE TRANSPORT</label>
                                      <select required="required" name="transport_option_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($toptions as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                </div>
                               <h6 style=" margin:20px 0 15px 0; padding-bottom: 10px; border-bottom: 1px solid orangered">EMBALLAGE</h6>
                                <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="ft40">CONTAINER 40'</label>
                                      <input class="form-control" name="ft40" id="ft40" type="number"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="ft40">CONTAINER 20'</label>
                                      <input class="form-control" name="ft20" id="ft40" type="number"/>
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="ft40">PALLETS</label>
                                      <input class="form-control" name="pallets" id="ft40" type="number"/>
                                    </div>
                                </div>


                                </div>


                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm1">INFOMATIONS COMPLEMENTAIRES</label>
                                              <textarea class="form-control" name="expected_informations" id="elm2" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
          </div>


        <div class="modal fade" id="add-comment">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">COMMENTER</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/projet/add-comment" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Saisir votre commentaire ici" name="description" id="" cols="30" rows="5"></textarea>

                                </div>
                             </div>

                         </div>

                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
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
                     <form enctype="multipart/form-data" role="form" action="/admin/projet/add-produit" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>

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
                                   <select class="form-control" name="unit_id" required="required" id="">
                                        <option value="">UNITE</option>
                                        @foreach($units as $dom)
                                            <option value="{{ $dom->id }}">{{ $dom->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                         </div>


                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-etape">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">ASSOCIER UNE ETAPE</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/projet/add-etape" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">
                             <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="etape_id" required="required" id="">
                                        <option value="">SELECTIONNER UN ETAPE</option>
                                        @foreach($etapes as $et)
                                            <option value="{{ $et->id }}"> {{ $et->name }} &nbsp; ( {{ $et->phase->name }} ) </option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="groupe1"  id="">
                                        <option value="">GROUPEMENT 1</option>
                                        @foreach($clients as $dom)
                                            <option value="{{ $dom->id }}">{{ $dom->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="entreprise1"  id="">
                                        <option value="">ENTREPRISE 1</option>
                                        @foreach($clients as $dom)
                                            <option value="{{ $dom->id }}">{{ $dom->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="groupe2"  id="">
                                        <option value="">GROUPEMENT 2</option>
                                        @foreach($clients as $dom)
                                            <option value="{{ $dom->id }}">{{ $dom->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-6 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="entreprise2"  id="">
                                        <option value="">ENTREPRISE 2</option>
                                        @foreach($clients as $dom)
                                            <option value="{{ $dom->id }}">{{ $dom->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="">DATE DE DEBUT</label>
                                    <input class="form-control" type="date"  name="debut" placeholder="DATE DE DEBUT"/>
                                </div>
                             </div>
                             <div class="col-md-4 col-sm-12"></div>
                             <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="">DATE DE FIN</label>
                                    <input class="form-control" type="date"  name="fin" placeholder="DATE DE FIN"/>
                                </div>
                             </div>



                         </div>


                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>


        <div class="modal fade" id="modal-frncotation">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVELLE DEMANDE DE COTATION FOURNISSEUR</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.frncotations.store')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="projet_id" value="{{ $projet->id }}"/>
                          <div class="card-body">
                            <div class="row">

                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">FOURNISSEUR</label>
                                      <select required="required" name="fournisseur_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($fournisseurs as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>



                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm1">INFOMATIONS COMPLEMENTAIRES</label>
                                              <textarea class="form-control" name="expected_informations" id="elm1" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
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

        .post {
            border-bottom: 1px solid #adb5bd;
            color: #666;
            margin-bottom: 15px;
            padding-bottom: 15px;
        }

        .post .user-block {
            margin-bottom: 15px;
        }

        .user-block {
            float: left;
            margin-right: 20px;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .user-block img {
            float: left;
            height: 40px;
            width: 40px;
        }

        .img-circle {
            border-radius: 50%;
        }

        .img-bordered-sm {
            border: 2px solid #adb5bd;
            padding: 2px;
        }

        .user-block .username {
            font-size: 16px;
            font-weight: 600;
            margin-top: -1px;
        }

        .user-block .description {
            color: #6c757d;
            font-size: 13px;
            margin-top: -3px;
        }

        .user-block .comment, .user-block .description, .user-block .username {
            display: block;
            margin-left: 50px;
        }

        .tab-pane .nav-link{
            font-size: 0.72rem;
        }

        .card .card-header.bg-secondary{
        padding: 5px 15px;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #fb4602b3;
        }

        .nav-tabs-custom .nav-item .nav-link.active {
            color: #fb4602b3;
        }
        .card .card-header.bg-secondary h6{margin-bottom: 0; line-height: 2}
    </style>

<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
            <!-- SweetAlert2 -->
<script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>


<script>
    $('.editable').keyup(function(){
        refresh();
    });

    function refresh(){
        var s_design = 0;
         var s_transit = 0;
         var s_marge = 0;

        $('.tr1').each(function(){
            var id = $(this).data('id');
            var qty = $('#quantity'+id).text();
            var prdt = $('#prdt'+id).text();
            var pct_design = $('#pct-design'+id).text();
            var val_design = parseFloat(pct_design) * parseFloat(prdt) / 100;
            $('#design'+id).text(val_design);
            $('#stotal-design'+id).text(val_design * parseFloat(qty));
            s_design = s_design + val_design * parseFloat(qty);

            var pct_transit = $('#pct-transit'+id).text();
            var val_transit = parseFloat(pct_transit) * parseFloat(prdt) / 100;
            $('#transit'+id).text(val_transit);
            $('#stotal-transit'+id).text(val_transit * parseFloat(qty));
            s_transit = s_transit + val_transit * parseFloat(qty);

            var pct_marge = $('#pct-marge'+id).text();
            var val_marge = parseFloat(pct_marge) * parseFloat(prdt) / 100;
            $('#marge'+id).text(val_marge);
            $('#stotal-marge'+id).text(val_marge * parseFloat(qty));
            s_marge = s_marge + val_marge * parseFloat(qty);

            var pu = val_design + val_transit + val_marge;
            $('#pu'+id).text(pu);
            var dd = val_design * parseFloat(pct_marge) / 100;
            $('#dd'+id).text(dd);

           // var qty = $('#quantity'+id).text();
            var stotal =  pu * parseFloat(qty);
            $('#stotal'+id).text(stotal);
             $('#total-marge').text(s_marge);
             $('#total-transit').text(s_transit);
             $('#total-design').text(s_design);
             $('#total').text(s_marge + s_design + s_transit);



        });
    }


    $('#btn-save').click(function(e){
        e.preventDefault();
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });

        var lignes = [];

         $('.tr1').each(function(){
             var id = $(this).data('id');
            var elt = {};
            elt.id = $(this).data('produit_id');
            elt.pu= $('#prdt'+id).text();
            elt.pct_design = $('#pct-design'+id).text();
            elt.pct_transit = $('#pct-transit'+id).text();
            elt.pct_marge = $('#pct-marge'+id).text();
            lignes.push(elt);

        });

        var spinHandle_firstProcess = loadingOverlay.activate();
        $.ajax({
            url:'/admin/proformas/',
            type:'Post',
            dataType:'JSON',
            data:{_csrf:$('input[name="_token"]').val(), lignes:lignes, modalites_paiement:$('#modalites_paiement').val(),note_speciale:$('#note_speciale').val(), debut:$('#debut').val(),fin:$('#fin').val(), projet_id:$('#projet_id').val()},
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
            },
            success: function(data){
               window.location.reload();

            },
            error:function(){
                loadingOverlay.cancel(spinHandle_firstProcess);
                Toast.fire({
                           type: 'error',
                           title: 'Une erreur est survenue lors de l\'enregistrement de la proforma. Verifiez que toutes les informations sont saisies correctement !!!'
                         });

            }
        });


    });


    $('.mt-prdt').keyup(function(e){
        var code = e.keyCode;
        var val = $(this).text();

        if($.isNumeric(val)){
          console.log(val);

        }

        /*if(code == 13){
            e.preventDefault();
            if($.isNumeric(val)){
              console.log(val);
            }
        }*/
    });

</script>

          <!--tinymce js-->
<script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

        <!-- init js -->
<script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
     
@endsection

@section('script')
<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>


@endsection