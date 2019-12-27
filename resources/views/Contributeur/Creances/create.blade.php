@extends('......layouts.owner')

@section('page-title')
NOUVELLE CESSION DE CREANCE
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" class="form" action="{{route('owner.creances.store')}}" method="post">
                    {{csrf_field()}}

                    <fieldset>
                        <legend>INFORMATIONS SUR LA CREANCE</legend>
                            <div class="row">
                                 <div class="col-md-8">
                                     <div class="form-group">
                                         <label class="control-label">NOM DU DEBITEUR</label>
                                         <input id="name" name="debiteur" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label class="control-label">REPRESENTE(E) PAR</label>
                                         <input id="name" name="representant" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                     </div>
                                 </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label class="control-label">ADRESSE</label>
                                         <input id="name" name="address" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label class="control-label">TELEPHONE</label>
                                         <input id="name" name="phone" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label class="control-label">EMAIL</label>
                                         <input id="name" name="email" maxlength="250" type="email" required="required" class="form-control" placeholder="">
                                     </div>
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                     <div class="form-group">
                                         <label for="prix" class="control-label">MONTANT</label>
                                         <input id="prix" name="montant"  type="number"  class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label for="prix" class="control-label">PRIX DE LA CESSION</label>
                                         <input id="prix" name="prix_cession"  type="number"  class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label for="prix" class="control-label">DEVISE</label>
                                         <select class="form-control" name="devise_id" id="">
                                            <option value="">CHOIX D'UNE DEVISE</option>
                                            @foreach($devises as $devise)
                                                <option value="{{ $devise->id }}">{{ $devise->name }}</option>
                                            @endforeach
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label for="prix" class="control-label">DATE DE PAIEMENT</label>
                                         <input id="prix" name="dt_paiement"  type="date"  class="form-control" placeholder="">
                                     </div>
                                 </div>

                             </div>
                             <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                     <div class="form-group">
                                         <label for="description" class="control-label">DESCRIPTION</label>
                                         <textarea name="description" id="description" cols="30" rows="3"></textarea>
                                     </div>
                                 </div>

                             </div>

                             <div class="btn-div card-footer text-center">
                                 <button class="btn btn-outline-success  btn-sm btn-block " type="submit"> ENREGISTRER <i class="fa fa-save"></i></button>
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