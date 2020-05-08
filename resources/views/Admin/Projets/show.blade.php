@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 style="color: orange" class="mb-0 font-size-18">{{ \Illuminate\Support\Str::limit($projet->name,50) }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
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
        <div class="col-md-10 col-sm-12">

            <div class="card">

                <div class="card-body">
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