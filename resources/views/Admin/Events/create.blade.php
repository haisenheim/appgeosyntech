@extends('......layouts.owner')

@section('page-title')
NOUVEL EVENEMENT
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" class="form" action="{{route('admin.events.store')}}" method="post">
                    {{csrf_field()}}

                    <fieldset>
                        <legend>INFORMATIONS SUR L'EVENEMENT</legend>
                            <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label class="control-label">NOM</label>
                                         <input id="name" name="name" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                     </div>
                                 </div>
                            </div>

                            <div class="row">
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label for="prix" class="control-label">DATE DE DEBUT</label>
                                         <input id="start" name="start"  type="datetime"  class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label for="prix" class="control-label">DATE DE FIN</label>
                                         <input id="end" name="end"  type="datetime"  class="form-control" placeholder="">
                                     </div>
                                 </div>

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="link" class="control-label">LINK</label>
                                         <input id="link" name="link"  type="datetime"  class="form-control" placeholder="">
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
                             </div>

                             <div class="btn-div card-footer text-center">
                                 <button class="btn btn-outline-success btn-block" type="submit"> Enregister <i class="fa fa-save"></i></button>
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