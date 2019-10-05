@extends('......layouts.owner')

@section('content')
    <div class="md-container">
        <div class="widget">
            <div class="widget-header">
                <h5 class=""><i class="fa fa-user"></i> NOUVEAU DOSSIER</h5>
            </div>
            <div class="widget-content">
                <form enctype="multipart/form-data" class="form" action="{{route('owner.dossiers.store')}}" method="post">
                    {{csrf_field()}}


                </form>
            </div>
        </div>
    </div>

    <style>

        .loader {
                position: relative;
                text-align: center;
                margin: 15px auto 35px auto;
                z-index: 9999;
                display: block;
                width: 80px;
                height: 80px;
                border: 10px solid rgba(0, 0, 0, .3);
                border-radius: 50%;
                border-top-color: #000;
                animation: spin 1s ease-in-out infinite;

                -webkit-animation-name: spin;
                -webkit-animation-duration: 600ms;
                -webkit-animation-timing-function: ease-in-out;
                -webkit-animation-iteration-count: infinite;
            }

            @keyframes spin {
               from{
                   transform: rotate(0deg);
               }
                to {
                    -webkit-transform: rotate(360deg);
                }
            }

            @-webkit-keyframes spin {
                to {
                    -webkit-transform: rotate(360deg);
                }
            }






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
            height: 300,
            tabsize: 2,
            followingToolbar: true,
            lang:'fr-FR'
          });
        });
      </script>




@endsection