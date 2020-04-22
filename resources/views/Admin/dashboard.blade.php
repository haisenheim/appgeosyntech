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
                                    <td>{{ $data[$i++] }}</td>
                                </tr>

                           @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection