@extends('......layouts.owner')

@section('page-title')
{{ $event->name }}
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                    <div style="height: 300px; width: 100%; background: url('{{ $event->imageUri?asset($event->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                    </div>
                                    <p>DEBUT: <b>{{ date_format($event->start, 'd/m/Y') }}</b></p>
                                    <p>FIN: <b>{{ date_format($event->end, 'd/m/Y') }}</b></p>
                                    <p>LIEN YOUTUBE: <b>{{ $event->link }}</b></p>

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
                                        <?= $event->description ?>
                                    </p>

                               </div>
                        </div>

                    </div>
                        </div>
                    </div>


      <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                <h4 class="modal-title">{{ $event->name }}</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                 <form enctype="multipart/form-data" class="form" action="{{route('admin.update.events')}}"  method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="token" value="{{$event->token}}"/>
                                    <input type="hidden" name="id" value="{{$event->id}}"/>

                                    <fieldset>
                                        <legend>INFORMATIONS SUR L'ARTICLE</legend>
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
<main>
    <nav style="top:30%" class="floating-menu">
        <ul class="main-menu">


            <li>
                <a title="Modifier" class="ripple" href="#" data-target="#EditModal" data-toggle="modal"><i class="fa fa-edit fa-lg"></i></a>
            </li>



        </ul>
        <div
         style="
          background-image:-webkit-linear-gradient(top,#28a745 0,#167699 100%);
          background-image:-o-linear-gradient(top,#28a745 0,#167699 100%);
          background-image:-webkit-gradient(linear,left top,left bottom,from(#28a745),to(#167699));
          background-image:linear-gradient(to bottom,#efffff 0,tranparent 100%);
          background-repeat:repeat-x;position:absolute;width:100%;height:100%;border-radius:50px;z-index:-1;top:0;left:0;
          -webkit-transition:.1s;-o-transition:.1s;transition:.1s
        "
        class="menu-bg"></div>
    </nav>
</main>


<style>
   .modal .card-title{
        color: #000000;
        font-weight: bold;
   }

   .modal label{
        font-size: x-small;
        line-height: 0.5;
   }
   .card.maximized-card {

               overflow-y: scroll;
           }
</style>


@endsection

