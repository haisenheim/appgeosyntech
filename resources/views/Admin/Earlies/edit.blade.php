@extends('......layouts.owner')

@section('page-title')
EDITION DU DOSSIER <?= $projet->name ?>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">

            <div class="card-body">
                <form enctype="multipart/form-data" class="form" action="{{'/owner/projet/save'}}" method="post">
                            {{csrf_field()}}
                                    <div>
                                        <div class="">

                                            <fieldset>
                                                <legend>INFORMATIONS GENERALES</legend>
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                             <div class="form-group">
                                                                 <label class="control-label">INTITULE DU PROJET</label>
                                                                 <input id="name" name="name" value="<?= $projet->name ?>" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                                                  <input type="hidden" name="token" value="{{ $projet->token }}"/>
                                                             </div>
                                                         </div>
                                                         <div class="col-md-2">
                                                             <div class="form-group">
                                                                 <label class="control-label">CODE/NUMERO</label>
                                                                 <input id="code" name="code" value="<?= $projet->code ?>" maxlength="100" type="text" required="required" class="form-control" placeholder="Saisir le code du dossier">
                                                             </div>
                                                         </div>

                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">PHOTO DU PROJET</label>
                                                                 <input id="imageUri" name="imageUri"   type="file"  class="form-control">
                                                             </div>
                                                         </div>

                                                         <div class="col-md-3 col-sm-12">
                                                             <div class="form-group">
                                                                 <label class="control-label">VILLE</label>
                                                                 <select class="form-control" name="ville_id" id="ville_id">
                                                                        <option value="<?= $projet->ville_id ?>">{{ $projet->ville->name }}</option>
                                                                    @foreach($villes as $p)
                                                                       <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                                                    @endforeach
                                                                 </select>
                                                             </div>
                                                         </div>

                                                     </div>
                                                     <hr/>

                                                     <div class="row">
                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">REPRESENTANT</label>
                                                                 <input id="representant"  value="<?= $projet->representant ?>" name="representant" maxlength="250" type="text" required="required" class="form-control" placeholder="Personne de ressource du dossier">
                                                             </div>
                                                         </div>
                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">ADRESSE</label>
                                                                 <input id="address" name="address" maxlength="100" type="text" required="required" class="form-control" value="<?= $projet->address ?>" placeholder="Saisir l'adresse de la personne ressource">
                                                             </div>
                                                         </div>

                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">TELEPHONE</label>
                                                                 <input id="phone" name="phone" maxlength="50" type="text" required="required" class="form-control" placeholder="Saisir ici les contacts telephoniques" value="<?= $projet->phone ?>">
                                                             </div>
                                                         </div>
                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">EMAIL</label>
                                                                 <input id="email" name="email" maxlength="100" type="email" required="required" class="form-control" placeholder="Saisir l'adresse email" value="<?= $projet->email ?>">
                                                             </div>
                                                         </div>

                                                     </div>

                                                <div class="btn-div card-footer text-center">
                                                   <button class="btn btn-success " type="submit"> ENREGISTRER <i class="fa fa-save"></i></button>
                                                </div>

                                            </fieldset>
                                        </div>
                                    </div>
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



@endsection