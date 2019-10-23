@extends('......layouts.consultant')

@section('page_header')
    <div class="">
        <h3 class="page-header">GESTION DES CESSIONS D'ACTIFS</h3>
        <div class="pull-right">
            <span style="color: #FFFFFF; margin-right: 30px" class="dropdown-toggle"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                   <i class="fa fa-cogs"></i>&nbsp;Actions
               </span>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                       <li>
                           <a href="/consultant/actifs/{{$projet->token}}/edit"><i class="fa fa-pencil"></i>&nbsp;Editer le Teaser</a>
                       </li>
                   </ul>
        </div>
    </div>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">

                    <div class="col-md-4 col-sm-12">
                        <div class="well">

                            <h4 style="background-color: inherit">{{ $projet->name  }}</h4>

                            <div style="max-height: 300px; max-width: 300px">
                                @if($projet->imageUri)
                                    <img class="img-thumbnail" src="{{asset('img/'.$projet->imageUri)}}" alt=""/>
                                    <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
                                @else
                                     <img class="img-thumbnail" src="{{asset('img/logo-obac.png')}}" alt=""/>
                                     <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
                                @endif
                            </div>

                            <p>TYPE D'IMMOBILISATION : {{ $projet->tactif->name }}</p>
                            <p>DATE DE CREATION : <span class="value"> {{ date_format($projet->created_at,'d/m/Y') }}</span></p>
                            <p>PROMOTEUR : <span class="value">{{ $projet->owner->name }}</span></p>



                            <p>PRIX INITIAL : {{ $projet->prix }}</p>
                            <input type="hidden" id="id" value="<?= $projet->id ?>"/>
                            <p><i class="fa fa-map-marker"></i> {{ $projet->ville->name }}</p>
                            @if($projet->expert_id)
                                <p>CONSULTANT : <span class="value">{{ $projet->consultant->name }}</span></p>

                            @endif



                        </div>


                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="widget">
                            <div class="widget-content">
                               <fieldset>
                                    <legend>DESCRIPTION</legend>
                                    <p>
                                        <?= $projet->description ?>
                                    </p>
                               </fieldset>
                               <hr/>
                               <fieldset>
                                    <legend>CARACTERISTIQUES</legend>
                                    <p>
                                        <?= $projet->caracteristiques ?>
                                    </p>
                               </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

    </div>

@endsection

@section('action')
     <a class="btn btn-xs btn-success" href="/consultant/actifs/{{$projet->token}}/edit"><i class="fa fa-pencil"></i> Editer le teaser</a>
@endsection