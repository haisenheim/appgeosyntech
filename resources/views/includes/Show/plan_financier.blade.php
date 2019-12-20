<div class="col-md-12 col-sm-12">
	<div class="card ">
	<div class="card-header">
		<h3 class="card-title">PLAN FINANCIER</h3>
	</div>
	<div class="card-body">
		<div class="card">
			<div class="card-header d-flex p-0">
				<ul class="nav nav-pills ml-auto p-2 pull-right"  role="tablist">
					<li role="presentation" class="nav-item">
						<a class="nav-link active" href="#prevresultats" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-selected="true"><span class=""></span> COMPTE D'EXPLOITATION </a>
					</li>
					<li role="presentation" class="nav-item">
						<a class="nav-link" href="#prevbilans" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> BILAN </a>
					</li>
					<li role="presentation" class="nav-item">
						<a class="nav-link" href="#prevtresoreries" role="tab" id="tab3" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> FLUX DE TRESORERIE  </a>
					</li>
					<li role="presentation" class="nav-item">
						 <a class="nav-link" href="#montage" role="tab" id="tab4" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> MONTAGE FINANCIER </a>
					</li>
					<li role="presentation" class="nav-item">
						 <a class="nav-link" href="#rentabilite" role="tab" id="tab5" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> RENTABILITE ESPEREE </a>
					</li>
			   </ul>
			</div>
			<div class="card-body">
				<div  class="tab-content">
					<div class="tab-pane active" role="tabpanel" id="prevresultats" aria-labelledby="tab1">
				  <div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">COMPTE DE RESULTAT</h4>
								 </div>
								 <div class="card-body">
									<?php $nbsim = count($projet->prevresultats) ?>
									<div class="table-responsive">
										 <table class="table table-bordered table-hover table-condensed">
									<thead>
										<tr>
												<th></th>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->annee ?></th>
												@if(!$loop->last)
												<th>VARIATION</th>
												@endif
											@endforeach
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>CHIFFRE D'AFFAIRE</th>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)

												<th><?= $prevr->ca ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['ca'][$i] }}%</th>
												<?php $i++ ?>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>PRODUCTION IMMOBILISEE</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->pi ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>PRODUCTION STOCKEE</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->ps ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>SUBVENTION D'AEXPLOITATION</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->sp ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>AUTRES PRODUITS D'EXPLOITATION</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->ape ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>CHARGE VARIABLE</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->cv ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>MARGE BRUTE</td>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->mb ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['mb'][$i] }}%</th>
												<?php $i++ ?>
												@endif
											@endforeach
										</tr>
										<tr>
											<th>CHARGE FIXE</th>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->cf ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<th>VALEUR AJOUTEE</th>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->va ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['va'][$i] }}%</th>
												<?php $i++ ?>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>SALAIRES</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->salaires ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<th>EXCEDENT BRUT D'EXPLOITATION</th>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->ebe ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['ebe'][$i++] }}%</th>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>DOTATATION AUX AMORTISSEMENTS ET AUX PROVISIONS</td>

											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->dap ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<th>RESULTAT D'EXPLOITATION</th>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->re ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['re'][$i++] }}%</th>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>PRODUIT FINANCIER</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->pf ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>CHARGES FINANCIERES</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->cfi ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<th>RESULTAT FINANCIER</th>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->rf ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['rf'][$i++] }}%</th>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>PRODUIT EXCEPTIONNEL</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->pe ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>CHARGES EXCEPTIONNELLES</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->ce ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<th>RESULTAT EXCEPTIONNEL</th>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->re ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['rex'][$i++] }}%</th>
												@endif
											@endforeach
										</tr>
										<tr>
											<th>RESULTAT COURANT AVANT IMPOT</th>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->rcai ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['rcai'][$i++] }}%</th>
												@endif
											@endforeach
										</tr>
										<tr>
											<td>IMPOTS</td>
											@foreach($projet->prevresultats as $prevr)
												<td><?= $prevr->impots ?></td>
												@if(!$loop->last)
												<td>-</td>
												@endif
											@endforeach
										</tr>
										<tr>
											<th>RESULTAT NET</th>
											<?php $i=0; ?>
											@foreach($projet->prevresultats as $prevr)
												<th><?= $prevr->rn ?></th>
												@if(!$loop->last)
												<th>{{ $projet->variations['rn'][$i++] }}%</th>
												@endif
											@endforeach
										</tr>
									</tbody>
									</table>
									</div>

								 </div>
							</div>

						</div>

					</div>

				  </div>

			 </div>

					 <div class="tab-pane fade" role="tabpanel" id="prevbilans" aria-labelledby="">


						<div class="card">
							<div class="card-header"><h3 class="card-title">BILAN</h3></div>
							<div class="card-body">
								<div class="table-responsive">
									 <table class="table table-bordered table-hover table-condensed">
												<thead>
													<tr>
														<th colspan="3"></th>

														@foreach($projet->prevbilans as $prevr)
															<th><?= $prevr->annee ?></th>
															@if(!$loop->last)
															<th>VARIATION</th>
															@endif
														@endforeach
													</tr>
												</thead>
												<tbody>
													<tr>
													<th style="text-orientation: upright; writing-mode: vertical-rl;" rowspan="14">RESOURCES STABLES</th>
													</tr>
													<tr>

														<td colspan="2">CAPITAL</td>
														<?php $i=0; ?>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->capital ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td colspan="2">APPORTEURS DE CAPITAL NON APPELE</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->apporteurs_acpital_non_appele ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td colspan="2">PRIMES D'APPORT D'EMISSION</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->primes_apport ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td colspan="2">ECARTS DE REEVALUTATION</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->ecarts_reevaluation ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Réserves indisponibles</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->eserves_indisponibles ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Réserves libres</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->reserves_libres ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Report à nouveau</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->report_a_nouveau ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Résultat net de l'exercice</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->resultat_net_exercice ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Subventions d'investissement</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->subventions_investissement ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Provisions réglementés</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->provisions_reglementees ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">EMPRUNTS</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->emprunts ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Dettes de location acquisition</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->dettes_location_acquisition ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Provisions financières pour risques et charges</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->provisions_financieres_risques_ ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>


													<tr><th style="writing-mode: vertical-rl" rowspan="16">ACTIF IMMOBILISE</th></tr>
													<tr><th style="writing-mode: vertical-rl" rowspan="5">Immos incorporelles</th></tr>
													<tr>

														<td>Frais de développement et de prospection</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->frais_developpement ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td>Brevets, licences, logiciels, et droits assimilaires</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->brevets ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td>Fonds commercial et droit au bail</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->fonds_commercial ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td>Autres immobilisations incorporelles</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->autres_immobilisations_incorporelles ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>



													<tr><td style="writing-mode: vertical-rl" rowspan="7">Immos corporelles</td></tr>

													<tr>
														<td>Terrains</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->terrains ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td>Bâtiments</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->batiments ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td>Aménagements, agencements et installations</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->amenagements ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td>Matériel, mobilier et actifs biologiques</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->materiel_mobilier ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td>Matériel de transport</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->materiel_transport ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td>Avances et acomptes versés sur immobilisations</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->avances_acomptes ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>


													<tr><td style="writing-mode: vertical-rl" rowspan="3">Immos fin.</td></tr>

													<tr>
														<td>Titres de participation</td>
														@foreach($projet->prevbilans as $prevr)
															<td class="td-modif" data-model="Prevbilan" data-name="titres_participation" data-id="<?= $prevr->id ?>" ><?= $prevr->titres_participation ?><span style="display: none; cursor: pointer;" class="fa fa-pencil fa-modif"></span></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td>Autres immobilisations financieres</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->autres_immobilisations_financieres ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<th style="text-align: center" colspan="3">FONDS DE ROULEMENT</th>
														<?php $i=1; ?>
														@foreach($projet->prevbilans as $prevr)
															<th><?= $prevr->fr ?></th>
															@if(!$loop->last)
															<th>{{ $projet->variations['fr'][$i++] }}%</th>
															@endif
														@endforeach
													</tr>

													<tr><td style="writing-mode: vertical-rl" rowspan="7">ACTIF CIRCULANT</td></tr>

													<tr>
														<td colspan="2">Actif circulant HAO</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->actif_circulant_hao ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Stocks et encours</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->stocks_encours ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td colspan="2">CRÉANCES ET EMPLOIS ASSIMILÉS</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->creances_emplois ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Fournisseurs avances versées</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->avances_fournisseurs ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Clients</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->clients ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Autres créances</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->autres_creances ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>


													<tr><td style="writing-mode: vertical-rl" rowspan="6">PASSIF CIRCULANT</td></tr>

													<tr>
														<td colspan="2">Dettes circulants HAO</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->dettes_circulantes_hao ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Clients avances reçues</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->clients_avances_recues ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td colspan="2">Fournisseurs d'exploitation</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->fournisseurs_exploitation ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Dettes fiscales et sociales</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->dettes_fiscales ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Autres dettes</td>
														@foreach($projet->prevbilans as $prevr)
															<td><?= $prevr->autres_dettes ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<th style="text-align: center" colspan="3">BESOIN EN FONDS DE ROULEMENT</th>
														<?php $i=1; ?>
														@foreach($projet->prevbilans as $prevr)
															<th><?= $prevr->bfr ?></th>
															@if(!$loop->last)
															<th>{{ $projet->variations['bfr'][$i++] }}%</th>
															@endif
														@endforeach
													</tr>
													<tr><td style="writing-mode: vertical-rl" rowspan="4">Tresorerie Active</td></tr>

													<tr>
														<td colspan="2">Titres de placement</td>
														@foreach($projet->prevbilans as $prevr)
															<td class="td-modif" data-name="titres_placement" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->titres_placement ?><span class="fa fa-pencil fa-modif"></span></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Valeurs à encaisser</td>
														@foreach($projet->prevbilans as $prevr)
															<td class="td-modif" data-name="valeur_encaisser" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->valeur_encaisser ?><span class="fa fa-pencil fa-modif"></span></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Banques, chèques postaux, caisse et assimilés</td>
														@foreach($projet->prevbilans as $prevr)
															<td class="td-modif" data-name="banques_cheques_" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->banques_cheques_ ?><span class="fa fa-pencil fa-modif"></span></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr><td style="writing-mode: vertical-rl" rowspan="3">Tresorerie Passive</td></tr>
													<tr>
														<td colspan="2">Banques, crédits d'escomptes et de trésorerie</td>
														@foreach($projet->prevbilans as $prevr)
															<td class="td-modif" data-name="banques_credit_escompte" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->banques_credit_escompte ?><span class="fa fa-pencil fa-modif"></span></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="2">Banques, crédits de trésorerie</td>
														@foreach($projet->prevbilans as $prevr)
															<td class="td-modif" data-name="banques_credit_tresorerie" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->banques_credit_tresorerie ?><span class="fa fa-pencil fa-modif"></span></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<th style="text-align: center" colspan="3">TRESORERIE NETTE</th>
														<?php $i=1; ?>
														@foreach($projet->prevbilans as $prevr)
															<th><?= $prevr->tn ?></th>
															@if(!$loop->last)
															<th>{{ $projet->variations['tn'][$i++] }}</th>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="3" style="text-align: center">Ecart de conversion - actif</td>
														@foreach($projet->prevbilans as $prevr)
															<td class="td-modif" data-name="ecart_conversion_actif" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->ecart_conversion_actif ?><span class="fa fa-pencil fa-modif"></span></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="3" style="text-align: center">Ecart de conversion - passif</td>
														@foreach($projet->prevbilans as $prevr)
															<td class="td-modif" data-name="ecart_conversion_passif" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->ecart_conversion_passif ?><span class="fa fa-pencil fa-modif"></span></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

												</tbody>
										</table>
								</div>

							</div>

						</div>

			 </div>

					<div class="tab-pane fade" role="tabpanel" id="prevtresoreries" aria-labelledby="">
				<div class="card">
					<div class="card-header">
						<h4>FLUX DE TRESORERIE PREVISIONNELS</h4>
					 </div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-condensed">
												<thead>
													<tr>
														<th colspan="2"></th>

														@foreach($projet->prevtresoreries as $prevr)
															<th><?= $prevr->annee ?></th>
															@if(!$loop->last)
															<th>VARIATION</th>
															@endif
														@endforeach
													</tr>
												</thead>
												<tbody>
													<tr>
													<th style="writing-mode: vertical-rl;" rowspan="8">Trésorerie provenant des act. opér.</th>
													</tr>
													<tr>

														<td colspan="">CAPACITE D'AUTOFINANCEMENT</td>
														<?php $i=0; ?>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->capacite_autofinancement  ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td colspan="">ACTIF CIRCULANT HAO</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->actif_circulant_hao ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td colspan="">VARIATION DES STOCKS</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->variation_stocks ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td colspan="">VARIATION DES CREANCES ET EMPLOIS ASSIMILES</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->variation_creances ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="">VARIATION DU PASSIF CIRCULANT</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->variation_passif_circulant ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td colspan="">VARIATION DU BF LIE AUX ACT. OP.</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td>-</td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<th colspan="">TOTAL</th>
														@foreach($projet->prevtresoreries as $prevr)
															<th></th>
															@if(!$loop->last)
															<th>-</th>
															@endif
														@endforeach
													</tr>



													<tr><th style="writing-mode: vertical-rl" rowspan="7">Trésorerie issue des activités d'invest.</th></tr>

													<tr>

														<td>Décaissements liés aux acquisitions d'immobilisations incorporelles</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->decaissements_acquisitions_incorporelles ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td>Décaissements liés aux acquisitions d'immobilisations corporelles</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->decaissements_acquisitions_corporelles ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>

														<td>Décaissements liés aux acquisitions d'immobilisations financières</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->decaissements_acquisitions_financieres ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>
													<tr>
														<td>Cessions d'immobilisations incorporelles et corporelles</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->cessions_immo_incoporelles_corporelles  ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													 <tr>
														<td>Cessions d'immobilisations financières</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->cessions_immo_financieres ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td>TOTAL</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td>-</td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr><th style="writing-mode: vertical-rl" rowspan="6">Trésorerie provenant  des cap. propres </th></tr>

													<tr>
														<td>Augmentation de capital par apports de capitaux nouveaux</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->augmentation_capital_apports_nouveaux  ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													 <tr>
														<td>Subventions d'investissements reçues</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->subventions_investissement_recues ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td>Prélèvements sur le capital</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->prelevements_capital ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td>Distribution de dividendes</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->distribution_dividendes ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td>TOTAL</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td>-</td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>



													<tr><th style="writing-mode: vertical-rl" rowspan="5">Trésorerie issue des cap. étrangers </th></tr>

													<tr>
														<td>Emprunts</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->emprunts  ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													 <tr>
														<td>Autres dettes financières</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->autres_dettes_financieres ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td>Remboursements des emprunts et autres dettes financières</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td><?= $prevr->remboursement_emprunts ?></td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>

													<tr>
														<td>TOTAL</td>
														@foreach($projet->prevtresoreries as $prevr)
															<td>-</td>
															@if(!$loop->last)
															<td>-</td>
															@endif
														@endforeach
													</tr>


												</tbody>
										</table>
						</div>

					</div>
				</div>
			 </div>

					<div class="tab-pane fade" role="tabpanel" id="montage" aria-labelledby="">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">MONTAGE FINANCIER</h4>

					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-sm-12">

								<div class="info-box">
								  <span class="info-box-icon bg-info"><i class="fa fa-coins"></i></span>
								  <div class="info-box-content">
									<span class="info-box-text">MONTANT DES INVESTISSEMENTS</span>
									<span class="info-box-number">{{ $projet->montant_investissement }} <sup>{{ $projet->devise->abb }}</sup></span>
								  </div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">

								<div class="info-box">
								  <span class="info-box-icon bg-warning"><i class="fa fa-coins"></i></span>
								  <div class="info-box-content">
									<span class="info-box-text">BESOIN EN FONDS DE ROULEMENT</span>
									<span class="info-box-number">{{ $projet->bfr }} <sup>{{ $projet->devise->abb }}</sup></span>
								  </div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="info-box">
								  <span class="info-box-icon bg-success"><i class="fa fa-coins"></i></span>
								  <div class="info-box-content">
									<span class="info-box-text">COUT GLOBAL DU PROJET</span>
									<span class="info-box-number">{{ $projet->coutglobal }} <sup>{{ $projet->devise->abb }}</sup></span>
								  </div>
								</div>
							</div>
						</div>

						@if($projet->financements->count() >=1)
							<table class="table">
								<tbody>
									@foreach($projet->financements as $fin)
										<tr>
											<td>{{ $fin->moyen->name }}</td>
											<th>{{ number_format($fin->montant,0,',','.') }} <sup>{{ $projet->devise->abb }}</sup> </th>
										</tr>
									@endforeach
								</tbody>
							</table>


						@endif
					</div>
				</div>
			 </div>
					<div class="tab-pane fade" role="tabpanel" id="rentabilite" aria-labelledby="">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">RENTABILITE ESPEREE</h4>
						<div style="float: right">
							<ul class="nav nav-pills ml-auto p-2 pull-right"  role="tablist">
								<?php if($projet->fincapitalsocial): ?>
									<li role="presentation" class="nav-item">
										<a class="nav-link active" href="#fincapitalsocial" role="tab" id="fincapitalsocial-tab" data-toggle="tab" aria-controls="fincapitalsocial" aria-expanded="false"><span><img
													 class="fa-icon" alt=""/></span> FINANCEMENT DU CAPITAL SOCIAL</a>
									</li>
								<?php endif; ?>

								<?php if($projet->finempobligataire): ?>
									<li role="presentation" class="nav-item">
										<a class="nav-link <?= $projet->fincapitalsocial?'':'active' ?>" href="#finempobligataire" role="tab" id="finempobligataire-tab" data-toggle="tab" aria-controls="finempobligataire" aria-expanded="false"><span class="fa fa-chart-pie"></span> EMPRUNT OBLIGATAIRE</a>
									</li>
								<?php endif; ?>
								<?php if($projet->finmlt): ?>
									<li role="presentation" class="nav-item">
										<a class="nav-link <?= !($projet->fincapitalsocial || $projet->finempobligataire)?'active':'' ?>" href="#finmlt" role="tab" id="finmlt-tab" data-toggle="tab" aria-controls="finmlt" aria-expanded="false"><span class="fa fa-chart-pie"></span> PRETS MLT</a>
									</li>
								<?php endif; ?>
								<?php if($projet->fincredbail): ?>
									<li role="presentation" class="nav-item">
										<a class="nav-link <?= !($projet->fincapitalsocial || $projet->finempobligataire || $projet->finmlt)?'active':'' ?>" href="#fincredbail" role="tab" id="fincredbail-tab" data-toggle="tab" aria-controls="fincredbail" aria-expanded="false"><span class="fa fa-chart-pie"></span> CREDIT BAIL</a>
									</li>
								<?php endif; ?>
								<?php if($projet->finescompte): ?>
									<li role="presentation" class="nav-item">
										<a class="nav-link" href="#finescompte" role="tab" id="finescompte-tab" data-toggle="tab" aria-controls="finescompte" aria-expanded="false"><span class="fa fa-chart-pie"></span> ESCOMPTE</a>
									</li>
								<?php endif; ?>
								<?php if($projet->finaffacturage): ?>
									<li role="presentation" class="nav-item">
										<a class="nav-link" href="#finaffacturage" role="tab" id="finaffacturage-tab" data-toggle="tab" aria-controls="finaffacturage" aria-expanded="false"><span class="fa fa-chart-pie"></span> AFFACTURAGE</a>
									</li>
								<?php endif; ?>
								<?php if($projet->fincredsignature): ?>
									<li role="presentation" class="nav-item">
										<a class="nav-link" href="#fincredsignature" role="tab" id="fincredsignature-tab" data-toggle="tab" aria-controls="fincredsignature" aria-expanded="false"><span class="fa fa-chart-pie"></span> CREDIT PAR SIGNATURE</a>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="tab-content">
							<?php if($projet->fincapitalsocial): ?>
								<div class="tab-pane active" role="tabpanel" id="fincapitalsocial" aria-labelledby="fincapitalsocial-tab">
								<h5>AUGMENTATION DU CAPITAL SOCIAL</h5>
								<div>
								<h6>A/ Analyse de l’investissement en capital (Est-ce un projet rentable ?)</h6>

								<div style="">

								<ul class="list-inline">
									<li class="list-inline-item">Montant de la levée de fonds : <span class="value"><?= number_format($projet->fincapitalsocial->mt_levee,0,',','.') ?></span></li>
									<li class="list-inline-item">Valeur nominale d'une action : <span class="value"><?= number_format($projet->fincapitalsocial->vna,0,',','.') ?></span></li>
									<li class="list-inline-item"> Nombre d’actions avant ouverture du capital  : <span class="value"><?= $projet->fincapitalsocial->nba_aoc ?></span></li>
									<li class="list-inline-item">  Montant du capital   : <span class="value"><?= number_format($projet->fincapitalsocial->mtcapital,0,',','.') ?></span></li>
									<li class="list-inline-item">Reserves : <span class="value"><?= number_format($projet->fincapitalsocial->reserves,0,',','.') ?></span></li>
									<li class="list-inline-item">Report : <span class="value"><?= number_format($projet->fincapitalsocial->report,0,',','.') ?></span></li>
									<li class="list-inline-item">Resultat net : <span class="value"><?= number_format($projet->fincapitalsocial->resultat_net,0,',','.') ?></span></li>
									<li class="list-inline-item">Montant des capitaux propres : <span class="value"><?= number_format($projet->fincapitalsocial->capitaux_propres,0,',','.') ?></span></li>
									<li class="list-inline-item">Valeur de l'action avant ouverture du capital : <span class="value"><?= number_format($projet->fincapitalsocial->va_aoc,0,',','.') ?></span></li>
									<li class="list-inline-item">Prix d'emission : <span class="value"><?= number_format($projet->fincapitalsocial->prix_emi,0,',','.') ?></span></li>
									<li class="list-inline-item"> Prime d’émission :   <span class="value"><?= number_format($projet->fincapitalsocial->prime_emi,0,',','.') ?></span></li>
									<li class="list-inline-item">  Nombre d’actions nouvellement émises :    <span class="value"><?= $projet->fincapitalsocial->nba_ne ?></span></li>
									<li class="list-inline-item"> Prime d’émission totale :   <span class="value"><?= number_format($projet->fincapitalsocial->prime_emi_totale,0,',','.') ?></span></li>
									<li class="list-inline-item">   Nombre d’action disponible après émission de nouvelles actions  :    <span class="value"><?= $projet->fincapitalsocial->nba_ae ?></span></li>
									<li class="list-inline-item"> Taux d'imposition :    <span class="value"><?= $projet->fincapitalsocial->taux_imposition .'%' ?></span></li>
									<li class="list-inline-item"> Nouveau montant du capital social:   <span class="value"><?= number_format($projet->fincapitalsocial->new_mt_capital,0,',','.') ?></span></li>
									<li class="list-inline-item"> Nouveau montant des capitaux propres :   <span class="value"><?= number_format($projet->fincapitalsocial->new_mt_capitaux_propres,0,',','.') ?></span></li>
									<li class="list-inline-item"> Valeur de l'action apres emission :   <span class="value"><?= number_format($projet->fincapitalsocial->va_ae,0,',','.') ?></span></li>
									<li class="list-inline-item"> Valeur du droit preferentiel de souscription :   <span class="value"><?= round($projet->fincapitalsocial->va_dps,1) ?></span></li>
									<li class="list-inline-item"> Nombre de droit de soucription pour obtenir une action:   <span class="value"><?= round($projet->fincapitalsocial->nb_ds,2) ?></span></li>
									<li class="list-inline-item"> Pourcentage du capital appelé à libérer immédiatement:   <span class="value"><?= $projet->fincapitalsocial->taux_capital_appele .'%' ?></span></li>
									<li class="list-inline-item"> Capital appelé non versé :   <span class="value"><?= number_format($projet->fincapitalsocial->capital_appele,0,',','.') ?></span></li>
									<li class="list-inline-item"> Capital non appelé :   <span class="value"><?= number_format($projet->fincapitalsocial->capital_non_appele,0,',','.') ?></span></li>

									<li class="list-inline-item">  Taux de rentabilité exigé par les actionnaires   :    <span class="value"><?= $projet->fincapitalsocial->taux_rent_exige_act .'%' ?></span></li>

									<li class="list-inline-item">  Montant des dettes financière   :    <span class="value"><?= number_format($projet->fincapitalsocial->mt_dettes_fin,0,',','.') ?></span></li>
									<li class="list-inline-item">  Cout de l'endettement   :    <span class="value"><?= $projet->fincapitalsocial->cout_endettement .'%' ?></span></li>
									<li class="list-inline-item">   Coût Moyen pondéré du Capital ou CMPC   :    <span class="value"><?= $projet->fincapitalsocial->cmpc ?></span></li>
									<li class="list-inline-item">  Taux de croissance à l’infini des flux de tréso. disponibles non actualisés:     <span class="value"><?= $projet->fincapitalsocial->tci_flux_treso_dispo . "%" ?></span></li>

									<li class="list-inline-item">    Taux de croissance à l’infini des flux de dividendes non actualisés :     <span class="value"><?= $projet->fincapitalsocial->tci_flux_dvd_non_actu ."%" ?></span></li>
									<li class="list-inline-item">   Besoin en fonds de roulement en jours du Chiffre d’affaires :     <span class="value"><?= $projet->fincapitalsocial->bfrjca ?></span></li>
									<li class="list-inline-item">   Besoin en fonds de roulement en pourcentage du CA :     <span class="value"><?= $projet->fincapitalsocial->bfrpca * 100 . '%' ?></span></li>

								</ul>




								<hr/>
								<h5>Tableau des flux de trésorerie actualisé</h5>

								<div class="table-responsive">
									 <table class="table table-bordered table-hover table-condensed">
												<thead>
													<tr>
														<th colspan="1"></th>

														@foreach($projet->prevresultats as $prevr)
															<th><?= $prevr->annee ?></th>

														@endforeach
													</tr>
												</thead>
												<tbody>


													<tr>
														<th>EBE</th>
														@foreach($projet->prevresultats as $prevr)
															<td>{{ number_format($prevr->ebe,0,',','.') }} <span>{{ $projet->devise->abb }}</span></td>

														@endforeach
													</tr>

													<tr>
														<th>IMPOT THEORIQUE</th>
														@foreach($projet->prevresultats as $prevr)
															<td>{{ number_format($prevr->it,0,',','.') }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Résultat d’exploitation après impôts</th>
														@foreach($projet->prevresultats as $prevr)
															<td>{{ number_format($prevr->reapi,0,',','.') }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Dotations aux amortissements</th>
														@foreach($projet->prevresultats as $prevr)
															<td>{{ number_format($prevr->dap,0,',','.') }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Montant des investissements</th>
														@foreach($projet->fincapitalsocial->repartcapitalsocials as $prevr)
															<td>{{ number_format($prevr->investissement,0,',','.') }}</td>

														@endforeach
													</tr>

													<tr>
														<th>Cessions d’actifs (Désinvestissements)</th>
														@foreach($projet->fincapitalsocial->repartcapitalsocials as $prevr)
															<td>{{ number_format($prevr->cession,0,',','.') }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Variation du besoin en fonds de roulement</th>
														@foreach($projet->prevresultats as $prevr)
															<td>-->>{{ number_format($prevr->varbfr,0,',','.') }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Flux de trésorerie Disponible</th>
														@foreach($projet->prevresultats as $prevr)
															<td>{{ number_format($prevr->fluxtresodispo,0,',','.') }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Coût moyen pondéré du capital en % (CMPC) ou taux d’actualisation</th>
														@foreach($projet->prevresultats as $prevr)
															<td>{{ round(($projet->fincapitalsocial->cmpc * 100) ,3) . '%' }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Facteur d’actualisation</th>
														@foreach($projet->prevresultats as $prevr)
															<td>{{ number_format($prevr->factactu,3,',','.') }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Flux de trésorerie disponible actualisée</th>
														@foreach($projet->prevresultats as $prevr)
															<td>{{ number_format($prevr->ftda,0,',','.') }}</td>

														@endforeach
													</tr>
													<tr>
														<th>Flux de trésorerie disponible actualisée cumulé</th>
														@foreach($projet->prevresultats as $prevr)
															<td> --->{{ number_format($projet->ftdac[$prevr->position],0,',','.') }}</td>

														@endforeach
													</tr>

												</tbody>
										</table>
								</div>


								<hr/>


								<div class="row">
									<div class="col-md-5 col-sm-12">
										Flux normatif de trésorerie  : <span class="value"><?= number_format($projet->fincapitalsocial->fluxnormatiftreso,0,',','.') ?></span>
									</div>
									<div class="col-md-6 col-sm-12">
										Flux normatif actualisé de trésorerie   : <span class="value"><?= number_format($projet->fincapitalsocial->fluxnormatifactutreso,0,',','.') ?></span>
									</div>
									<div class="col-md-6 col-sm-12">
										Valeur terminale des flux de trésorerie : <span class="value"><?= number_format($projet->fincapitalsocial->mtcapital,0,',','.') ?></span>
									</div>

								</div>

								<div class="row">
								    <div class="col-md-3 col-sm-12">
                                        <!-- small card -->
                                        <div class="small-box bg-success">
                                          <div class="inner">
                                            <h3><b><?= number_format($projet->van,0,',','.') ?></b></h3>

                                            <p>VALEUR ACTUELLE NETTE</p>
                                          </div>
                                          <div class="icon">
                                            <i class="fas fa-coins"></i>
                                          </div>
                                          <a href="#" class="small-box-footer">

                                          </a>
                                        </div>
									</div>

								    <div class="col-md-3 col-sm-12">
                                        <!-- small card -->
                                        <div class="small-box bg-primary">
                                          <div class="inner">
                                            <h3><b><?= $projet->tir ?></b></h3>

                                            <p>TAUX DE RENTABILITE INTERNE</p>
                                          </div>
                                          <div class="icon">
                                            <i class="fas fa-chart-pie"></i>
                                          </div>
                                          <a href="#" class="small-box-footer">

                                          </a>
                                        </div>
									</div>

								    <div class="col-md-3 col-sm-12">
                                        <!-- small card -->
                                        <div class="small-box bg-danger">
                                          <div class="inner">
                                            <h3><b><?= $projet->pbp ?></b></h3>

                                            <p>DELAI DE RECUPERATION DES CAPITAUX INVESTIS</p>
                                          </div>
                                          <div class="icon">
                                            <i class="far fa-calendar-alt"></i>
                                          </div>
                                          <a href="#" class="small-box-footer">

                                          </a>
                                        </div>
									</div>

								    <div class="col-md-3 col-sm-12">
                                    <!-- small card -->
                                    <div class="small-box bg-warning">
                                      <div class="inner">
                                        <h3><b><?= $projet->indiceprofit ?></b></h3>

                                        <p>Indice de profitabilité</p>
                                      </div>
                                      <div class="icon">
                                        <i class="far fa-thumbs-up"></i>
                                      </div>
                                      <a href="#" class="small-box-footer">

                                      </a>
                                    </div>
									</div>


									<div class="col-md-3 col-sm-12">
                                    <!-- small card -->
                                    <div class="small-box bg-info">
                                      <div class="inner">
                                        <h3><b><?= number_format($projet->fincapitalsocial->vedcf,0,',','.') ?></b></h3>

                                        <p>Valeur de l’entreprise (indicative) selon DCF</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fas fa-coins"></i>
                                      </div>
                                      <a href="#" class="small-box-footer">

                                      </a>
                                    </div>
									</div>
								</div>

								</div>
								</div>
                                <hr/>
								<div >
									<h6>B/ Rendement et rentabilité espérée de l’action  </h6>
									<div class="row">
										<div class="col-md-3 col-sm-12">
											Bénéfice par action N-1 : <span class="value">-->></span>
										</div>
										<div class="col-md-3 col-sm-12">
											Montant du dernier dividende par action distribué : <span class="value"><?= $projet->fincapitalsocial->mt_dernier_dvd_brut_action ?></span>
										</div>
										<div class="col-md-2 col-sm-12">
											Taux de distribution : <span class="value"><?= $projet->tauxdistrib ?></span>
										</div>
										<div class="col-md-3 col-sm-12">
											Nombre de droit de souscription : <span class="value"><?= $projet->fincapitalsocial->nbds ?></span>
										</div>
										<div class="col-md-4 col-sm-12">
											Prix préférentiel d’émission des nouvelles actions pour les anciens  : <span class="value"><?= $projet->fincapitalsocial->prix_pref_emis_na ?></span>
										</div>
										<div class="col-md-4 col-sm-12">
											Valeur des droits préférentiels de souscription   : <span class="value"><?= $projet->fincapitalsocial->valdps ?></span>
										</div>
										<div class="col-md-2 col-sm-12">
											Valeur comptable de l'action : <span class="value"><?= $projet->fincapitalsocial->valca ?></span>
										</div>
										<div class="col-md-3 col-sm-12">
											Taux de rendement de l'action : <span class="value"><?= $projet->fincapitalsocial->tauxra ?></span>
										</div>
										<div class="col-md-3 col-sm-12">
											Rentabilité espérée du marché : <span class="value"><?= $projet->fincapitalsocial->taux_rent_exige_act ?></span>
										</div>
										<div class="col-md-4 col-sm-12">
											Beta actif ou le taux d’intérêt propre à l’actif: <span class="value"><?= $projet->fincapitalsocial->beta_actif ?></span>
										</div>
										<div class="col-md-3 col-sm-12">
											Taux d’intérêt sans risque : <span class="value"><?= $projet->fincapitalsocial->taux_interet_sans_risque ?></span>
										</div>
										<div class="col-md-4 col-sm-12">
											Taux de Rentabilité attendue de l'action : <span class="value"><?= $projet->fincapitalsocial->tauxraa ?></span>
										</div>

									</div>
									<hr/>
									<h6>TABLEAU DES FLUX DE DIVIDENDES ACTUALISES</h6>
									<div class="table-responsive">
										 <table class="table table-bordered table-hover table-condensed">
											 <thead>
												 <tr>
													 <th colspan="1"></th>

													 @foreach($projet->prevresultats as $prevr)
														 <th><?= $prevr->annee ?></th>

													 @endforeach
												 </tr>
											 </thead>
											 <tbody>


												 <tr>
													 <th>Montant prévisionnel des dividendes</th>
													 @foreach($projet->prevresultats as $prevr)
														 <td>{{ number_format($prevr->mt_prev_dvd,0,',','.') }}</td>
													 @endforeach
												 </tr>
												 <tr>
													 <th>Coût moyen pondéré du capital en % (CMPC) ou taux d’actualisation</th>
													 @foreach($projet->prevresultats as $prevr)
														 <td>{{ round(($projet->fincapitalsocial->cmpc * 100) ,3) . '%' }}</td>
													 @endforeach
												 </tr>
												  <tr>
													 <th>Montant des dividendes Actualisés</th>
													 @foreach($projet->prevresultats as $prevr)
														 <td>{{ number_format($prevr->mt_dvd_actu,0,',','.') }}</td>
													 @endforeach
												 </tr>
											 </tbody>
										 </table>
									</div>
									<hr/>
									<div class="row">
										<div class="col-md-6 col-sm-12"></div>
									</div>
								</div>
								</div>
							<?php endif; ?>

							<?php if($projet->finempobligataire): ?>
                <div class="tab-pane <?= !($projet->fincapitalsocial)?'active':'' ?>" role="tabpanel" id="finempobligataire" aria-labelledby="finempobligataire-tab">
                <h5>EMPRUNT OBLIGATAIRE</h5>
                <?php if($projet->finempobligataire->tremboursement_id == 1): ?>
                    <div class="section">
                        <h6 class="page-header">Remboursement in fine</h6>
                        <ul class="list-inline">
                            <li class="list-inline-item">Nombre de titre à acheter : <span class="value"><?= $projet->finempobligataire->rif_nbta ?></span> </li>
                            <li class="list-inline-item">Valeur faciale : <span class="value"><?= number_format($projet->finempobligataire->rif_vf) ?></span> </li>
                            <li class="list-inline-item">Taux d’intérêt: <span class="value"><?= $projet->finempobligataire->rif_ti . '%'; ?></span> </li>
                            <li class="list-inline-item">Durée du prêt : <span class="value"><?= $projet->finempobligataire->rif_dp . ' ANS' ?></span> </li>
                            <li class="list-inline-item">Prix de remboursement : <span class="value"><?= number_format($projet->finempobligataire->rif_pr) ?></span> </li>
                            <li class="list-inline-item">Prime de remboursement : <span class="value"><?= number_format($projet->finempobligataire->primeremb_rif) ?></span> </li>
                        </ul>
                        <hr/>
                        <table id="tabobrss" class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>Montant du coupon par obligation </th>
                                <th>Montant de l’investissement </th>
                                <th>Intérêts à percevoir sur le prêt </th>
                                <th>Remboursement du capital en tenant compte de la prime de remboursement </th>
                                <th>Montant total à recevoir à la fin de la durée du prêt </th>
                            </tr>
                            </thead>
            
                            <tbody>
                            <tr>
                                <th><?= number_format($projet->finempobligataire->mtcouponobligrif) ?></th>
                                <th><?= number_format($projet->finempobligataire->mtinvestrif) ?></th>
                                <th><?= number_format($projet->finempobligataire->interetsrif) ?></th>
                                <th><?= number_format($projet->finempobligataire->rembcprrif) ?></th>
                                <th><?= number_format($projet->finempobligataire->mttfdprif) ?></th>
                            </tr>
                            </tbody>
            
                        </table>
                    </div>
                <?php endif; ?>
            
                <?php if($projet->finempobligataire->tremboursement_id == 2): ?>
                    <div class="section">
                        <h6 class="page-header">Remboursement par séries sensiblement égales </h6>
                        <ul class="list-inline">
                            <li class="list-inline-item">Nombre de titre à acheter : <span class="value"><?= $projet->finempobligataire->rss_nbta ?></span> </li>
                            <li class="list-inline-item">Valeur faciale : <span class="value"><?= number_format($projet->finempobligataire->rss_vf) ?></span> </li>
                            <li class="list-inline-item">Taux d’intérêt: <span class="value"><?= $projet->finempobligataire->rss_ti . '%' ?></span> </li>
                            <li class="list-inline-item">Durée du prêt : <span class="value"><?= $projet->finempobligataire->rss_dp . ' ANS' ?></span> </li>
                            <li class="list-inline-item">Prix de remboursement : <span class="value"><?= number_format($projet->finempobligataire->rss_pr) ?></span> </li>
                            <li class="list-inline-item">Prime de remboursement : <span class="value"><?= number_format($projet->finempobligataire->primerembrss) ?></span> </li>
                            <li class="list-inline-item">Nombre théorique d’obligations à rembourser à année : <span class="value"><?= $projet->finempobligataire->nbtremb_rss ?></span> </li>
                        </ul>
                        <hr/>
                        <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>Année </th>
                                <th>Nombre de titres à rembourser </th>
                                <th>Nombre d’obligation restant à rembourser </th>
                                <th>Amortissement </th>
                                <th>Intérêts </th>
                                <th>Annuités (Montant à recevoir chaque année)</th>
                            </tr>
                            </thead>
            
                            <tbody>
            
                            <?php for($i=1; $i<=$projet->finempobligataire->rss_dp;$i++): ?>
                                <tr>
                                    <th><?= $i ?></th>
                                    <th><?= $projet->finempobligataire->array_nbtrembrss[$i] ?></th>
                                    <th><?= $projet->finempobligataire->array_nborrss[$i] ?></th>
                                    <th><?= number_format($projet->finempobligataire->array_amortissementrss[$i],0,',','.') ?></th>
                                    <th><?= number_format($projet->finempobligataire->array_interetrss[$i],0,',','.') ?></th>
                                    <th><?= number_format($projet->finempobligataire->array_annuiterss[$i],0,',','.') ?></th>
                                </tr>
                            <?php endfor; ?>
                            <tr>
                                <th>TOTAL</th>
                                <th><?= $projet->finempobligataire->array_nbtrembrss[0] ?></th>
                                <th>-</th>
                                <th><?= number_format($projet->finempobligataire->array_amortissementrss[0],0,',','.') ?></th>
                                <th><?= number_format($projet->finempobligataire->array_interetrss[0],0,',','.') ?></th>
                                <th><?= number_format($projet->finempobligataire->array_annuiterss[0],0,',','.') ?></th>
                            </tr>
            
                            </tbody>
            
                        </table>
                    </div>
                <?php endif; ?>
            
                                            <?php if($projet->finempobligataire->tremboursement_id == 3): ?>
                                                <div class="section">
                                                    <h6 class="page-header">Remboursement par annuités sensiblement constantes </h6>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">Nombre de titre à acheter : <span class="value"><?= $projet->finempobligataire->ras_nbta ?></span> </li>
                                                        <li class="list-inline-item">Valeur faciale : <span class="value"><?= number_format($projet->finempobligataire->ras_vf) ?></span> </li>
                                                        <li class="list-inline-item">Taux d’intérêt: <span class="value"><?= $projet->finempobligataire->ras_ti .'%' ?></span> </li>
                                                        <li class="list-inline-item">Durée du prêt : <span class="value"><?= $projet->finempobligataire->ras_dp .' ANS' ?></span> </li>
                                                        <li class="list-inline-item">Prix de remboursement : <span class="value"><?= number_format($projet->finempobligataire->ras_pr) ?></span> </li>
                                                        <li class="list-inline-item">Prime de remboursement : <span class="value"><?= number_format($projet->finempobligataire->primerembrasc) ?></span> </li>
                                                        <li class="list-inline-item">Nombre théorique d’obligations à rembourser à année : <span class="value"><?= $projet->finempobligataire->nbtoras ?></span> </li>
                                                    </ul>
                                                    <hr/>
            
                                                    <?php if($projet->finempobligataire->primerembrasc == 0): ?>
                                                        <h6>Annuité constante : <span class="value"><?= $projet->finempobligataire->annuite_constante_ras ?></span> </h6>
                                                        <table class="table table-bordered table-striped table-hover table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th>Année </th>
                                                                <th>Nombre de titres remboursé </th>
                                                                <th>Nombre d’obligations vivantes </th>
                                                                <th>Montant des Intérêts </th>
                                                                <th>Montant de l’amortissement </th>
                                                                <th>Annuités</th>
                                                            </tr>
                                                            </thead>
            
                                                            <tbody>
                                                            <tr>
                                                                <th>1</th>
                                                                <th><?= $projet->finempobligataire->nbtr1_a ?></th>
                                                                <th><?= $projet->finempobligataire->nbov1_a?></th>
                                                                <th><?= $projet->finempobligataire->interets1_a ?></th>
                                                                <th><?= $projet->finempobligataire->amortissement1_a ?></th>
                                                                <th><?= $projet->finempobligataire->annuite1_a ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>2</th>
                                                                <th><?= $projet->finempobligataire->nbtr2_a ?></th>
                                                                <th><?= $projet->finempobligataire->nbov2_a?></th>
                                                                <th><?= $projet->finempobligataire->interets2_a ?></th>
                                                                <th><?= $projet->finempobligataire->amortissement2_a ?></th>
                                                                <th><?= $projet->finempobligataire->annuite2_a ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>3</th>
                                                                <th><?= $projet->finempobligataire->nbtr3_a ?></th>
                                                                <th><?= $projet->finempobligataire->nbov3_a?></th>
                                                                <th><?= $projet->finempobligataire->interets3_a ?></th>
                                                                <th><?= $projet->finempobligataire->amortissement3_a ?></th>
                                                                <th><?= $projet->finempobligataire->annuite3_a ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>n</th>
                                                                <th><?= $projet->finempobligataire->nbtrn_a ?></th>
                                                                <th><?= $projet->finempobligataire->nbovn_a?></th>
                                                                <th><?= $projet->finempobligataire->interetsn_a ?></th>
                                                                <th><?= $projet->finempobligataire->amortissementn_a ?></th>
                                                                <th><?= $projet->finempobligataire->annuiten_a ?></th>
                                                            </tr>
                                                            </tbody>
            
                                                        </table>
            
                                                    <?php else: ?>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">Annuité  théorique : <span class="value"><?= $projet->finempobligataire->annuite_theorique_ras ?></span> </li>
                                                            <li class="list-inline-item">Le nombre de titre théorique  remboursé pour l’année 1 : <span class="value"> <?= $projet->finempobligataire->nbt_theorique_an1_ras ?></span></li>
                                                        </ul>
            
                                                        <table class="table table-bordered table-striped table-hover table-condensed">
                                                            <thead>
                                                            <tr>
                                                                <th>Année </th>
                                                                <th>Nombre de titres théorique remboursé</th>
                                                                <th>Nombre réel de titres remboursé </th>
                                                                <th>Nombre d’obligations vivantes </th>
                                                                <th>Montant des Intérêts </th>
                                                                <th>Montant de l’amortissement </th>
                                                                <th>Annuités</th>
                                                            </tr>
                                                            </thead>
            
                                                            <tbody>
                                                            <?php  for($i=1;$i<=$projet->finempobligataire->ras_dp;$i++): ?>
                                                                <tr class="tr-number">
                                                                    <th><?= $i ?></th>
                                                                    <td><?= $projet->finempobligataire->tab_ras[$i]['nttr'] ?></td>
                                                                    <td><?= $projet->finempobligataire->tab_ras[$i]['nrtr'] ?></td>
                                                                    <td><?= $projet->finempobligataire->tab_ras[$i]['ov'] ?></td>
                                                                    <td><?= number_format($projet->finempobligataire->tab_ras[$i]['interets'],0,',','.') ?></td>
                                                                    <td><?= number_format($projet->finempobligataire->tab_ras[$i]['amortissement'],0,',','.') ?></td>
                                                                    <td><?= number_format($projet->finempobligataire->tab_ras[$i]['annuite'],0,',','.') ?></td>
                                                                </tr>
                                                            <?php endfor; ?>
            
            
                                                            <tr class="tr-number">
                                                                <th colspan="">TOTAL</th>
                                                                <td><?= $projet->finempobligataire->tab_ras[0]['nttr'] ?></td>
                                                                <td><?= $projet->finempobligataire->tab_ras[0]['nrtr'] ?></td>
                                                                <td></td>
                                                                <td><?= number_format($projet->finempobligataire->tab_ras[0]['interets'],0,',','.') ?></td>
                                                                <td><?= number_format($projet->finempobligataire->tab_ras[0]['amortissement'],0,',','.') ?></td>
                                                                <td><?= number_format($projet->finempobligataire->tab_ras[0]['annuite'],0,',','.') ?></td>
                                                            </tr>
            
                                                            </tbody>
            
                                                        </table>
            
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
            
                                            </div>
                            <?php endif; ?>

                            <?php if($projet->finmlt): ?>
                                <div class="tab-pane fade <?= !($projet->fincapitalsocial || $projet->finempobligataire)?'active in':'' ?>" role="tabpanel" id="finmlt" aria-labelledby="finmlt-tab">
                                    <h5>PRETS A MLT DES ETABLISSEMENTS DE CREDITS</h5>
                                    <?php if($projet->finmlt->tremboursement_id == 1): ?>
                                        <div class="section">
                                            <h6 class="page-header">Remboursement in fine</h6>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">SOMME EMPRUNTEE: <span class="value"><?= number_format($projet->finmlt->rif_se) ?></span> </li>
                                                <li class="list-inline-item">TAUX D'INTERET: <span class="value"><?= $projet->finmlt->rif_ti .'%' ?></span> </li>
                                                <li class="list-inline-item">PERIODICITE DE REMBOURSEMENT: <span class="value"><?= $projet->finmlt->rif_periode?"ANNUELLE":"MENSUELLE" ?></span> </li>
                                                <li class="list-inline-item">DUREE DE L'EMPRUNT: <span class="value"><?= $projet->finmlt->rif_de . ' ANS'; ?></span> </li>
                                            </ul>
                                            <hr/>
                                            <table class="table table-bordered table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>PERIODE n</th>
                                                    <th>Capital du en début de période</th>
                                                    <th>Intérêt (i)</th>
                                                    <th>Amortissements</th>
                                                    <th>Annuités ou mensualités</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php for($i=1;$i<=$projet->finmlt->rif_de;$i++): ?>
                                                    <tr class="tr-number">
                                                        <td><?= $i ?></td>
                                                        <td><?= number_format($projet->finmlt->array_capital_rif[$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->finmlt->array_interet_rif[$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->finmlt->array_amortissement_rif[$i],0,',','.') ?></td>

                                                        <td><?= number_format($projet->finmlt->array_annuite_rif[$i],0,',','.') ?></td>
                                                    </tr>
                                                <?php endfor; ?>

                                                <tr>
                                                    <th colspan="2">TOTAL</th>

                                                    <th><?= number_format($projet->finmlt->array_interet_rif[0],0,',','.') ?></th>
                                                    <td><?= number_format($projet->finmlt->array_amortissement_rif[0],0,',','.') ?></td>

                                                    <td><?= number_format($projet->finmlt->array_annuite_rif[0],0,',','.') ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($projet->finmlt->tremboursement_id == 4): ?>
                                        <div class="section">
                                            <h6 class="page-header">Remboursement avec amortissement constant du capital </h6>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">SOMME EMPRUNTEE: <span class="value"><?= number_format($projet->finmlt->racc_se) ?></span> </li>
                                                <li class="list-inline-item">TAUX D'INTERET: <span class="value"><?= $projet->finmlt->racc_ti .'%' ?></span> </li>
                                                <li class="list-inline-item">DUREE DE L'EMPRUNT: <span class="value"><?= $projet->finmlt->racc_de. ' ANS' ?></span> </li>
                                            </ul>
                                            <hr/>
                                            <table class="table table-bordered table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>PERIODE n</th>
                                                    <th>Capital du en début de période</th>
                                                    <th>Intérêt (i)</th>
                                                    <th>Amortissements</th>
                                                    <th>Annuités</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php for($i=1; $i<=$projet->finmlt->racc_de;$i++): ?>
                                                    <tr class="tr-number">
                                                        <td><?= $i ?></td>
                                                        <td><?= number_format($projet->finmlt->tab2['capital'][$i],0,',','.'); ?></td>
                                                        <td><?= number_format($projet->finmlt->tab2['interets'][$i],0,',','.'); ?></td>
                                                        <td><?= number_format($projet->finmlt->tab2['amortissement'][$i],0,',','.'); ?></td>

                                                        <td><?= number_format($projet->finmlt->tab2['annuite'][$i],0,',','.') ?></td>
                                                    </tr>
                                                <?php endfor; ?>


                                                <tr class="tr-number">
                                                    <th style="text-align: center" colspan="2">TOTAL</th>

                                                    <th><?= number_format($projet->finmlt->tab2['interets'][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->finmlt->tab2['amortissement'][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->finmlt->tab2['annuite'][0],0,',','.') ?></th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($projet->finmlt->tremboursement_id == 3): ?>
                                        <div class="section">
                                            <h6 class="page-header">Remboursement par annuités constantes* </h6>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">SOMME EMPRUNTEE: <span class="value"><?= number_format($projet->finmlt->ras_se) ?></span> </li>
                                                <li class="list-inline-item">TAUX D'INTERET: <span class="value"><?= $projet->finmlt->ras_ti .'%' ?></span> </li>
                                                <li class="list-inline-item">DUREE DE L'EMPRUNT: <span class="value"><?= $projet->finmlt->ras_de.' ANS' ?></span> </li>
                                                <li class="list-inline-item">TAUX FICTIF: <span class="value"><?= $projet->finmlt->tf_ras  .'%'; ?></span> </li>
                                                <li class="list-inline-item">ANNUITE CONSTANTE: <span class="value"><?= number_format($projet->finmlt->annuite_const_ras); ?></span> </li>
                                            </ul>
                                            <hr/>
                                            <table class="table table-bordered table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>PERIODE n</th>
                                                    <th>Capital du en début de période</th>
                                                    <th>Intérêt (i)</th>
                                                    <th>Amortissements</th>
                                                    <th>Annuités</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php for($i=1; $i<=$projet->finmlt->ras_de;$i++): ?>
                                                    <tr class="tr-number">
                                                        <td><?= $i ?></td>
                                                        <td><?= number_format($projet->finmlt->tab['capital'][$i],0,',','.'); ?></td>
                                                        <td><?= number_format($projet->finmlt->tab['interets'][$i],0,',','.'); ?></td>
                                                        <td><?= number_format($projet->finmlt->tab['amortissement'][$i],0,',','.'); ?></td>

                                                        <td><?= number_format($projet->finmlt->tab['annuite'][$i],0,',','.') ?></td>
                                                    </tr>
                                                <?php endfor; ?>


                                                <tr class="tr-number">
                                                    <th style="text-align: center" colspan="2">TOTAL</th>

                                                    <th><?= number_format($projet->finmlt->tab['interets'][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->finmlt->tab['amortissement'][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->finmlt->tab['annuite'][0],0,',','.') ?></th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($projet->fincredbail): ?>
                                <div class="tab-pane fade <?= !($projet->fincapitalsocial || $projet->finempobligataire || $projet->finmlt)?'active in':'' ?>" role="tabpanel" id="fincredbail" aria-labelledby="fincredbail-tab">
                                    <h5>CREDIT BAIL</h5>
                                    <?php if($projet->fincredbail->tremboursement_id == 4): ?>

                                        <div class="section">
                                            <h6 class="page-header">REMBOURSEMENT PAR AMORTISSEMENTS CONSTANTS DU CAPITAL</h6>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">SOMME EMPRUNTEE: <span class="value"><?= number_format($projet->fincredbail->rac_se) ?></span> </li>
                                                <li class="list-inline-item">TAUX D'INTERET: <span class="value"><?= $projet->fincredbail->rac_ti .'%'  ?></span> </li>
                                                <li class="list-inline-item">PERIODICITE DE REMBOURSEMENT: <span class="value"><?= $projet->fincredbail->rac_periode?"ANNUELLE":"MENSUELLE" ?></span> </li>
                                                <li class="list-inline-item">DUREE DE L'EMPRUNT: <span class="value"><?= $projet->fincredbail->rac_de . ' ANS' ?></span> </li>
                                            </ul>
                                            <hr/>
                                            <table class="table table-bordered table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>PERIODE n</th>
                                                    <th>Capital du en début de période</th>
                                                    <th>Intérêt (i)</th>
                                                    <th>Amortissements</th>
                                                    <th>Assurance</th>
                                                    <th>Loyer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php for($i=1; $i<=$projet->fincredbail->rac_de;$i++): ?>
                                                    <tr class="tr-number">
                                                        <td><?= $i ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab1["capital"][$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab1["interets"][$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab1["amortissement"][$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab1["assurance"][$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab1["loyer"][$i],0,',','.') ?></td>
                                                    </tr>
                                                <?php endfor; ?>
                                                <tr class="tr-number">
                                                    <th style="text-align: center" colspan="2">TOTAL</th>

                                                    <th><?= number_format($projet->fincredbail->tab1["interets"][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->fincredbail->tab1["amortissement"][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->fincredbail->tab1["assurance"][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->fincredbail->tab1["loyer"][0],0,',','.') ?></th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($projet->fincredbail->tremboursement_id == 5): ?>
                                        <div class="section">
                                            <h6 class="page-header">REMBOURSEMENT PAR LOYER CONSTANT:</h6>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">SOMME EMPRUNTEE: <span class="value"><?= number_format($projet->fincredbail->rlc_se) ?></span> </li>
                                                <li class="list-inline-item">TAUX D'INTERET: <span class="value"><?= $projet->fincredbail->rlc_ti . '%'; ?></span> </li>
                                                <li class="list-inline-item">PERIODICITE DE REMBOURSEMENT: <span class="value"><?= $projet->fincredbail->rlc_periode?"ANNUELLE":"MENSUELLE" ?></span> </li>
                                                <li class="list-inline-item">DUREE DE L'EMPRUNT: <span class="value"><?= $projet->fincredbail->rlc_de .' ANS' ?></span> </li>
                                                <li class="list-inline-item">TAUX FICTIF: <span class="value"><?= $projet->fincredbail->rlc_tf . "%" ?></span> </li>
                                                <li class="list-inline-item">ANNUITE CONSTANTE: <span class="value"><?= number_format($projet->fincredbail->annuite_const_rlc) ?></span> </li>
                                            </ul>

                                            <hr/>

                                            <table class="table table-bordered table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>PERIODE n</th>
                                                    <th>Capital du en début de période</th>
                                                    <th>Intérêt (i)</th>
                                                    <th>Amortissements</th>
                                                    <th>Assurance</th>
                                                    <th>Loyer constant</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php for($i=1; $i<=$projet->fincredbail->rlc_de;$i++): ?>
                                                    <tr class="tr-number">
                                                        <td><?= $i ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab2["capital"][$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab2["interets"][$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab2["amortissement"][$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab2["assurance"][$i],0,',','.') ?></td>
                                                        <td><?= number_format($projet->fincredbail->tab2["loyer"][$i],0,',','.') ?></td>
                                                    </tr>
                                                <?php endfor; ?>
                                                <tr class="tr-number">
                                                    <th style="text-align: center" colspan="2">TOTAL</th>

                                                    <th><?= number_format($projet->fincredbail->tab2["interets"][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->fincredbail->tab2["amortissement"][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->fincredbail->tab2["assurance"][0],0,',','.') ?></th>
                                                    <th><?= number_format($projet->fincredbail->tab2["loyer"][0],0,',','.') ?></th>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($projet->finescompte): ?>
                                <div class="tab-pane fade" role="tabpanel" id="finescompte" aria-labelledby="finescompte-tab">
                                    <h5>ESCOMPTE</h5>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="well">
                                                <ul class="list" style="list-style-type: none">
                                                    <li>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">Montant à escompter : <span class="value"><?= number_format($projet->finescompte->mt_to_escompte) ?></span></li>
                                                            <li class="list-inline-item">Nombre d’effets de commerce  : <span class="value"><?= $projet->finescompte->nb_effets ?></span></li>
                                                            <li class="list-inline-item">Taux d’escompte  : <span class="value"><?= $projet->finescompte->taux_escompte * 100 . '%' ?></span></li>
                                                            <li class="list-inline-item">Nombre de jours entre la date de négociation et le jour d’échéance : <span class="value"><?= $projet->finescompte->nb_jours ?></span></li>
                                                            <li class="list-inline-item">Taux TVA : <span class="value"><?= $projet->finescompte->taux_tva *100 .'%' ?></span></li>
                                                            <li class="list-inline-item">Taux centime additionnel : <span class="value"><?= $projet->finescompte->taux_centime *100 . '%' ?></span></li>
                                                        </ul>
                                                    </li>
                                                    <li style="font-weight: 900" class="list-group-item list-group-item-success">Montant de l’Escompte  : <span class="value"><?= number_format($projet->finescompte->mt_escompte) ?></span></li>

                                                    <li>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">Taux de commission d’endos : <span class="value"><?= $projet->finescompte->taux_com_endos *100 .'%' ?></span></li>
                                                            <li style="font-weight: 900" class="">Commissions d’endossement : <span class="value"><?= number_format($projet->finescompte->com_endossement) ?></span></li>
                                                            <li class="list-inline-item">Frais de manipulation ou commission de service par effet : <span class="value"><?= number_format($projet->finescompte->frais_manipulation) ?></span></li>
                                                            <li style="font-weight: 900" class="">Frais de manipulation : <span class="value"><?= number_format($projet->finescompte->total_frais_manip) ?></span></li>
                                                            <li class="list-inline-item">Commission d’acceptation par effet  : <span class="value"><?= number_format($projet->finescompte->com_acception) ?></span></li>
                                                            <li style="font-weight: 900" class="list-inline-item">Commission d’acceptation : <span class="value"><?= number_format($projet->finescompte->total_com_acceptation) ?></span></li>
                                                            <li class="list-inline-item">Commission d’avis de sort par effet  : <span class="value"><?= number_format($projet->finescompte->com_avis) ?></span></li>
                                                            <li style="font-weight: 700" class="list-inline-item">Commission d’avis de sort  : <span class="value"><?= number_format($projet->finescompte->total_com_avis) ?></span></li>

                                                        </ul>
                                                    </li>
                                                    <li style="font-weight: 900" class="list-group-item list-group-item-success">SOMME DES COMMISSIONS : <span class="value"><?= number_format($projet->finescompte->somme_com) ?></span></li>
                                                    <li>
                                                        <ul class="list-inline">
                                                            <li style="font-weight: 700" class="list-inline-item">Montant de la Taxe sur la valeur ajoutée : <span class="value"><?= number_format( $projet->finescompte->mt_tva) ?></span></li>
                                                            <li style="font-weight: 700" class="list-inline-item">Montant Centime additionnel : <span class="value"><?= number_format($projet->finescompte->mt_cent_add) ?></span></li>
                                                        </ul>
                                                    </li>

                                                    <li style="font-weight: 900" class="list-group-item list-group-item-success">Montant ajusté de la TVA : <span class="value"><?= number_format($projet->finescompte->mt_ajust_tva) ?></span></li>
                                                </ul>
                                                <ul class="list-group">
                                                    <li style="font-weight: 900; font-size: larger" class="list-group-item list-group-item-success">Montant des agios: <span class="value"><?= number_format($projet->finescompte->mt_agios) ?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endif; ?>
                            <?php if($projet->finaffacturage): ?>
                                <div class="tab-pane fade" role="tabpanel" id="finaffacturage" aria-labelledby="finaffacturage-tab">
                                    <h5>AFFACTURAGE</h5>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="well">
                                                <ul class="list" style="list-style-type: none">
                                                    <li>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">Montant à affacturer : <span class="value"><?= number_format($projet->finaffacturage->mt_affacturage) ?></span></li>
                                                            <li class="list-inline-item">Nombre d’effets de commerce  : <span class="value"><?= $projet->finaffacturage->nb_effets ?></span></li>
                                                            <li class="list-inline-item">Taux d’escompte  : <span class="value"><?= $projet->finaffacturage->taux_affacturage. '%' ?></span></li>
                                                            <li class="list-inline-item">Nombre de jours entre la date de négociation et le jour d’échéance : <span class="value"><?= $projet->finaffacturage->nb_jours ?></span></li>
                                                            <li class="list-inline-item">Taux TVA : <span class="value"><?= $projet->finaffacturage->taux_tva .'%' ?></span></li>
                                                            <li class="list-inline-item">Taux centime additionnel : <span class="value"><?= $projet->finaffacturage->taux_centime . '%' ?></span></li>
                                                        </ul>
                                                    </li>
                                                    <li style="font-weight: 900" class="list-group-item list-group-item-success">Montant de l'affacturage  : <span class="value"><?= number_format($projet->finaffacturage->mt_escompte) ?></span></li>

                                                    <li>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">Taux de commission d’endos : <span class="value"><?= $projet->finaffacturage->taux_com_endos *100 .'%' ?></span></li>
                                                            <li style="font-weight: 900" class="">Commissions d’endossement : <span class="value"><?= number_format($projet->finaffacturage->com_endossement) ?></span></li>
                                                            <li class="list-inline-item">Frais de manipulation ou commission de service par effet : <span class="value"><?= number_format($projet->finaffacturage->frais_manipulation) ?></span></li>
                                                            <li style="font-weight: 900" class="">Frais de manipulation : <span class="value"><?= number_format($projet->finaffacturage->total_frais_manip) ?></span></li>
                                                            <li class="list-inline-item">Commission d’acceptation par effet  : <span class="value"><?= number_format($projet->finaffacturage->com_acceptation) ?></span></li>
                                                            <li style="font-weight: 900" class="list-inline-item">Commission d’acceptation : <span class="value"><?= number_format($projet->finaffacturage->total_com_acceptation) ?></span></li>
                                                            <li class="list-inline-item">Commission d’avis de sort par effet  : <span class="value"><?= number_format($projet->finaffacturage->com_avis) ?></span></li>
                                                            <li style="font-weight: 700" class="list-inline-item">Commission d’avis de sort  : <span class="value"><?= number_format($projet->finaffacturage->total_com_avis) ?></span></li>

                                                        </ul>
                                                    </li>
                                                    <li style="font-weight: 900" class="list-group-item list-group-item-success">SOMME DES COMMISSIONS : <span class="value"><?= number_format($projet->finaffacturage->somme_com) ?></span></li>
                                                    <li>
                                                        <ul class="list-inline">
                                                            <li style="font-weight: 700" class="list-inline-item">Montant de la Taxe sur la valeur ajoutée : <span class="value"><?= number_format( $projet->finaffacturage->mt_tva) ?></span></li>
                                                            <li style="font-weight: 700" class="list-inline-item">Montant Centime additionnel : <span class="value"><?= number_format($projet->finaffacturage->mt_cent_add) ?></span></li>
                                                        </ul>
                                                    </li>

                                                    <li style="font-weight: 900" class="list-group-item list-group-item-success">Montant ajusté de la TVA : <span class="value"><?= number_format($projet->finaffacturage->mt_ajust_tva) ?></span></li>
                                                </ul>
                                                <ul class="list-group">
                                                    <li style="font-weight: 900; font-size: larger" class="list-group-item list-group-item-success">Montant des agios: <span class="value"><?= number_format($projet->finaffacturage->mt_agios) ?></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endif; ?>
                            <?php if($projet->fincredsignature): ?>
                                <div class="tab-pane fade" role="tabpanel" id="fincredsignature" aria-labelledby="fincredsignature-tab">
                                    <h5>CREDIT PAR SIGNATURE</h5>
                                    <?php if($projet->fincredsignature->creditype_id==1): ?>
                                        <h6>TYPE DE CREDIT: <span class="value">CAUTIONS</span></h6>
                                        <ul class="list-group">
                                            <?php if($projet->fincredsignature->d_p_caution): ?>
                                                <li class="list-group-item"><?= $projet->fincredsignature->d_p_caution->name ?></li>
                                            <?php endif; ?>
                                            <?php if($projet->fincredsignature->a_r_caution): ?>
                                                <li class="list-group-item"><?= $projet->fincredsignature->a_r_caution->name ?></li>
                                            <?php endif; ?>
                                            <?php if($projet->fincredsignature->e_d_caution): ?>
                                                <li class="list-group-item"><?= $projet->fincredsignature->e_d_caution->name ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <?php if($projet->fincredsignature->aval): ?>
                                        <h6>TYPE DE CREDIT: <span class="value">ACCEPTATIONS ET AVALS -  <?= $projet->fincredsignature->aval->name  ?></span></h6>
                                    <?php endif; ?>
                                    <?php if($projet->fincredsignature->lettrecredit): ?>
                                        <h6>TYPE DE CREDIT: <span class="value">Crédit documentaire ou lettre de crédit -  <?= $projet->fincredsignature->lettrecredit->name  ?></span></h6>
                                    <?php endif; ?>
                                    <hr/>
                                    <ul style="list-style-type: none;">
                                        <li>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">Le montant du crédit par signature : <span class="value"><?=  number_format($projet->fincredsignature->mt_credit)  ?></span></li>
                                                <li class="list-inline-item">Taux des commissions :  <span class="value"><?= ($projet->fincredsignature->taux_com ) . '%'   ?></span></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item list-group-item-success">MONTANT DES COMMISSIONS : <span class="value"><?= $projet->fincredsignature->mt_com;  ?></span></li>
                                    </ul>

                                </div>
                            <?php endif; ?>
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
.value{


        font-weight: bold;
        color: #28a745;
        font-family: cursive;


}
</style>