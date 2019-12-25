@if($projet->bilans)
    <?php $link='dossier' ?>
@else
    <?php $link='projet' ?>
@endif
<div class="modal fade" id="teaserModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
	<form method="post" action="/consultant/{{ $link }}/teaser">
		<input type="hidden" id="" name="projet_token" value="<?= $projet->token ?>" />
		{{csrf_field()}}
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
                  <h6  class="modal-title text-center">ELABORATION DU TEASER</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
				<div class="modal-body">
                    <fieldset>
                        <legend style="">Présentation de l’entreprise et du porteur de projet </legend>
                        <div class="form-group">
                            <label for="contexte">PRESENTATION DE L'ENTREPRISE</label>
                            <textarea class="form-control" name="entreprise" rows="3" id="contexte">{{ $projet->teaser?$projet->teaser->entreprise:'' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="youtube">LIEN YOUTUBE</label>
                            <input class="form-control" type="text" name="youtubeUri" id="youtube" value="{{ $projet->teaser?$projet->teaser->youtubeUri:'' }}"/>
                        </div>

                        <div class="form-group">
                            <label for="contexte">PRESENTATION DU PORTEUR DE PROJET</label>
                            <textarea class="form-control" name="porteur" rows="3" id="contexte">{{ $projet->teaser?$projet->teaser->porteur:'' }}</textarea>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="problematique">Problématique à résoudre </label>
                        <textarea name="problematique" id="problematique">{{ $projet->teaser?$projet->teaser->problematique:'' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="solution">Solution proposée  </label>
                        <textarea name="solution" id="solution">{{ $projet->teaser?$projet->teaser->solution:'' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="concurrence">Présentation de la concurrence    </label>
                        <textarea name="concurrence" id="concurrence">{{ $projet->teaser?$projet->teaser->concurrence:'' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="va">Valeur ajoutée apportée par rapport aux concurrents   </label>
                        <textarea name="va" id="va">{{ $projet->teaser?$projet->teaser->va:'' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="realisations">Ce qui a déjà été fait   </label>
                        <textarea name="realisations" id="realisations">{{ $projet->teaser?$projet->teaser->realisations:'' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="objectifs">Présentation des objectifs   </label>
                        <textarea name="objectifs" id="objectifs">{{ $projet->teaser?$projet->teaser->objectifs:'' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="besoins">Présentation des besoins financiers   </label>
                        <textarea name="besoins" id="besoins">{{ $projet->teaser?$projet->teaser->besoins:'' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="chiffres">Quelques chiffres prévisionnels    </label>
                        <textarea name="chiffres" id="chiffres">{{ $projet->teaser?$projet->teaser->chiffres:'' }}</textarea>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-save"></i> ENREGISTRER</button>
				</div>

			</div>
		</div>
	</form>
</div>