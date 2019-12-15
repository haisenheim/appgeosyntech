<div class="modal fade" id="meModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>MODELE ECONOMIQUE</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
				</div>
				<div class="modal-body">

				    <div class="card">
				        <div class="card-header">


                              <div class="card-tools">

                                   <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                                   </button>

                              </div>
                        </div>
				        <div class="card-body">
				            <div class="row">
				                <div class="col-md-2 col-sm-12">
				                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">PARTENAIRES</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->partenaires:'' ?>
				                        </div>
				                    </div>
				                </div>
				                <div class="col-md-3 col-sm-12">
				                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">ACTIVITES</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->activites:'' ?>
				                        </div>
				                    </div>
				                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">RESSOURCES</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->ressources:'' ?>
				                        </div>
				                    </div>
				                </div>
				                <div class="col-md-2 col-sm-12">
				                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">OFFRE</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->offre:'' ?>
				                        </div>
				                    </div>
				                </div>
				                <div class="col-md-3 col-sm-12">
				                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">RELATION CLIENT</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->relation:'' ?>
				                        </div>
				                    </div>
				                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">CANAUX DE DISTRIBUTION</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->canaux:'' ?>
				                        </div>
				                    </div>
				                </div>
				                <div class="col-md-2 col-sm-12">
				                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">SEGMENTS CLIENT</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->segment:'' ?>
				                        </div>
				                    </div>
				                </div>
				            </div>
				            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">STRUCTURE DES COUTS</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->couts:'' ?>
				                        </div>
				                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="card">
				                        <div class="card-header">
				                            <h3 class="card-title">SOURCES DE REVENUS</h3>
				                        </div>
				                        <div class="card-body">
				                            <?= $projet->modele?$projet->modele->revenus:'' ?>
				                        </div>
				                    </div>
                                </div>
				            </div>

				    </div>

				</div>
			</div>

		</div>

    </div>
</div>
<style>
    #meModal .card-title{
        font-weight: 800;
        font-size: 0.9rem;
    }
</style>