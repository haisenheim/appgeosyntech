<div class="modal fade" id="teaserModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
  <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
   	<div class="modal-header bg-success">
   		<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>TEASER</span></h5>
   		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
   	</div>
   	<div class="modal-body">
   	    <div class="card">
   	        <div class="card-header">
   	            <small class=""><?= $projet->teaser?date_format($projet->teaser->created_at,'d/m/Y'):'-' ?> - <span class="text-primary"><?= $projet->teaser?$projet->teaser->user->name:'-' ?></span></small>
   	        </div>
   	        <div class="card-body">
   	            <ol style="list-style: upper-roman;">
   	                <li>
   	                    <h5>Présentation de l’entreprise et du porteur de projet</h5>
   	                    <ul>
   	                       <li>
                                  <h5>Présentation de l’entreprise  </h5>
                                  <p><?= $projet->teaser?$projet->teaser->entreprise:'' ?></p>
   	                       </li>
   	                       @if($projet->teaser)
   	                        @if($projet->teaser->youtubeUri)
                                  <li>
                                      <p><a href="<?= $projet->teaser?$projet->teaser->youtubeUri:'' ?>">Suivre la vidéo du projet sur Youtube</a></p>
                                  </li>
                              @endif
                            @endif
                              <li>
                                  <h5>Présentation du porteur de projet  </h5>
                                  <p><?= $projet->teaser?$projet->teaser->porteur:'' ?></p>
   	                       </li>
   	                    </ul>

   	                 </li>
   	                 <li>
   	                    <h5>Présentation de la problématique à résoudre </h5>
   	                    <p><?= $projet->teaser?$projet->teaser->problematique:'' ?></p>
   	                 </li>
   	                 <li>
   	                    <h5>Présentation de la solution proposée </h5>
   	                    <p><?= $projet->teaser?$projet->teaser->solution:'' ?></p>
   	                 </li>
   	                 <li>
   	                    <h5>Présentation de la concurrence</h5>
   	                    <p><?= $projet->teaser?$projet->teaser->concurrence:'' ?></p>
   	                 </li>
   	                 <li>
   	                    <h5>Présentation de la valeur ajoutée apportée par rapport aux concurrents </h5>
   	                    <p><?= $projet->teaser?$projet->teaser->va:'' ?></p>
   	                 </li>
   	                 <li>
   	                    <h5>Présentation de ce qui a déjà été fait </h5>
   	                    <p><?= $projet->teaser?$projet->teaser->realisations:'' ?></p>
   	                 </li>
   	                 <li>
   	                    <h5>Présentation des objectifs  </h5>
   	                    <p><?= $projet->teaser?$projet->teaser->objectifs:'' ?></p>
   	                 </li>
   	                 <li>
   	                    <h5>Présentation des besoins financiers  </h5>
   	                    <p><?= $projet->teaser?$projet->teaser->besoins:'' ?></p>
   	                 </li>
   	                 <li>
   	                    <h5>Quelques chiffres prévisionnels  </h5>
   	                    <p><?= $projet->teaser?$projet->teaser->chiffres:'' ?></p>
   	                 </li>
   	            </ol>

   	        </div>
   	    </div>

   	</div>
   </div>
</div>

        </div>