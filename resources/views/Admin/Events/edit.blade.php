@extends('......layouts.admin')

@section('content')
    <div class="md-container">
        <div class="widget">

            <div class="widget-content">
            <div class="page-header">
                <h3 class="text-center">Modification de {{$event->name}}</h3>
            </div>
                <form enctype="multipart/form-data" class="form" action="/admin/events/save"  method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="token" value="{{$event->token}}"/>
                                    <input type="hidden" name="id" value="{{$event->id}}"/>

                                    <fieldset>
                                        <legend>INFORMATIONS SUR L'EVENEMENT</legend>
                                            <div class="row">
                                                 <div class="col-md-8">
                                                     <div class="form-group">
                                                         <label class="control-label">NOM</label>
                                                         <input id="name" name="name" maxlength="250" type="text" required="required" class="form-control" value="{{$event->name}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label for="prix" class="control-label">DEBUT</label>
                                                         <input id="prix" name="start"  type="date"  class="form-control" value="{{$event->start}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label for="prix" class="control-label">FIN</label>
                                                         <input id="prix" name="end"  type="date"  class="form-control" value="{{$event->end}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label for="prix" class="control-label">LINK</label>
                                                         <input id="prix" name="link"  type="text"  class="form-control" value="{{$event->link}}">
                                                     </div>
                                                 </div>


                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="imageUri" class="control-label">PHOTO</label>
                                                         <input id="imageUri" name="imageUri" type="file"  class="form-control" placeholder="">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-12 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="description" class="control-label">DESCRIPTION</label>
                                                         <textarea name="description" id="description" cols="30" rows="3"><?= $event->description ?></textarea>
                                                     </div>
                                                 </div>


                                             </div>

                                             <div class="btn-div card-footer text-center">
                                                 <button class="btn btn-success  btn-block " type="submit"> Enregister <i class="fa fa-save"></i></button>
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