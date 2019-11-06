@extends('......layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">PARAMETRES DE LA PLATEFORME</h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" class="form" action="admin/params" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="pacte">PACTE DES ACTIONNAIRES</label>
                        <input type="file" class="form-control" name="pacte" id="pacte"/>
                    </div>
                    <div class="form-group">
                        <label for="pret">CONTRAT DE PRET</label>
                        <input type="file" class="form-control" name="pret" id="pret"/>
                    </div>
                    <div class="form-group">
                        <label for="actif">CONTRAT DE CESSION D'ACTIF</label>
                        <input type="file" class="form-control" name="actif" id="actif"/>
                    </div>
                    <div class="form-group">
                        <label for="creance">CONTRAT DE CESSION DE CREANCE</label>
                        <input type="file" class="form-control" name="creance" id="creance"/>
                    </div>

                     <button class="btn btn-block btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>

                </form>
            </div>
        </div>


    </div>


@endsection