@extends('......layouts.owner')

@section('page-title')
NOUVEL EVENEMENT
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">

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