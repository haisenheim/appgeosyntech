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
                                <th>{{ $nname = $obj_clients->firstWhere('id',1)->tobclient->name }}</th>
                                <th>{{ $ob = $obj_clients->firstWhere('id',1)->objectif }}</th>
                                <th>{{ $nb_clients }}</th>
                                <th>{{ $nb_clients - $ob }}</th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection