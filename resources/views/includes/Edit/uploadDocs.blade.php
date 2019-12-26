@if($projet->bilans)
    <?php $link='dossier' ?>
@else
    <?php $link='projet' ?>
@endif
<div class="modal fade" id="upDocsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h6  class="modal-title text-center">CHARGEMENT DES DOCUMENTS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
            <div class="card card-danger">
                <div class="card-body">
                    <form action="/owner/{{ $link }}/docs/" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="projet_token" value="{{ $projet->token }}"/>
                        <div class="form-group">
                            <label for="ordre">ORDRE DE VIREMENT</label>
                            <input type="file" class="form-control" id="ordre" name="ordre"/>
                        </div>
                        <div class="form-group">
                            <label for="pacte">PACTE DES ACTIONNNAIRES</label>
                            <input type="file" class="form-control" id="pacte" name="pacte"/>
                        </div>
                        <div class="form-group">
                            <label for="pret">CONTRAT DE PRET</label>
                            <input type="file" class="form-control" id="pret" name="pret"/>
                        </div>

                        <button type="submit" class="btn btn-outline-danger btn-block"> <i class="fa fa-save fa-lg"></i> ENREGISTRER</button>
                    </form>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>