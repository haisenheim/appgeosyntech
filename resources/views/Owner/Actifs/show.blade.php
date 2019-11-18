@extends('......layouts.owner')

@section('page-title')
{{ $projet->name }}
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                    <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                    </div>
                            <p>TYPE D'IMMOBILISATION : {{ $projet->tactif->name }}</p>
                            <p>DATE DE CREATION : <span class="value"> {{ date_format($projet->created_at,'d/m/Y') }}</span></p>
                            <p>PROMOTEUR : <span class="value">{{ $projet->owner->name }}</span></p>

                            <p>PRIX INITIAL : {{ $projet->prix . $projet->devise->abb }}</p>
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
                        @if($projet->teaser)
                            <div class="card">
                               <div class="card-header">
                                    <h5>TEASER</h5>
                               </div>
                               <div class="card-body">
                                    <p>
                                        <?= $projet->teaser ?>
                                    </p>
                               </div>
                            </div>
                        @endif
                    </div>
                        </div>
                    </div>


      <div class="modal fade modal-lg" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                <h4 class="modal-title">{{ $projet->name }}</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                 <form enctype="multipart/form-data" class="form" action="{{route('owner.update.actif')}}"  method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="token" value="{{$projet->token}}"/>
                                    <input type="hidden" name="id" value="{{$projet->id}}"/>

                                    <fieldset>
                                        <legend>INFORMATIONS SUR L'ARTICLE</legend>
                                            <div class="row">
                                                 <div class="col-md-8">
                                                     <div class="form-group">
                                                         <label class="control-label">NOM</label>
                                                         <input id="name" name="name" maxlength="250" type="text" required="required" class="form-control" value="{{$projet->name}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label for="prix" class="control-label">PRIX INITIAL</label>
                                                         <input id="prix" name="prix"  type="number"  class="form-control" value="{{$projet->prix}}">
                                                     </div>
                                                 </div>

                                                 <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label class="control-label">TYPE D'IMMOBILISATION</label>
                                                         <select class="form-control" name="tactif_id" id="variante_id">
                                                         <option value="{{$projet->tactif_id}}">{{$projet->tactif->name}}</option>
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
                                                         <textarea name="description" id="description" cols="30" rows="3"><?= $projet->description ?></textarea>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-12 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="caracteristiques" class="control-label">CARACTERISTIQUES</label>
                                                         <textarea name="caracteristiques" id="caracteristiques" cols="30" rows="3"><?= $projet->caracteristiques ?></textarea>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="ville_id" class="control-label">VILLE</label>
                                                         <select class="form-control" name="ville_id" id="ville_id">
                                                         <option value="{{$projet->ville_id}}">{{$projet->ville->name}}</option>
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
      </div>

      <div class="modal fade modal-lg" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                <h4 class="modal-title">{{ $projet->name }}</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                 <form enctype="multipart/form-data" class="form" action="{{route('owner.update.actif')}}"  method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="token" value="{{$projet->token}}"/>
                                    <input type="hidden" name="id" value="{{$projet->id}}"/>

                                    <fieldset>
                                        <legend>INFORMATIONS SUR L'ARTICLE</legend>
                                            <div class="row">
                                                 <div class="col-md-8">
                                                     <div class="form-group">
                                                         <label class="control-label">NOM</label>
                                                         <input id="name" name="name" maxlength="250" type="text" required="required" class="form-control" value="{{$projet->name}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4">
                                                     <div class="form-group">
                                                         <label for="prix" class="control-label">PRIX INITIAL</label>
                                                         <input id="prix" name="prix"  type="number"  class="form-control" value="{{$projet->prix}}">
                                                     </div>
                                                 </div>

                                                 <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label class="control-label">TYPE D'IMMOBILISATION</label>
                                                         <select class="form-control" name="tactif_id" id="variante_id">
                                                         <option value="{{$projet->tactif_id}}">{{$projet->tactif->name}}</option>
                                                            @foreach($tactifs as $p)
                                                               <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                                            @endforeach
                                                         </select>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="ville_id" class="control-label">VILLE</label>
                                                         <select class="form-control" name="ville_id" id="ville_id">
                                                         <option value="{{$projet->ville_id}}">{{$projet->ville->name}}</option>
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

            @if($projet->cessions->count() >=1)
                   @if($projet->validated_step==1)
                       <li>
                            <a title="Programmer une rencontre avec les investisseur" class="ripple" href="/owner/actifs/plan"><i class="fa fa-calendar"></i></a>
                       </li>
                    @endif
                   <li>
                        <a data-target="#angelsModal" data-toggle="modal" title="Liste des investisseurs potentiels" class="ripple" href="#"><i class="fa fa-users fa-lg"></i></a>
                   </li>
            @endif



            <li>
                <a data-toggle="modal" data-target="#upDocsModal" title="Charger les documents du projet" href="#" class="ripple">
                    <i class="fa fa-book fa-lg"></i>
                </a>
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


<div class="modal fade modal-lg" id="angelsModa" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header bg-success">
          <h4 class="modal-title">LISTE DE POTENTIELS INVESTISSEMENT</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
      </div>
      <div class="modal-body">
          <div class="card card-danger">
                <div class="card-body">
                     @if($projet->cessions->count()>=1)
                        <table style="color: #000" id="table-invest" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Depuis le</th>
                              <th></th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projet->cessions as $invest)
                                    <tr>
                                        <td>{{ $invest->angel->name }}</td>
                                        <td><?= $invest->created_at?date_format($invest->created_at, 'd/m/Y H:i'):'-' ?></td>


                                        <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-flat">Actions</button>
                                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                                  <span class="caret"></span>

                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                 <?php if($invest->lettre): ?>
                                                    <a class="dropdown-item" href="#">Lettre d'intention</a>
                                                  <?php endif; ?>
                                                  <?php if($invest->validated): ?>
                                                    <a class="dropdown-item" href="/owner/cessions/close/{{ $invest->token }}">Dissocier cet investisseur</a>
                                                  <?php else: ?>
                                                    <a class="dropdown-item" href="/owner/cessions/open/{{ $invest->token }}">Associer cet investisseur</a>
                                                  <?php endif; ?>

                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                @endif
                </div>
            </div>
      </div>
          </div>
      </div>
</div





<div class="modal fade" id="upDocsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6  class="modal-title text-center">CHARGEMENT DES DOCUMENTS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
            <div class="card card-danger">
                <div class="card-body">
                    <form action="/owner/actifs/docs/" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="projet_token" value="{{ $projet->token }}"/>
                        <div class="form-group">
                            <label style="font-size: x-small; line-height: 0.5;color: #000000;" for="ordre">ORDRE DE VIREMENT</label>
                            <input type="file" class="form-control" id="ordre" name="ordre"/>
                        </div>

                        <div class="form-group">
                            <label style="font-size: x-small; line-height: 0.5;color: #000000;" for="actif">CONTRAT DE CESSION D'ACTIF</label>
                            <input type="file" class="form-control" id="actif" name="actif"/>
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-block"> <i class="fa fa-save fa-lg"></i> ENREGISTRER</button>
                    </form>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>


<style>
   .modal .card-title{
        color: #000000;
        font-weight: bold;
   }

   .modal label{
        font-size: x-small;
        line-height: 0.5;
        color: #000000;
   }
   .card.maximized-card {

               overflow-y: scroll;
           }
</style>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#table-invest").DataTable();

  });
</script>

@endsection

