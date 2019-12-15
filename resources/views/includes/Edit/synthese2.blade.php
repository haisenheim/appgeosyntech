 <div class="modal fade" id="synDiagExtModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
	<form method="post" action="/consultant/dossier/synthese2">
		<input type="hidden" id="" name="projet_token" value="<?= $projet->token ?>" />
		{{csrf_field()}}
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			    <div class="modal-header bg-info">
                    <h6  class="modal-title text-center">SYNTHESE DU DIAGNOSTIC EXTERNE</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

				<div class="modal-body">
					<div class="form-group">
						<textarea class="form-control"  name="synthese2" id="synthese2" cols="30" rows="10">{{ $projet->synthese_diagnostic_externe }}</textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-outline-info btn-block"><i class="fa fa-save"></i> ENREGISTRER</button>
				</div>

			</div>
		</div>
	</form>
</div>