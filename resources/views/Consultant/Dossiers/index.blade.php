@extends('......layouts.consultant')


@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">
                    @foreach($dossiers as $projet)
                    <div class="col-sm-12 col-md-3">
                    <div class="widget widget-success">
                        <div style="padding-left: 10px" class="widget-header">
                             <h5 class="widget-title">{{ $projet->name }}</h5>
                        </div>
                        <div class="widget-content">
                            <div class="">
                                <div class="">
                                    <span style="font-weight: 600; font-size: 1.3rem" class="text-primary"><i class="fa fa-th-large"></i> {{  $projet->type->name }}</span>
                                </div>
                                <div class="text text-danger text-bold"> <i class="fa fa-credit-card"></i> {{ $projet->montant }} </div>
                                <div class="">
                                    <span class=""><i class="fa fa-user"></i> {{  $projet->owner->name }}</span>
                                </div>
                            </div>
                            <div>
                                <span class=""><i class="fa fa-map-marker"></i> {{ $projet->ville->name  }}</span>
                                <span class="pull-right"><a class="btn btn-success btn-xs" href="/consultant/dossiers/{{ $projet->token  }}"> Afficher </a></span>
                            </div>
                        </div>
                    </div>
                     </div>
                    @endforeach

                </div>
            </div>

@endsection