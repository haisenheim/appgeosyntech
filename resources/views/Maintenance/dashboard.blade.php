@extends('...layouts.maintenance')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">MODE MAINTENANCE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">Maintenance</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">BIENVENUE DANS LE MODE MAINTENANCE DU SYSTEME</h3>
    </div>
    <div class="card-body">
        <div style="max-width: 400px; margin: 30px auto">
            <div><i id="fa-set"  class="mdi mdi-settings-transfer-outline"></i></div>
        </div>
    </div>
</div>

<style>
    #fa-set{
        font-size: 132px;
        width: 100px;
        display: block;

        margin: 0 auto;
    }
</style>

@endsection