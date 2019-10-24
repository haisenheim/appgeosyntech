@extends('......layouts.consultant')

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

      <div class="modal fade modal-lg" id="TModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
            <div class="modal-header">
                <h5>EDITION DU PITCH</h5>
            </div>
            <div class="modal-content">
                <form class="form" action="/consultant/actif/save"  method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{$projet->token}}"/>
                    <input type="hidden" name="id" value="{{$projet->id}}"/>

                    <fieldset>
                        <legend>EDITION DU PITCH</legend>
                            <div class="row">

                                 <div class="col-md-12 col-sm-12">
                                     <div class="form-group">
                                         <label for="description" class="control-label">TEASER</label>
                                         <textarea name="teaser" class="form-control" id="description" cols="30" rows="3"><?= $projet->teaser ?></textarea>
                                     </div>
                                 </div>

                             </div>

                             <div class="btn-div card-footer text-center">
                                 <button class="btn btn-success  btn-sm " type="submit"> Enregistrer <i class="fa fa-save"></i></button>
                            </div>

                     </fieldset>
                </form>
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

@section('action')
     <a class="btn btn-xs btn-success" href="#" data-target="#TModal" data-toggle="modal"><i class="fa fa-pencil"></i> Editer le teaser</a>
@endsection