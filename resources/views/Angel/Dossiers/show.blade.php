@extends('......layouts.angel')
@section('content')



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
            <div class="col-sm-12 col-md-3">
                <div class="">
            <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-sucress cardutline direct-chat direct-chat-success">
              <div class="card-header">
                <h3 class="card-title">Echanger avec le promoteur</h3>

                <div class="card-tools">



                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                @foreach($investissement->comments as $comment)
                  <!-- Message. Default to the left -->
                  @if($comment->role_id==4)
                  <div class="direct-chat-msg">

                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-timestamp float-right">{{ date_format($comment->created_at, 'd/m/y h:i') }}</span>
                    </div>
                    <div class="direct-chat-text">
                        {{ $comment->body }}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  @else

                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-timestamp float-left">{{ date_format($comment->created_at, 'd/m/y h:i') }}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <div class="direct-chat-text">
                         {{ $comment->body }}
                        </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  @endif
                @endforeach
                </div>
                <!--/.direct-chat-messages-->

                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="/angel/comment/save" method="post">
                    <input type="hidden" id="token" name="token" value="{{ $investissement->token }}"/>
                    {{csrf_field()}}
                  <div class="input-group">
                    <input id="input-msg" type="text" name="message" placeholder="Saisir votre commentaire ..." class="form-control">
                    <span class="input-group-append">
                      <button id="btn-save" type="submit" class="btn btn-success"><i class="fa fa-send"></i> Envoyer</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
          </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 order-2 order-md-1">


              <div class="row">
                <div class="col-12">

                  <div class="card card-default collapsed-card">
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


                                            <h5 class="text-xs text-right text-bold page-header">PERFORMANCE FINANCIERE</h5>
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
                    <div class="card card-default collapsed-card">
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


                                                            <?php if($projet->segments): ?>

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
                                        <?php if($projet->concurrents): ?>
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
                                              <?php if($projet->environnement): ?>
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
                    <div class="card card-default collapsed-card">
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
                    <div class="card card-default collapsed-card">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">PLAN FINANCIER</h3>
                                    <div class="card-tools">

                                          <button title="dérouler" data-toggle="tooltip" type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                          </button>
                                          <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                                          </button>

                                      </div>
                                    <ul class="nav nav-pills ml-auto p-2 pull-right"  role="tablist">
                                        <li role="presentation" class="nav-item">
                                            <a class="nav-link active" href="#prevresultats" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-selected="true"><span class=""></span> COMPTE d'EXPLOITATION </a>
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
                                    <div  class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade active" role="tabpanel" id="prevresultats" aria-labelledby="tab1">
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
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->ca ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <td><?= $prevr->mb ?></td>
                                                                    @if(!$loop->last)
                                                                    <td>-</td>
                                                                    @endif
                                                                @endforeach
                                                            </tr>
                                                            <tr>
                                                                <th>CHARGE FIXE</th>
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->cf ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
                                                                    @endif
                                                                @endforeach
                                                            </tr>
                                                            <tr>
                                                                <th>VALEUR AJOUTEE</th>
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->va ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
                                                                    @endif
                                                                @endforeach
                                                            </tr>
                                                            <tr>
                                                                <td>SALAIRES</td>
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <td><?= $prevr->ca ?></td>
                                                                    @if(!$loop->last)
                                                                    <td>-</td>
                                                                    @endif
                                                                @endforeach
                                                            </tr>
                                                            <tr>
                                                                <th>EXCEDENT BRUT D'EXPLOITATION</th>
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->ebe ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->re ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->rf ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->re ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
                                                                    @endif
                                                                @endforeach
                                                            </tr>
                                                            <tr>
                                                                <th>RESULTAT COURANT AVANT IMPOT</th>
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->rcai ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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
                                                                @foreach($projet->prevresultats as $prevr)
                                                                    <th><?= $prevr->rn ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <fieldset>
                                                <legend>BILAN PREVISIONNEL</legend>
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
                                                                @foreach($projet->prevbilans as $prevr)
                                                                    <th><?= $prevr->fr ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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
                                                                @foreach($projet->prevbilans as $prevr)
                                                                    <th><?= $prevr->bfr ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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
                                                                @foreach($projet->prevbilans as $prevr)
                                                                    <th><?= $prevr->tn ?></th>
                                                                    @if(!$loop->last)
                                                                    <th>-</th>
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
                                            </fieldset>
                                        </div>

                                    </div>

                                 </div>

                                 <div class="tab-pane fade" role="tabpanel" id="prevtresoreries" aria-labelledby="">
                                    <p></p>

                                    <h6 class="page-header">FLUX DE TRESORERIE PREVISIONNELS</h6>

                                 </div>

                                 <div class="tab-pane fade" role="tabpanel" id="montage" aria-labelledby="">
                                    <h6 class="page-header">MONTAGE FINANCIER</h6>
                                 </div>

                              </div>
                                </div>
                    </div>
                  @endif


                  <div class="card card-info collapsed-card">
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
                                @foreach($projet->reportbilans as $bilan )

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span><a class="btn btn-xs btn-outline btn-info" href="#" data-toggle="modal" data-target="#rbm-{{$bilan->id}}">{{ $bilan->name }}</a></span>
                                            <div class="modal fade" id="rbm-{{$bilan->id}}">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                  <div class="modal-header bg-success">
                                                    <h4  class="modal-title text-center">Bilan - {{$bilan->name}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                        <table class="table table-condensed table-hover table-striped">


                                                        </table>
                                                  </div>

                                                </div>
                                                <!-- /.modal-content -->
                                              </div>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <div class="alert alert-danger">
                                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                    <p>VOUS N'ETES PAS AUTORISE A ACCEDER A CES INFORMATIONS. VEUILLEZ CONTACTER LE CABINET OBAC.</p>

                                </div>
                            @endif

                         </div>
                    </div>

                </div>
              </div>
               <a class="btn btn-outline btn-block btn-sm btn-success" id="btn-letter" data-target="#LetterModal" data-toggle="modal" href="#"> <i class="fa fa-edit"></i> Editer la lettre d'intention </a>
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
              <p class="text-muted"><?= $projet->description_modele_economique ?></p>
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

      <div  class="modal fade" id="LetterModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h4  class="modal-title text-center">LETTRE D’INTENTION</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="padding: 20px 20px 40px 20px; font-family: 'Gill Sans MT', Calibri, sans-serif" class="modal-body">
                 <form enctype="multipart/form-data" class="form" action="/angel/letter/" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{ $investissement->token }}"/>
                    <div style="font-weight: bold; width:300px" class="form-group">
                        <label for="devise_id">CHOIX DE LA DEVISE</label>
                        <select class="form-control" name="devise_id" id="devise_id">
                            @foreach($devises as $devise)
                                <option value="{{ $devise->id }}">{{ $devise->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <p>La présente lettre d’intention décrit les principales conditions et modalités selon lesquelles l’investissement envisagé dans la société <span style="font-weight: bold"> {{ $investissement->projet->owner->name }} </span>  pourrait être réalisé. </p>
                    <p>Elle ne constitue en aucun cas un engagement ferme et irrévocable des parties de procéder à cet investissement. </p>
                    <p>Cette lettre d’intention a été préparée sur la base et en l’état des informations reçues de la Société à ce jour,
                     particulièrement du business plan qui ont été préparés par les Fondateurs.</p>
                    <p>Le montant total de l’investissement étant estimé à
                    <span style="font-weight: bold"> {{ $investissement->projet->montant }} &nbsp; {{ $investissement->projet->devise->name }} </span>, je, soussigné,<span style="font-weight: bold"> {{ $investissement->angel->name }} </span>, agissant pour
                     <span style="width: 300px;">
                        <select style="font-weight: bold" class="form-control" name="personnel" id="">
                            <option value="1">MON PROPRE COMPTE</option>
                            @if($investissement->angel->organisme_id)
                                <option value="0">{{ $investissement->angel->organisme->name }}</option>
                            @endif
                            @if($investissement->angel->entreprise_id)
                                <option value="0">{{ $investissement->angel->entreprise->name }}</option>
                            @endif
                        </select>
                     </span>
                     ,
                     manifeste le souhait de participer à cette opération sous forme de
                     <span style="font-weight: bold; width:300px">

                        <select class="form-control" name="forme_id" id="forme_id">
                            @foreach($formes as $forme)
                                <option value="{{ $forme->id }}">{{ $forme->name }}</option>
                            @endforeach
                        </select>
                     </span>
                     (prise de participation ou/et Prêts et/ou Engagements par signature)
                     à hauteur de <span style="font-weight: bold; width:300px"> <input class="form-control" name="montant" type="number"/> </span>. </p>
                    <p class="blocx" style="display: block" id="block-1">
                        La prise de participation représentera donc un pourcentage de
                         <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_participation" type="number"/> </span> % au capital du projet <span style="font-weight: bold"> {{ $investissement->projet->name }}  </span>
                    </p>
                    <p class="blocx" style="display: none" id="block-2">
                        Le prêt sera effectué
                        sur une durée de <span style="font-weight: bold; width:100px"> <input class="form-control" name="duree_pret" type="number"/> </span> année(s) à un taux annuel de <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_pret" type="number"/> </span> %, avec
                        <span style="font-weight: bold; width:300px">
                            <select class="form-control" name="type_remboursement" >
                                    <option value="Remboursement In fine">Remboursement In fine </option>
                                    <option value="Amortissement constant du capital">Amortissement constant du capital</option>
                                    <option value="Annuités constantes">Annuités constantes</option>
                            </select>
                        </span>
                    </p>

                    <p class="blocx" style="display: none" id="block-3">
                        L’engagement par signature sera effectué sur une durée de <span style="font-weight: bold; width:100px"> <input class="form-control" name="duree_engagement" type="number"/> </span> année(s), a une commission de caution de <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_engagement" type="number"/> </span>% ou <span style="font-weight: bold; width: 300px"> <input class="form-control" placeholder="Saisir un montant" name="mt_engagement" type="number"/> </span>.
                    </p>

                    <br/>
                    <br/>

                    <div style="float: right; margin-right: 50px">
                        Fait à <span style="font-weight: bold; width:300px"> <input class="form-control" name="lieu" type="text" required="true"/> </span>, le {{ date('d/m/Y') }}.
                        <br/> <br/>
                        Pour l’investisseur
                        <br/>
                        <br/>
                        <span style="font-weight: bold">{{ $investissement->angel->name }}</span>

                    </div>

                    <button type="submit" class="btn btn-success btn-block"> ENREGISTRER </button>
                </form>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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


        $('#forme_id').change(function(e){
            $('.blocx').hide();
            var id = $('#forme_id').val();
            $('#block-'+id).show();
        });

        $(document).ready(function(){
           // var orm = 'http://localhost/ormsys/api/';
            $.ajax({
                url: "/angel/dossier/getchoices",
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
                                $('#risks-loader').hide();

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

@endsection

