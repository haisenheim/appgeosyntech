@extends('......layouts.angel)

@section('content-header')
    <div class="">
       <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">GESTION DES CESSIONS D'ACTIFS</h3>
        <h5 style="font-weight: 600; margin-top: 20px; color: #FFFFFF; padding-bottom: 5px; border-bottom: solid #FFFFFF 1px;"> {{$projet->name}}</h5>
    </div>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">

                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i>
                                    <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                    </div>
                                </a>
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

                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="card">
                            <div class="card-header">

                                    <h5>DESCRIPTION</h5>
                            </div>
                            <div class="card-body">
                                    <p>
                                        <?= $projet->description ?>
                                    </p>

                               </div>
                        </div>


                        <div class="card">
                               <div class="card-header">
                                    <h5>CARACTERISTIQUES</h5>
                               </div>
                               <div class="card-body">
                                    <p>
                                        <?= $projet->caracteristiques ?>
                                    </p>
                               </div>
                            </div>
                    </div>
                        </div>
                    </div>


      <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

    <script type="text/javascript">
        $(document).ready(function() {
          $('textarea').summernote({
            height: 200,
            tabsize: 2,
            followingToolbar: true,
            lang:'fr-FR'
          });
        });
      </script>

@endsection

@section('nav_actions')
    @if($projet->subscribed)
     <a class="btn btn-xs btn-success" href="/angel/actif/unsubscribe" ><i class="fa fa-check-circle"></i> Se desinscrire</a>
     @else
     <a class="btn btn-xs btn-success" href="/angel/actif/souscribe" ><i class="fa fa-remove"></i> S'inscrire</a>
     @endif
@endsection