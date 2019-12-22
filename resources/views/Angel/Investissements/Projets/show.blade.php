@extends('......layouts.angel')
@section('page-title')
{{ $investissement->projet->name }}
<?php $doc = $investissement->doc_juridiqueUri?1:0; $doc_validated=$investissement->obac_doc_juridique_validated; ?>
<input type="hidden" id="doc" value="{{ $doc }}"/>
<input type="hidden" id="doc_validated" value="{{ $doc_validated }}"/>
<input type="hidden" id="id" value="{{ $investissement->projet->token }}"/>
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
<div class="card">
        <div class="card-header">
            <?php $projet = $investissement->projet ?>
          <h3 class="card-title">{{$projet->name}} - {{$projet->code}} - <small><?= date_format($projet->created_at,'d/m/Y') ?></small></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Reduire">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Fermer">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">

            <div class="col-12 col-md-9 col-lg-9 order-2 order-md-1">


                <div style="min-height: auto; background: none;" class="">
                    <div>
                <div class="row">
                <div class="col-12">
                    <div class="card card-danger collapsed-card">
                    <div class="card-header">
                        <h5 class="card-title">Diagnostic interne</h5>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Dérouler">
                              <i class="fas fa-plus"></i></button>
                               <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                               </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Fermer">
                              <i class="fas fa-times"></i></button>
                          </div>
                    </div>
                    <div class="card-body">
                      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li role="presentation" class="nav-item">
                             <a class="nav-link active" id="tab1" data-toggle="pill" href="#etats" role="tab" aria-controls="n1" aria-selected="true">ETATS FINANCIERS</a>
                            </li>

                            <li role="presentation" class="nav-item">
                                <a class="nav-link" id="tab2" data-toggle="pill" href="#risques" role="tab" aria-controls="n2" aria-selected="false">CARTOGRAPHIE DES RISQUES</a>
                            </li>

                            <?php if($projet->synthese_diagnostic_interne): ?>
                               <li role="presentation" class="nav-item">
                               <a class="nav-link" id="tab3" data-toggle="pill" href="#synthese1" role="tab" aria-controls="n3" aria-selected="false">SYNTHESE</a>
                               </li>
                            <?php endif; ?>
                        </ul>

                         <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="etats" role="tabpanel" aria-labelledby="tab1">

                                 <div>


                                         <div>
                                            <h4  class="text-xs text-right text-bold page-header">SANTE FINANCIERE</h4>
                                            <?php if($projet->bilans->count()>0): ?>

                                            <table class="table table-condensed table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><?= $projet->bilans[0]->annee ?></th>
                                                    <th><?= $projet->bilans[1]->annee ?></th>
                                                    <th>TAUX DE VARIATION</th>
                                                    <th><?= $projet->bilans[2]->annee ?></th>
                                                    <th>TAUX DE VARIATION</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>RESSOURCES DURABLES</td>
                                                    <td><?= $projet->bilans[0]->ress_durable ?></td>
                                                    <td><?= $projet->bilans[1]->ress_durable ?></td>
                                                    <td></td>
                                                    <td><?= $projet->bilans[2]->ress_durable ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>ACTIFS IMMOBILISES</td>
                                                    <td><?= $projet->bilans[0]->actifs_immo ?></td>
                                                    <td><?= $projet->bilans[1]->actifs_immo ?></td>
                                                    <td></td>
                                                    <td><?= $projet->bilans[2]->actifs_immo ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>FONDS DE ROULEMENT NET GLOBAL</td>
                                                    <th><?= $projet->frng_0 ?></th>
                                                    <th><?= $projet->frng_0 ?></th>
                                                    <th></th>
                                                    <th><?= $projet->frng_0 ?></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>CREANCES</td>
                                                    <td><?= $projet->bilans[0]->creances ?></td>
                                                    <td><?= $projet->bilans[1]->creances ?></td>
                                                    <td></td>
                                                    <td><?= $projet->bilans[2]->creances ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>STOCKS</td>
                                                    <td><?= $projet->bilans[0]->stocks ?></td>
                                                    <td><?= $projet->bilans[1]->stocks ?></td>
                                                    <td></td>
                                                    <td><?= $projet->bilans[2]->stocks ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>DETTES</td>
                                                    <td><?= $projet->bilans[0]->dettes ?></td>
                                                    <td><?= $projet->bilans[1]->dettes ?></td>
                                                    <td></td>
                                                    <td><?= $projet->bilans[2]->dettes ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>BESOIN EN FONDS DE ROULEMENT</td>
                                                    <th><?= $projet->bilans[0]->bfr ?></th>
                                                    <th><?= $projet->bilans[1]->bfr ?></th>
                                                    <th><?= $projet->tvbfr_0 ?></th>
                                                    <th><?= $projet->bilans[2]->bfr ?></th>
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
                                            <?php endif; ?>


                                            <h5 class="text-xs text-right text-bold page-header">PERFORMANCE FINANCIERE</h5>
                                            <?php if($projet->resultats->count() >0): ?>
                                            <table class="table table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><?= $projet->resultats[0]->annee ?></th>
                                                    <th><?= $projet->resultats[1]->annee ?></th>
                                                    <th>TAUX DE VARIATION</th>
                                                    <th><?= $projet->resultats[2]->annee ?></th>
                                                    <th>TAUX DE VARIATION</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>CHIFFRE D'AFFAIRE</td>

                                                    <td><?= $projet->resultats[0]->ca ?></td>
                                                    <td><?= $projet->resultats[1]->ca ?></td>
                                                    <td><?= $projet->tvca_0 ?></td>
                                                    <td><?= $projet->resultats[2]->ca ?></td>
                                                    <td><?= $projet->tvca_0 ?></td>

                                                </tr>
                                                <tr>
                                                    <td>CHARGES VARIABLES</td>

                                                    <td><?= $projet->resultats[0]->cv ?></td>
                                                    <td><?= $projet->resultats[1]->cv ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->cv ?></td>
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

                                                    <td><?= $projet->resultats[0]->cf ?></td>
                                                    <td><?= $projet->resultats[1]->cf ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->cf ?></td>
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

                                                    <td><?= $projet->resultats[0]->salaires ?></td>
                                                    <td><?= $projet->resultats[1]->salaires ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->salaires ?></td>
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
                                                    <td><?= $projet->resultats[0]->dap ?></td>
                                                    <td><?= $projet->resultats[1]->dap ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->dap ?></td>
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

                                                    <td><?= $projet->resultats[0]->pf ?></td>
                                                    <td><?= $projet->resultats[1]->pf ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->pf ?></td>
                                                    <td></td>

                                                </tr>
                                                <tr>
                                                    <td>CHARGES FINANCIERES</td>

                                                    <td><?= $projet->resultats[0]->cfi ?></td>
                                                    <td><?= $projet->resultats[1]->cfi ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->cfi ?></td>
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

                                                    <td><?= $projet->resultats[0]->pe ?></td>
                                                    <td><?= $projet->resultats[1]->pe ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->pe ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>CHARGES EXCEPTIONNELLES</td>

                                                    <td><?= $projet->resultats[0]->ce ?></td>
                                                    <td><?= $projet->resultats[1]->ce ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->ce ?></td>
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

                                                    <td><?= $projet->resultats[0]->impots ?></td>
                                                    <td><?= $projet->resultats[1]->impots ?></td>
                                                    <td></td>
                                                    <td><?= $projet->resultats[2]->impots ?></td>
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
                                            <?php endif; ?>
                                         </div>

                                 </div>

                            </div>

                            <div class="tab-pane fade" role="tabpanel" id="risques" aria-labelledby="tab2">
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
                                <div style="width: 20%; margin:10px auto">
                                    <span id="risks-loader"  class="dashboard-spinner spinner-success spinner-xl "></span>
                                </div>
                            </div>

                            <?php if($projet->synthese_diagnostic_interne): ?>
                                <div class="tab-pane fade" role="tabpanel" id="synthese1" aria-labelledby="">
                                    <p><?= $projet->synthese_diagnostic_interne ?></p>
                                </div>
                            <?php endif ?>
                                     </div>
                    </div>
                  </div>

                  @if($projet->etape>=2)
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h5 class="card-title">Diagnostic externe</h5>

                              <div class="card-tools">

                                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                                  </button>

                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Fermer">
                                  <i class="fas fa-times"></i></button>
                              </div>
                        </div>
                        <div class="card-body">
                                 <ul class="nav nav-tabs" style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                                         <li role="presentation" class="nav-item">
                                             <a class="nav-link active" href="#segments" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-selected="true"><span class=""></span> ANALYSE DE LA DEMANDE </a>
                                         </li>

                                         <li role="presentation" class="nav-item">
                                             <a class="nav-link" href="#concurrents" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> ANALYSE DE L'OFFRE </a>
                                         </li>

                                         <li role="presentation" class="nav-item">
                                             <a class="nav-link" href="#environnement" role="tab" id="tab3" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> ANALYSE DE L'ENVIRONNMENT </a>
                                         </li>

                                         <?php if($projet->synthese_diagnostic_externe): ?>
                                            <li role="presentation" class="nav-item">
                                             <a class="nav-link" href="#synthese2" role="tab" id="tab4" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> SYNTHESE </a>
                                         </li>
                                         <?php endif; ?>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" role="tabpanel" id="segments" aria-labelledby="tab1">
                                             <div>
                                                     <div class="table-responsive">


                                                            <?php if($projet->segments->count()>0): ?>

                                                            <table class="table table-bordered ">

                                                                <tbody>
                                                                <?php $i=0; $quoi=""; $qui=""; $ou=""; $comment=""; $combien=""; $quand="";
                                                                $ca=""; $cv=""; $cf=""; $mb=""; $va=""; $salaires=""; $ebe=""; $pourquoi=""; $con ="";
                                                                foreach($projet->segments as $segment): ?>
                                                                    <?php
                                                                    $con = $con."<th>SEGMENT ". ++$i ."</th>";
                                                                    $quoi=$quoi."<td>".$segment->quoi."</td>";
                                                                    $qui=$qui."<td>".$segment->name."</td>";
                                                                    $quand=$quand."<td>".$segment->quand."</td>";
                                                                    $combien=$combien."<td>".$segment->combien."</td>";
                                                                    $ou=$ou."<td>".$segment->ou."</td>";
                                                                    $comment=$comment."<td>".$segment->comment."</td>";
                                                                    $pourquoi=$pourquoi."<td>".$segment->pourquoi."</td>";

                                                                    ?>
                                                                <?php endforeach; ?>
                                                                <tr><th></th><?= $con ?></tr>
                                                                <tr> <th>QUI</th> <?= $qui ?> </tr>
                                                                <tr><th>QUOI</th> <?= $quoi ?> </tr>
                                                                <tr> <th>OU</th> <?= $ou ?> </tr>
                                                                <tr> <th>QUAND</th> <?= $quand ?> </tr>
                                                                <tr> <th>COMBIEN</th> <?= $combien ?> </tr>
                                                                <tr> <th>POURQUOI</th> <?= $pourquoi ?> </tr>

                                                                </tbody>
                                                            </table>
                                                        <?php endif; ?>


                                                     </div>

                                             </div>

                                        </div>

                                        <div class="tab-pane fade" role="tabpanel" id="concurrents" aria-labelledby="">
                                        <?php if($projet->concurrents->count()>0): ?>
                                            <table class="table table-bordered">

                                            <tbody>
                                            <?php $i=0; $quoi=""; $qui=""; $ou=""; $comment=""; $combien=""; $quand="";
                                            $ca=""; $cv=""; $cf=""; $mb=""; $va=""; $salaires=""; $ebe=""; $pourquoi=""; $con ="";
                                            foreach($projet->concurrents as $segment): ?>
                                                <?php
                                                $con = $con."<th>CONCURRENT ". ++$i ."</th>";
                                                $quoi=$quoi."<td>".$segment->quoi."</td>";
                                                $qui=$qui."<td>".$segment->name."</td>";
                                                $quand=$quand."<td>".$segment->quand."</td>";
                                                $combien=$combien."<td>".$segment->combien."</td>";
                                                $ou=$ou."<td>".$segment->ou."</td>";
                                                $comment=$comment."<td>".$segment->comment."</td>";
                                                $pourquoi=$pourquoi."<td>".$segment->pourquoi."</td>";
                                                $ca=$ca."<td>".$segment->ca."</td>";
                                                $cv=$cv."<td>".$segment->cv."</td>";
                                                $cf=$cf."<td>".$segment->cf."</td>";
                                                $salaires=$salaires."<td>".$segment->salaires."</td>";
                                                $va=$va."<td>".$segment->va."</td>";
                                                $mb=$mb."<td>".$segment->marge_brute."</td>";
                                                $ebe=$ebe."<td>".$segment->ebe."</td>";
                                                ?>
                                            <?php endforeach; ?>
                                            <tr><th></th><?= $con ?></tr>
                                            <tr> <th>QUI</th> <?= $qui ?> </tr>
                                           <tr><th>QUOI</th> <?= $quoi ?> </tr>
                                           <tr> <th>OU</th> <?= $ou ?> </tr>
                                           <tr> <th>QUAND</th> <?= $quand ?> </tr>
                                           <tr> <th>COMBIEN</th> <?= $combien ?> </tr>
                                           <tr> <th>POURQUOI</th> <?= $pourquoi ?> </tr>
                                           <tr> <th>CA</th> <?= $ca ?> </tr>
                                           <tr> <th>Charges variables</th> <?= $cv ?> </tr>
                                           <tr> <th>Marge brute</th> <?= $mb ?> </tr>
                                           <tr> <th>Charges fixes</th> <?= $cf ?> </tr>
                                          <tr>  <th>Valeur ajoutee</th> <?= $va ?> </tr>
                                           <tr> <th>Salaires</th> <?= $salaires ?> </tr>
                                           <tr> <th>EBE</th> <?= $ebe ?> </tr>
                                            </tbody>
                                        </table>
                                        <?php endif; ?>

                                        </div>

                                        <div class="tab-pane fade" role="tabpanel" id="environnement" aria-labelledby="">
                                              <?php if($projet->environnement->count()>0): ?>
                                                    <table class="table table-bordered table-condensed">
                                                        <thead>
                                                        <tr >
                                                            <th style="width: 25%"></th>
                                                            <th>OPPORTUNUITES</th>
                                                            <th>MENACES</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr id="ps">
                                                            <th style="width: 25%" >POLITIQUE SECTORIELLE</th>
                                                            <td ><?= $projet->environnement->pol_secto_op ?></td>
                                                            <td ><?= $projet->environnement->pol_secto_men ?></td>
                                                        </tr>
                                                        <tr id="cmep">
                                                            <th style="width: 25%">CADRE MACRO ECONOMIQUE DU PROJET</th>
                                                            <td ><?= $projet->environnement->cadre_macroeco_op ?></td>
                                                            <td ><?= $projet->environnement->cadre_macroeco_men ?></td>
                                                        </tr>
                                                        <tr id="asc">
                                                            <th style="width: 25%">ASPECTS SOCIO-CULTURELS</th>
                                                            <td ><?= $projet->environnement->asp_sociocult_op ?></td>
                                                            <td ><?= $projet->environnement->asp_sociocult_men ?></td>
                                                        </tr>
                                                        <tr id="et">
                                                            <th style="width: 25%">ENVIRONNEMENT TECHNOLOGIQUES</th>
                                                            <td ><?= $projet->environnement->env_tech_op ?></td>
                                                            <td ><?= $projet->environnement->env_tech_men ?></td>
                                                        </tr>
                                                        <tr id="iep">
                                                            <th style="width: 25%">IMPACT ENVIRONNEMENTAL DU PROJET</th>
                                                            <td ><?= $projet->environnement->impact_env_op ?></td>
                                                            <td ><?= $projet->environnement->impact_env_men ?></td>
                                                        </tr>
                                                        <tr id="crp">
                                                            <th style="width: 25%">CADRE REGLEMENTAIRE DU PROJET</th>
                                                            <td ><?= $projet->environnement->cadre_regl_op ?></td>
                                                            <td ><?= $projet->environnement->cadre_regl_men ?></td>
                                                        </tr>
                                                        <tr id="pnf">
                                                            <th style="width: 25%">POUVOIR DE NEGOCIATION DES FOURNISSEURS</th>
                                                            <td ><?= $projet->environnement->pouv_nego_frn_op ?></td>
                                                            <td ><?= $projet->environnement->pouv_nego_frn_men ?></td>
                                                        </tr>
                                                        <tr id="pnc">
                                                            <th style="width: 25%">POUVOIR DE NEGOCIATION DES CLIENTS</th>
                                                            <td ><?= $projet->environnement->pouv_nego_cli_op ?></td>
                                                            <td ><?= $projet->environnement->pouv_nego_cli_men ?></td>
                                                        </tr>
                                                        <tr id="pps">
                                                            <th style="width: 25%">PERFORMANCES  DES PRODUITS DE SUBSTITUTION </th>
                                                            <td ><?= $projet->environnement->perf_prdt_subst_op ?></td>
                                                            <td ><?= $projet->environnement->perf_prdt_subst_men ?></td>
                                                        </tr>
                                                        <tr id="ic">
                                                            <th style="width: 25%">INTENSITE CONCURRENTIELLE</th>
                                                            <td ><?= $projet->environnement->intensite_concu_op ?></td>
                                                            <td ><?= $projet->environnement->intensite_concu_men ?></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                              <?php endif; ?>
                                        </div>

                                        <?php if($projet->synthese_diagnostic_externe): ?>
                                            <div class="tab-pane fade" role="tabpanel" id="synthese2" aria-labelledby="">
                                                <br/>
                                                <br/>
                                                <p><?= $projet->synthese_diagnostic_externe ?></p>
                                            </div>

                                        <?php endif; ?>
                                     </div>

                        </div>
                    </div>

                  @endif


                  @if($projet->etape>=3)
                    <div class="card card-info collapsed-card">
                        <div class="card-header">
                            <h5 class="card-title">Diagnostic stratégique</h5>

                              <div class="card-tools">

                                  <button title="dérouler" data-toggle="tooltip" type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                                  </button>

                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Fermer">
                                  <i class="fas fa-times"></i></button>
                              </div>
                        </div>
                        <div class="card-body">

                           <ul class="nav nav-tabs"  id="objTabs" role="tablist">
                                <li role="presentation" class="nav-item">
                                    <a class="nav-link active" href="#swot" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-selected="true"><span class=""></span> SWOT </a>
                                </li>

                                <li role="presentation" class="nav-item">
                                    <a class="nav-link" href="#objectifs" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> OBJECTIFS </a>
                                </li>

                                <li role="presentation" class="nav-item">
                                    <a class="nav-link" href="#organisation" role="tab" id="tab3" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> ORGANISATION DU TRAVAIL </a>
                                </li>

                                <li role="presentation" class="nav-item">
                                     <a class="nav-link" href="#actions" role="tab" id="tab4" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> ACTIONS DE MAITRISE </a>
                                </li>

                                <li role="presentation" class="nav-item">
                                    <a class="nav-link" href="#etapes" role="tab" id="tab5" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> PLAN D'ACTION STRATEGIQUE </a>
                                </li>

                                <li role="presentation" class="nav-item">
                                    <a class="nav-link" href="#faisabilite" role="tab" id="tab6" data-toggle="tab" aria-controls="n2" aria-selected="false"><span class=""></span> ETUDE DE FAISABILITE</a>
                                </li>
                           </ul>

                           <div class="tab-content" id="myTabContent">
                             <div class="tab-pane fade active show" role="tabpanel" id="swot" aria-labelledby="tab1">
                                  <div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                        @if($projet->swot)
                                            <fieldset>
                                                <legend>SYNTHESE DES OPPORTUNITES</legend>
                                                <?= $projet->swot->synt_op ?>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <legend>SYNTHESE DES MENACES</legend>
                                                    <?= $projet->swot->synt_men ?>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <legend>SYNTHESE DES FORCES</legend>
                                                <?= $projet->swot->synt_forces ?>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <legend>SYNTHESE DES FAIBLESSES</legend>
                                                    <?= $projet->swot->synt_faiblesses ?>
                                            </fieldset>
                                            @endif
                                        </div>

                                    </div>

                                  </div>

                             </div>

                             <div class="tab-pane fade" role="tabpanel" id="objectifs" aria-labelledby="">
                                <p></p>
                                <br/>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="well">
                                            <fieldset>
                                                <legend>OBJECTIFS A COURT TERME</legend>
                                                <p><?= $projet->objectifs_courts ?></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="well">
                                            <fieldset>
                                                <legend>OBJECTIFS A MOYEN TERME</legend>
                                                <p><?= $projet->objectifs_moyens ?></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="well">
                                            <fieldset>
                                                <legend>OBJECTIFS A LONG TERME</legend>
                                                <p><?= $projet->objectifs_longs ?></p>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                             </div>

                             <div class="tab-pane fade" role="tabpanel" id="organisation" aria-labelledby="">
                                <p></p>

                                <h6 class="page-header">ORGANISATION DU TRAVAIL</h6>
                                <table class="table table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>NOM</th>
                                            <th>FONCTION</th>
                                            <th>RESPONSABILITES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projet->ressources as $ressource)
                                            <tr>
                                                <td><?= $ressource->name ?></td>
                                                <td><?= $ressource->fonction ?></td>
                                                <td><?= $ressource->responsabilite ?></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                             </div>

                             <div class="tab-pane fade" role="tabpanel" id="actions" aria-labelledby="">
                                <input type="hidden" id="plan_id" value="<?= $projet->plan_id ?>"/>
                                <table class="table table-bordered table-condensed table-hover" id="example">
                                    <thead>
                                    <tr>
                                        <th>TYPE DE RISQUE</th>
                                        <th>PRODUIT</th>
                                        <th>DEFAILLANCE</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                             </div>

                             <div class="tab-pane fade" role="tabpanel" id="etapes" aria-labelledby="">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ETAPE</th>
                                            <th>ACTION STRATEGIQUE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projet->etapes as $etape)
                                            <tr>
                                                <td>{{ $etape->name }}</td>
                                                <td>{{ $etape->action }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                             </div>

                             <div class="tab-pane fade" role="tabpanel" id="faisabilite" aria-labelledby="">
                                <br/>
                                <br/>
                                <div class="well">
                                    <p><?= $projet->etude_faisabilite ?></p>
                                </div>

                             </div>


                          </div>

                      </div>
                    </div>
                        <script>
                $(document).ready(function(){
                    getPlan($('#plan_id').val());
                });
            </script>
                  @endif

                  @if($projet->etape>=4)
                    @include('includes.Show.plan_financier')
                  @endif


                    <div class="card card-success collapsed-card">
                        <div class="card-header">
                            <h5 class="card-title">Rapports mensuels de gestion</h5>

                              <div class="card-tools">

                                  <button title="dérouler" data-toggle="tooltip" type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                                  </button>


                              </div>
                        </div>
                        <div class="card-body">
                            @if($investissement->report)
                                @include('includes.Show.report')
                            @else
                                <div class="alert alert-danger">
                                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                    <p>VOUS N'ETES PAS AUTORISE A ACCEDER A CES INFORMATIONS. VEUILLEZ CONTACTER LE CABINET OBAC.</p>
                                </div>
                            @endif

                         </div>
                    </div>
                </div>

                    <div class="col-md-2">
                        <a class="btn btn-outline btn-block btn-sm btn-success" id="btn-letter" data-target="#LetterModal" data-toggle="modal" href="#"> <i class="fa fa-edit"></i> Editer la lettre d'intention </a>
                    </div>
                    @if($investissement->lettre)
                    <div class="col-md-2">
                        <a class="btn btn-outline btn-block btn-sm btn-danger" id="btn-doc" data-target="#DocModal" data-toggle="modal" href="#"> <i class="fas fa-file-pdf"></i> Charger la documentation juridique </a>
                    </div>
                        @if($investissement->obac_doc_juridique_validated)
                        <div class="col-md-2">
                            <a class="btn btn-outline btn-block btn-sm btn-info" id="btn-justificatif" data-target="#JustificatifModal" data-toggle="modal" href="#"> <i class="fas fa-file-pdf"></i> Charger le justificatif de paiement</a>
                        </div>
                        @endif
                    @endif

              </div>

                </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 order-1 order-md-2">
              <div style="max-height: 240px; max-width: 300px">
                  @if($projet->imageUri)
                      <img class="img-thumbnail" src="{{asset('img/'.$projet->imageUri)}}" alt=""/>
                      <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
                  @else
                       <img class="img-thumbnail" src="{{asset('img/logo-obac.png')}}" alt=""/>
                       <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
                  @endif
              </div>
              <h3 class="text-primary"> {{$projet->name}}</h3>
              <button data-target="#meModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-success">Modèle économique</button>
              <br>
              <div class="text-muted">
                <p class="text-sm">Porteur de projet:
                  <b class="d-block">{{$projet->owner->name}}</b>
                  <b class="d-block"><i class="far fa-fw fa-envelope"></i> {{$projet->owner->email}}</b>
                  <b class="d-block"><i class="far fa-fw fa-telegram"></i> {{$projet->owner->phone}}</b>
                </p>

              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <div  class="modal fade" id="JustificatifModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h4  class="modal-title text-center">CHARGEMENT Du JUSTIFICATIF DE VOTRE PAIEMENT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="padding: 20px 20px 40px 20px; font-family: 'Gill Sans MT', Calibri, sans-serif" class="modal-body">
                 <form id="letter" enctype="multipart/form-data" class="form" action="/angel/investissement/doc/" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{ $investissement->token }}"/>
                    <input type="file" name="justificatifUri" id="justificatifUri" class="form-control"/>

                    <button id="btn-save3" type="submit" class="btn btn-success btn-block"> ENREGISTRER </button>
                </form>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>

        @if($investissement->lettre)
       <div  class="modal fade" id="DocModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h4  class="modal-title text-center">CHARGEMENT DE VOTRE {{ $investissement->lettre->forme_id==1?'CONTRAT D\'ASSOCIES':$investissement->lettre->forme_id==2?'CONTRAT DE PRET':'CONTRAT D\'ENGAGEMENT' }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="padding: 20px 20px 40px 20px; font-family: 'Gill Sans MT', Calibri, sans-serif" class="modal-body">
                 <form id="letter" enctype="multipart/form-data" class="form" action="/angel/investissement/doc/" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{ $investissement->token }}"/>
                    <input type="file" name="docUri" id="docUri" class="form-control"/>

                    <button id="btn-save2" type="submit" class="btn btn-success btn-block"> ENREGISTRER </button>
                </form>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
        @endif
      @include('includes.Edit.lettre_intention')
    <div class="modal fade" id="meModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h6  class="modal-title text-center">Description du modèle économique</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                    <p><?= $projet->description_modele_economique ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="msg" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

         	<div class="modal-dialog modal-lg" role="document">
         		<div class="modal-content">
         		    <div class="modal-header bg-success">
                    <h4></h4>
                    <button id="closemsg" type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
         			<div class="modal-body">
         				<div class="row">
         				    <div class="col-md-5 col-sm-12">
         				         <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                   </div>
         				    </div>
         				    <div class="col-md-7 col-sm-12">
                                 <p> Félicitations ! Vous êtes sur le point de clôturer votre opération. </p>
                                 <p>  Afin de procéder à votre investissement, nous vous invitons à effectuer un virement ou un dépôt sur le numéro de compte suivant : </p>
                                 <ul>
                                    <li>Code Banque : 30014</li>
                                    <li>Code Guichet : 00001</li>
                                    <li> Numéro de compte : 01206971401</li>
                                    <li>Clé RIB : 80</li>
                                 </ul>

         				    </div>
         				</div>
         			</div>


         		</div>
         	</div>

         </div>



    <style>
        .modal .form-control{
            display:inline;
            width:auto;
            font-weight: bold;
            margin:5px;
        }

        .card.maximized-card {

            overflow-y: scroll;
        }
    </style>


     <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <script>

         $('#closemsg').click(function(e){$('#msg').hide()})
        $('#forme_id').change(function(e){
            $('.blocx').hide();
            var id = $('#forme_id').val();
            $('#block-'+id).show();
        });

        $(document).ready(function(){
           // var orm = 'http://localhost/ormsys/api/';


           setTimeout(function() {
             if($('#doc').val()==1){
                if($('#doc_validated').val()==1){
                    $('#msg').show();
                }
             }

           },2000);




            $.ajax({
                url: "/angel/opportunites/dossier/getchoices",
                type:'Get',
                dataType:'json',
                data:{id:$('#id').val()},
                success:function(data){
                    if(data!=null){
                        $.ajax({
                            url:orm+'carto',
                            type:'Post',
                            dataType:'json',
                            data:{choix:data},
                            success:function(rep){

                                var html = '';
                                //console.log(Object.entries(rep));
                                var risks=Object.entries(rep);
                                for(var i=0; i<risks.length;i++){

                                    var rs= parseInt(risks[i][1].length) + 1;
                                    var tr= '<tr><th style="align-content: center; margin-top: auto" align="center" rowspan='+ rs  +'>'+ risks[i][0] +'</th></tr>';
                                    html=html+tr;
                                    for(var k=0; k<risks[i][1].length; k++){
                                        $value = risks[i][1][k];
                                        $cb= parseInt($value.question.produits_risque.frequence) * parseInt($value.question.produits_risque.gravite);
                                        $cn=parseInt($value.question.produits_risque.frequence) * parseInt($value.question.produits_risque.gravite) * parseFloat($value.taux);

                                        if(parseFloat($cb) >= 13){
                                            $clrb='red';
                                        }else{
                                            if( parseFloat($cb) >=4 && parseFloat($cb) <= 12){
                                                $clrb='yellow';
                                            }else{
                                                $clrb = '#0ac60a';
                                            }
                                        }

                                        if( parseFloat($cn) >= 13){
                                            $clr='red';
                                        }else{
                                            if( parseFloat($cn) >=4 &&  parseFloat($cn) <= 12){
                                                $clr='yellow';
                                            }else{
                                                $clr = '#0ac60a';
                                            }
                                        }

                                        var trr = '<tr>'+
                                            '<td>'+ $value.question.produits_risque.name +'</td>'+
                                            '<td>'+$value.question.produits_risque.causes +'</td>'+
                                            '<td>'+ $value.question.produits_risque.consequences +'</td>'+
                                            '<td>'+ $value.question.produits_risque.frequence +'</td>'+
                                            '<td>'+ $value.question.produits_risque.gravite+'</td>'+
                                            '<td style="background-color:'+ $clrb +'; font-weight: 900; text-align: right">'+ $cb  +'</td>'+
                                            '<td style="background-color:'+ $clr +'">'+ $cn +'</td>'+
                                        '</tr>';

                                        html=html+trr;

                                        console.log(risks[i][1][k]);
                                    }
                                    console.log(risks[i][1]);

                                }

                                $('#risques-tab').find('tbody').html(html);
                            },
                            Error:function(){
                                $('#risks-loader').hide();
                            }
                        });
                    }

                }
            })
        });

        function getPlan(id){

                         $.ajax({
                           url:orm+'get-plan',
                           type:'Get',
                           dataType:'json',
                           data:{id:id},
                               success:function(data){
                                   //console.log(data);
                                   if(data!=null){
                                        $.ajax({
                                          url:orm+'get-plan',
                                          type:'Get',
                                          dataType:'json',
                                          data:{id:id},
                                        success:function(){
                                        }
                                        });
                                   }
                                   var html = '';
                                   var pls = data.plignes;
                                   for(var i = 0; i<data.plignes.length; i++){

                                        var tr ='<tr data-id="'+ pls[i].id +'"><td style="width: 13%">'+ pls[i].produits_risque.risque.name +'</td><td style="width: 20%">'+ pls[i].produits_risque.produit.name +'</td><td style="width: 20%">'+ pls[i].produits_risque.name +'</td><td contenteditable="true" style="width: 37%">'+ pls[i].amelioration +'</td></tr>';
                                        html = html + tr;
                                   }
                                   $('#example').find('tbody').html(html);
                               },
                           Error:function(){

                           }
                         });
                    }
    </script>

     <div class="modal" id="popup" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

            		<div class="modal-dialog modal-lg" role="document">
            			<div class="modal-content">
            				<div class="modal-body">
            					<div class="row">
            					    <div class="col-md-5 col-sm-12">
            					         <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                         </div>
            					    </div>
            					    <div class="col-md-7 col-sm-12">
                                            <p>Félicitations ! Votre lettre d’intention a été envoyée au porteur de projet.</p>

                                               <p>Dès que la somme des intentions d’investissement atteindra le montant sollicité par le porteur de projet,
                                               vous aurez la possibilité d’accéder à la documentation juridique à savoir le contrat qui encadre votre relation d’affaires.
                                                Celle-ci pourra faire l’objet d’une discussion avec le porteur de projet dans l’onglet « Messagerie ».</p>

                                               <p>Une fois un accord trouvé, la documentation juridique devra être signée par les deux parties puis mis en ligne pour
                                               être validée par OBAC</p>
                                            <a class="btn btn-success btn-block" href="/angel/investissements/dossiers">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
            					    </div>
            					</div>
            				</div>


            			</div>
            		</div>

            </div>
     <div class="modal" id="popup2" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

            		<div class="modal-dialog modal-lg" role="document">
            			<div class="modal-content">
            				<div class="modal-body">
            					<div class="row">
            					    <div class="col-md-5 col-sm-12">
            					         <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                         </div>
            					    </div>
            					    <div class="col-md-7 col-sm-12">
                                            <p>Félicitations ! Vous venez de mettre en ligne votre contrat d’affaires. </p>

                                            <p> L’équipe juridique d’OBAC prendra le temps de l’analyser dans un délai de 48 heures avant de procéder à sa validation. </p>

                                            <a class="btn btn-success btn-block" href="/angel/investissements/dossiers">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
            					    </div>
            					</div>
            				</div>


            			</div>
            		</div>

            </div>

     <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

     	<div class="modal-dialog modal-lg" role="document">
     		<div class="modal-content">
     			<div class="modal-body">
     				<div class="row">
     				    <div class="col-md-5 col-sm-12">
     				         <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                               </div>
     				    </div>
     				    <div class="col-md-7 col-sm-12">
                                <p>Félicitations ! vous venez d’envoyer le justificatif de versement des fonds. L’équipe juridique d’OBAC procèdera
                                 à son authentification et sa validation dans un délai de 72h.</p>

                                <p>A la suite de la validation de ce justificatif, votre opération sera validée et vous pourrez dès lors suivre l’évolution
                                de votre investissement en souscrivant à l’offre « Rapport d’activité mensuel » à hauteur de 145 000 FCFA HT / trimestre</p>


                                  <a class="btn btn-success btn-block" href="/angel/investissements/dossiers">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
     				    </div>
     				</div>
     			</div>


     		</div>
     	</div>

     </div>


    <script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>


                <!-- SweetAlert2 -->
        <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
                <!-- Toastr -->
        <script type="text/javascript" src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <script>



        $('#btn-save').click(function(e){
           e.preventDefault();
           var spinHandle_firstProcess = loadingOverlay.activate();
           const Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  showConfirmButton: false,
                                  timer: 5000
                                });

           var letter = $('#letter');
           var inputs = letter.find('input');
           var selects = letter.find('select');
           //var donnees = [];

                   var values = {};
                   for (var i=0; i < inputs.length; i++) {
                       var id = inputs[i].getAttribute('name');
                       values[id] = $('input[name="'+id+'"]').val();
                   }
                   for (var i=0; i < selects.length; i++) {
                                          var id = selects[i].getAttribute('name');
                                          values[id] = $('select[name="'+id+'"]').val();
                                      }

                   //values.type_remboursement_id = $('')

           $.ajax({
               url:'/angel/letter',
               dataType:'json',
               type:'post',
               data:values,
               beforeSend:function(xhr){
                            xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
                        },
               success:function(data){

                   $('#IpM').hide();
                               Toast.fire({
                                       type: 'success',
                                       title: 'Demande initialisée succès!!!'
                                     });
                                     setTimeout(function() {
                                        loadingOverlay.cancel(spinHandle_firstProcess);
                                       $('#popup').show();
                                     },2000);
               }
           });
        });

         $('#btn-save2').click(function(e){

                   e.preventDefault();
                   const Toast = Swal.mixin({
                                          toast: true,
                                          position: 'top-end',
                                          showConfirmButton: false,
                                          timer: 5000
                                        });

                   if($('#docUri').val().length<1){
                        alert('Aucun document n\'a été soumis');
                   }else{
                         var spinHandle_firstProcess = loadingOverlay.activate();
                         var fd = new FormData();
                         fd.append('doc_juridiqueUri',$('#docUri')[0].files[0]);
                         fd.append('token',$('#token').val())


                   $.ajax({
                       url:'/angel/investissement/dossier/doc',
                       dataType:'json',
                       type:'post',
                        enctype:'multipart/form-data',
                        processData:false,
                        contentType:false,
                        data:fd,
                       beforeSend:function(xhr){
                                    xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
                                },
                       success:function(data){

                           $('#IpM').hide();
                                       Toast.fire({
                                               type: 'success',
                                               title: 'Demande initialisée succès!!!'
                                             });
                                             setTimeout(function() {
                                                loadingOverlay.cancel(spinHandle_firstProcess);
                                               $('#popup2').show();
                                             },2000);
                       }
                   });
                   }

                });

          $('#btn-save3').click(function(e){

                   e.preventDefault();
                   const Toast = Swal.mixin({
                                          toast: true,
                                          position: 'top-end',
                                          showConfirmButton: false,
                                          timer: 5000
                                        });

                   if($('#justificatifUri').val().length<1){
                        alert('Aucun document n\'a été soumis');
                   }else{
                         var spinHandle_firstProcess = loadingOverlay.activate();
                         var fd = new FormData();
                         fd.append('justificatifUri',$('#justificatifUri')[0].files[0]);
                         fd.append('token',$('#token').val())


                   $.ajax({
                       url:'/angel/investissement/dossier/justificatif',
                       dataType:'json',
                       type:'post',
                        enctype:'multipart/form-data',
                        processData:false,
                        contentType:false,
                        data:fd,
                       beforeSend:function(xhr){
                                    xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
                                },
                       success:function(data){

                           $('#IpM').hide();
                                       Toast.fire({
                                               type: 'success',
                                               title: 'Demande initialisée succès!!!'
                                             });
                                             setTimeout(function() {
                                                loadingOverlay.cancel(spinHandle_firstProcess);
                                               $('#popup3').show();
                                             },2000);
                       }
                   });
                   }

                });


    </script>
</div>
@endsection

