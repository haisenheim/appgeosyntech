@extends('......layouts.owner')

@section('page-title')
NOUVEAU CESSION D'ACTIF
@endsection

@section('content')
    <div class="md-container">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" class="form" action="{{route('owner.actifs.store')}}" method="post">
                    {{csrf_field()}}

                    <fieldset>
                        <legend>INFORMATIONS SUR L'ARTICLE</legend>
                            <div class="row">
                                 <div class="col-md-9">
                                     <div class="form-group">
                                         <label class="control-label">NOM</label>
                                         <input id="name" name="name" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label for="prix" class="control-label">COUT DE L'ACTIF</label>
                                         <input id="prix" name="prix"  type="number"  class="form-control" placeholder="">
                                     </div>
                                 </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-5 col-sm-12">
                                     <div class="form-group">
                                         <label class="control-label">TYPE D'IMMOBILISATION</label>
                                         <select class="form-control" name="tactif_id" id="variante_id">
                                            @foreach($tactifs as $p)
                                               <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                            @endforeach
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label for="imageUri" class="control-label">PHOTO DE L'ARTICLE</label>
                                         <input id="imageUri" name="imageUri" type="file"  class="form-control" placeholder="">
                                     </div>
                                 </div>
                                  <div class="col-md-4 col-sm-12">
                                     <div class="form-group">
                                         <label for="ville_id" class="control-label">VILLE</label>
                                         <select class="form-control" name="ville_id" id="ville_id">
                                            @foreach($villes as $p)
                                               <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                            @endforeach
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6 col-sm-12">
                                     <div class="form-group">
                                         <label for="description" class="control-label">DESCRIPTION</label>
                                         <textarea name="description" id="description" cols="30" rows="3"></textarea>
                                     </div>
                                 </div>
                                 <div class="col-md-6 col-sm-12">
                                     <div class="form-group">
                                         <label for="caracteristiques" class="control-label">CARACTERISTIQUES</label>
                                         <textarea name="caracteristiques" id="caracteristiques" cols="30" rows="3"></textarea>
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