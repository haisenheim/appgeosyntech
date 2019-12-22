<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">BILANS</h4>
        </div>
        <div class="card-body">
            <ul class="list-inline">
                @foreach($projet->reportbilans as $prevr )
                    <li class="list-inline-item">
                            <!-- ici  -->
                            <span><a class="btn btn-xs btn-outline btn-info" href="#" data-toggle="modal" data-target="#rbm-{{$prevr->id}}">{{ $prevr->name }}</a></span>
                            <div class="modal fade" id="rbm-{{$prevr->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h4  class="modal-title text-center">{{$prevr->name}}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                        <div style="overflow: scroll;" class="modal-body">
                                             <table class="table table-bordered table-hover table-condensed">

                                    <tbody>
                                        <tr>
                                        <th style="text-orientation: upright; writing-mode: vertical-rl;" rowspan="14">RESOURCES STABLES</th>
                                        </tr>
                                        <tr>

                                            <td colspan="2">CAPITAL</td>

                                                <td><?= $prevr->capital ?></td>

                                        </tr>
                                        <tr>

                                            <td colspan="2">APPORTEURS DE CAPITAL NON APPELE</td>

                                                <td><?= $prevr->apporteurs_acpital_non_appele ?></td>

                                        </tr>
                                        <tr>

                                            <td colspan="2">PRIMES D'APPORT D'EMISSION</td>

                                                <td><?= $prevr->primes_apport ?></td>

                                        </tr>
                                        <tr>

                                            <td colspan="2">ECARTS DE REEVALUTATION</td>

                                                <td><?= $prevr->ecarts_reevaluation ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Réserves indisponibles</td>

                                                <td><?= $prevr->eserves_indisponibles ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Réserves libres</td>

                                                <td><?= $prevr->reserves_libres ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Report à nouveau</td>

                                                <td><?= $prevr->report_a_nouveau ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Résultat net de l'exercice</td>

                                                <td><?= $prevr->resultat_net_exercice ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Subventions d'investissement</td>

                                                <td><?= $prevr->subventions_investissement ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Provisions réglementés</td>

                                                <td><?= $prevr->provisions_reglementees ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">EMPRUNTS</td>

                                                <td><?= $prevr->emprunts ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Dettes de location acquisition</td>

                                                <td><?= $prevr->dettes_location_acquisition ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Provisions financières pour risques et charges</td>

                                                <td><?= $prevr->provisions_financieres_risques_ ?></td>

                                        </tr>


                                        <tr><th style="writing-mode: vertical-rl" rowspan="16">ACTIF IMMOBILISE</th></tr>
                                        <tr><th style="writing-mode: vertical-rl" rowspan="5">Immos incorporelles</th></tr>
                                        <tr>

                                            <td>Frais de développement et de prospection</td>

                                                <td><?= $prevr->frais_developpement ?></td>

                                        </tr>
                                        <tr>

                                            <td>Brevets, licences, logiciels, et droits assimilaires</td>

                                                <td><?= $prevr->brevets ?></td>

                                        </tr>
                                        <tr>

                                            <td>Fonds commercial et droit au bail</td>

                                                <td><?= $prevr->fonds_commercial ?></td>

                                        </tr>
                                        <tr>
                                            <td>Autres immobilisations incorporelles</td>

                                                <td><?= $prevr->autres_immobilisations_incorporelles ?></td>

                                        </tr>



                                        <tr><td style="writing-mode: vertical-rl" rowspan="7">Immos corporelles</td></tr>

                                        <tr>
                                            <td>Terrains</td>

                                                <td><?= $prevr->terrains ?></td>

                                        </tr>
                                        <tr>
                                            <td>Bâtiments</td>

                                                <td><?= $prevr->batiments ?></td>

                                        </tr>

                                        <tr>
                                            <td>Aménagements, agencements et installations</td>

                                                <td><?= $prevr->amenagements ?></td>

                                        </tr>
                                        <tr>
                                            <td>Matériel, mobilier et actifs biologiques</td>

                                                <td><?= $prevr->materiel_mobilier ?></td>

                                        </tr>
                                        <tr>
                                            <td>Matériel de transport</td>

                                                <td><?= $prevr->materiel_transport ?></td>

                                        </tr>
                                        <tr>
                                            <td>Avances et acomptes versés sur immobilisations</td>

                                                <td><?= $prevr->avances_acomptes ?></td>

                                        </tr>


                                        <tr><td style="writing-mode: vertical-rl" rowspan="3">Immos fin.</td></tr>

                                        <tr>
                                            <td>Titres de participation</td>

                                                <td class="td-modif" data-model="Prevbilan" data-name="titres_participation" data-id="<?= $prevr->id ?>" ><?= $prevr->titres_participation ?><span style="display: none; cursor: pointer;" class="fa fa-pencil fa-modif"></span></td>

                                        </tr>
                                        <tr>
                                            <td>Autres immobilisations financieres</td>

                                                <td><?= $prevr->autres_immobilisations_financieres ?></td>

                                        </tr>
                                        <tr>
                                            <th style="text-align: center" colspan="3">FONDS DE ROULEMENT</th>

                                                <th><?= $prevr->fr ?></th>

                                        </tr>

                                        <tr><td style="writing-mode: vertical-rl" rowspan="7">ACTIF CIRCULANT</td></tr>

                                        <tr>
                                            <td colspan="2">Actif circulant HAO</td>

                                                <td><?= $prevr->actif_circulant_hao ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Stocks et encours</td>

                                                <td><?= $prevr->stocks_encours ?></td>

                                        </tr>

                                        <tr>
                                            <td colspan="2">CRÉANCES ET EMPLOIS ASSIMILÉS</td>

                                                <td><?= $prevr->creances_emplois ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Fournisseurs avances versées</td>

                                                <td><?= $prevr->avances_fournisseurs ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Clients</td>

                                                <td><?= $prevr->clients ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Autres créances</td>

                                                <td><?= $prevr->autres_creances ?></td>

                                        </tr>


                                        <tr><td style="writing-mode: vertical-rl" rowspan="6">PASSIF CIRCULANT</td></tr>

                                        <tr>
                                            <td colspan="2">Dettes circulants HAO</td>

                                                <td><?= $prevr->dettes_circulantes_hao ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Clients avances reçues</td>

                                                <td><?= $prevr->clients_avances_recues ?></td>

                                        </tr>

                                        <tr>
                                            <td colspan="2">Fournisseurs d'exploitation</td>

                                                <td><?= $prevr->fournisseurs_exploitation ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Dettes fiscales et sociales</td>

                                                <td><?= $prevr->dettes_fiscales ?></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Autres dettes</td>

                                                <td><?= $prevr->autres_dettes ?></td>

                                        </tr>
                                        <tr>
                                            <th style="text-align: center" colspan="3">BESOIN EN FONDS DE ROULEMENT</th>

                                                <th><?= $prevr->bfr ?></th>

                                        </tr>
                                        <tr><td style="writing-mode: vertical-rl" rowspan="4">Tresorerie Active</td></tr>

                                        <tr>
                                            <td colspan="2">Titres de placement</td>

                                                <td class="td-modif" data-name="titres_placement" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->titres_placement ?><span class="fa fa-pencil fa-modif"></span></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Valeurs à encaisser</td>

                                                <td class="td-modif" data-name="valeur_encaisser" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->valeur_encaisser ?><span class="fa fa-pencil fa-modif"></span></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Banques, chèques postaux, caisse et assimilés</td>

                                                <td class="td-modif" data-name="banques_cheques_" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->banques_cheques_ ?><span class="fa fa-pencil fa-modif"></span></td>

                                        </tr>
                                        <tr><td style="writing-mode: vertical-rl" rowspan="3">Tresorerie Passive</td></tr>
                                        <tr>
                                            <td colspan="2">Banques, crédits d'escomptes et de trésorerie</td>

                                                <td class="td-modif" data-name="banques_credit_escompte" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->banques_credit_escompte ?><span class="fa fa-pencil fa-modif"></span></td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">Banques, crédits de trésorerie</td>

                                                <td class="td-modif" data-name="banques_credit_tresorerie" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->banques_credit_tresorerie ?><span class="fa fa-pencil fa-modif"></span></td>

                                        </tr>
                                        <tr>
                                            <th style="text-align: center" colspan="3">TRESORERIE NETTE</th>

                                                <th><?= $prevr->tn ?></th>

                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align: center">Ecart de conversion - actif</td>

                                                <td class="td-modif" data-name="ecart_conversion_actif" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->ecart_conversion_actif ?><span class="fa fa-pencil fa-modif"></span></td>

                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align: center">Ecart de conversion - passif</td>

                                                <td class="td-modif" data-name="ecart_conversion_passif" data-id="<?= $prevr->id ?>" data-model="Prevbilan"><?= $prevr->ecart_conversion_passif ?><span class="fa fa-pencil fa-modif"></span></td>

                                        </tr>

                                    </tbody>
                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </li>
                 @endforeach
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">COMPTES DE RESULTAT</h4>
        </div>
        <div class="card-body">
            <ul class="list-inline">
                @foreach($projet->reportresultats as $prevr )
                    <li class="list-inline-item">
                        <span><a class="btn btn-xs btn-outline btn-info" href="#" data-toggle="modal" data-target="#rrm-{{$prevr->id}}">{{ $prevr->name }}</a></span>
                        <div class="modal fade" id="rrm-{{$prevr->id}}">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header bg-info">
                                <h4  class="modal-title text-center">{{$prevr->name}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div style="overflow: scroll;" class="modal-body">

                                    <table class="table table-bordered table-hover table-condensed">

                                        <tbody>
                                            <tr>
                                                <th>CHIFFRE D'AFFAIRE</th>

                                                    <th><?= $prevr->ca ?></th>

                                            </tr>
                                            <tr>
                                                <td>PRODUCTION IMMOBILISEE</td>

                                                    <td><?= $prevr->pi ?></td>

                                            </tr>
                                            <tr>
                                                <td>PRODUCTION STOCKEE</td>

                                                    <td><?= $prevr->ps ?></td>

                                            </tr>
                                            <tr>
                                                <td>SUBVENTION D'AEXPLOITATION</td>

                                                    <td><?= $prevr->sp ?></td>

                                            </tr>
                                            <tr>
                                                <td>AUTRES PRODUITS D'EXPLOITATION</td>

                                                    <td><?= $prevr->ape ?></td>

                                            </tr>
                                            <tr>
                                                <td>CHARGE VARIABLE</td>

                                                    <td><?= $prevr->cv ?></td>

                                            </tr>
                                            <tr>
                                                <td>MARGE BRUTE</td>

                                                    <td><?= $prevr->mb ?></td>

                                            </tr>
                                            <tr>
                                                <th>CHARGE FIXE</th>

                                                    <th><?= $prevr->cf ?></th>

                                            </tr>
                                            <tr>
                                                <th>VALEUR AJOUTEE</th>

                                                    <th><?= $prevr->va ?></th>

                                            </tr>
                                            <tr>
                                                <td>SALAIRES</td>

                                                    <td><?= $prevr->ca ?></td>

                                            <tr>
                                                <th>EXCEDENT BRUT D'EXPLOITATION</th>

                                                    <th><?= $prevr->ebe ?></th>

                                            </tr>
                                            <tr>
                                                <td>DOTATATION AUX AMORTISSEMENTS ET AUX PROVISIONS</td>

                                                    <td><?= $prevr->dap ?></td>

                                            </tr>
                                            <tr>
                                                <th>RESULTAT D'EXPLOITATION</th>

                                                    <th><?= $prevr->re ?></th>

                                            </tr>
                                            <tr>
                                                <td>PRODUIT FINANCIER</td>

                                                    <td><?= $prevr->pf ?></td>

                                            </tr>
                                            <tr>
                                                <td>CHARGES FINANCIERES</td>

                                                    <td><?= $prevr->cfi ?></td>

                                            </tr>
                                            <tr>
                                                <th>RESULTAT FINANCIER</th>

                                                    <th><?= $prevr->rf ?></th>

                                            </tr>
                                            <tr>
                                                <td>PRODUIT EXCEPTIONNEL</td>

                                                    <td><?= $prevr->pe ?></td>


                                            </tr>
                                            <tr>
                                                <td>CHARGES EXCEPTIONNELLES</td>

                                                    <td><?= $prevr->ce ?></td>

                                            </tr>
                                            <tr>
                                                <th>RESULTAT EXCEPTIONNEL</th>

                                                    <th><?= $prevr->re ?></th>

                                            </tr>
                                            <tr>
                                                <th>RESULTAT COURANT AVANT IMPOT</th>

                                                    <th><?= $prevr->rcai ?></th>

                                            </tr>
                                            <tr>
                                                <td>IMPOTS</td>

                                                    <td><?= $prevr->impots ?></td>

                                            </tr>
                                            <tr>
                                                <th>RESULTAT NET</th>

                                                    <th><?= $prevr->rn ?></th>

                                            </tr>
                                        </tbody>
                                    </table>
                              </div>

                            </div>
                            <!-- /.modal-content -->
                          </div>
                        </div>
                    </li>
                 @endforeach
            </ul>
        </div>
    </div>
</div>