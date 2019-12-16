@extends('......layouts.consultant')
@section('page-title')
ELABORATION DU PLAN FINANCIER
@endsection
@section('content')

    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                       @include('includes.Sidebars.dossier')
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <script>

                            var saveUrl = '/consultant/dossier/save-plan-financier';
                            var redirectUrl = '/consultant/dossiers/';
                        </script>
                        @include('includes.Edit.plan_financier')
                    </div>
                </div>
    </div>


@endsection

