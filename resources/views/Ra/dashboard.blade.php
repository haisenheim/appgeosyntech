@extends('...layouts.ra')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">TABLEAU DE BORD</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">Tableau de bord</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">ICI LE TABLEAU DE BOARD</h3>
    </div>
    <div class="card-body">
        CORPS DU TABLEAU DE BORD
    </div>
</div>

@endsection