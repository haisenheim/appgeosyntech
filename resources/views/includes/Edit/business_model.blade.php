@if($projet->bilans)
    <?php $link='dossier' ?>
@else
    <?php $link='projet' ?>
@endif
<div class="modal fade" id="bm" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog modal-xl" role="document">
    	<div class="modal-content">
    		<div class="modal-header bg-success">
    			<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>MODELE ECONOMIQUE</span></h5>
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
    		</div>
    		<div class="modal-body">
    		    <form method="get" action="/owner/dossier/save-modele">
    		    <div class="card">
    		        <div class="card-body">
    		        <input type="hidden" name="token" value="{{ $projet->modele->token }}"/>
    		           <div class="form-group">
                           <label for="offre">OFFRE</label>
                           <textarea name="offre" id="offre" cols="30" rows="3" class="form-control">{{ $projet->modele->offre }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="segment">SEGMENTS DE CLIENTELE</label>
                           <textarea name="segment" id="segment" cols="30" rows="3" class="form-control">{{ $projet->modele->segment }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="canaux">CANAUX DE DISTRIBUTION </label>
                           <textarea name="canaux" id="canaux" cols="30" rows="3" class="form-contol">{{ $projet->modele->canaux }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="relation">RELATION CLIENTS </label>
                           <textarea name="relation" id="relation" cols="30" rows="3" class="form-control">{{ $projet->modele->relation }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="partenaires">PARTENAIRES CLES</label>
                           <textarea name="partenaires" id="partenaires" cols="30" rows="3" class="form-control">{{ $projet->modele->partenaires }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="activites">ACTIVITES CLES </label>
                           <textarea name="activites" id="activites" cols="30" rows="3" class="form-control">{{ $projet->modele->activites }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="ressources">RESSOURCES CLES </label>
                           <textarea name="ressources" id="ressources" cols="30" rows="3" class="form-control">{{ $projet->modele->ressources }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="couts">COUTS</label>
                           <textarea name="couts" id="couts" cols="30" rows="3" class="form-control">{{ $projet->modele->couts }}</textarea>
                       </div>
                       <div class="form-group">
                           <label for="revenus">REVENUS</label>
                           <textarea name="revenus" id="revenus" cols="30" rows="3" class="form-control">{{ $projet->modele->revenus }}</textarea>
                       </div>
    		        </div>
    		        <div class="card-footer">
    		           <button class="btn btn-block btn-success" type="submit">ENREGISTRER</button>
    		        </div>
    		    </div>
    		    </form>
    		</div>
    	</div>
    </div>
</div>

