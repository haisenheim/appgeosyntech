@extends('......layouts.consultant')

@section('page-title')
{{$projet->name}}
@endsection


@section('content')

    <div style="padding-top: 30px; padding-bottom: 80px;" class="container-fluid">
                <div class="row">
                    <div id="side1" class="col-md-4 col-sm-12" style="max-height:860px; overflow-y: scroll ">
                        <div class="card">
                            <div class="card-body">

                            <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i>
                            <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                            </div>
                            </a>
                            <p>CODE : {{ $projet->code }}</p>
                            <p>DATE DE CREATION : <span class="value"> {{ date_format($projet->created_at,'d/m/Y') }}</span></p>
                            <p>PROMOTEUR : <span class="value">{{ $projet->owner->name }}</span></p>

                            <p class="text-danger" style="font-weight: 700" > {{ $projet->capital?'DOSSIER D\'AUGMENTATION DE CAPITAL':'' }}</p>
                            @if($projet->modele)
                                <button data-target="#meModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-success">Modèle économique</button>
                             @endif

                            @if($projet->etape>=4)
                                <ul class="list-group">
                                    <li class="list-group-item">MONTANT DES INVESTISSEMENT : <span class="value"><?= $projet->montant_investissement ?></span></li>
                                    <li class="list-group-item">BESOIN EN FONDS DE ROULEMENT : <span class="value"><?= $projet->bfr ?></span></li>
                                    <li style="font-weight: bold;" class="list-group-item">COUT GLOBAL DU PROJET : <span class="value"><?= $projet->montant_investissement + $projet->bfr ?></span></li>
                                </ul>

                                <fieldset>
                                    <legend>MOYENS DE FINANCEMENT</legend>
                                    <ul class="list-group">
                                        @if($projet->moyens)
                                            @foreach($projet->financements as $moyen)

                                                <li class="list-group-item"><?= $moyen->moyen? $moyen->moyen->name:'-' ?> : <span class="value"><?= $moyen->montant ?></span></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </fieldset>
                                
                            @endif
                            <input type="hidden" id="id" value="<?= $projet->token ?>"/>
                            <p><i class="fa fa-map-marker"></i> {{ $projet->ville->name }}</p>
                            <input type="hidden" id="pl_id" value="{{ $projet->plan_id }}"/>


                            <button data-toggle="modal" data-target="#synDiagIntModal" class="btn btn-outline-info btn-block"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC INTERNE</button>


                            @if($projet->etape>=2)
                                <button style="margin-top: 7px" data-toggle="modal" data-target="#synDiagExtModal" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC EXTERNE</button>
                            @endif

                            @if($projet->etape>=3)
                                <button style="margin-top: 7px" data-toggle="modal" data-target="#synDiagStratModal" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC STRATEGIQUE</button>
                            @endif

                             @if($projet->etape>=4)
                                <button style="margin-top: 7px" data-toggle="modal" data-target="#teaserModal" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> EDITER LE TEASER</button>
                            @endif


                            @if($projet->modepaiement_id>0)
                                <h6 class="page-header" style="background-color: inherit">FORMULE DE PAIEMENT</h6>
                                <ul class="list-group">
                                    <li class="list-group-item"><span style="font-weight: 700">{{ $projet->modepaiement->name }}</span></li>

                                    <li class="list-group-item">PRIX TTC : <span style="font-weight: 700">{{ number_format($projet->traite,0,',','.') }} <sup>{{ $projet->devise->abb }}</sup></span></li>
                                </ul>
                            @else
                                <div>
                                <hr/>
                                    <h6 class="page-header" style="background-color: inherit; font-weight: 700; font-size: 1rem">CHOIX DE LA FORMULE DE PAIEMENT</h6>

                                    <hr/>
                                    <form action="/consultant/projet/add-mode" method="get" class="form-inline">
                                        <input type="hidden" id="projet_token" value="<?= $projet->token ?>" name="projet_token"/>
                                        <select style="background-color: #FFFFFF" class="form-control" name="mode_id" id="mode_id">
                                            <option value="0">Choix d'une offre de service</option>
                                            @foreach($modes as $mode)
                                                <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-check"></i> ENREGISTRER</button>

                                    </form>
                                </div>
                            @endif

                        </div>
                        </div>


                    </div>
                    <div style="overflow-y: scroll; max-height: 860px" id="side2" class="col-md-8 col-sm-12">
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
                <div style="margin-top: 30px" class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                     @if($projet->etape>=2)

                               <fieldset>
                                   <h5>Diagnostic Externe</h5>
                                   <ul class="nav nav-tabs " style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                                         <li role="presentation" class="nav-item">
                                             <a class="nav-link active" href="#segments" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span> ANALYSE DE LA DEMANDE </a>
                                         </li>

                                         <li role="presentation" class="nav-item">
                                             <a class="nav-link" href="#concurrents" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ANALYSE DE L'OFFRE </a>
                                         </li>

                                         <li role="presentation" class="nav-item">
                                             <a class="nav-link" href="#environnement" role="tab" id="tab3" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ANALYSE DE L'ENVIRONNMENT </a>
                                         </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" role="tabpanel" id="segments" aria-labelledby="tab1">
                                             <div>
                                                     <div class="table-responsive">
                                                            <?php if($projet->segments): ?>

                                                            <table class="table table-bordered">

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
                                            <div class="table-responsive">
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
                                            </div>
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

                                     </div>
                               </fieldset>
                     @endif

                        </div>
                    </div>
                 </div>

                    @if($projet->etape>=3)
                     <div class="col-md-12 col-sm-12">
                           <div class="card">
                            <div class="card-body">
                                   <fieldset>
                                      <h5>DIAGNOSTIC STRATEGIQUE</h5>
                                       <ul class="nav nav-tabs " style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                                            <li role="presentation" class="nav-item">
                                                <a class="nav-link active" href="#swot" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span> SWOT </a>
                                            </li>

                                            <li  role="presentation" class="nav-item">
                                                <a class="nav-link" href="#objectifs" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> OBJECTIFS </a>
                                            </li>

                                            <li role="presentation" class="nav-item">
                                                <a class="nav-link" href="#organisation" role="tab" id="tab3" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ORGANISATION DU TRAVAIL </a>
                                            </li>

                                            <li role="presentation" class="nav-item">
                                                 <a class="nav-link" href="#actions" role="tab" id="tab4" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ACTIONS DE MAITRISE </a>
                                            </li>

                                            <li role="presentation" class="nav-item">
                                                <a class="nav-link" href="#etapes" role="tab" id="tab5" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> PLAN D'ACTION STRATEGIQUE </a>
                                            </li>

                                            <li role="presentation" class="nav-item">
                                                <a class="nav-link" href="#faisabilite" role="tab" id="tab6" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ETUDE DE FAISABILITE</a>
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
                                   </fieldset>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($projet->etape>=4)
                        <div class="col-md-12 card card-default">
                            <div class="card-header">
                            <h3 class="card-title">PLAN FINANCIER</h3>

                              <div class="card-tools">

                                  <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                                  </button>
                              </div>
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
                                        <div class="">
                                            <div class="">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>COMPTE DE RESULTAT</h4>
                                                     </div>
                                                     <div class="card-body">
                                                        <?php $nbsim = count($projet->prevresultats) ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
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
                                                                    <th><?= $prevr->rex ?></th>
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

                                      </div>

                                 </div>

                                         <div class="tab-pane fade" role="tabpanel" id="prevbilans" aria-labelledby="">
                                            <p></p>
                                            <br/>
                                            <hr/>
                                            <h3>BILAN</h3>
                                            <div class="">
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
                                        <div class="card-body table-responsive">
                                        @if($projet->prevtresoreries)
                                            <table class="table table-bordered table-hover table-condensed">
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan="3"></th>

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
                                                                        <th colspan="1" style="writing-mode: vertical-rl;" rowspan="8">Trésorerie provenant des act. opér.</th>
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="2">CAPACITE D'AUTOFINANCEMENT</td>
                                                                            <?php $i=0; ?>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->capacite_autofinancement  ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="2">ACTIF CIRCULANT HAO</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->actif_circulant_hao ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="2">VARIATION DES STOCKS</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->variation_stocks ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="2">VARIATION DES CREANCES ET EMPLOIS ASSIMILES</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->variation_creances ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">VARIATION DU PASSIF CIRCULANT</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->variation_passif_circulant ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">VARIATION DU BF LIE AUX ACT. OP.</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td>-</td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="2">TOTAL</th>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <th></th>
                                                                                @if(!$loop->last)
                                                                                <th>-</th>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>



                                                                        <tr><th colspan="1" style="writing-mode: vertical-rl" rowspan="7">Trésorerie issue des activités d'invest.</th></tr>

                                                                        <tr>

                                                                            <td colspan="2">Décaissements liés aux acquisitions d'immobilisations incorporelles</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->decaissements_acquisitions_incorporelles ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="2">Décaissements liés aux acquisitions d'immobilisations corporelles</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->decaissements_acquisitions_corporelles ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="2">Décaissements liés aux acquisitions d'immobilisations financières</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->decaissements_acquisitions_financieres ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">Cessions d'immobilisations incorporelles et corporelles</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->cessions_immo_incoporelles_corporelles  ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                         <tr>
                                                                            <td colspan="2">Cessions d'immobilisations financières</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->cessions_immo_financieres ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="2">TOTAL</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td>-</td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                        <tr><th colspan="1" style="writing-mode: vertical-rl" rowspan="6">Trésorerie provenant  des cap. propres </th></tr>

                                                                        <tr>
                                                                            <td colspan="2">Augmentation de capital par apports de capitaux nouveaux</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->augmentation_capital_apports_nouveaux  ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                         <tr>
                                                                            <td colspan="2">Subventions d'investissements reçues</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->subventions_investissement_recues ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="2">Prélèvements sur le capital</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->prelevements_capital ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="2">Distribution de dividendes</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->distribution_dividendes ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="2">TOTAL</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>



                                                                        <tr><th colspan="1" style="padding:5px; writing-mode: vertical-rl" rowspan="5">Trésorerie issue des cap. étrangers </th></tr>

                                                                        <tr>
                                                                            <td colspan="2">Emprunts</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->emprunts  ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                         <tr>
                                                                            <td colspan="2">Autres dettes financières</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->autres_dettes_financieres ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="2">Remboursements des emprunts et autres dettes financières</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td><?= $prevr->remboursement_emprunts ?></td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>

                                                                        <tr>
                                                                            <td colspan="2">TOTAL</td>
                                                                            @foreach($projet->prevtresoreries as $prevr)
                                                                                <td>-</td>
                                                                                @if(!$loop->last)
                                                                                <td>-</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>


                                                                    </tbody>
                                                            </table>
                                            @endif
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
                                                                <th>{{ $fin->montant }} <sup>{{ $projet->devise->abb }}</sup> </th>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else

                                            @endif
                                        </div>
                                    </div>
                                 </div>

                              </div>
                                </div>
                            </div>

                         </div>
                    </div>
                    @endif
                  </div>
              </div>


    <script>
        $(document).ready(function(){
           // $('#side2').height($('#side1').height());
           //$('#side2').height(890);
            getPlan($('#plan_id').val());

            $.ajax({
                url: "/consultant/projet/getchoices",
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

                                        //console.log(risks[i][1][k]);
                                    }
                                   // console.log(risks[i][1]);
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

    @if($projet->modele)
        <style>
            #meModal .card-title{
                font-weight: 800;
                font-size: 0.9rem;
            }
        </style>
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
        				                            <?= $projet->modele->partenaires ?>
        				                        </div>
        				                    </div>
        				                </div>
        				                <div class="col-md-3 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">ACTIVITES</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->activites ?>
        				                        </div>
        				                    </div>
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">RESSOURCES</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->ressources ?>
        				                        </div>
        				                    </div>
        				                </div>
        				                <div class="col-md-2 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">OFFRE</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->offre ?>
        				                        </div>
        				                    </div>
        				                </div>
        				                <div class="col-md-3 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">RELATION CLIENT</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->relation ?>
        				                        </div>
        				                    </div>
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">CANAUX DE DISTRIBUTION</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->canaux ?>
        				                        </div>
        				                    </div>
        				                </div>
        				                <div class="col-md-2 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">SEGMENTS CLIENT</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->segment ?>
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
        				                            <?= $projet->modele->couts ?>
        				                        </div>
        				                    </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">SOURCES DE REVENUS</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->revenus ?>
        				                        </div>
        				                    </div>
                                        </div>
        				            </div>

        				    </div>

        				</div>
        			</div>

        		</div>

        </div>

     @endif

    <!-- Edition de la synthese du diagnostic interne -->
    <div class="modal" id="synDiagIntModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

    		<div class="modal-dialog modal-lg" role="document">
    			<div class="modal-content">

    			        <div class="modal-header">
                            <h6  class="modal-title text-center">SYNTHESE DU DIAGNOSTIC INTERNE</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

    				<div class="modal-body">
    				<form method="post" action="/consultant/projet/synthese1">
                        <input type="hidden" id="" name="projet_token" value="<?= $projet->token ?>" />
                        {{csrf_field()}}
    					<div class="form-group">
    						<textarea class="form-control"  name="synthese1" id="synthese1" cols="30" rows="10" >{{ $projet->synthese_diagnostic_interne }}</textarea>
    					</div>
    					<div class="form-group">
    					    <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-save"></i> ENREGISTRER</button>
    					</div>
    			    </form>
    				</div>

    			</div>
    		</div>

    </div>


    <!-- Edition de la synthese du diagnostic externe-->
        <div class="modal fade" id="synDiagExtModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
        	<form method="post" action="/consultant/projet/synthese2">
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
        					<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> ENREGISTRER</button>
        				</div>

        			</div>
        		</div>
        	</form>


        </div>

        <!-- Edition de la synthese du diagnostic Strategique -->
        <div class="modal fade" id="synDiagStratModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
        	<form method="post" action="/consultant/projet/synthese3">
        		<input type="hidden" id="" name="projet_token" value="<?= $projet->token ?>" />
        		{{csrf_field()}}
        		<div class="modal-dialog modal-lg" role="document">
        			<div class="modal-content">
        				<div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        					<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span> SYNTHESE DU DIAGNOSTIC STRATEGIQUE</span></h5>
        				</div>
        				<div class="modal-body">
        					<div class="form-group">
        						<textarea class="form-control"  name="synthese3" id="synthese3" cols="30" rows="10" >{{ $projet->synthese_diagnostic_strategique }}</textarea>
        					</div>
        				</div>
        				<div class="modal-footer">
        					<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> ENREGISTRER</button>
        				</div>

        			</div>
        		</div>
        	</form>
        </div>
        <!-- Edition du teaser-->
        <div class="modal fade" id="teaserModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
        	<form method="post" action="/consultant/projet/teaser">
        		<input type="hidden" id="" name="projet_token" value="<?= $projet->token ?>" />
        		{{csrf_field()}}
        		<div class="modal-dialog modal-xl" role="document">
        			<div class="modal-content">
        				<div class="modal-header bg-success">
                          <h6  class="modal-title text-center">ELABORATION DU TEASER</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
        				<div class="modal-body">
        					 <div class="row">

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="contexte">CONTEXTE</label>
                                        <textarea name="contexte" rows="3" id="contexte"><?= $projet->teaser?$projet->teaser->contexte:'' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="problematique">PROBLEMATIQUE</label>
                                        <textarea id="problematique" name="problematique" row="3"><?= $projet->teaser?$projet->teaser->problematique:'' ?></textarea>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                     <label for="marche">MARCHE</label>
                                    <textarea name="marche"  id="marche"><?= $projet->teaser?$projet->teaser->marche:'' ?></textarea>
                                </div>

                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="strategie">STRATEGIE</label>
                                        <textarea name="strategie"  id="strategie"><?= $projet->teaser?$projet->teaser->strategie:'' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="chiffres">CHIFFRES CLES</label>
                                        <textarea name="chiffres"  id="chiffres"><?= $projet->teaser?$projet->teaser->chiffres:'' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">FOCUS SUR LES REALISATIONS DE L'ENTREPRISE</label>
                                        <textarea name="focus_realisations" class="form-control telt" id="focus_realisations" placeholder=""><?= $projet->teaser?$projet->teaser->focus_realisations:'' ?></textarea>
                                    </div>
                                </div>
                            </div>
        				</div>
        				<div class="modal-footer">
        					<button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-save"></i> ENREGISTRER</button>
        				</div>

        			</div>
        		</div>
        	</form>
        </div>

<style>
         div.note-editor.note-frame{
                    padding: 0;
                }
              .note-frame .btn-default {
                    color: #222;
                    background-color: #FFF;
                    border-color: none;
                }

                .card.maximized-card {

                            overflow-y: scroll;
                        }
    </style>




    <div class="modal" id="angelsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6  class="modal-title text-center">INVESTISSEURS POTENTIELS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
            <div class="card card-danger">
                <div class="card-body">
                     @if(count($projet->investissements)>=1)
                        <table style="color: #000" id="table-invest" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Depuis le</th>
                              <th>RDV</th>
                              <th>STATUT</th>
                              <th></th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projet->investissements as $invest)
                                    <tr>
                                        <td>{{ $invest->angel->name }}</td>
                                        <td><?= $invest->created_at?date_format($invest->created_at, 'd/m/Y H:i'):'-' ?></td>
                                        <td><?= $invest->rencontre ?></td>
                                        <td></td>
                                        <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-flat">Actions</button>
                                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                                  <span class="caret"></span>

                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                 <?php if($invest->lettre): ?>
                                                    <a class="dropdown-item" href="#">Lettre d'intention</a>
                                                  <?php endif; ?>


                                                </div>
                                              </div>
                                        </td>
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



    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap 4 -->
     <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>
    <script type="text/javascript">
      $(document).ready(function() {
        $('textarea').summernote({
          height: 150,
          tabsize: 2,
          followingToolbar: true,
          lang:'fr-FR'
        });

      });
    </script>

<script>
        $(document).ready(function(){
           // $('#side2').height($('#side1').height());
           //$('#side2').height(890);
            getPlan($('#pl_id').val());

            $.ajax({
                url: "/consultant/projet/getchoices",
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

                                        //console.log(risks[i][1][k]);
                                    }
                                   // console.log(risks[i][1]);
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





@section('nav_actions')
<main>
    <nav style="top:15%" class="floating-menu">
        <ul class="main-menu">

            @if($projet->modepaiement_id>1)
                @if($projet->validated_step==1)
                   <li>
                        <a title="Editer le diagnostic externe" class="ripple" href="/consultant/projet/create-diag-externe/{{ $projet->token }}"><i class="fa fa-edit text-warning"></i></a>
                   </li>
                @endif
            @endif

            @if($projet->etape==2)
                @if($projet->validated_step==2)
                <li>
                     <a title="Editer le diagnostic strategique"  class="ripple" href="/consultant/projet/create-diag-strategique/{{$projet->token}}"><i class="fa fa-edit text-primary"></i></a>
                </li>
                @endif
            @endif

            @if($projet->etape==3)
                @if($projet->validated_step==3)
                <li>
                     <a title="Editer le plan financier"  class="ripple" href="/consultant/projet/create-plan-financier/{{$projet->token}}"><i class="fa fa-edit text-success"></i></a>
                </li>

                @endif
            @endif

            @if($projet->etape==4)
                @if($projet->validated_step==4)
                    <li>
                         <a data-target="#teaserModal" data-toggle="modal" title="Editer le teaser" class="ripple" href="#"><i class="fa fa-edit text-success"></i></a>
                    </li>
                @endif
            @endif


            @if(count($projet->investissements)>=1)
                   <li>
                        <a data-target="#angelsModal" data-toggle="modal" title="Liste des investisseurs potentiels" class="ripple" href="#"><i class="fa fa-users"></i></a>
                   </li>
            @endif

        </ul>
        <div
         style="
          background-image:-webkit-linear-gradient(top,#28a745 0,#167699 100%);
          background-image:-o-linear-gradient(top,#28a745 0,#167699 100%);
          background-image:-webkit-gradient(linear,left top,left bottom,from(#28a745),to(#167699));
          background-image:linear-gradient(to bottom,#efffff 0,tranparent 100%);
          background-repeat:repeat-x;position:absolute;width:100%;height:100%;border-radius:50px;z-index:-1;top:0;left:0;
          -webkit-transition:.1s;-o-transition:.1s;transition:.1s
        "
        class="menu-bg"></div>
    </nav>
</main>
@endsection





