@extends('......layouts.owner')

@section('content')
    <div class="md-container">
        <div class="widget">

            <div class="widget-content">
            <div class="page-header">
                <h3 class="text-center">Modification de {{$actif->name}}</h3>
            </div>
                <form enctype="multipart/form-data" class="form" action="owner/actifs/save"  method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{$actif->token}}"/>

                    <fieldset>
                        <legend>INFORMATIONS SUR L'ARTICLE</legend>
                            <div class="row">
                                 <div class="col-md-8">
                                     <div class="form-group">
                                         <label class="control-label">NOM</label>
                                         <input id="name" name="name" maxlength="250" type="text" required="required" class="form-control" value="{{$actif->name}}">
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label for="prix" class="control-label">PRIX INITIAL</label>
                                         <input id="prix" name="prix"  type="number"  class="form-control" value="{{$actif->prix}}">
                                     </div>
                                 </div>

                                 <div class="col-md-6 col-sm-12">
                                     <div class="form-group">
                                         <label class="control-label">TYPE D'IMMOBILISATION</label>
                                         <select class="form-control" name="tactif_id" id="variante_id">
                                         <option value="{{$actif->tactif_id}}">{{$actif->tactif->name}}</option>
                                            @foreach($tactifs as $p)
                                               <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                            @endforeach
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="imageUri" class="control-label">PHOTO DE L'ARTICLE</label>
                                         <input id="imageUri" name="imageUri" type="file"  class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="col-md-12 col-sm-12">
                                     <div class="form-group">
                                         <label for="description" class="control-label">DESCRIPTION</label>
                                         <textarea name="description" id="description" cols="30" rows="3"><?= $actif->description ?></textarea>
                                     </div>
                                 </div>
                                 <div class="col-md-12 col-sm-12">
                                     <div class="form-group">
                                         <label for="caracteristiques" class="control-label">CARACTERISTIQUES</label>
                                         <textarea name="caracteristiques" id="caracteristiques" cols="30" rows="3"><?= $actif->caracteristiques ?></textarea>
                                     </div>
                                 </div>
                                 <div class="col-md-6 col-sm-12">
                                     <div class="form-group">
                                         <label for="ville_id" class="control-label">VILLE</label>
                                         <select class="form-control" name="ville_id" id="ville_id">
                                         <option value="{{$actif->ville_id}}">{{$actif->ville->name}}</option>
                                            @foreach($villes as $p)
                                               <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                            @endforeach
                                         </select>
                                     </div>
                                 </div>
                             </div>

                             <div class="btn-div card-footer text-center">
                                 <button class="btn btn-success  btn-sm " type="submit"> Enregister <i class="fa fa-save"></i></button>
                            </div>

                     </fieldset>
                </form>
            </div>
        </div>
    </div>

    <style>



        div.note-editor.note-frame{
            padding: 0;
        }
      .note-frame .btn-default {
            color: #222;
            background-color: #FFF;
            border-color: none;
        }
    </style>
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