@extends('......layouts.consultant')

@section('page_header')
    <h3 class="page-header">GESTION DES CESSIONS D'ACTIFS</h3>
@endsection

@section('content')
    <div class="md-container">
        <div class="widget">

            <div class="widget-content">
            <div class="page-header">
                <h3 class="text-center">{{$actif->name}}</h3>
            </div>
                <form enctype="multipart/form-data" class="form" action="{{route('consultant.update.actif')}}"  method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{$actif->token}}"/>
                    <input type="hidden" name="id" value="{{$actif->id}}"/>

                    <fieldset>
                        <legend>EDITION DU TEASER</legend>
                            <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                     <div class="form-group">
                                         <label for="description" class="control-label">PITCH</label>
                                         <textarea name="description" id="description" cols="30" rows="3"><?= $actif->teaser ?></textarea>
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