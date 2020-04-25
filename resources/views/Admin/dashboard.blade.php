@extends('...layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">TABLEAU DE BORD <span class="pull-right">INDICATEURS DE PERFORMANCE DE L'ANNEE <?= date('Y') ?></span></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SITRAD MANAGEMENT</a></li>
                        <li class="breadcrumb-item active">Tableau de bord</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

<div>
    <h5 style="padding-bottom: 10px; border-bottom: 1px #cccccc">ACTIVITES DE BASE</h5>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">CLIENTS</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>OBJECTIF</th>
                                <th>REALISATION</th>
                                <th>ECART</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $nname = $obj_clients->firstWhere('id',1)->type->name }}</th>
                                <th>{{ $ob = $obj_clients->firstWhere('id',1)->objectif }}</th>
                                <th>{{ $nb_clients }}</th>
                                <th>{{ $nb_clients - $ob }}</th>
                            </tr>
                            <tr>
                                <th>{{ $nname = $obj_clients->firstWhere('id',2)->type->name }}</th>
                                <th>{{ $ob = $obj_clients->firstWhere('id',2)->objectif }}</th>
                                <th>{{ 0 }}</th>
                                <th>{{ - $ob }}</th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">FOURNISSEURS</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>OBJECTIF</th>
                                <th>REALISATION</th>
                                <th>ECART</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($frns as $frn)
                               @php
                                $obj = $obj_frns->firstWhere('tpartenaire_id',$frn->id);
                               @endphp
                               <tr>
                                   <td>{{ $frn->name }}</td>
                                   <td>{{ $ob = $obj?$obj->objectif:0 }}</td>
                                   <td>{{ $nb = $frn->partenaires->count() }}</td>
                                   <td>{{ $nb - $ob }} </td>
                               </tr>
                           @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">AGENTS</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>OBJECTIF</th>
                                <th>REALISATION</th>
                                <th>ECART</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                              $i=0;
                           @endphp
                           @foreach($tob_agents as $ta)
                                @php
                                    $obj = $obj_agents->firstWhere('tobagent_id',$ta->id);
                                @endphp
                                <tr>
                                    <td>{{ $ta->name }}</td>
                                    <td>{{ $ob = $obj?$obj->objectif:0 }}</td>
                                    <td>{{ $d = $data[$i++] }}</td>
                                    <td>{{ $d - $ob }}</td>
                                </tr>

                           @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <h5 style="border-bottom: 1px solid #222; padding-bottom: 10px; margin-bottom: 20px">FINANCES</h5>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">DELAIS DE PAIEMENT CLIENT</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bodered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>OBJECTIF</th>
                                <th>REALISATION</th>
                                <th>ECART</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                @php
                                    $obj = $obj_delaiclients->firstWhere('client_id',$client->id);
                                    $delai = $client->factures->where('annee',date('Y'))->reduce(function($carry, $item){
                                        $val = 0;
                                        if($item->delai){
                                            $val = $item->delai->nombre;
                                        }
                                        return $carry + $val ;
                                    });
                                @endphp
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $ob =$obj?$obj->objectif:0 }}</td>
                                    <td>{{ $delai }}</td>
                                    <td>{{ $delai - $ob }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">PERFORMANCE FINANCIERE</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bodered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>OBJECTIF</th>
                                <th>REALISATION</th>
                                <th>ECART</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($results as $rst)

                                <tr>
                                    <td>{{ $rst['name'] }}</td>
                                    <td>{{ $rst['objectif'] }}</td>
                                    <td>{{ $rst['realisation'] }}</td>
                                    <td>{{ $rst['ecart'] }}</td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <h5 style="border-bottom: 1px solid #222; padding-bottom: 10px; margin-bottom: 20px">TRESORERIE</h5>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">FLUX MENSUELS DE TRESORERIE</h6>
                </div>
                <div class="card-body table-responsive">
                    <?php
                        $enc = $treso[1];
                        $dec = $treso[2];
                    ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2"></th>
                                @foreach($mois as $m)
                                 <th>{{ $m->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="4">ENCAISSEMENTS</th>
                            </tr>
                            <tr>
                                <td>OBJECTIF</td>
                                @foreach($mois as $m)
                                 <td><?= $enc[$m->id][1] ?></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>REALISATION</td>
                                @foreach($mois as $m)
                                 <td><?= $enc[$m->id][2] ?></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>ECART</td>
                                @foreach($mois as $m)
                                 <td><?= $enc[$m->id][3] ?></td>
                                @endforeach
                            </tr>


                            <tr>
                                <th rowspan="4">DECAISSEMENTS</th>
                            </tr>
                            <tr>
                                <td>OBJECTIF</td>
                                @foreach($mois as $m)
                                 <td><?= $dec[$m->id][1] ?></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>REALISATION</td>
                                @foreach($mois as $m)
                                 <td><?= $dec[$m->id][2] ?></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>ECART</td>
                                @foreach($mois as $m)
                                 <td><?= $dec[$m->id][3] ?></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection