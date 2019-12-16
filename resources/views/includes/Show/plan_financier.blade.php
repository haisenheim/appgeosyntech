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
                                    <h4>COMPTE DE RESULTAT</h4>
                                 </div>
                                 <div class="card-body">
                                    <?php $nbsim = count($projet->prevresultats) ?>
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

                     <div class="tab-pane fade" role="tabpanel" id="prevbilans" aria-labelledby="">
                        <p></p>
                        <br/>
                        <hr/>
                        <h3>BILAN</h3>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
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
                                                        <?php $i=0; ?>
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
                                                        <?php $i=0; ?>
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
                                                        <?php $i=0; ?>
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

             <div class="tab-pane fade" role="tabpanel" id="prevtresoreries" aria-labelledby="">
                <div class="card">
                    <div class="card-header">
                        <h4>FLUX DE TRESORERIE PREVISIONNELS</h4>
                     </div>
                    <div class="card-body">
                        <div class="table-reponsive">
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

          </div>
            </div>
        </div>

     </div>
</div>
</div>