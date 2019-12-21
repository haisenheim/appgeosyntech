@extends('......layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header card-info">
                <h3 class="card-title">PARAMETRES DE LA PLATEFORME</h3>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" class="form" action="/admin/params" method="post">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="pacte">PACTE DES ACTIONNAIRES</label>
                        <input type="file" class="form-control" name="pacte" id="pacte"/>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="pret">CONTRAT DE PRET</label>
                        <input type="file" class="form-control" name="pret" id="pret"/>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="actif">CONTRAT DE CESSION D'ACTIF</label>
                        <input type="file" class="form-control" name="actif" id="actif"/>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="creance">CONTRAT DE CESSION DE CREANCE</label>
                        <input type="file" class="form-control" name="creance" id="creance"/>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="concession">CONTRAT DE CONCESSION</label>
                        <input type="file" class="form-control" name="concession" id="concession"/>
                    </div>
                    <br/>

                     <button class="btn btn-block btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>

                </form>
            </div>
        </div>


    </div>


@endsection