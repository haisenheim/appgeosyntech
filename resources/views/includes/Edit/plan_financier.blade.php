<?php

use \App\Models\Tremboursement;

$tr_oblig = Tremboursement::all()->where('emp_oblig',1);
$tr_mlt = Tremboursement::all()->where('mlt',1);
$tr_credbail = Tremboursement::all()->where('credbail',1);


?>

<style>
    .card{
        font-size: 11px;
    }
</style>

<div class="card">
    <input type="hidden" id="projet_token" value="<?= $projet->token ?>"/>
    <div class="card-header">

         <div class="stepwizard">
                 <div class="stepwizard-row setup-panel">
                     <div class="stepwizard-step">
                         <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                         <p>COMPTE DE RESULTAT</p>
                     </div>

                     <div class="stepwizard-step">
                         <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                         <p>BILAN</p>
                     </div>

                     <div class="stepwizard-step">
                         <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                         <p>FLUX DE TRESORERIE</p>
                     </div>

                     <div class="stepwizard-step">
                         <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                         <p>MONTAGE FINANCIER</p>
                     </div>
                     <div id="head_step-5" class="stepwizard-step">
                         <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                         <p>RENTABILITE ESPEREE</p>
                     </div>
                 </div>
             </div>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
          </button>
        </div>

    </div>
    <div class="card-body">
        <fieldset>
            {{csrf_field()}}
            <div class="">
                   <div class="setup-content" id="step-1">
                    <div class="card">
                      <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 style="background-color: transparent" class="text-center">COMPTE DE RESULTAT</h6>
                            </div>
                            <div class="col-md-4">
                                 <div class="pull-right">
                                    <select name="" style="background-color: #FFFFFF" class="form-control" id="nbsim">
                                        <option value="0">PERIODE</option>
                                        <option value="3">3ANS</option>
                                        <option value="4">4ANS</option>
                                        <option value="5">5ANS</option>
                                        <option value="6">6ANS</option>
                                        <option value="7">7ANS</option>
                                    </select>
                                    <input type="hidden" id="current" value="<?= date('Y') + 1 ?>"/>
                            </div>
                            </div>
                        </div>

                      </div>
                      <div class="card-body">
                        <div class="row">
                           <div class="col-md-7 col-md-offset-4 col-sm-12">
                               <ul class="nav nav-pills nav-header pull-right" style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                                   <li role="presentation" class="nav-item">
                                       <a class="nav-link active" href="#n1" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span> <?= date('Y') + 1 ?></a>
                                   </li>
                                   <li role="presentation" class=nav-item>
                                       <a class="nav-link" href="#n2" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> <?= date('Y') + 2 ?></a>
                                   </li>
                                   <li role="presentation" class="nav-item">
                                       <a class="nav-link" href="#n3" role="tab" id="tab3" data-toggle="tab" aria-controls="n3" aria-expanded="false"><span class=""></span> <?= date('Y') + 3 ?></a>
                                   </li>
                               </ul>
                           </div>
                        </div>


                         <div class="tab-content" id="myTabContent">

                            <div class="tab-pane active" role="tabpanel" data-id="<?= date('Y') +1 ?>" id="n1" aria-labelledby="tab1">

                                <fieldset id="compte1" class="cr">
                                    <legend>COMPTE DE RESULTAT</legend>
                                      <div class="section">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ca">CHIFFRE D'AFFAIRE</label>
                                                <input type="number" id="ca" data-input="ca" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cv">CHARGES VARIABLES </label>
                                                <input type="number" id="cv" data-input="cv" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cf">CHARGES FIXES</label>
                                                <input type="number" id="cf" data-input="cf" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="taxes">IMPOTS ET TAXES</label>
                                                <input type="number" id="taxes" data-input="taxes" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pi">PRODUCTION IMMOBILISEE</label>
                                                <input type="number" id="pi" data-input="pi" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ps">PRODUCTION STOCKEE</label>
                                                <input type="number" id="ps" data-input="ps" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sp">SUBVENTION D'EXPLOITATION</label>
                                                <input type="number" id="sp" data-input="sp" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ape">AUTRES PRODUITS D'EXPLOITATION</label>
                                                <input type="number" id="ape" data-input="ape" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pf">PRODUIT FINANCIER</label>
                                                <input type="number" id="pf" data-input="pf" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cfi">CHARGES FINANCIERES</label>
                                                <input type="number" id="cfi" data-input="cfi" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pe">PRODUIT EXCEPTIONNEL</label>
                                                <input type="number" id="pe" data-input="pe" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ce">CHARGES EXCEPTIONNELLES</label>
                                                <input type="number" id="ce" data-input="ce" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dap">DAP</label>
                                                <input type="number" id="dap" data-input="dap" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="salaires">SALAIRES</label>
                                                <input type="number" id="salaires" data-input="salaires" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="participations">PARTICIPATION DES TRAVAILLEURS</label>
                                                <input type="number" id="participations" data-input="participations" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="impots">IMPOTS</label>
                                                <input type="number" id="impots" data-input="impots" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>


                            </div>

                            <div class="tab-pane" role="tabpanel" id="n2" data-id="<?= date('Y') +2 ?>" aria-labelledby="tab2">

                                <fieldset id="compte2" class="cr">
                                    <legend>COMPTE DE RESULTAT</legend>
                                     <div class="section">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ca">CHIFFRE D'AFFAIRE</label>
                                                <input type="number" id="ca" data-input="ca" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cv">CHARGES VARIABLES </label>
                                                <input type="number" id="cv" data-input="cv" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cf">CHARGES FIXES</label>
                                                <input type="number" id="cf" data-input="cf" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="taxes">IMPOTS ET TAXES</label>
                                                <input type="number" id="taxes" data-input="taxes" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pi">PRODUCTION IMMOBILISEE</label>
                                                <input type="number" id="pi" data-input="pi" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ps">PRODUCTION STOCKEE</label>
                                                <input type="number" id="ps" data-input="ps" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sp">SUBVENTION D'EXPLOITATION</label>
                                                <input type="number" id="sp" data-input="sp" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ape">AUTRES PRODUITS D'EXPLOITATION</label>
                                                <input type="number" id="ape" data-input="ape" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pf">PRODUIT FINANCIER</label>
                                                <input type="number" id="pf" data-input="pf" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cfi">CHARGES FINANCIERES</label>
                                                <input type="number" id="cfi" data-input="cfi" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pe">PRODUIT EXCEPTIONNEL</label>
                                                <input type="number" id="pe" data-input="pe" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ce">CHARGES EXCEPTIONNELLES</label>
                                                <input type="number" id="ce" data-input="ce" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dap">DAP</label>
                                                <input type="number" id="dap" data-input="dap" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="salaires">SALAIRES</label>
                                                <input type="number" id="salaires" data-input="salaires" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="participations">PARTICIPATION DES TRAVAILLEURS</label>
                                                <input type="number" id="participations" data-input="participations" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="impots">IMPOTS</label>
                                                <input type="number" id="impots" data-input="impots" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                </fieldset>

                            </div>
                            <div class="tab-pane" role="tabpanel" data-id="<?= date('Y') +3 ?>" id="n3" aria-labelledby="tab3">

                                <fieldset id="compte3" class="cr">
                                    <legend>COMPTE DE RESULTAT</legend>
                                    <div class="section">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ca">CHIFFRE D'AFFAIRE</label>
                                                <input type="number" id="ca" data-input="ca" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cv">CHARGES VARIABLES </label>
                                                <input type="number" id="cv" data-input="cv" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cf">CHARGES FIXES</label>
                                                <input type="number" id="cf" data-input="cf" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="taxes">IMPOTS ET TAXES</label>
                                                <input type="number" id="taxes" data-input="taxes" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pi">PRODUCTION IMMOBILISEE</label>
                                                <input type="number" id="pi" data-input="pi" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ps">PRODUCTION STOCKEE</label>
                                                <input type="number" id="ps" data-input="ps" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sp">SUBVENTION D'EXPLOITATION</label>
                                                <input type="number" id="sp" data-input="sp" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ape">AUTRES PRODUITS D'EXPLOITATION</label>
                                                <input type="number" id="ape" data-input="ape" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pf">PRODUIT FINANCIER</label>
                                                <input type="number" id="pf" data-input="pf" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cfi">CHARGES FINANCIERES</label>
                                                <input type="number" id="cfi" data-input="cfi" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pe">PRODUIT EXCEPTIONNEL</label>
                                                <input type="number" id="pe" data-input="pe" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ce">CHARGES EXCEPTIONNELLES</label>
                                                <input type="number" id="ce" data-input="ce" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dap">DAP</label>
                                                <input type="number" id="dap" data-input="dap" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="salaires">SALAIRES</label>
                                                <input type="number" id="salaires" data-input="salaires" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="participations">PARTICIPATION DES TRAVAILLEURS</label>
                                                <input type="number" id="participations" data-input="participations" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="impots">IMPOTS</label>
                                                <input type="number" id="impots" data-input="impots" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                </fieldset>
                            </div>


                            </div>
                      </div>
                      <div class="card-footer text-center">
                          <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> Precedent</button>
                          <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                      </div>
                    </div>
                    </div>
                   <div class="setup-content" id="step-2">
                        <div class="card">
                           <div class="card-header">
                                <h6 class="text-center">BILAN</h6>
                           </div>
                           <div class="card-body">
                                <div class="row">
                                   <div class="col-md-7 col-md-offset-4 col-sm-12">
                                       <ul class="nav nav-pills nav-header pull-right" style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                                           <li role="presentation" class="nav-item">
                                               <a class="nav-link active" href="#n21" role="tab" id="tab21" data-toggle="tab" aria-controls="n21" aria-expanded="false"><span class=""></span> <?= date('Y') + 1 ?></a>
                                           </li>
                                           <li role="presentation" class="nav-item">
                                               <a class="nav-link" href="#n22" role="tab" id="tab22" data-toggle="tab" aria-controls="n22" aria-expanded="false"><span class=""></span> <?= date('Y') + 2 ?></a>
                                           </li>
                                           <li role="presentation" class="nav-item">
                                               <a class="nav-link" href="#n23" role="tab" id="tab23" data-toggle="tab" aria-controls="n23" aria-expanded="false"><span class=""></span> <?= date('Y') + 3 ?></a>
                                           </li>
                                       </ul>
                                   </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane active" role="tabpanel" id="n21" data-id="<?= date('Y') +1 ?>" aria-labelledby="tab21">
                                      <fieldset>
                                         <legend>ACTIF</legend>
                                         <div class="row">
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="frais_developpement" title="Frais de développement et de prospection">Frais de dév. et de prospection</label>
                                                     <input type="number" class="form-control" id="frais_developpement" title="Frais de développement et de prospection"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="brevets" title="Brevets, licences, logiciels, et droits assimilaires">Brevets, licences, logiciels,...</label>
                                                     <input type="number" class="form-control" id="brevets" title="Brevets, licences, logiciels, et droits assimilaires"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="fonds_commercial" title="Fonds commercial et droit au bail">Fonds commercial et droit au bail</label>
                                                     <input type="number" class="form-control" id="fonds_commercial" title="Fonds commercial et droit au bail"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles">AUTRES IMMO. INCORP.</label>
                                                     <input type="number" class="form-control" id="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles"/>
                                                 </div>
                                             </div>
                                         </div>
                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="terrains">TERRAIN</label>
                                                         <input type="number" class="form-control" id="terrains"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="batiments">BATIMENTS</label>
                                                         <input type="number" class="form-control" id="batiments"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="amenagements" title="Aménagements, agencements et installations">AMENAGEMENTS, AGENCEM. ET INSTAL.</label>
                                                         <input type="number" class="form-control" id="amenagements" title="Aménagements, agencements et installations"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="materiel_mobilier">MATERIEL, MOBILIER</label>
                                                         <input type="number" class="form-control" id="materiel_mobilier"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="materiel_transport">Materiel de transport</label>
                                                         <input type="number" class="form-control" id="materiel_transport"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="avances_acomptes">AVANCES ET ACOMPTES VERSES,...</label>
                                                         <input type="number" class="form-control" id="avances_acomptes"/>
                                                     </div>
                                                 </div>
                                             </div>

                                             <hr/>
                                            <div class="row">

                                                    <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="titres_participation">Titres de participation</label>
                                                         <input type="number" class="form-control" id="titres_participation"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Autres immobilisations financières" for="autres_immobilisations_financieres">Autres immo. financières</label>
                                                         <input title="Autres immobilisations financières" type="number" class="form-control" id="autres_immobilisations_financieres"/>
                                                     </div>
                                                 </div>
                                            </div>

                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="actif_circulant_hao">ACTIF CIRCULANT HAO</label>
                                                         <input type="number" class="form-control" id="actif_circulant_hao"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="stocks_encours">STOCK ET ENCOURS</label>
                                                         <input type="number" class="form-control" id="stocks_encours"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="creances_emplois">CRÉANCES ET EMPLOIS ASSIMILÉS</label>
                                                         <input type="number" class="form-control" id="creances_emplois"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="avances_fournisseurs">FOURNISSEURS AVANCES VERSEES</label>
                                                         <input type="number" class="form-control" id="avances_fournisseurs"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="clients">CLIENTS</label>
                                                         <input type="number" class="form-control" id="clients"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="autres_creances">AUTRES CREANCES</label>
                                                         <input type="number" class="form-control" id="autres_creances"/>
                                                     </div>
                                                 </div>
                                             </div>
                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="titres_placement">TITRES DE PLACEMENT</label>
                                                         <input type="number" class="form-control" id="titres_placement"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="valeur_encaisser">VALEURS  A ENCAISSER</label>
                                                         <input type="number" class="form-control" id="valeur_encaisser"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="banques_cheques_">BANQUES, CHEQUES POSTAUX,...</label>
                                                         <input type="number" class="form-control" id="banques_cheques_"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="ecart_conversion_actif">ECART DE CONVERSION</label>
                                                         <input type="number" class="form-control" id="ecart_conversion_actif"/>
                                                     </div>
                                                 </div>

                                             </div>


                                     </fieldset>
                                      <fieldset>
                                                        <legend>PASSIF</legend>
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="capital">CAPITAL</label>
                                                                    <input type="number" class="form-control" id="capital"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="apporteurs_acpital_non_appele">CAPITAL NON APPELE</label>
                                                                    <input type="number" class="form-control" id="apporteurs_acpital_non_appele"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="primes_apport">PRIMES D'APPORT D'EMISSION</label>
                                                                    <input type="number" class="form-control" id="primes_apport"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="ecarts_reevaluation">ECART DE REEVALUAT.</label>
                                                                    <input type="number" class="form-control" id="ecarts_reevaluation"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="reserves_indisponibles">RESERVES DISPONIBLES</label>
                                                                        <input type="number" class="form-control" id="reserves_indisponibles"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="reserves_libres">RESERVES LIBRES</label>
                                                                        <input type="number" class="form-control" id="reserves_libres"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="report_a_nouveau">REPORT A NOUVEAU</label>
                                                                        <input type="number" class="form-control" id="report_a_nouveau"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="resultat_net_exercice">RESULTAT NET DE L'EXERCICE</label>
                                                                        <input type="number" class="form-control" id="resultat_net_exercice"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="subventions_investissement">Subventions d'investissement</label>
                                                                        <input type="number" class="form-control" id="subventions_investissement"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="provisions_reglementees">Provisions réglementés</label>
                                                                        <input type="number" class="form-control" id="provisions_reglementees"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="emprunts">EMPRUNTS</label>
                                                                        <input type="number" class="form-control" id="emprunts"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_location_acquisition">Dettes de location acquisition</label>
                                                                        <input type="number" class="form-control" id="dettes_location_acquisition"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="provisions_financieres_risques_">Provisions financières pour risques et charges</label>
                                                                        <input type="number" class="form-control" id="provisions_financieres_risques_"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_circulantes_hao">Dettes circulantes HAO</label>
                                                                        <input type="number" class="form-control" id="dettes_circulantes_hao"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="clients_avances_recues">Clients avances reçues</label>
                                                                        <input type="number" class="form-control" id="clients_avances_recues"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="fournisseurs_exploitation" title="Fournisseurs d'exploitation">Fournisseurs d'exploitation</label>
                                                                        <input type="number" class="form-control" id="fournisseurs_exploitation"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_fiscales">Dettes fiscales et sociales</label>
                                                                        <input type="number" class="form-control" id="dettes_fiscales"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="autres_dettes">Autres dettes</label>
                                                                        <input type="number" class="form-control" id="autres_dettes"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="banques_credit_escompte" title="Banques, crédits d'escomptes et de trésorerie">Banques, crédits d'escomptes et de trésorerie</label>
                                                                        <input type="number" class="form-control" id="banques_credit_escompte"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="banques_credit_tresorerie" title="Banques, crédits de trésorerie">BBanques, crédits de trésorerie</label>
                                                                        <input type="number" class="form-control" id="banques_credit_tresorerie"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ecart_conversion_passif">ECART DE CONVERSION</label>
                                                                        <input type="number" class="form-control" id="ecart_conversion_passif"/>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                    </fieldset>
                                    </div>

                                    <div class="tab-pane" role="tabpanel" id="n22" data-id="<?= date('Y') + 2 ?>" aria-labelledby="tab22">

                                        <fieldset>
                                         <legend>ACTIF</legend>
                                         <div class="row">
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="frais_developpement" title="Frais de développement et de prospection">Frais de dév. et de prospection</label>
                                                     <input type="number" class="form-control" id="frais_developpement" title="Frais de développement et de prospection"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="brevets" title="Brevets, licences, logiciels, et droits assimilaires">Brevets, licences, logiciels,...</label>
                                                     <input type="number" class="form-control" id="brevets" title="Brevets, licences, logiciels, et droits assimilaires"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="fonds_commercial" title="Fonds commercial et droit au bail">Fonds commercial et droit au bail</label>
                                                     <input type="number" class="form-control" id="fonds_commercial" title="Fonds commercial et droit au bail"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles">AUTRES IMMO. INCORP.</label>
                                                     <input type="number" class="form-control" id="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles"/>
                                                 </div>
                                             </div>
                                         </div>
                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="terrains">TERRAIN</label>
                                                         <input type="number" class="form-control" id="terrains"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="batiments">BATIMENTS</label>
                                                         <input type="number" class="form-control" id="batiments"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="amenagements" title="Aménagements, agencements et installations">AMENAGEMENTS, AGENCEM. ET INSTAL.</label>
                                                         <input type="number" class="form-control" id="amenagements" title="Aménagements, agencements et installations"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="materiel_mobilier">MATERIEL, MOBILIER</label>
                                                         <input type="number" class="form-control" id="materiel_mobilier"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="materiel_transport">Materiel de transport</label>
                                                         <input type="number" class="form-control" id="materiel_transport"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="avances_acomptes">AVANCES ET ACOMPTES VERSES,...</label>
                                                         <input type="number" class="form-control" id="avances_acomptes"/>
                                                     </div>
                                                 </div>
                                             </div>

                                             <hr/>
                                            <div class="row">

                                                    <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="titres_participation">Titres de participation</label>
                                                         <input type="number" class="form-control" id="titres_participation"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Autres immobilisations financières" for="autres_immobilisations_financieres">Autres immo. financières</label>
                                                         <input title="Autres immobilisations financières" type="number" class="form-control" id="autres_immobilisations_financieres"/>
                                                     </div>
                                                 </div>
                                            </div>

                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="actif_circulant_hao">ACTIF CIRCULANT HAO</label>
                                                         <input type="number" class="form-control" id="actif_circulant_hao"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="stocks_encours">STOCK ET ENCOURS</label>
                                                         <input type="number" class="form-control" id="stocks_encours"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="creances_emplois">CRÉANCES ET EMPLOIS ASSIMILÉS</label>
                                                         <input type="number" class="form-control" id="creances_emplois"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="avances_fournisseurs">FOURNISSEURS AVANCES VERSEES</label>
                                                         <input type="number" class="form-control" id="avances_fournisseurs"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="clients">CLIENTS</label>
                                                         <input type="number" class="form-control" id="clients"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="autres_creances">AUTRES CREANCES</label>
                                                         <input type="number" class="form-control" id="autres_creances"/>
                                                     </div>
                                                 </div>
                                             </div>
                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="titres_placement">TITRES DE PLACEMENT</label>
                                                         <input type="number" class="form-control" id="titres_placement"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="valeur_encaisser">VALEURS  A ENCAISSER</label>
                                                         <input type="number" class="form-control" id="valeur_encaisser"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="banques_cheques_">BANQUES, CHEQUES POSTAUX,...</label>
                                                         <input type="number" class="form-control" id="banques_cheques_"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="ecart_conversion_actif">ECART DE CONVERSION</label>
                                                         <input type="number" class="form-control" id="ecart_conversion_actif"/>
                                                     </div>
                                                 </div>

                                             </div>


                                     </fieldset>
                                      <fieldset>
                                                        <legend>PASSIF</legend>
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="capital">CAPITAL</label>
                                                                    <input type="number" class="form-control" id="capital"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="apporteurs_acpital_non_appele">CAPITAL NON APPELE</label>
                                                                    <input type="number" class="form-control" id="apporteurs_acpital_non_appele"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="primes_apport">PRIMES D'APPORT D'EMISSION</label>
                                                                    <input type="number" class="form-control" id="primes_apport"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="ecarts_reevaluation">ECART DE REEVALUAT.</label>
                                                                    <input type="number" class="form-control" id="ecarts_reevaluation"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="reserves_indisponibles">RESERVES DISPONIBLES</label>
                                                                        <input type="number" class="form-control" id="reserves_indisponibles"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="reserves_libres">RESERVES LIBRES</label>
                                                                        <input type="number" class="form-control" id="reserves_libres"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="report_a_nouveau">REPORT A NOUVEAU</label>
                                                                        <input type="number" class="form-control" id="report_a_nouveau"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="resultat_net_exercice">RESULTAT NET DE L'EXERCICE</label>
                                                                        <input type="number" class="form-control" id="resultat_net_exercice"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="subventions_investissement">Subventions d'investissement</label>
                                                                        <input type="number" class="form-control" id="subventions_investissement"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="provisions_reglementees">Provisions réglementés</label>
                                                                        <input type="number" class="form-control" id="provisions_reglementees"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="emprunts">EMPRUNTS</label>
                                                                        <input type="number" class="form-control" id="emprunts"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_location_acquisition">Dettes de location acquisition</label>
                                                                        <input type="number" class="form-control" id="dettes_location_acquisition"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="provisions_financieres_risques_">Provisions financières pour risques et charges</label>
                                                                        <input type="number" class="form-control" id="provisions_financieres_risques_"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_circulantes_hao">Dettes circulantes HAO</label>
                                                                        <input type="number" class="form-control" id="dettes_circulantes_hao"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="clients_avances_recues">Clients avances reçues</label>
                                                                        <input type="number" class="form-control" id="clients_avances_recues"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="fournisseurs_exploitation" title="Fournisseurs d'exploitation">Fournisseurs d'exploitation</label>
                                                                        <input type="number" class="form-control" id="fournisseurs_exploitation"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_fiscales">Dettes fiscales et sociales</label>
                                                                        <input type="number" class="form-control" id="dettes_fiscales"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="autres_dettes">Autres dettes</label>
                                                                        <input type="number" class="form-control" id="autres_dettes"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="banques_credit_escompte" title="Banques, crédits d'escomptes et de trésorerie">Banques, crédits d'escomptes et de trésorerie</label>
                                                                        <input type="number" class="form-control" id="banques_credit_escompte"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="banques_credit_tresorerie" title="Banques, crédits de trésorerie">BBanques, crédits de trésorerie</label>
                                                                        <input type="number" class="form-control" id="banques_credit_tresorerie"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ecart_conversion_passif">ECART DE CONVERSION</label>
                                                                        <input type="number" class="form-control" id="ecart_conversion_passif"/>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                    </fieldset>

                                    </div>

                                    <div class="tab-pane" role="tabpanel" id="n23" data-id="<?= date('Y') +3 ?>" aria-labelledby="tab23">

                                        <fieldset>
                                         <legend>ACTIF</legend>
                                         <div class="row">
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="frais_developpement" title="Frais de développement et de prospection">Frais de dév. et de prospection</label>
                                                     <input type="number" class="form-control" id="frais_developpement" title="Frais de développement et de prospection"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="brevets" title="Brevets, licences, logiciels, et droits assimilaires">Brevets, licences, logiciels,...</label>
                                                     <input type="number" class="form-control" id="brevets" title="Brevets, licences, logiciels, et droits assimilaires"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="fonds_commercial" title="Fonds commercial et droit au bail">Fonds commercial et droit au bail</label>
                                                     <input type="number" class="form-control" id="fonds_commercial" title="Fonds commercial et droit au bail"/>
                                                 </div>
                                             </div>
                                             <div class="col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles">AUTRES IMMO. INCORP.</label>
                                                     <input type="number" class="form-control" id="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles"/>
                                                 </div>
                                             </div>
                                         </div>
                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="terrains">TERRAIN</label>
                                                         <input type="number" class="form-control" id="terrains"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="batiments">BATIMENTS</label>
                                                         <input type="number" class="form-control" id="batiments"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="amenagements" title="Aménagements, agencements et installations">AMENAGEMENTS, AGENCEM. ET INSTAL.</label>
                                                         <input type="number" class="form-control" id="amenagements" title="Aménagements, agencements et installations"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="materiel_mobilier">MATERIEL, MOBILIER</label>
                                                         <input type="number" class="form-control" id="materiel_mobilier"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="materiel_transport">Materiel de transport</label>
                                                         <input type="number" class="form-control" id="materiel_transport"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="avances_acomptes">AVANCES ET ACOMPTES VERSES,...</label>
                                                         <input type="number" class="form-control" id="avances_acomptes"/>
                                                     </div>
                                                 </div>
                                             </div>

                                             <hr/>
                                            <div class="row">

                                                    <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="titres_participation">Titres de participation</label>
                                                         <input type="number" class="form-control" id="titres_participation"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Autres immobilisations financières" for="autres_immobilisations_financieres">Autres immo. financières</label>
                                                         <input title="Autres immobilisations financières" type="number" class="form-control" id="autres_immobilisations_financieres"/>
                                                     </div>
                                                 </div>
                                            </div>
                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="actif_circulant_hao">ACTIF CIRCULANT HAO</label>
                                                         <input type="number" class="form-control" id="actif_circulant_hao"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="stocks_encours">STOCK ET ENCOURS</label>
                                                         <input type="number" class="form-control" id="stocks_encours"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="creances_emplois">CRÉANCES ET EMPLOIS ASSIMILÉS</label>
                                                         <input type="number" class="form-control" id="creances_emplois"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="avances_fournisseurs">FOURNISSEURS AVANCES VERSEES</label>
                                                         <input type="number" class="form-control" id="avances_fournisseurs"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="clients">CLIENTS</label>
                                                         <input type="number" class="form-control" id="clients"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="autres_creances">AUTRES CREANCES</label>
                                                         <input type="number" class="form-control" id="autres_creances"/>
                                                     </div>
                                                 </div>
                                             </div>
                                             <hr/>
                                             <div class="row">
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="titres_placement">TITRES DE PLACEMENT</label>
                                                         <input type="number" class="form-control" id="titres_placement"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="valeur_encaisser">VALEURS  A ENCAISSER</label>
                                                         <input type="number" class="form-control" id="valeur_encaisser"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="banques_cheques_">BANQUES, CHEQUES POSTAUX,...</label>
                                                         <input type="number" class="form-control" id="banques_cheques_"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="ecart_conversion_actif">ECART DE CONVERSION</label>
                                                         <input type="number" class="form-control" id="ecart_conversion_actif"/>
                                                     </div>
                                                 </div>

                                             </div>


                                     </fieldset>
                                      <fieldset>
                                                        <legend>PASSIF</legend>
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="capital">CAPITAL</label>
                                                                    <input type="number" class="form-control" id="capital"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="apporteurs_acpital_non_appele">CAPITAL NON APPELE</label>
                                                                    <input type="number" class="form-control" id="apporteurs_acpital_non_appele"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="primes_apport">PRIMES D'APPORT D'EMISSION</label>
                                                                    <input type="number" class="form-control" id="primes_apport"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="ecarts_reevaluation">ECART DE REEVALUAT.</label>
                                                                    <input type="number" class="form-control" id="ecarts_reevaluation"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="reserves_indisponibles">RESERVES DISPONIBLES</label>
                                                                        <input type="number" class="form-control" id="reserves_indisponibles"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="reserves_libres">RESERVES LIBRES</label>
                                                                        <input type="number" class="form-control" id="reserves_libres"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="report_a_nouveau">REPORT A NOUVEAU</label>
                                                                        <input type="number" class="form-control" id="report_a_nouveau"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="resultat_net_exercice">RESULTAT NET DE L'EXERCICE</label>
                                                                        <input type="number" class="form-control" id="resultat_net_exercice"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="subventions_investissement">Subventions d'investissement</label>
                                                                        <input type="number" class="form-control" id="subventions_investissement"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="provisions_reglementees">Provisions réglementés</label>
                                                                        <input type="number" class="form-control" id="provisions_reglementees"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr/>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="emprunts">EMPRUNTS</label>
                                                                        <input type="number" class="form-control" id="emprunts"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_location_acquisition">Dettes de location acquisition</label>
                                                                        <input type="number" class="form-control" id="dettes_location_acquisition"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="provisions_financieres_risques_">Provisions financières pour risques et charges</label>
                                                                        <input type="number" class="form-control" id="provisions_financieres_risques_"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_circulantes_hao">Dettes circulantes HAO</label>
                                                                        <input type="number" class="form-control" id="dettes_circulantes_hao"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="clients_avances_recues">Clients avances reçues</label>
                                                                        <input type="number" class="form-control" id="clients_avances_recues"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="fournisseurs_exploitation" title="Fournisseurs d'exploitation">Fournisseurs d'exploitation</label>
                                                                        <input type="number" class="form-control" id="fournisseurs_exploitation"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes_fiscales">Dettes fiscales et sociales</label>
                                                                        <input type="number" class="form-control" id="dettes_fiscales"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="autres_dettes">Autres dettes</label>
                                                                        <input type="number" class="form-control" id="autres_dettes"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="banques_credit_escompte" title="Banques, crédits d'escomptes et de trésorerie">Banques, crédits d'escomptes et de trésorerie</label>
                                                                        <input type="number" class="form-control" id="banques_credit_escompte"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="banques_credit_tresorerie" title="Banques, crédits de trésorerie">BBanques, crédits de trésorerie</label>
                                                                        <input type="number" class="form-control" id="banques_credit_tresorerie"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ecart_conversion_passif">ECART DE CONVERSION</label>
                                                                        <input type="number" class="form-control" id="ecart_conversion_passif"/>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                    </fieldset>

                                    </div>

                                 </div>
                           </div>

                            <div class="card-footer text-center">
                                    <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                    <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                </div>

                        </div>
                    </div>

                    <div class="setup-content" id="step-3">
                        <div class="card">
                           <div class="card-header">
                                <h6 class="text-center">FLUX DE TRESORERIE</h6>
                           </div>
                           <div class="card-body">
                                <div class="row">
                                   <div class="col-md-7 col-md-offset-4 col-sm-12">
                                       <ul class="nav nav-pills nav-header pull-right" style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                                           <li role="presentation" class="nav-item">
                                               <a class="nav-link active" href="#n31" role="tab" id="tab31" data-toggle="tab" aria-controls="n31" aria-expanded="false"><span class=""></span> <?= date('Y') + 1 ?></a>
                                           </li>
                                           <li role="presentation" class="nav-item">
                                               <a class="nav-link" href="#n32" role="tab" id="tab2" data-toggle="tab" aria-controls="n32" aria-expanded="false"><span class=""></span> <?= date('Y') + 2 ?></a>
                                           </li>
                                           <li role="presentation" class="nav-item">
                                               <a class="nav-link" href="#n33" role="tab" id="tab33" data-toggle="tab" aria-controls="n33" aria-expanded="false"><span class=""></span> <?= date('Y') + 3 ?></a>
                                           </li>
                                       </ul>
                                   </div>
                                </div>

                                 <div class="tab-content" id="myTabContent">

                                    <div class="tab-pane active" role="tabpanel" id="n31" data-id="<?= date('Y') +1 ?>" aria-labelledby="tab31">
                                         <fieldset>
                                         <legend>FLUX DE TRESORERIE</legend>
                                             <div class="row">
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="capacite_autofinancement" title="Capacité d'Autufinancement Globale (CAFG)">Capacité d'Autufinancement</label>
                                                         <input type="number" class="form-control" id="capacite_autofinancement" title=""/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="actif_circulant_hao" title="Actif circulant HAO">Actif circulant HAO</label>
                                                         <input type="number" class="form-control" id="actif_circulant_hao" title="Actif circulant HAO"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_stocks" title="Variation des stocks">Variation des stocks</label>
                                                         <input type="number" class="form-control" id="variation_stocks" title="Variation des stocks"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_creances" title="Variation des créances et emplois assimilés">Variation des créances</label>
                                                         <input type="number" class="form-control" id="variation_creances" title="Variation des créances et emplois assimilés"/>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_passif_circulant" title=" Variation du passif circulant"> Variation du passif circulant</label>
                                                         <input type="number" class="form-control" title=" Variation du passif circulant" id="variation_passif_circulant"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Décaissements liés aux acquisitions d'immobilisations incorporelles" for="decaissements_acquisitions_incorporelles">Décaissements - acquisitions d'immo incorporelles</label>
                                                         <input type="number" title="Décaissements liés aux acquisitions d'immobilisations incorporelles" class="form-control" id="decaissements_acquisitions_incorporelles"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="decaissements_acquisitions_corporelles" title="Décaissements liés aux acquisitions d'immobilisations incorporelles">Décaissements - acquisitions d'immo corporelles</label>
                                                         <input type="number" class="form-control" id="decaissements_acquisitions_corporelles" title="Décaissements liés aux acquisitions d'immobilisations incorporelles"/>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="decaissements_acquisitions_financieres" title="Décaissements liés aux acquisitions d'immobilisations financières">Décaissements - acquisitions d'immo financières</label>
                                                         <input type="number" class="form-control" id="decaissements_acquisitions_financieres" title="Décaissements liés aux acquisitions d'immobilisations financières"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="cessions_immo_incoporelles_corporelles" title="Cessions d'immobilisations incorporelles et corporelles">Cessions d'immo incorp. - corp</label>
                                                         <input type="number" class="form-control" id="cessions_immo_incoporelles_corporelles" title="Cessions d'immobilisations incorporelles et corporelles"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Cessions d'immobilisations financières" for="cessions_immo_financieres">Cessions d'immo financières</label>
                                                         <input type="number" title="Cessions d'immobilisations financières" class="form-control" id="cessions_immo_financieres"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Augmentation de capital par apports nouveaux" for="augmentation_capital_apports_nouveaux">Augmentation de capital par apports nouveaux</label>
                                                         <input title="Augmentation de capital par apports nouveaux" type="number" class="form-control" id="augmentation_capital_apports_nouveaux"/>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Subventions d'investissements reçues" for="subventions_investissement_recues">Subventions d'investissements reçues</label>
                                                         <input title="Subventions d'investissements reçues" type="number" class="form-control" id="subventions_investissement_recues"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Prélèvements sur le capital" for="prevelements_capital">Prélèvements sur le capital</label>
                                                         <input type="number" class="form-control" id="prevelements_capital" title="Prélèvements sur le capital"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="distribution_dividendes" title="Distribution des dividendes">Distribution des dividendes</label>
                                                         <input title="Distribution des dividendes" type="number" class="form-control" id="distribution_dividendes"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Emprunts"  for="emprunts">Emprunts</label>
                                                         <input type="number" class="form-control" title="Emprunts" id="emprunts"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Autres dettes financières" for="autres_dettes_financieres">Autres dettes financières</label>
                                                         <input title="Autres dettes financières" type="number" class="form-control" id="autres_dettes_financieres"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Remboursements des emprunts et autres dettes financières" for="remboursement_emprunts">Remboursements des emprunts</label>
                                                         <input title="Remboursements des emprunts et autres dettes financières" type="number" class="form-control" id="remboursement_emprunts"/>
                                                     </div>
                                                 </div>
                                             </div>
                                     </fieldset>
                                    </div>

                                    <div class="tab-pane" role="tabpanel" id="n32" data-id="<?= date('Y') +2 ?>" aria-labelledby="tab32">
                                         <fieldset>
                                         <legend>FLUX DE TRESORERIE</legend>
                                             <div class="row">
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="capacite_autofinancement" title="Capacité d'Autufinancement Globale (CAFG)">Capacité d'Autufinancement</label>
                                                         <input type="number" class="form-control" id="capacite_autofinancement" title=""/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="actif_circulant_hao" title="Actif circulant HAO">Actif circulant HAO</label>
                                                         <input type="number" class="form-control" id="actif_circulant_hao" title="Actif circulant HAO"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_stocks" title="Variation des stocks">Variation des stocks</label>
                                                         <input type="number" class="form-control" id="variation_stocks" title="Variation des stocks"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_creances" title="Variation des créances et emplois assimilés">Variation des créances</label>
                                                         <input type="number" class="form-control" id="variation_creances" title="Variation des créances et emplois assimilés"/>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_passif_circulant" title=" Variation du passif circulant"> Variation du passif circulant</label>
                                                         <input type="number" class="form-control" title=" Variation du passif circulant" id="variation_passif_circulant"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Décaissements liés aux acquisitions d'immobilisations incorporelles" for="decaissements_acquisitions_incorporelles">Décaissements - acquisitions d'immo incorporelles</label>
                                                         <input type="number" title="Décaissements liés aux acquisitions d'immobilisations incorporelles" class="form-control" id="decaissements_acquisitions_incorporelles"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="decaissements_acquisitions_corporelles" title="Décaissements liés aux acquisitions d'immobilisations incorporelles">Décaissements - acquisitions d'immo corporelles</label>
                                                         <input type="number" class="form-control" id="decaissements_acquisitions_corporelles" title="Décaissements liés aux acquisitions d'immobilisations incorporelles"/>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="decaissements_acquisitions_financieres" title="Décaissements liés aux acquisitions d'immobilisations financières">Décaissements - acquisitions d'immo financières</label>
                                                         <input type="number" class="form-control" id="decaissements_acquisitions_financieres" title="Décaissements liés aux acquisitions d'immobilisations financières"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="cessions_immo_incoporelles_corporelles" title="Cessions d'immobilisations incorporelles et corporelles">Cessions d'immo incorp. - corp</label>
                                                         <input type="number" class="form-control" id="cessions_immo_incoporelles_corporelles" title="Cessions d'immobilisations incorporelles et corporelles"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Cessions d'immobilisations financières" for="cessions_immo_financieres">Cessions d'immo financières</label>
                                                         <input type="number" title="Cessions d'immobilisations financières" class="form-control" id="cessions_immo_financieres"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Augmentation de capital par apports nouveaux" for="augmentation_capital_apports_nouveaux">Augmentation de capital par apports nouveaux</label>
                                                         <input title="Augmentation de capital par apports nouveaux" type="number" class="form-control" id="augmentation_capital_apports_nouveaux"/>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Subventions d'investissements reçues" for="subventions_investissement_recues">Subventions d'investissements reçues</label>
                                                         <input title="Subventions d'investissements reçues" type="number" class="form-control" id="subventions_investissement_recues"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Prélèvements sur le capital" for="prevelements_capital">Prélèvements sur le capital</label>
                                                         <input type="number" class="form-control" id="prevelements_capital" title="Prélèvements sur le capital"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="distribution_dividendes" title="Distribution des dividendes">Distribution des dividendes</label>
                                                         <input title="Distribution des dividendes" type="number" class="form-control" id="distribution_dividendes"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Emprunts"  for="emprunts">Emprunts</label>
                                                         <input type="number" class="form-control" title="Emprunts" id="emprunts"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Autres dettes financières" for="autres_dettes_financieres">Autres dettes financières</label>
                                                         <input title="Autres dettes financières" type="number" class="form-control" id="autres_dettes_financieres"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Remboursements des emprunts et autres dettes financières" for="remboursement_emprunts">Remboursements des emprunts</label>
                                                         <input title="Remboursements des emprunts et autres dettes financières" type="number" class="form-control" id="remboursement_emprunts"/>
                                                     </div>
                                                 </div>
                                             </div>



                                     </fieldset>
                                    </div>

                                    <div class="tab-pane" role="tabpanel" id="n33" data-id="<?= date('Y') +3 ?>" aria-labelledby="tab33">
                                         <fieldset>
                                         <legend>FLUX DE TRESORERIE</legend>
                                             <div class="row">
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="capacite_autofinancement" title="Capacité d'Autufinancement Globale (CAFG)">Capacité d'Autufinancement</label>
                                                         <input type="number" class="form-control" id="capacite_autofinancement" title=""/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="actif_circulant_hao" title="Actif circulant HAO">Actif circulant HAO</label>
                                                         <input type="number" class="form-control" id="actif_circulant_hao" title="Actif circulant HAO"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_stocks" title="Variation des stocks">Variation des stocks</label>
                                                         <input type="number" class="form-control" id="variation_stocks" title="Variation des stocks"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_creances" title="Variation des créances et emplois assimilés">Variation des créances</label>
                                                         <input type="number" class="form-control" id="variation_creances" title="Variation des créances et emplois assimilés"/>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="variation_passif_circulant" title=" Variation du passif circulant"> Variation du passif circulant</label>
                                                         <input type="number" class="form-control" title=" Variation du passif circulant" id="variation_passif_circulant"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Décaissements liés aux acquisitions d'immobilisations incorporelles" for="decaissements_acquisitions_incorporelles">Décaissements - acquisitions d'immo incorporelles</label>
                                                         <input type="number" title="Décaissements liés aux acquisitions d'immobilisations incorporelles" class="form-control" id="decaissements_acquisitions_incorporelles"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="decaissements_acquisitions_corporelles" title="Décaissements liés aux acquisitions d'immobilisations incorporelles">Décaissements - acquisitions d'immo corporelles</label>
                                                         <input type="number" class="form-control" id="decaissements_acquisitions_corporelles" title="Décaissements liés aux acquisitions d'immobilisations incorporelles"/>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="decaissements_acquisitions_financieres" title="Décaissements liés aux acquisitions d'immobilisations financières">Décaissements - acquisitions d'immo financières</label>
                                                         <input type="number" class="form-control" id="decaissements_acquisitions_financieres" title="Décaissements liés aux acquisitions d'immobilisations financières"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="cessions_immo_incoporelles_corporelles" title="Cessions d'immobilisations incorporelles et corporelles">Cessions d'immo incorp. - corp</label>
                                                         <input type="number" class="form-control" id="cessions_immo_incoporelles_corporelles" title="Cessions d'immobilisations incorporelles et corporelles"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Cessions d'immobilisations financières" for="cessions_immo_financieres">Cessions d'immo financières</label>
                                                         <input type="number" title="Cessions d'immobilisations financières" class="form-control" id="cessions_immo_financieres"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Augmentation de capital par apports nouveaux" for="augmentation_capital_apports_nouveaux">Augmentation de capital par apports nouveaux</label>
                                                         <input title="Augmentation de capital par apports nouveaux" type="number" class="form-control" id="augmentation_capital_apports_nouveaux"/>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Subventions d'investissements reçues" for="subventions_investissement_recues">Subventions d'investissements reçues</label>
                                                         <input title="Subventions d'investissements reçues" type="number" class="form-control" id="subventions_investissement_recues"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-4 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Prélèvements sur le capital" for="prevelements_capital">Prélèvements sur le capital</label>
                                                         <input type="number" class="form-control" id="prevelements_capital" title="Prélèvements sur le capital"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label for="distribution_dividendes" title="Distribution des dividendes">Distribution des dividendes</label>
                                                         <input title="Distribution des dividendes" type="number" class="form-control" id="distribution_dividendes"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Emprunts"  for="emprunts">Emprunts</label>
                                                         <input type="number" class="form-control" title="Emprunts" id="emprunts"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Autres dettes financières" for="autres_dettes_financieres">Autres dettes financières</label>
                                                         <input title="Autres dettes financières" type="number" class="form-control" id="autres_dettes_financieres"/>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-3 col-sm-12">
                                                     <div class="form-group">
                                                         <label title="Remboursements des emprunts et autres dettes financières" for="remboursement_emprunts">Remboursements des emprunts</label>
                                                         <input title="Remboursements des emprunts et autres dettes financières" type="number" class="form-control" id="remboursement_emprunts"/>
                                                     </div>
                                                 </div>
                                             </div>



                                     </fieldset>
                                    </div>


                                 </div>
                           </div>

                            <div class="card-footer text-center">
                                    <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                    <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                </div>

                        </div>
                    </div>

                    <div class="setup-content" id="step-4">
                        <div class="card">
                              <div class="card-header">
                                  <h6>MONTAGE FINANCIER</h6>
                              </div>
                              <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="montant_investissement">MONTANT DES INVESTISSEMENTS</label>
                                                <input style="text-align: right; padding-right: 10px" title="montant des investissements"  type="number" class="form-control" id="montant_investissement"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="bfr">BESOIN EN FONDS DE ROULEMENT</label>
                                                <input style="text-align: right; padding-right: 10px" title="besoin en fonds de roulement"  type="number" class="form-control" id="bfr"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="cout_projet">COUT DU PROJET</label>
                                                <input style="font-weight: bold; text-align: right; padding-right: 10px;" title="cout global du projet"  type="number" disabled class="form-control" id="cout_projet"/>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12">


                                           <table id="table-moyens" class="table table-bordered table-condensed">
                                                <tr>
                                                    <th style="width: 50%">AUTOFINANCEMENT</th> <td data-id="2" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">AUGMENTATION DE CAPITAL</th> <td data-id="1" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">EMPRUNT OBLIGATAIRE</th> <td data-id="3" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">PRETS MLT</th> <td data-id="4" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">CREDIT BAIL</th> <td data-id="5" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">CREDIT FOURNISSEUR</th> <td data-id="6" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">ESCOMPTE BANCAIRE</th> <td data-id="7" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">AFFACTURAGE</th> <td data-id="9" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">BILLETS DE TRESORERIE</th> <td data-id="10" style="text-align: right" class="cell" contenteditable="true"></td>
                                                </tr>

                                                <tr style="background-color: #EEEEEE; font-weight: 900;">
                                                    <th style="width: 50%;">TOTAL</th> <td data-id="" style="text-align: right; font-weight: bold" id="cel-total" contenteditable=""></td>
                                                </tr>


                                           </table>
                                        </div>
                                    </div>

                              </div>
                              <div class="card-footer">
                                  <div class="btn-div text-center">
                                      <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                       <button id="next1" style="display: none" class="btn btn-primary nextBtn btn-sm  btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                      <button id="btn-save1" class="btn btn-success btn-save btn-rounded" type="button"><i class="fa fa-save"></i> ENREGISTRER</button>                                                          </div>
                              </div>
                         </div>
                    </div>
                    <div class="setup-content" id="step-5">
                    <div class="card">
                    <div class="card-header">
                        <h4 class="page-header">RENTABILITE ESPEREE</h4>
                    </div>
                    <div class="card-body">
                    <div class="mfinancement section" id="acapital" style="display: block">
                        <h4>FINANCEMENT POUR L'AUGMENTATION DU CAPITAL</h4>
                        <div>
                            <div class="" id="analyse_invest">
                               <div id="fincapitalsocial">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="">MONTANT DE LA LEVEE</label>
                                                <input type="number" class="form-control" id="mt_levee"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">VALEUR NOMINALE D'UNE ACTION</label>
                                                <input type="number" class="form-control" id="vna"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">NOMBRE D'ACTION AVANT OUVERTURE DU CAPITAL</label>
                                                <input type="number" class="form-control" id="nba_aoc"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">RESERVES</label>
                                                <input type="number" class="form-control" id="reserves"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">REPORT A NOUVEAU</label>
                                                <input type="number" class="form-control" id="report"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">RESULTAT NET</label>
                                                <input type="number" class="form-control" id="resultat_net"/>
                                            </div>
                                        </div>
                                        </div>
                                     <div class="row">

                                          <div class="col-md-3 col-sm-12">
                                              <div class="form-group">
                                                  <label for="">PRIX D'EMISSION</label>
                                                  <input type="number" class="form-control" id="prix_emi"/>
                                              </div>
                                          </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'IMPOSITION</label>
                                                <input style="text-align: right; padding-right: 5px" type="text" class="form-control pc" id="taux_imposition"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX RENT. EXIGE PAR LES ACTIONNAIRES</label>
                                                <input style="text-align: right; padding-right: 5px" type="text" class="form-control pc" id="taux_rent_exige_act"/>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">MONTANT DES DETTES FINANCIERES</label>
                                                <input type="number" class="form-control" id="mt_dettes_fin"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="">COUT DE L'ENDETTEMENT</label>
                                                <input style="text-align: right; padding-right: 5px" type="text" class="form-control" id="cout_endettement"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group" title="Taux de croissance a l'infini des flux de tresorerie disponibles non actualises">
                                                <label for="">TCI DES FLUX DE TRESO. DISPO. NON ACTU.</label>
                                                <input style="text-align: right; padding-right: 5px" type="text" class="form-control pc" id="tci_flux_treso_dispo"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group" title="Taux de croissance a l'infini des flux de dividendes non actualises">
                                                <label for="">TCI DES DIVIDENDES NON ACTU.</label>
                                                <input style="text-align: right; padding-right: 5px" type="text" class="form-control pc" id="tci_flux_dvd_non_actu"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">POURCENTAGE DU CAPITAL APPELE</label>
                                                <input type="text" class="form-control" id="taux_capital_appele"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">MONTANT DU DERNIER DIVIDENDE BRUT PAR ACTION DISTRIBUEE</label>
                                                <input type="number" class="form-control" id="mt_dernier_dvd_brut_action"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="">BETA ACTIF</label>
                                                <input type="text" class="form-control" id="beta_actif"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET SANS RISQUE</label>
                                                <input type="text" class="form-control" id="taux_interet_sans_risque"/>
                                            </div>
                                        </div>
                                    </div>
                               </div>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                           <div class="col-md-7 col-md-offset-4 col-sm-12">
                                               <ul class="nav nav-pills nav-header pull-right" style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                                                   <li role="presentation" class="nav-item">
                                                       <a class="nav-link active" href="#n51" role="tab" id="tab51" data-toggle="tab" aria-controls="n51" aria-expanded="false"><span class=""></span> <?= date('Y') + 1 ?></a>
                                                   </li>
                                                   <li role="presentation" class="nav-item">
                                                       <a class="nav-link" href="#n52" role="tab" id="tab52" data-toggle="tab" aria-controls="n52" aria-expanded="false"><span class=""></span> <?= date('Y') + 2 ?></a>
                                                   </li>
                                                   <li role="presentation" class="nav-item">
                                                       <a class="nav-link" href="#n53" role="tab" id="tab53" data-toggle="tab" aria-controls="n53" aria-expanded="false"><span class=""></span> <?= date('Y') + 3 ?></a>
                                                   </li>
                                               </ul>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane active" role="tabpanel" id="n51" data-id="<?= date('Y') +1 ?>" aria-labelledby="tab51">
                                                <div id="repart1" class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="investissement">MONTANT INVESTI</label>
                                                            <input class="form-control" type="number" id="investissement"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="cession">CESSION D'ACTIF</label>
                                                            <input class="form-control" type="number" id="cession"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" role="tabpanel" id="n52" data-id="<?= date('Y') +2 ?>" aria-labelledby="tab52">
                                                <div id="repart2" class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="investissement">MONTANT INVESTI</label>
                                                            <input class="form-control" type="number" id="investissement"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="cession">CESSION D'ACTIF</label>
                                                            <input class="form-control" type="number" id="cession"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" role="tabpanel" id="n53" data-id="<?= date('Y') +3 ?>" aria-labelledby="tab53">
                                                 <div id="repart3" class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="investissement">MONTANT INVESTI</label>
                                                            <input class="form-control" type="number" id="investissement"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="cession">CESSION D'ACTIF</label>
                                                            <input class="form-control" type="number" id="cession"/>
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
                        <div class="mfinancement section" id="emp_oblig">
                            <h4>FINANCEMENT PAR EMPRUNT OBLIGATAIRE </h4>

                            <div class="choices form-group text-center">
                                <ul class="list-inline">
                                    <?php foreach($tr_oblig as $radio): ?>
                                        <li class="list-inline-item">
                                           <span><?= $radio->name ?></span> <input type="radio" class="oblig_choice" name="oblig" data-id="<?= $radio->id ?>"/>
                                        </li>

                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="oblig-section section" id="oblig_section_1" style="display: none">
                                <h5>Remboursement in fine </h5>
                                <div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">NOMBRE DE TITRES A ACHETER</label>
                                                <input type="number" class="form-control ob" id="rif_nbta"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">VALEUR FACIALE</label>
                                                <input type="number" class="form-control ob" id="rif_vf"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET</label>
                                                <input type="text" class="form-control ob" id="rif_ti"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">DUREE DE L'EMPRUNT</label>
                                                <input type="number" class="form-control ob" id="rif_dp"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">PRIX DE REMBOURSEMENT</label>
                                                <input type="number" class="form-control ob" id="rif_pr"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="oblig-section section" id="oblig_section_2" style="display: none">
                                <h5>Remboursement par séries sensiblement égales </h5>
                                <div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">NOMBRE DE TITRES A ACHETER</label>
                                                <input type="number" class="form-control ob" id="rss_nbta"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">VALEUR FACIALE</label>
                                                <input type="number" class="form-control ob" id="rss_vf"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET</label>
                                                <input type="text" class="form-control ob" id="rss_ti"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">DUREE DU PRET</label>
                                                <input type="number" class="form-control ob" id="rss_dp"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">PRIX DE REMBOURSEMENT</label>
                                                <input type="number" class="form-control ob" id="rss_pr"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="oblig-section section" id="oblig_section_3" style="display: none">
                                <h5>Remboursement par annuités sensiblement constantes </h5>
                                <div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">NOMBRE DE TITRES A ACHETER</label>
                                                <input type="number" class="form-control ob" id="ras_nbta"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">VALEUR FACIALE</label>
                                                <input type="number" class="form-control ob" id="ras_vf"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET</label>
                                                <input type="number" class="form-control ob" id="ras_ti"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="">DUREE DU PRET</label>
                                                <input type="text" class="form-control ob" id="ras_dp"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">PRIX DE REMBOURSEMENT</label>
                                                <input type="number" class="form-control ob" id="ras_pr"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mfinancement" id="mlt">
                            <h4>FINANCEMENT PAR PRETS A MLT DES ETABLISSEMENTS FINANCIERS</h4>

                            <div class="choices form-group text-center">
                                <ul class="list-inline">
                                    <?php foreach($tr_mlt as $radio): ?>
                                        <li class="list-inline-item">
                                            <span><?= $radio->name ?></span> <input type="radio" class="mlt_choice" name="mlt" data-id="<?= $radio->id ?>"/>
                                        </li>

                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="mlt-section section" id="mlt_section_1" style="display: none">
                                <h5>Remboursement in fine </h5>
                                <div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">SOMME EMPRUNTEE</label>
                                                <input type="number" class="form-control mlt" id="rif_se"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET</label>
                                                <input type="text" class="form-control mlt" id="rif_i"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">PERIODICITE DU REMBOURSEMENT</label>
                                                <select name="" id="rif_periode" class="form-control mlt">
                                                    <option value="0">MENSUELLE</option>
                                                    <option value="1">ANNUELLE</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">DUREE DE L'EMPRUNT</label>
                                                <input type="number" class="form-control mlt" id="rif_de"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mlt-section section" id="mlt_section_3" style="display: none">
                                <h5>Remboursement avec amortissement constant du capital </h5>
                                <div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="">SOMME EMPRUNTEE</label>
                                                <input type="number" class="form-control mlt" id="ras_se"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET</label>
                                                <input type="text" class="form-control mlt" id="ras_i"/>
                                            </div>
                                        </div>

                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="">DUREE DU PRET</label>
                                                <input type="number" class="form-control mlt" id="ras_du"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="mlt-section section" id="mlt_section_4" style="display: none">
                                <h5>Remboursement par annuités constantes* </h5>
                                <div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="">SOMME EMPRUNTEE</label>
                                                <input type="number" class="form-control mlt" id="racc_se"/>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET</label>
                                                <input type="text" class="form-control mlt" id="racc_ti"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="">DUREE DU PRET</label>
                                                <input type="number" class="form-control mlt" id="racc_du"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mfinancement" id="credbail">
                            <h4>FINANCEMENT PAR CREDIT BAIL</h4>
                            <div class="choices form-group text-center">
                                <ul class="list-inline">
                                    <?php foreach($tr_credbail as $radio): ?>
                                        <li class="list-inline-item">
                                            <span><?= $radio->name ?></span> <input type="radio" class="credbail_choice" name="credbail" data-id="<?= $radio->id ?>"/>
                                        </li>

                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="credbail-section section" id="credbail_section_4" style="display: none">
                                <h5>Le cas d’un remboursement par amortissement constant </h5>
                                <div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="">SOMME EMPRUNTEE</label>
                                                <input type="number" class="form-control credbail" id="rac_se"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET</label>
                                                <input type="text" class="form-control credbail" id="rac_i"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">PERIODICITE DU REMBOURSEMENT</label>
                                                <select name="" id="rac_periode" class="form-control credbail">
                                                    <option value=0>MENSUELLE</option>
                                                    <option value=1>ANNUELLE</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">DUREE DE L'EMPRUNT</label>
                                                <input type="number" class="form-control credbail" id="rac_de"/>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">MONTANT DE L'ASSURANCE</label>
                                                <input type="number" class="form-control credbail" id="rac_mt_ass"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="credbail-section section" id="credbail_section_5" style="display: none">
                                <h5>Le cas d’un remboursement par Loyer constant : </h5>
                                <div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">SOMME EMPRUNTEE</label>
                                                <input type="number" class="form-control credbail" id="rlc_se"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">TAUX D'INTERET</label>
                                                <input type="text" class="form-control credbail" id="rlc_ti"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">PERIODICITE DU REMBOURSEMENT</label>
                                                <select name="" id="rlc_periode" class="form-control credbail">
                                                    <option value=0>MENSUELLE</option>
                                                    <option value=1>ANNUELLE</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="">DUREE DE L'EMPRUNT</label>
                                                <input type="number" class="form-control credbail" id="rlc_de"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="">MONTANT DE L'ASSURANCE</label>
                                                <input type="number" class="form-control credbail" id="rlc_mt_ass"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mfinancement" id="escompte">
                            <h4>FINANCEMENT PAR ESCOMPTE BANCAIRE</h4>
                            <div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">MONTANT A ESCOMPTER</label>
                                            <input required type="number" class="form-control escompte" id="mt_to_escompte"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="">NOMBRE D'EFFETS</label>
                                            <input type="number" class="form-control escompte" id="nb_effets"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <div class="form-group">
                                            <label for="">TAUX D'ESCOMPTE</label>
                                            <input type="text" class="form-control escompte" id="taux_escompte"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="">NOMBRE DE JOURS</label>
                                            <input type="number" class="form-control escompte" id="nb_jours"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <div class="form-group">
                                            <label for="">TAUX TVA</label>
                                            <input type="text" class="form-control escompte" id="taux_tva"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <div class="form-group">
                                            <label for="">TAUX CENT. ADD.</label>
                                            <input type="text" class="form-control escompte" id="taux_centime"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="">TAUX DE COM. D'ENDOS</label>
                                            <input type="text" class="form-control escompte" id="taux_com_endos"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">FRAIS DE MANIPULATION PAR EFFET</label>
                                            <input type="number" class="form-control escompte" id="frais_manipulation"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">COMMISSION D'ACCEPTION PAR EFFET</label>
                                            <input type="number" class="form-control escompte" id="com_acception"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">COMMISION D'AVIS DE SORT</label>
                                            <input type="number" class="form-control escompte" id="com_avis"/>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="mfinancement" id="billet_treso">
                            <h4>FINANCEMENT PAR BILLET DE TRESORERIE</h4>

                        </div>
                        <div class="mfinancement" id="affacturage">
                            <h4>FINANCEMENT PAR AFFACTURAGE</h4>

                        </div>
                    </div>
                        <div class="btn-div card-footer text-center">
                            <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                            <button id="btn-save" class="btn btn-success btn-save btn-rounded" type="button"><i class="fa fa-save"></i> ENREGISTRER</button>
                        </div>
                    </div>
                    </div>
             </div>
        </fieldset>

    </div>
</div>
<script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>
<script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

<script type="text/javascript">

  $(document).ready(function() {

     $('input[type="Number"]').val(0);
    $('input[type="Number"]').css({
                        'text-align':'right'
                        });

    $('textarea').summernote({
      height: 200,
      tabsize: 2,
      followingToolbar: true,
      lang:'fr-FR'
    });

     $('.mfinancement').hide();
     $('#head_step-5').hide();
    // $('#step-5').hide();
     var found =false;
     var ids = [];
  });



  $('.btn-save').click(function(e){
    e.preventDefault();


    var tab1=$('#step-1 #myTabContent');
    var tab2=$('#step-2 #myTabContent');
    var tab3=$('#step-3 #myTabContent');
    var tab5=$('#step-5 #myTabContent');
    var resultats = [];
    var bilans = [];
    var tresoreries = [];
    var reparts =[];

    tab1.find('.tab-pane').each(function(){
        var an = $(this).data('id');
        var nid = $(this).prop('id');
        var inputs = $(this).find('input');
        var values = {};
        for (var i=0; i < inputs.length; i++) {
            var id = inputs[i].getAttribute('id');
            values[id] = $('#step-1 #'+nid+ ' #' + id).val();
        }
        values['annee'] =an;
        resultats.push(values);
    });

    tab2.find('.tab-pane').each(function(){
        var an = $(this).data('id');
        var nid = $(this).prop('id');
        var inputs = $(this).find('input');
        var values = {};
        for (var i=0; i < inputs.length; i++) {
            var id = inputs[i].getAttribute('id');
            values[id] = $('#step-2 #'+nid+ ' #' + id).val();
        }
        values['annee'] =an;
        bilans.push(values);
    });
    //console.log(bilans);

    tab3.find('.tab-pane').each(function(){
        var an = $(this).data('id');
        var nid = $(this).prop('id');
        var inputs = $(this).find('input');
        var values = {};
        for (var i=0; i < inputs.length; i++) {
            var id = inputs[i].getAttribute('id');
            values[id] = $('#step-3 #'+nid+ ' #' + id).val();
        }
        values['annee'] =an;
        tresoreries.push(values);
    });

     tab5.find('.tab-pane').each(function(){
            var an = $(this).data('id');
            var nid = $(this).prop('id');
            var inputs = $(this).find('input');
            var values = {};
            for (var i=0; i < inputs.length; i++) {
                var id = inputs[i].getAttribute('id');
                values[id] = $('#step-5 #'+nid+ ' #' + id).val();
            }
            values['annee'] =an;
            reparts.push(values);
        });

     var fincapitalsocial ={};
    var inputs= $('#fincapitalsocial').find('input');
    for(var i=0;i<inputs.length; i++){
        var id = inputs[i].getAttribute('id');
        fincapitalsocial[id]=$('#step-5 #' + id).val();
    }
    var montage = {};
    montage.montant = $('#montant_investissement').val();
    montage.bfr = $('#bfr').val();
    var moyens = [];
    $('.cell').each(function(){
        if($.isNumeric($(this).text())){
            elt = {};
            elt.moyen_id = $(this).data('id');
            elt.montant = $(this).text();
            moyens.push(elt);
        }
    });
    var spinHandle_firstProcess = loadingOverlay.activate();
    $.ajax({
        url:saveUrl,
        dataType:'json',
        type:'post',
        data:{_csrf:$('input[name="_token"]').val(),montage:montage, resultats:resultats,bilans:bilans,tresoreries:tresoreries,reparts:reparts,fincapitalsocial:fincapitalsocial, moyens:moyens,token:$('#projet_token').val()},
        beforeSend:function(xhr){
             xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());

         },
        success:function(data){
            //console.log(data);
            window.location.replace(redirectUrl+data.token);
        },
        Error:function(){
             loadingOverlay.cancel(spinHandle_firstProcess);
             alert('Une erreur est survenue lors de l\'enregistrement du dossier. Verifiez que toutes les informations sont saisies correctement !!!');
        }
    });
  });

</script>
<script>
    $('#nbsim').change(function(){
    var html ='';
    var html1 ='';
     var html_bilan_header='';
     var html_bilan_body ='';
     var html_flux_body ='';
     var html_flux_header ='';
     var html_repart_header='';
     var html_repart_body='';
    var an = $('#current').val();
    var nb =$('#nbsim').val();
    if(nb>0){
    //console.log(nb);
        for(var i=0; i<nb;i++){

        k=parseInt(i)+1;
        var cl ='nav-link';
        var cl1 ='';
        if(i==0){
            cl="active nav-link";
            cl1="active";
        }
       // console.log(i);

       html_bilan_header = html_bilan_header + ' <li role="presentation" class="nav-item">'+
                            '<a class="'+ cl +'" href="#n2'+ k +'" role="tab" id="tab2'+ k +'" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span>'+ an +' </a>'
                            +'</li>';

         html_flux_header = html_flux_header + ' <li role="presentation" class="nav-item">'+
                            '<a class="'+ cl +'" href="#n3'+ k +'" role="tab" id="tab3'+ k +'" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span>'+ an +' </a>'
                            +'</li>';

       html_repart_header = html_repart_header + ' <li role="presentation" class="nav-item">'+
                            '<a class="'+ cl +'" href="#n5'+ k +'" role="tab" id="tab5'+ k +'" data-toggle="tab" aria-controls="n5" aria-expanded="false"><span class=""></span>'+ an +' </a>'
                            +'</li>';

        html = html + ' <li role="presentation" class="nav-item">'+
                              '<a class="'+ cl +'" href="#n'+ k +'" role="tab" id="tab'+ k +'" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span>'+ an +' </a>'
                       +'</li>';


        html_repart_body = html_repart_body + '<div class="tab-pane ' + cl1 +'" role="tabpanel" id="n5'+k+'" data-id="'+an+'" aria-labelledby="tab5'+k+'">'
                                                                                               + '<div id="repart3" class="row">'
                                                                                                  + '<div class="col-md-6 col-sm-12">'
                                                                                                     +  '<div class="form-group">'
                                                                                                          + '<label for="investissement">MONTANT INVESTI</label>'
                                                                                                          + '<input class="form-control" type="number" id="investissement"/>'
                                                                                                      +'</div>'
                                                                                                   +'</div>'
                                                                                                   +'<div class="col-md-6 col-sm-12">'
                                                                                                     +  '<div class="form-group">'
                                                                                                       +    '<label for="cession">CESSION D\'ACTIF</label>'
                                                                                                           +'<input class="form-control" type="number" id="cession"/>'
                                                                                                      + '</div>'
                                                                                                   +'</div>'
                                                                                               +'</div>'
                                                                                           +'</div>';

        html1 = html1 + '<div class="tab-pane ' + cl1 +'" role="tabpanel" id="n'+ k +'" aria-labelledby="tab'+ k +'" data-id="'+ an +'">'

        +'<fieldset id="compte'+ k +'" class="cr">'
                +'<legend>COMPTE DE RESULTAT</legend>'
                  +'<div class="section">'

                +'<div class="row">'
                    +'<div class="col-md-4">'
                        +'<div class="form-group">'
                            +'<label for="ca">CHIFFRE D\'AFFAIRE</label>'
                            +'<input type="number" id="ca" data-input="ca" class="form-control"/>'
                        +'</div>'
                   +'</div>'
                    +'<div class="col-md-3">'
                       + '<div class="form-group">'
                           +'<label for="cv">CHARGES VARIABLES </label>'
                           +'<input type="number" id="cv" data-input="cv" class="form-control"/>'
                       + '</div>'
                   + '</div>'
                   + '<div class="col-md-3">'
                      +  '<div class="form-group">'
                          +  '<label for="cf">CHARGES FIXES</label>'
                           + '<input type="number" id="cf" data-input="cf" class="form-control"/>'
                       + '</div>'
                    +'</div>'
                    +'<div class="col-md-2">'
                       + '<div class="form-group">'
                           + '<label for="taxes">IMPOTS ET TAXES</label>'
                            +'<input type="number" id="taxes" data-input="taxes" class="form-control"/>'
                       + '</div>'
                    +'</div>'
                +'</div>'
                +'<div class="row">'
                   + '<div class="col-md-3">'
                       + '<div class="form-group">'
                           + '<label for="pi">PRODUCTION IMMOBILISEE</label>'
                           + '<input type="number" id="pi" data-input="pi" class="form-control"/>'
                       + '</div>'
                   + '</div>'

                    +'<div class="col-md-3">'
                       + '<div class="form-group">'
                            +'<label for="ps">PRODUCTION STOCKEE</label>'
                           + '<input type="number" id="ps" data-input="ps" class="form-control"/>'
                       + '</div>'
                    +'</div>'
                    +'<div class="col-md-3">'
                       + '<div class="form-group">'
                            +'<label for="sp">SUBVENTION D\'EXPLOITATION</label>'
                            +'<input type="number" id="sp" data-input="sp" class="form-control"/>'
                        +'</div>'
                    +'</div>'
                   + '<div class="col-md-3">'
                       + '<div class="form-group">'
                          +  '<label for="ape">AUTRES PRODUITS D\'EXPLOITATION</label>'
                           + '<input type="number" id="ape" data-input="ape" class="form-control"/>'
                        +'</div>'
                    +'</div>'

                +'</div>'
               + '<div class="row">'
                    +'<div class="col-md-3">'
                        +'<div class="form-group">'
                            +'<label for="pf">PRODUIT FINANCIER</label>'
                            +'<input type="number" id="pf" data-input="pf" class="form-control"/>'
                        +'</div>'
                    +'</div>'

                    +'<div class="col-md-3">'
                        +'<div class="form-group">'
                            +'<label for="cfi">CHARGES FINANCIERES</label>'
                            +'<input type="number" id="cfi" data-input="cfi" class="form-control"/>'
                        +'</div>'
                    +'</div>'
                    +'<div class="col-md-3">'
                        +'<div class="form-group">'
                            +'<label for="pe">PRODUIT EXCEPTIONNEL</label>'
                            +'<input type="number" id="pe" data-input="pe" class="form-control"/>'
                        +'</div>'
                    +'</div>'
                    +'<div class="col-md-3">'
                        +'<div class="form-group">'
                            +'<label for="ce">CHARGES EXCEPTIONNELLES</label>'
                            +'<input type="number" id="ce" data-input="ce" class="form-control"/>'
                        +'</div>'
                    +'</div>'

                +'</div>'

                +'<div class="row">'
                    +'<div class="col-md-4">'
                        +'<div class="form-group">'
                            +'<label for="dap">DAP</label>'
                            +'<input type="number" id="dap" data-input="dap" class="form-control"/>'
                        +'</div>'
                    +'</div>'
                    +'<div class="col-md-3">'
                        +'<div class="form-group">'
                            +'<label for="salaires">SALAIRES</label>'
                            +'<input type="number" id="salaires" data-input="salaires" class="form-control"/>'
                        +'</div>'
                    +'</div>'
                    +'<div class="col-md-3">'
                        +'<div class="form-group">'
                            +'<label for="participations">PARTICIPATION DES TRAVAILLEURS</label>'
                            +'<input type="number" id="participations" data-input="participations" class="form-control"/>'
                        +'</div>'
                    +'</div>'

                    +'<div class="col-md-2">'
                        +'<div class="form-group">'
                            +'<label for="impots">IMPOTS</label>'
                            +'<input type="number" id="impots" data-input="impots" class="form-control"/>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</div>'
            +'</fieldset>'
            +'</div>';


            html_bilan_body = html_bilan_body

            + '<div class="tab-pane ' + cl1 +'" role="tabpanel" id="n2'+ k +'" aria-labelledby="tab2'+ k +'" data-id="'+ an +'">'

                                                                +'<fieldset>'
                                                                 +'<legend>ACTIF</legend>'
                                                                 +'<div class="row">'
                                                                     +'<div class="col-md-3 col-sm-12">'
                                                                        +'<div class="form-group">'
                                                                             +'<label for="frais_developpement" title="Frais de développement et de prospection">Frais de dév. et de prospection</label>'
                                                                             +'<input type="number" class="form-control" id="frais_developpement" title="Frais de développement et de prospection"/>'
                                                                         +'</div>'
                                                                     +'</div>'
                                                                     +'<div class="col-md-3 col-sm-12">'
                                                                         +'<div class="form-group">'
                                                                             +'<label for="brevets" title="Brevets, licences, logiciels, et droits assimilaires">Brevets, licences, logiciels,...</label>'
                                                                             +'<input type="number" class="form-control" id="brevets" title="Brevets, licences, logiciels, et droits assimilaires"/>'
                                                                         +'</div>'
                                                                     +'</div>'
                                                                     +'<div class="col-md-3 col-sm-12">'
                                                                         +'<div class="form-group">'
                                                                             +'<label for="fonds_commercial" title="Fonds commercial et droit au bail">Fonds commercial et droit au bail</label>'
                                                                             +'<input type="number" class="form-control" id="fonds_commercial" title="Fonds commercial et droit au bail"/>'
                                                                         +'</div>'
                                                                     +'</div>'
                                                                     +'<div class="col-md-3 col-sm-12">'
                                                                         +'<div class="form-group">'
                                                                             +'<label for="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles">AUTRES IMMO. INCORP.</label>'
                                                                             +'<input type="number" class="form-control" id="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles"/>'
                                                                         +'</div>'
                                                                     +'</div>'
                                                                 +'</div>'
                                                                     +'<hr/>'
                                                                     +'<div class="row">'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                + '<label for="terrains">TERRAIN</label>'
                                                                                 +'<input type="number" class="form-control" id="terrains"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                        + '<div class="col-md-4 col-sm-12">'
                                                                            + '<div class="form-group">'
                                                                                 +'<label for="batiments">BATIMENTS</label>'
                                                                                 +'<input type="number" class="form-control" id="batiments"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="amenagements" title="Aménagements, agencements et installations">AMENAGEMENTS, AGENCEM. ET INSTAL.</label>'
                                                                                 +'<input type="number" class="form-control" id="amenagements" title="Aménagements, agencements et installations"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                            + '<div class="form-group">'
                                                                                 +'<label for="materiel_mobilier">MATERIEL, MOBILIER</label>'
                                                                                 +'<input type="number" class="form-control" id="materiel_mobilier"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="materiel_transport">Materiel de transport</label>'
                                                                                 +'<input type="number" class="form-control" id="materiel_transport"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="avances_acomptes">AVANCES ET ACOMPTES VERSES,...</label>'
                                                                                 +'<input type="number" class="form-control" id="avances_acomptes"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                     +'</div>'


                                                                     +'<hr/>'
                                                                    +'<div class="row">'

                                                                            +'<div class="col-md-6 col-sm-12">'
                                                                            + '<div class="form-group">'
                                                                                + '<label for="titres_participation">Titres de participation</label>'
                                                                                 +'<input type="number" class="form-control" id="titres_participation"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-6 col-sm-12">'
                                                                            + '<div class="form-group">'
                                                                                 +'<label title="Autres immobilisations financières" for="autres_immobilisations_financieres">Autres immo. financières</label>'
                                                                                 +'<input title="Autres immobilisations financières" type="number" class="form-control" id="autres_immobilisations_financieres"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                    +'</div>'


                                                                     +'<hr/>'
                                                                     +'<div class="row">'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="actif_circulant_hao">ACTIF CIRCULANT HAO</label>'
                                                                                 +'<input type="number" class="form-control" id="actif_circulant_hao"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="stocks_encours">STOCK ET ENCOURS</label>'
                                                                                 +'<input type="number" class="form-control" id="stocks_encours"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                +'<label for="creances_emplois">CRÉANCES ET EMPLOIS ASSIMILÉS</label>'
                                                                                 +'<input type="number" class="form-control" id="creances_emplois"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="avances_fournisseurs">FOURNISSEURS AVANCES VERSEES</label>'
                                                                                 +'<input type="number" class="form-control" id="avances_fournisseurs"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                            + '<div class="form-group">'
                                                                                + '<label for="clients">CLIENTS</label>'
                                                                                 +'<input type="number" class="form-control" id="clients"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="autres_creances">AUTRES CREANCES</label>'
                                                                                 +'<input type="number" class="form-control" id="autres_creances"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                     +'</div>'
                                                                     +'<hr/>'
                                                                     +'<div class="row">'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="titres_placement">TITRES DE PLACEMENT</label>'
                                                                                 +'<input type="number" class="form-control" id="titres_placement"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="valeur_encaisser">VALEURS  A ENCAISSER</label>'
                                                                                 +'<input type="number" class="form-control" id="valeur_encaisser"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="banques_cheques_">BANQUES, CHEQUES POSTAUX,...</label>'
                                                                                 +'<input type="number" class="form-control" id="banques_cheques_"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="ecart_conversion_actif">ECART DE CONVERSION</label>'
                                                                                 +'<input type="number" class="form-control" id="ecart_conversion_actif"/>'
                                                                             +'</div>'
                                                                         +'</div>'

                                                                     +'</div>'


                                                             +'</fieldset>'
                                                             + '<fieldset>'
                                                                                +'<legend>PASSIF</legend>'
                                                                                +'<div class="row">'
                                                                                    +'<div class="col-md-3 col-sm-12">'
                                                                                        +'<div class="form-group">'
                                                                                            +'<label for="capital">CAPITAL</label>'
                                                                                            +'<input type="number" class="form-control" id="capital"/>'
                                                                                        +'</div>'
                                                                                    +'</div>'
                                                                                    +'<div class="col-md-3 col-sm-12">'
                                                                                        +'<div class="form-group">'
                                                                                            +'<label for="apporteurs_acpital_non_appele">CAPITAL NON APPELE</label>'
                                                                                            +'<input type="number" class="form-control" id="apporteurs_acpital_non_appele"/>'
                                                                                        +'</div>'
                                                                                    +'</div>'
                                                                                    +'<div class="col-md-3 col-sm-12">'
                                                                                        +'<div class="form-group">'
                                                                                            +'<label for="primes_apport">PRIMES D\'APPORT D\'EMISSION</label>'
                                                                                            +'<input type="number" class="form-control" id="primes_apport"/>'
                                                                                        +'</div>'
                                                                                    +'</div>'
                                                                                    +'<div class="col-md-3 col-sm-12">'
                                                                                        +'<div class="form-group">'
                                                                                            +'<label for="ecarts_reevaluation">ECART DE REEVALUAT.</label>'
                                                                                            +'<input type="number" class="form-control" id="ecarts_reevaluation"/>'
                                                                                        +'</div>'
                                                                                    +'</div>'
                                                                                +'</div>'

                                                                                    +'<div class="row">'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                           + '<div class="form-group">'
                                                                                                +'<label for="reserves_indisponibles">RESERVES DISPONIBLES</label>'
                                                                                                +'<input type="number" class="form-control" id="reserves_indisponibles"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="reserves_libres">RESERVES LIBRES</label>'
                                                                                                +'<input type="number" class="form-control" id="reserves_libres"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="report_a_nouveau">REPORT A NOUVEAU</label>'
                                                                                                +'<input type="number" class="form-control" id="report_a_nouveau"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="resultat_net_exercice">RESULTAT NET DE L\'EXERCICE</label>'
                                                                                                +'<input type="number" class="form-control" id="resultat_net_exercice"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'

                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="subventions_investissement">Subventions d\'investissement</label>'
                                                                                                +'<input type="number" class="form-control" id="subventions_investissement"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'

                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="provisions_reglementees">Provisions réglementés</label>'
                                                                                                +'<input type="number" class="form-control" id="provisions_reglementees"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                    +'</div>'

                                                                                    +'<hr/>'
                                                                                    +'<div class="row">'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="emprunts">EMPRUNTS</label>'
                                                                                                +'<input type="number" class="form-control" id="emprunts"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="dettes_location_acquisition">Dettes de location acquisition</label>'
                                                                                                +'<input type="number" class="form-control" id="dettes_location_acquisition"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="provisions_financieres_risques_">Provisions financières pour risques et charges</label>'
                                                                                                +'<input type="number" class="form-control" id="provisions_financieres_risques_"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                    +'</div>'
                                                                                    +'<div class="row">'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="dettes_circulantes_hao">Dettes circulantes HAO</label>'
                                                                                                +'<input type="number" class="form-control" id="dettes_circulantes_hao"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="clients_avances_recues">Clients avances reçues</label>'
                                                                                                +'<input type="number" class="form-control" id="clients_avances_recues"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="fournisseurs_exploitation" title="Fournisseurs d\'exploitation">Fournisseurs d\'exploitation</label>'
                                                                                                +'<input type="number" class="form-control" id="fournisseurs_exploitation"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                    +'</div>'

                                                                                    +'<div class="row">'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="dettes_fiscales">Dettes fiscales et sociales</label>'
                                                                                                +'<input type="number" class="form-control" id="dettes_fiscales"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-4 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="autres_dettes">Autres dettes</label>'
                                                                                                +'<input type="number" class="form-control" id="autres_dettes"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-3 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="banques_credit_escompte" title="Banques, crédits d\'escomptes et de trésorerie">Banques, crédits d\'escomptes et de trésorerie</label>'
                                                                                                +'<input type="number" class="form-control" id="banques_credit_escompte"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                        +'<div class="col-md-3 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="banques_credit_tresorerie" title="Banques, crédits de trésorerie">BBanques, crédits de trésorerie</label>'
                                                                                                +'<input type="number" class="form-control" id="banques_credit_tresorerie"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'

                                                                                        +'<div class="col-md-3 col-sm-12">'
                                                                                            +'<div class="form-group">'
                                                                                                +'<label for="ecart_conversion_passif">ECART DE CONVERSION</label>'
                                                                                                +'<input type="number" class="form-control" id="ecart_conversion_passif"/>'
                                                                                            +'</div>'
                                                                                        +'</div>'
                                                                                    +'</div>'
                                                                            +'</fieldset>'
                                                            +'</div>';

       html_flux_body = html_flux_body
                       +'<div class="tab-pane '+ cl1 +'" role="tabpanel" id="n3'+ k +'" aria-labelledby="tab3'+ k +'" data-id="'+ an +'">'
                                                                 +'<fieldset>'
                                                                 +'<legend>FLUX DE TRESORERIE</legend>'
                                                                     +'<div class="row">'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="capacite_autofinancement" title="Capacité d\'Autufinancement Globale (CAFG)">Capacité d\'Autufinancement</label>'
                                                                                 +'<input type="number" class="form-control" id="capacite_autofinancement" title=""/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="actif_circulant_hao" title="Actif circulant HAO">Actif circulant HAO</label>'
                                                                                 +'<input type="number" class="form-control" id="actif_circulant_hao" title="Actif circulant HAO"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="variation_stocks" title="Variation des stocks">Variation des stocks</label>'
                                                                                 +'<input type="number" class="form-control" id="variation_stocks" title="Variation des stocks"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="variation_creances" title="Variation des créances et emplois assimilés">Variation des créances</label>'
                                                                                 +'<input type="number" class="form-control" id="variation_creances" title="Variation des créances et emplois assimilés"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                     +'</div>'

                                                                     +'<div class="row">'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="variation_passif_circulant" title=" Variation du passif circulant"> Variation du passif circulant</label>'
                                                                                 +'<input type="number" class="form-control" title=" Variation du passif circulant" id="variation_passif_circulant"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label title="Décaissements liés aux acquisitions d\'immobilisations incorporelles" for="decaissements_acquisitions_incorporelles">Décaissements - acquisitions d\'immo incorporelles</label>'
                                                                                 +'<input type="number" title="Décaissements liés aux acquisitions d\'immobilisations incorporelles" class="form-control" id="decaissements_acquisitions_incorporelles"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="decaissements_acquisitions_corporelles" title="Décaissements liés aux acquisitions d\'immobilisations incorporelles">Décaissements - acquisitions d\'immo corporelles</label>'
                                                                                 +'<input type="number" class="form-control" id="decaissements_acquisitions_corporelles" title="Décaissements liés aux acquisitions d\'immobilisations incorporelles"/>'
                                                                             +'</div>'
                                                                         +'</div>'

                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="decaissements_acquisitions_financieres" title="Décaissements liés aux acquisitions d\'immobilisations financières">Décaissements - acquisitions d\'immo financières</label>'
                                                                                 +'<input type="number" class="form-control" id="decaissements_acquisitions_financieres" title="Décaissements liés aux acquisitions d\'immobilisations financières"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="cessions_immo_incoporelles_corporelles" title="Cessions d\'immobilisations incorporelles et corporelles">Cessions d\'immo incorp. - corp</label>'
                                                                                 +'<input type="number" class="form-control" id="cessions_immo_incoporelles_corporelles" title="Cessions d\'immobilisations incorporelles et corporelles"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label title="Cessions d\'immobilisations financières" for="cessions_immo_financieres">Cessions d\'immo financières</label>'
                                                                                 +'<input type="number" title="Cessions d\'immobilisations financières" class="form-control" id="cessions_immo_financieres"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label title="Augmentation de capital par apports nouveaux" for="augmentation_capital_apports_nouveaux">Augmentation de capital par apports nouveaux</label>'
                                                                                 +'<input title="Augmentation de capital par apports nouveaux" type="number" class="form-control" id="augmentation_capital_apports_nouveaux"/>'
                                                                             +'</div>'
                                                                         +'</div>'

                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label title="Subventions d\'investissements reçues" for="subventions_investissement_recues">Subventions d\'investissements reçues</label>'
                                                                                 +'<input title="Subventions d\'investissements reçues" type="number" class="form-control" id="subventions_investissement_recues"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-4 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label title="Prélèvements sur le capital" for="prevelements_capital">Prélèvements sur le capital</label>'
                                                                                 +'<input type="number" class="form-control" id="prevelements_capital" title="Prélèvements sur le capital"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label for="distribution_dividendes" title="Distribution des dividendes">Distribution des dividendes</label>'
                                                                                 +'<input title="Distribution des dividendes" type="number" class="form-control" id="distribution_dividendes"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label title="Emprunts"  for="emprunts">Emprunts</label>'
                                                                                 +'<input type="number" class="form-control" title="Emprunts" id="emprunts"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label title="Autres dettes financières" for="autres_dettes_financieres">Autres dettes financières</label>'
                                                                                 +'<input title="Autres dettes financières" type="number" class="form-control" id="autres_dettes_financieres"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                         +'<div class="col-md-3 col-sm-12">'
                                                                             +'<div class="form-group">'
                                                                                 +'<label title="Remboursements des emprunts et autres dettes financières" for="remboursement_emprunts">Remboursements des emprunts</label>'
                                                                                 +'<input title="Remboursements des emprunts et autres dettes financières" type="number" class="form-control" id="remboursement_emprunts"/>'
                                                                             +'</div>'
                                                                         +'</div>'
                                                                     +'</div>'



                                                             +'</fieldset>'
                                                            +'</div>';


        an = parseInt(an) + 1;
        }
            // console.log($(html_bilan_body));
             $('#step-1').find('ul.nav-header').html(html);
             $('#step-2').find('ul.nav-header').html(html_bilan_header);
             $('#step-3').find('ul.nav-header').html(html_flux_header);
             $('#step-5').find('ul.nav-header').html(html_repart_header);
             $('#step-1 #myTabContent').html(html1);
             $('#step-2 #myTabContent').html(html_bilan_body);
             $('#step-3 #myTabContent').html(html_flux_body);
             $('#step-5 #myTabContent').html(html_repart_body);
              $('input[type="Number"]').val(0);
    }


    });

var inArray = function(needle, haystack){
    var length = haystack.length;
    for(var i =0; i<length; i++){
        if(haystack[i]==needle) return true;
    }
    return false;
};

var ids = [];
 var found = false;
 var val =0;
 var id = 20;
$('.cell').keyup(function(e){

        if($.isNumeric($(this).text().trim())){
          val= val + parseInt($(this).text());

         id = $(this).data('id');
        //var ids = [1,3,4,5,7,9,10];
            if (id == 1 || id == 3 || id == 4 || id == 5 || id == 7 || id == 9 || id == 10) {
                found = true;
                if(!(ids.indexOf(id)>-1)){
                    ids.push(id);
                }
            }
        }else{
            var index = ids.indexOf(id);
            if(index>-1){
                ids.splice(ids.indexOf(id),1);
            }

        }

        if(ids.length>0){
                $('#next1').show();
                $('#btn-save1').hide();
              if(inArray(1,ids)){

                    $('#acapital').show().css({
                    'display':'block'
                    });
                    console.log(1);

                }else{

                    $('#capital').hide();

                    $('#capital input').val('');
                    console.log(-1);
                }


              if(inArray(3,ids)){

                  $('#emp_oblig').show();
                  console.log(3);

              }else{
                  $('#emp_oblig').hide();
                  $('.ob').val('');
                  console.log(-3);
              }


              if(inArray(4,ids)){

                  $('#mlt').show();
                  console.log(4);

              }else{
                  $('#mlt').hide();
                  $('.mlt').val('');
                  console.log(-4);
              }

              if(inArray(5,ids)){

                  $('#credbail').show();
                  console.log(5);

              }else{
                  $('#credbail').hide();
                  $('#credbail input').val();
                  console.log(-5);
              }

              if(inArray(7,ids)){

                  $('#escompte').show();
                  console.log(7);
              }else{
                  $('#escompte').hide();
                  $('#escompte input').val('');
                  console.log(-7);
              }


              if(inArray(9,ids)){
                  $('#affacturage').show();
                  console.log(9);
              }else{
                  $('#affacturage').hide();
                  console.log(-9);
              }


              if(inArray(10,ids)){

                  $('#billet_treso').show();
                  console.log(10);
              }else{
                  $('#billet_treso').hide();
                  console.log(-10);
              }

              $('#head_step-5').show();

           // $('#head_step-7').text('7');
                /*$('#step-5').show()
                .css({
                    'display':'none'
                });*/

        }else{
            $('#head_step-5').hide();
            $('#next1').hide();
            $('#btn-save1').show();
        }



       /* $('.cell').each(function(){
            if($.isNumeric($(this).text().trim())){
                val= val + parseInt($(this).text());

                var id = $(this).data('id');
              //var ids = [1,3,4,5,7,9,10];
                  if (id == 1 || id == 3 || id == 4 || id == 5 || id == 7 || id == 9 || id == 10) {
                      found = true;
                      ids.push(id);
                  }
              }
        });*/

        console.log(ids);








        /*if(found){



        }else{
            $('#head_step-5').hide();
            $('#step-5').hide();
        }*/

    });

$('.oblig_choice').click(function(){


        $('.oblig-section').hide();
        $('#oblig_section_'+$(this).data('id')).show();

});

    $('.mlt_choice').click(function(){


        $('.mlt-section').hide();
        $('.mlt').val('');
        $('#mlt_section_'+$(this).data('id')).show();

    });

    $('.credbail_choice').click(function(){


        $('.credbail-section').hide();
        $('.credbail').val('');
        $('#credbail_section_'+$(this).data('id')).show();

    });



</script>


<style>
         div.note-editor.note-frame{
                    padding: 0;
                }
         .note-frame .btn-default {
                    color: #222;
                    background-color: #FFF;
                    border-color: none;
         }

         legend{
         margin-bottom: 0;
         border-bottom: none;
         }

         .panel{
         box-shadow: none;
         }



         /* custom inclusion of right, left and below tabs */

         .tabs-below > .nav-tabs,
         .tabs-right > .nav-tabs,
         .tabs-left > .nav-tabs {
           border-bottom: 0;
         }



         .tabs-below > .nav-tabs,
         .tabs-right > .nav-tabs,
         .tabs-left > .nav-tabs {
           border-bottom: 0;
         }

         .tab-content > .tab-pane,
         .pill-content > .pill-pane {
           display: none;
         }

         .tab-content > .active,
         .pill-content > .active {
           display: block;
         }

         .tabs-below > .nav-tabs {
           border-top: 1px solid #ddd;
         }

         .tabs-below > .nav-tabs > li {
           margin-top: -1px;
           margin-bottom: 0;
         }

         .tabs-below > .nav-tabs > li > a {
           -webkit-border-radius: 0 0 4px 4px;
              -moz-border-radius: 0 0 4px 4px;
                   border-radius: 0 0 4px 4px;
         }

         .tabs-below > .nav-tabs > li > a:hover,
         .tabs-below > .nav-tabs > li > a:focus {
           border-top-color: #ddd;
           border-bottom-color: transparent;
         }

         .tabs-below > .nav-tabs > .active > a,
         .tabs-below > .nav-tabs > .active > a:hover,
         .tabs-below > .nav-tabs > .active > a:focus {
           border-color: transparent #ddd #ddd #ddd;
         }

         .tabs-left > .nav-tabs > li,
         .tabs-right > .nav-tabs > li {
           float: none;
         }

         .tabs-left > .nav-tabs > li > a,
         .tabs-right > .nav-tabs > li > a {
           min-width: 74px;
           margin-right: 0;
           margin-bottom: 3px;
         }

         .tabs-left > .nav-tabs {
           float: left;
           margin-right: 19px;
           border-right: 1px solid #ddd;
         }

         .tabs-left > .nav-tabs > li > a {
           margin-right: -1px;
           -webkit-border-radius: 4px 0 0 4px;
              -moz-border-radius: 4px 0 0 4px;
                   border-radius: 4px 0 0 4px;
         }

         .tabs-left > .nav-tabs > li > a:hover,
         .tabs-left > .nav-tabs > li > a:focus {
           border-color: #eeeeee #dddddd #eeeeee #eeeeee;
         }

         .tabs-left > .nav-tabs .active > a,
         .tabs-left > .nav-tabs .active > a:hover,
         .tabs-left > .nav-tabs .active > a:focus {
           border-color: #ddd transparent #ddd #ddd;
           *border-right-color: #ffffff;
         }

         .tabs-right > .nav-tabs {
           float: right;
           margin-left: 19px;
           border-left: 1px solid #ddd;
         }

         .tabs-right > .nav-tabs > li > a {
           margin-left: -1px;
           -webkit-border-radius: 0 4px 4px 0;
              -moz-border-radius: 0 4px 4px 0;
                   border-radius: 0 4px 4px 0;
         }

         .tabs-right > .nav-tabs > li > a:hover,
         .tabs-right > .nav-tabs > li > a:focus {
           border-color: #eeeeee #eeeeee #eeeeee #dddddd;
         }

         .tabs-right > .nav-tabs .active > a,
         .tabs-right > .nav-tabs .active > a:hover,
         .tabs-right > .nav-tabs .active > a:focus {
           border-color: #ddd #ddd #ddd transparent;
           *border-left-color: #ffffff;
         }

</style>