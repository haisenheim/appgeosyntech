<div class="card">
    <div class="card-body">
       <fieldset>
            <legend>DIAGNOSTIC INTERNE</legend>
            @if($projet->bilans)
            <ul class="nav nav-pills ml-auto p-2" style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                 <li role="presentation" class="nav-item">
                     <a class="nav-link active" href="#etats" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span> ETATS FINANCIERS </a>
                 </li>

                 <li role="presentation" class="nav-item">
                     <a class="nav-link" href="#risques" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> CARTOGRAPHIE DES RISQUES </a>
                 </li>
             </ul>

             <div class="tab-content" id="myTabContent">
                <div class="tab-pane active " role="tabpanel" id="etats" aria-labelledby="tab1">
                     <div>
                        <fieldset>
                                <legend>SANTE FINANCIERE</legend>
                                <table class="table table-condensed table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th><?= isset($projet->bilans[0])?$projet->bilans[0]->annee:'' ?></th>
                                        <th><?= isset($projet->bilans[1])?$projet->bilans[1]->annee:'' ?></th>
                                        <th>TAUX DE VARIATION</th>
                                        <th><?= isset($projet->bilans[2])?$projet->bilans[2]->annee:'' ?></th>
                                        <th>TAUX DE VARIATION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>RESSOURCES DURABLES</td>
                                        <td><?= isset($projet->bilans[0])?$projet->bilans[0]->ress_durable:'' ?></td>
                                        <td><?= isset($projet->bilans[1])?$projet->bilans[1]->ress_durable:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->bilans[2])?$projet->bilans[2]->ress_durable:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>ACTIFS IMMOBILISES</td>
                                        <td><?= isset($projet->bilans[0])?$projet->bilans[0]->actifs_immo:'' ?></td>
                                        <td><?= isset($projet->bilans[1])?$projet->bilans[1]->actifs_immo:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->bilans[2])?$projet->bilans[2]->actifs_immo:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>FONDS DE ROULEMENT NET GLOBAL</td>
                                        <th><?= $projet->frng_0 ?></th>
                                        <th><?= $projet->frng_1 ?></th>
                                        <th></th>
                                        <th><?= $projet->frng_2 ?></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>CREANCES</td>
                                        <td><?= isset($projet->bilans[0])?$projet->bilans[0]->creances:'' ?></td>
                                        <td><?= isset($projet->bilans[1])?$projet->bilans[1]->creances:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->bilans[2])?$projet->bilans[2]->creances:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>STOCKS</td>
                                        <td><?= isset($projet->bilans[0])?$projet->bilans[0]->stocks:'' ?></td>
                                        <td><?= isset($projet->bilans[1])?$projet->bilans[1]->stocks:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->bilans[2])?$projet->bilans[2]->stocks:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>DETTES</td>
                                        <td><?= isset($projet->bilans[0])?$projet->bilans[0]->dettes:'' ?></td>
                                        <td><?= isset($projet->bilans[1])?$projet->bilans[1]->dettes:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->bilans[2])?$projet->bilans[2]->dettes:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>BESOIN EN FONDS DE ROULEMENT</td>
                                        <th><?= isset($projet->bilans[0])?$projet->bilans[0]->bfr:'' ?></th>
                                        <th><?= isset($projet->bilans[1])?$projet->bilans[1]->bfr:'' ?></th>
                                        <th><?= $projet->tvbfr_0 ?></th>
                                        <th><?= isset($projet->bilans[2])?$projet->bilans[2]->bfr:'' ?></th>
                                        <th><?= $projet->tvbfr_1 ?></th>
                                    </tr>
                                    <tr>
                                        <td>TRESORERIE NETTE</td>
                                        <th><?= $projet->tsrn_0 ?></th>
                                        <th><?= $projet->tsrn_1 ?></th>
                                        <th><?= $projet->tvtsr_0 ?></th>
                                        <th><?= $projet->tsrn_2 ?></th>
                                        <th><?= $projet->tvtsr_1 ?></th>
                                    </tr>
                                    </tbody>
                                </table>
                             </fieldset>
                             <fieldset>
                                <legend>PERFORMANCE FINANCIERE</legend>
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th><?= isset($projet->resultats[0])?$projet->resultats[0]->annee:'' ?></th>
                                        <th><?= isset($projet->resultats[1])?$projet->resultats[1]->annee:'' ?></th>
                                        <th>TAUX DE VARIATION</th>
                                        <th><?= isset($projet->resultats[2])?$projet->resultats[2]->annee:'' ?></th>
                                        <th>TAUX DE VARIATION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>CHIFFRE D'AFFAIRE</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->ca:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->ca:'' ?></td>
                                        <td><?= $projet->tvca_0 ?></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->ca:'' ?></td>
                                        <td><?= $projet->tvca_0 ?></td>

                                    </tr>
                                    <tr>
                                        <td>CHARGES VARIABLES</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->cv:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->cv:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->cv:'' ?></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <th>MARGE BRUTE</th>
                                        <th><?= $projet->mb_0 ?></th>
                                        <th><?= $projet->mb_1 ?></th>
                                        <th><?= $projet->tvmb_0 ?></th>
                                        <th><?= $projet->mb_2 ?></th>
                                        <th><?= $projet->tvmb_1 ?></th>

                                    </tr>
                                    <tr>
                                        <td>CHARGES FIXES</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->cf:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->cf:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->cf:'' ?></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <th>VALEUR AJOUTEE</th>

                                        <td><?= $projet->va_0 ?></td>
                                        <td><?= $projet->va_1 ?></td>
                                        <th><?= $projet->tvva_0 ?></th>
                                        <td><?= $projet->va_2 ?></td>
                                        <th><?= $projet->tvva_1 ?></th>

                                    </tr>
                                    <tr>
                                        <td>SALAIRES</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->salaires:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->salaires:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->salaires:'' ?></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <th>EXCEDENT BRUT D'EXPLOITATION</th>

                                        <td><?= $projet->ebe_0 ?></td>
                                        <td><?= $projet->ebe_1 ?></td>
                                        <th><?= $projet->tvebe_0 ?></th>
                                        <td><?= $projet->ebe_2 ?></td>
                                        <th><?= $projet->tvebe_1 ?></th>

                                    </tr>
                                    <tr>
                                        <td>DOTATIONS AUX AMORTISSEMENTS ET AUX PROVISIONS</td>
                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->dap:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->dap:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->dap:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>RESULTAT D'EXPLOITATION</th>

                                        <th><?= $projet->re_0 ?></th>
                                        <th><?= $projet->re_1 ?></th>
                                        <th><?= $projet->tvre_0 ?></th>
                                        <th><?= $projet->re_2 ?></th>
                                        <th><?= $projet->tvre_1 ?></th>
                                    </tr>
                                    <tr>
                                        <td>PRODUITS FINANCIERS</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->pf:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->pf:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->pf:'' ?></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td>CHARGES FINANCIERES</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->cfi:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->cfi:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->cfi:'' ?></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <th>RESULTAT FINANCIER</th>

                                        <th><?= $projet->rf_0 ?></th>
                                        <th><?= $projet->rf_1 ?></th>
                                        <th><?= $projet->tvrf_0 ?></th>
                                        <th><?= $projet->rf_2 ?></th>
                                        <th><?= $projet->tvrf_1 ?></th>

                                    </tr>
                                    <tr>
                                        <td>PRODUIT EXCEPTIONNEL</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->pe:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->pe:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->pe:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>CHARGES EXCEPTIONNELLES</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->ce:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->ce:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->ce:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>RESULTAT EXCEPTIONNEL</th>

                                        <th><?= $projet->rex_0 ?></th>
                                        <th><?= $projet->rex_1 ?></th>
                                        <th><?= $projet->tvrex_0 ?></th>
                                        <th><?= $projet->rex_2 ?></th>
                                        <th><?= $projet->tvrex_1 ?></th>

                                    </tr>
                                    <tr>
                                        <th>RESULTAT COURANT AVANT IMPOT</th>

                                        <th><?= $projet->rcai_0 ?></th>
                                        <th><?= $projet->rcai_1 ?></th>
                                        <th><?= $projet->tvrcai_0 ?></th>
                                        <th><?= $projet->rcai_2 ?></th>
                                        <th><?= $projet->rcai_1 ?></th>

                                    </tr>
                                    <tr>
                                        <td>IMPOTS</td>

                                        <td><?= isset($projet->resultats[0])?$projet->resultats[0]->impots:'' ?></td>
                                        <td><?= isset($projet->resultats[1])?$projet->resultats[1]->impots:'' ?></td>
                                        <td></td>
                                        <td><?= isset($projet->resultats[2])?$projet->resultats[2]->impots:'' ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>RESULTAT NET</th>

                                        <th><?= $projet->rn_0 ?></th>
                                        <th><?= $projet->rn_1 ?></th>
                                        <th><?= $projet->tvrn_0 ?></th>
                                        <th><?= $projet->rn_2 ?></th>
                                        <th><?= $projet->tvrn_1 ?></th>
                                    </tr>
                                    </tbody>
                                </table>
                             </fieldset>
                     </div>

                </div>

                <div class="tab-pane" role="tabpanel" id="risques" aria-labelledby="">
                    <div class="card">
                        <div class="card-header">
                         <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                          </button>
                        </div>
                        <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table id="risques-tab" class="table table-condensed table-hover table-bordered">
                                   <thead>
                                    <tr>
                                        <th></th>
                                        <th>Defaillances possibles</th>
                                        <th>Causes</th>
                                        <th>Consequences</th>
                                        <th>Frequence</th>
                                        <th>Gravite</th>
                                        <th>Criticite brut</th>

                                        <th>Criticite nette</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>

                </div>
             </div>
             @else
                 <div class="table-responsive">
                       <h3>CARTOGRAPHIE DES RISQUES</h3>
                      <table id="risques-tab" class="table table-condensed table-hover table-bordered">
                        <thead>
                         <tr>
                             <th></th>
                             <th>Defaillances possibles</th>
                             <th>Causes</th>
                             <th>Consequences</th>
                             <th>Frequence</th>
                             <th>Gravite</th>
                             <th>Criticite brut</th>

                             <th>Criticite nette</th>
                         </tr>
                         </thead>
                         <tbody>
                         </tbody>
                      </table>
                 </div>

             @endif
       </fieldset>
    </div>
</div>