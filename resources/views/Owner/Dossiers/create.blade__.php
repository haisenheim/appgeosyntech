@extends('layouts.owner')

@section('content')
    <div class="md-container">
        <div class="widget">
            <div class="widget-header">
                <h5 class=""><i class="fa fa-user"></i> NOUVEAU DOSSIER</h5>
            </div>
            <div class="widget-content">
                <form enctype="multipart/form-data" class="form" action="{{route('owner.dossiers.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                        <p>Informations generales</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                        <p>CONVENTION DE CONFIDENTIALITE</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                        <p>MODELE ECONOMIQUE</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                        <p>ANALYSE DES RISQUES</p>
                                    </div>
                                    <div class="stepwizard-step">
                                         <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                                         <p>DIAGNOSTIC FINANCIER</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <form role="form" action="" method="post">

                                    <div class="setup-content" id="step-1">
                                        <div class="">

                                            <fieldset>
                                                <legend>DONNEES GENERALES</legend>
                                                    <div class="row">
                                                         <div class="col-md-5">
                                                             <div class="form-group">
                                                                 <label class="control-label">INTITULE DU PROJET</label>
                                                                 <input id="name" name="name" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                                             </div>
                                                         </div>
                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">CODE/NUMERO</label>
                                                                 <input id="code" name="name" maxlength="100" type="text" required="required" class="form-control" placeholder="Saisir le code du dossier">
                                                             </div>
                                                         </div>
                                                         <div class="col-md-4">
                                                             <div class="form-group">
                                                                 <label class="control-label">COUT DU PROJET</label>
                                                                 <input id="montant" name="montant" maxlength="100" type="number" required="required" class="form-control" placeholder="Saisir le code du dossier">
                                                             </div>
                                                         </div>

                                                         <div class="col-md-5 col-sm-12">
                                                             <div class="form-group">
                                                                 <label class="control-label">TYPE DE PROJET</label>
                                                                 <select class="form-control" name="tprojet_id" id="tprojet_id">
                                                                    @foreach($tprojets as $p)
                                                                       <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                                                    @endforeach
                                                                 </select>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-4 col-sm-12">
                                                             <div class="form-group">
                                                                 <label class="control-label">VILLE</label>
                                                                 <select class="form-control" name="ville_id" id="ville_id">
                                                                    @foreach($villes as $p)
                                                                       <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                                                    @endforeach
                                                                 </select>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-3">
                                                             <div class="form-group" style="margin-top: 25px;">
                                                                 <label class="control-label">OVERTURE DU CAPITAL</label>
                                                                 <input id="capital" name="capital"  type="checkbox" required="required" class="">
                                                             </div>
                                                         </div>


                                                     </div>
                                                     <hr/>

                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label class="control-label">REPRESENTANT</label>
                                                                 <input id="representant" name="montant" maxlength="250" type="text" required="required" class="form-control" placeholder="Personne de ressource du dossier">
                                                             </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label class="control-label">ADRESSE</label>
                                                                 <input id="address" name="address" maxlength="100" type="text" required="required" class="form-control" placeholder="Saisir l'adresse de la personne ressource">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="row">
                                                         <div class="col-md-4">
                                                             <div class="form-group">
                                                                 <label class="control-label">TELEPHONE</label>
                                                                 <input id="phone" name="phone" maxlength="50" type="text" required="required" class="form-control" placeholder="Saisir ici les contacts telephoniques">
                                                             </div>
                                                         </div>
                                                         <div class="col-md-5">
                                                             <div class="form-group">
                                                                 <label class="control-label">EMAIL</label>
                                                                 <input id="email" name="email" maxlength="100" type="email" required="required" class="form-control" placeholder="Saisir l'adresse email">
                                                             </div>
                                                         </div>

                                                     </div>

                                            <div class="btn-div card-footer text-center">
                                               <button class="btn btn-primary nextBtn btn-sm  btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                          </div>

                                            </fieldset>
                                        </div>
                                    </div>

                             <div class="setup-content" id="step-2">

                                   <div class="">
                                       <fieldset>
                                            <legend>VALIDATION DE LA CONVENTION DE CONFIDENTIALITE</legend>

                                            <p>Mettre la convention de confientialite ici !!!</p>

                                            <div class="btn-div card-footer text-center">
                                               <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                               <button class="btn btn-primary nextBtn btn-sm  btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                          </div>
                                       </fieldset>
                                   </div>
                               </div>
                               <div class="setup-content" id="step-3">

                                      <div class="">
                                          <fieldset>
                                               <legend>DESCRIPTION DU MODELE ECONOMIQUE</legend>
                                               <textarea name="businessmodel" id="" cols="30" rows="10"></textarea>



                                          <div class="btn-div card-footer text-center">
                                               <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                               <button class="btn btn-primary nextBtn btn-sm  btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                          </div>
                                          </fieldset>


                                      </div>
                                  </div>
                                    <div class="setup-content" id="step-4">

                                        <div class="">
                                            <fieldset>
                                                <legend>ANALYSE PRELIMINAIRE DES RISQUES</legend>

                                            <div class="">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                        <div>
                                                            <label for="sector_id">Secteur d'activite</label>
                                                            <select name="sector_id" id="sector_id" class="form-control">

                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                        <div>
                                                            <div>
                                                                <label for="produit_id">Produit/Service</label>
                                                                <select name="produit_id" id="produit_id" class="form-control">

                                                                </select>
                                                            </div>
                                                            <div>
                                                                <ul class="list-inline" id="list-produit">

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="section" id="section-4">
                                                        <h5 class="page-header">QUESTIONNAIRE</h5>
                                                    </div>
                                                </div>
                                                <div class="btn-div card-footer text-center">
                                                    <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                    <button class="btn btn-primary nextBtn btn-sm  btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </div>

                                            </fieldset>
                                        </div>

                                    </div>

                                    <div class="setup-content" id="step-5">

                                        <div class="">
                                            <fieldset>
                                                <legend>DIAGNOSTIC FINANCIER</legend>
                                                <div class="">
                                                    <div class="row">

                                                        <div class="col-md-2 col-sm-12">
                                                            <div>
                                                                <div class="form-group">
                                                                    <label for="nbsim">PLAGE DES SAISIES</label>
                                                                    <input  class="form-control" type="text" id="nbsim" value="5"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-md-offset-3 col-sm-12">
                                                            <ul class="nav nav-tabs pull-right" style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                                                                <li role="presentation" class="active">
                                                                    <a href="#n1" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span> <?= date('Y') - 1 ?></a>
                                                                </li>

                                                                <li role="presentation" class="">
                                                                    <a href="#n2" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> <?= date('Y') - 2 ?></a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a href="#n3" role="tab" id="tab3" data-toggle="tab" aria-controls="n3" aria-expanded="false"><span class=""></span> <?= date('Y') - 3 ?></a>
                                                                </li>
                                                                <li role="presentation" class="">
                                                                    <a href="#n4" role="tab" id="tab4" data-toggle="tab" aria-controls="n4" aria-expanded="false"><span class=""></span> <?= date('Y') - 4 ?></a>
                                                                </li>

                                                                <li role="presentation" class="">
                                                                    <a href="#n5" role="tab" id="tab5" data-toggle="tab" aria-controls="n5" aria-expanded="false"><span class=""></span> <?= date('Y') - 5 ?></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                    <div class="tab-content" id="myTabContent">

                                                    <div class="tab-pane fade active in" role="tabpanel" id="n1" aria-labelledby="tab1">

                                                        <fieldset>
                                                            <legend>COMPTE DE RESULTAT</legend>
                                                             <div class="section">

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="ca1">CHIFFRE D'AFFAIRE</label>
                                                                            <input type="number" id="ca1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="cv1">CHARGES VARIABLES </label>
                                                                            <input type="number" id="cv1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="cf1">CHARGES FIXES</label>
                                                                            <input type="number" id="cf1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="taxes1">IMPOTS ET TAXES</label>
                                                                            <input type="number" id="taxes1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="pi1">PRODUCTION IMMOBILISEE</label>
                                                                            <input type="number" id="pi1" class="form-control"/>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="ps1">PRODUCTION STOCKEE</label>
                                                                            <input type="number" id="ps1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="sp1">SUBVENTION D'EXPLOITATION</label>
                                                                            <input type="number" id="sp1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="ape1">AUTRES PRODUITS D'EXPLOITATION</label>
                                                                            <input type="number" id="ape1" class="form-control"/>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="pf1">PRODUIT FINANCIER</label>
                                                                            <input type="number" id="pf1" class="form-control"/>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="cfi1">CHARGES FINANCIERES</label>
                                                                            <input type="number" id="cfi1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="pe1">PRODUIT EXCEPTIONNEL</label>
                                                                            <input type="number" id="pe1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="ce1">CHARGES EXCEPTIONNELLES</label>
                                                                            <input type="number" id="ce1" class="form-control"/>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="dap1">DOTATIONS AUX AMORTISSEMENTS ET PROVISIONS</label>
                                                                            <input type="number" id="dap1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="salaires1">SALAIRES</label>
                                                                            <input type="number" id="salaires1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="participations1">PARTICIPATION DES TRAVAILLEURS</label>
                                                                            <input type="number" id="participations1" class="form-control"/>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="impots1">IMPOTS</label>
                                                                            <input type="number" id="impots1" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>

                                                        <!--  SAISIE DU BILAN   -->

                                                         <fieldset>
                                                            <legend>BILAN</legend>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ress_durable1">RESSOURCES DURABLES</label>
                                                                        <input type="number" class="form-control" id="ress_durable1"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="actifs_immo1">EMPLOIS DURABLES</label>
                                                                        <input type="number" class="form-control" id="actifs_immo1"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="creances1">CREANCES</label>
                                                                        <input type="number" class="form-control" id="creances1"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes1">DETTES</label>
                                                                        <input type="number" class="form-control" id="dettes1"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="stocks1">STOCK</label>
                                                                        <input type="number" class="form-control" id="stocks1"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>



                                                    </div>

                                                    <div class="tab-pane fade" role="tabpanel" id="n2" aria-labelledby="tab2">

                                                        <fieldset>
                                                            <legend>COMPTE DE RESULTAT</legend>
                                                            <div class="section">

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="ca2">CHIFFRE D'AFFAIRE</label>
                                                                        <input type="number" id="ca2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cv2">CHARGES VARIABLES </label>
                                                                        <input type="number" id="cv2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cf2">CHARGES FIXES</label>
                                                                        <input type="number" id="cf2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="taxes2">IMPOTS ET TAXES</label>
                                                                        <input type="number" id="taxes2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pi2">PRODUCTION IMMOBILISEE</label>
                                                                        <input type="number" id="pi2" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ps2">PRODUCTION STOCKEE</label>
                                                                        <input type="number" id="ps2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="sp2">SUBVENTION D'EXPLOITATION</label>
                                                                        <input type="number" id="sp2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ape2">AUTRES PRODUITS D'EXPLOITATION</label>
                                                                        <input type="number" id="ape2" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pf2">PRODUIT FINANCIER</label>
                                                                        <input type="number" id="pf2" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cfi2">CHARGES FINANCIERES</label>
                                                                        <input type="number" id="cfi2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pe2">PRODUIT EXCEPTIONNEL</label>
                                                                        <input type="number" id="pe2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ce2">CHARGES EXCEPTIONNELLES</label>
                                                                        <input type="number" id="ce2" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="dap2">DOTATIONS AUX AMORTISSEMENTS ET PROVISIONS</label>
                                                                        <input type="number" id="dap2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="salaires2">SALAIRES</label>
                                                                        <input type="number" id="salaires2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="participations2">PARTICIPATION DES TRAVAILLEURS</label>
                                                                        <input type="number" id="participations2" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="impots2">IMPOTS</label>
                                                                        <input type="number" id="impots2" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        </fieldset>
                                                         <!--  SAISIE DU BILAN   -->

                                                         <fieldset>
                                                            <legend>BILAN</legend>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ress_durable2">RESSOURCES DURABLES</label>
                                                                        <input type="number" class="form-control" id="ress_durable2"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="actifs_immo2">EMPLOIS DURABLES</label>
                                                                        <input type="number" class="form-control" id="actifs_immo2"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="creances2">CREANCES</label>
                                                                        <input type="number" class="form-control" id="creances2"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes2">DETTES</label>
                                                                        <input type="number" class="form-control" id="dettes2"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="stocks2">STOCK</label>
                                                                        <input type="number" class="form-control" id="stocks2"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="tab-pane fade" role="tabpanel" id="n3" aria-labelledby="tab3">

                                                        <fieldset>
                                                            <legend>COMPTE DE RESULTAT</legend>
                                                            <div class="section">

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="ca3">CHIFFRE D'AFFAIRE</label>
                                                                        <input type="number" id="ca3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cv3">CHARGES VARIABLES </label>
                                                                        <input type="number" id="cv3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cf3">CHARGES FIXES</label>
                                                                        <input type="number" id="cf3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="taxes3">IMPOTS ET TAXES</label>
                                                                        <input type="number" id="taxes3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pi3">PRODUCTION IMMOBILISEE</label>
                                                                        <input type="number" id="pi3" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ps3">PRODUCTION STOCKEE</label>
                                                                        <input type="number" id="ps3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="sp3">SUBVENTION D'EXPLOITATION</label>
                                                                        <input type="number" id="sp3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ape3">AUTRES PRODUITS D'EXPLOITATION</label>
                                                                        <input type="number" id="ape3" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pf3">PRODUIT FINANCIER</label>
                                                                        <input type="number" id="pf3" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cfi3">CHARGES FINANCIERES</label>
                                                                        <input type="number" id="cfi3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pe3">PRODUIT EXCEPTIONNEL</label>
                                                                        <input type="number" id="pe3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ce3">CHARGES EXCEPTIONNELLES</label>
                                                                        <input type="number" id="ce3" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="dap3">DOTATIONS AUX AMORTISSEMENTS ET PROVISIONS</label>
                                                                        <input type="number" id="dap3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="salaires3">SALAIRES</label>
                                                                        <input type="number" id="salaires3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="participations3">PARTICIPATION DES TRAVAILLEURS</label>
                                                                        <input type="number" id="participations3" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="impots3">IMPOTS</label>
                                                                        <input type="number" id="impots3" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        </fieldset>
                                                        <!--  SAISIE DU BILAN   -->

                                                         <fieldset>
                                                            <legend>BILAN</legend>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ress_durable3">RESSOURCES DURABLES</label>
                                                                        <input type="number" class="form-control" id="ress_durable3"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="actifs_immo3">EMPLOIS DURABLES</label>
                                                                        <input type="number" class="form-control" id="actifs_immo3"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="creances3">CREANCES</label>
                                                                        <input type="number" class="form-control" id="creances3"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes3">DETTES</label>
                                                                        <input type="number" class="form-control" id="dettes3"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="stocks3">STOCK</label>
                                                                        <input type="number" class="form-control" id="stocks3"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>

                                                    </div>

                                                    <div class="tab-pane fade" role="tabpanel" id="n4" aria-labelledby="tab4">
                                                        <fieldset>
                                                            <legend>COMPTE DE RESULTAT</legend>
                                                            <div class="section">

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="ca4">CHIFFRE D'AFFAIRE</label>
                                                                        <input type="number" id="ca4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cv4">CHARGES VARIABLES </label>
                                                                        <input type="number" id="cv4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cf4">CHARGES FIXES</label>
                                                                        <input type="number" id="cf4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="taxes4">IMPOTS ET TAXES</label>
                                                                        <input type="number" id="taxes4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pi4">PRODUCTION IMMOBILISEE</label>
                                                                        <input type="number" id="pi4" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ps4">PRODUCTION STOCKEE</label>
                                                                        <input type="number" id="ps4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="sp4">SUBVENTION D'EXPLOITATION</label>
                                                                        <input type="number" id="sp4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ape4">AUTRES PRODUITS D'EXPLOITATION</label>
                                                                        <input type="number" id="ape4" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pf4">PRODUIT FINANCIER</label>
                                                                        <input type="number" id="pf4" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cfi4">CHARGES FINANCIERES</label>
                                                                        <input type="number" id="cfi4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pe4">PRODUIT EXCEPTIONNEL</label>
                                                                        <input type="number" id="pe4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ce4">CHARGES EXCEPTIONNELLES</label>
                                                                        <input type="number" id="ce4" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="dap4">DOTATIONS AUX AMORTISSEMENTS ET PROVISIONS</label>
                                                                        <input type="number" id="dap4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="salaires4">SALAIRES</label>
                                                                        <input type="number" id="salaires4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="participations4">PARTICIPATION DES TRAVAILLEURS</label>
                                                                        <input type="number" id="participations4" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="impots4">IMPOTS</label>
                                                                        <input type="number" id="impots4" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </fieldset>
                                                         <!--  SAISIE DU BILAN   -->

                                                         <fieldset>
                                                            <legend>BILAN</legend>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ress_durable4">RESSOURCES DURABLES</label>
                                                                        <input type="number" class="form-control" id="ress_durable4"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="actifs_immo4">EMPLOIS DURABLES</label>
                                                                        <input type="number" class="form-control" id="actifs_immo4"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="creances4">CREANCES</label>
                                                                        <input type="number" class="form-control" id="creances4"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes4">DETTES</label>
                                                                        <input type="number" class="form-control" id="dettes4"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="stocks4">STOCK</label>
                                                                        <input type="number" class="form-control" id="stocks4"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <div class="tab-pane fade" role="tabpanel" id="n5" aria-labelledby="tab5">


                                                        <fieldset>
                                                            <legend>COMPTE DE RESULTAT</legend>
                                                            <div class="section">

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="ca5">CHIFFRE D'AFFAIRE</label>
                                                                        <input type="number" id="ca5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cv5">CHARGES VARIABLES </label>
                                                                        <input type="number" id="cv5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cf5">CHARGES FIXES</label>
                                                                        <input type="number" id="cf5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="taxes5">IMPOTS ET TAXES</label>
                                                                        <input type="number" id="taxes5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pi5">PRODUCTION IMMOBILISEE</label>
                                                                        <input type="number" id="pi5" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ps5">PRODUCTION STOCKEE</label>
                                                                        <input type="number" id="ps5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="sp5">SUBVENTION D'EXPLOITATION</label>
                                                                        <input type="number" id="sp5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ape5">AUTRES PRODUITS D'EXPLOITATION</label>
                                                                        <input type="number" id="ape5" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pf5">PRODUIT FINANCIER</label>
                                                                        <input type="number" id="pf5" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="cfi5">CHARGES FINANCIERES</label>
                                                                        <input type="number" id="cfi5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="pe5">PRODUIT EXCEPTIONNEL</label>
                                                                        <input type="number" id="pe5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ce5">CHARGES EXCEPTIONNELLES</label>
                                                                        <input type="number" id="ce5" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="dap5">DOTATIONS AUX AMORTISSEMENTS ET PROVISIONS</label>
                                                                        <input type="number" id="dap5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="salaires5">SALAIRES</label>
                                                                        <input type="number" id="salaires5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="participations5">PARTICIPATION DES TRAVAILLEURS</label>
                                                                        <input type="number" id="participations5" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="impots5">IMPOTS</label>
                                                                        <input type="number" id="impots5" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        </fieldset>
                                                        <!--  SAISIE DU BILAN   -->

                                                         <fieldset>
                                                            <legend>BILAN</legend>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ress_durable5">RESSOURCES DURABLES</label>
                                                                        <input type="number" class="form-control" id="ress_durable5"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="actifs_immo5">EMPLOIS DURABLES</label>
                                                                        <input type="number" class="form-control" id="actifs_immo5"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="creances5">CREANCES</label>
                                                                        <input type="number" class="form-control" id="creances5"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes5">DETTES</label>
                                                                        <input type="number" class="form-control" id="dettes5"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="stocks5">STOCK</label>
                                                                        <input type="number" class="form-control" id="stocks5"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>

                                                    </div>
                                                    </div>

                                                    </div>
                                                    <div class="btn-div card-footer text-center">
                                                        <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                       <button class="btn btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <style>

        .loader {
                position: relative;
                text-align: center;
                margin: 15px auto 35px auto;
                z-index: 9999;
                display: block;
                width: 80px;
                height: 80px;
                border: 10px solid rgba(0, 0, 0, .3);
                border-radius: 50%;
                border-top-color: #000;
                animation: spin 1s ease-in-out infinite;

                -webkit-animation-name: spin;
                -webkit-animation-duration: 600ms;
                -webkit-animation-timing-function: ease-in-out;
                -webkit-animation-iteration-count: infinite;
            }

            @keyframes spin {
               from{
                   transform: rotate(0deg);
               }
                to {
                    -webkit-transform: rotate(360deg);
                }
            }

            @-webkit-keyframes spin {
                to {
                    -webkit-transform: rotate(360deg);
                }
            }


            /** MODAL STYLING **/

            .modal-content {
                border-radius: 0px;
                box-shadow: 0 0 20px 8px rgba(0, 0, 0, 0.7);
            }

            .modal-backdrop.show {
                opacity: 0.75;
            }

            .loader-txt {
            p {
                font-size: 13px;
                color: #666;
            small {
                font-size: 11.5px;
                color: #999;
            }
            }
            }



        div.note-editor.note-frame{
            padding: 0;
        }
      .note-frame .btn-default {
            color: #222;
            background-color: #FFF;
            border-color: none;
        }
    </style>
    <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

    <script type="text/javascript">
        $(document).ready(function() {
          $('textarea').summernote({
            height: 300,
            tabsize: 2,
            followingToolbar: true,
            lang:'fr-FR'
          });
        });
      </script>

    <script>


         var orm = 'http://localhost/ormsys/api/';

                $(document).ready(function() {

                    var sectors=[];

                    $.ajax({
                        url:orm+'sectors/list',
                        type:'Get',
                        dataType:'json',
                        success:function(data){
                            var html = '<option>CHOIX DU SECTEUR</option>';
                            for(var i=0;i<data.length;i++){
                                html=html+'<option value='+ data[i].id+'>'+ data[i].name +'</option>'
                            }

                            $('#sector_id').html(html);
                        }
                    });

                    $.ajax({
                        url:orm+'produits/list',
                        type:'Get',
                        dataType:'json',
                        success:function(data){
                            var html = '<option>CHOIX DU PRODUIT/SERVICE</option>';
                            for(var i=0;i<data.length;i++){
                                html=html+'<option value='+ data[i].id+'>'+ data[i].name +'</option>'
                            }

                            $('#produit_id').html(html);
                        }
                    });

                });


           $("#sector_id").on('change',function(){
                   // console.log($("#sector_id").val());
                   $.ajax({
                       url:orm+'produits/get-by-sectorid?id='+$('#sector_id').val(),
                       type:'Get',
                       dataType:'Json',
                       success: function(data){
                           $("#produit_id").html("");
                           var option = '<option value="0">Selectionner un produit</option>';
                           var dat =data;
                           for(var i=0; i<dat.length;i++ ){

                               option=option+'<option value='+ dat[i].id +'>'+ dat[i].name +'</option>';

                               $("#produit_id").html(option);
                           }

                       }
                   });
               });


         $("#produit_id").on('change', function(){

                var list = $('#list-produit');
                var idp = $("#produit_id").val();
                var pn = $("#produit_id option:selected").text();
                list.prepend('<li class="list-item badge remove-item" data-id='+ idp+'>'+ pn +'</li>');

                $.ajax({
                    url:orm+'produits/questions?id='+$('#produit_id').val(),
                    type:'Get',
                    dataType:'Json',
                    success: function(qt){

                        var html='<div id="sect'+idp+'"'+' style="padding: 15px; border: solid 0.6px #cccccc; border-radius: 4px"> <h6 class="page-header" style="font-weight: 700">'+$("#produit_id option:selected").text()+'</h6><div class="">';
                        var qt =Object.entries(qt);

                        for(var i=0; i<qt.length;i++){

                            //console.log(qt[i]);

                            var risque=qt[i][0];
                            var prs = qt[i][1];

                            //  console.log(prs);
                            html+='<h6 class="page-header">'+risque+'</h6><div class="questionnaire row">';
                            for(var j=0; j<prs.length; j++){
                                console.log(prs[j].question);
                                //console()
                                if(prs[j].question!=null){
                                    html+='<div class="col-lg-4 col-md-4 col-sm-12"><h6>'+prs[j].question.name+'</h6><div class="choices">';
                                    var choices = prs[j].question.choices;
                                    // console.log(choices);
                                    html+='<ul class="list-unstyled">';
                                    for(var k=0; k<choices.length; k++){
                                        //console.log(choices[k]);
                                        html+='<li class=""><input data-id='+ choices[k].taux +' value='+ choices[k].id +' type="radio" name='+ prs[j].question.id +'>'+choices[k].name+'</li>';
                                    }
                                    html+='</ul></div></div>';
                                }

                            }
                            html+='</div>';

                        }

                        html+='</div></div>';

                        $("#section-4").append(html);


                    }
                });

                $('.remove-item').click(function(){
                    $('#sect'+$(this).data('id')).remove();
                    $(this).remove();
                });
            });



        // Gestion de la plage de saisies des etats financiers
        $('#nbsim').keyup(function(e){
            var val = parseInt($(this).val());
            if(val<3){
               $(this).val(3);
            }if(val>5){
                $(this).val(5);
            }

            val = parseInt($(this).val());

            if(val==3){
                $('#tab4').parent().css({
                    display:'none'
                });
                $('#tab5').parent().css({
                    display:'none'
                });
            }

            if(val==4){
                $('#tab4').parent().css({
                    display:'block'
                });
                $('#tab5').parent().css({
                    display:'none'
                });

            }

            if(val==5){
                $('#tab4').parent().css({
                    display:'block'
                });
                $('#tab5').parent().css({
                    display:'block'
                });
            }
        });

        $('#btn-save').click(function(e){

            e.preventDefault();

                var inputs = document.getElementsByTagName('input');
                var values = {};

                for (var i=0; i < inputs.length; i++) {
                    var id = inputs[i].getAttribute('id');
                    values[id] = $('#' + id).val();
                }

                var url = '/owner/dossier/initJson';
                var redirectUrl = '<?= $this->Url->build(['controller'=>'Dossiers','action'=>'view']) ?>';



                var reponses = [];
                var produits=[];
                $('#list-produit').find('li').each(function(){
                    produits.push($(this).data('id'));
                });

                $('.questionnaire').find('ul').find('li').find('input:checked').each(function(){
                    var elt = {};
                    elt.choice_id=$(this).val();
                    elt.question_id=$(this).prop('name');
                    reponses.push(elt);
                });

                $.ajax({
                    url:url,
                    type:'Post',
                    dataType:'JSON',
                    data:{_csrf:$('#csrf').val(), answers:reponses, dossier:values,produits:produits
                    },
                    beforeSend:function(xhr){
                        xhr.setRequestHeader('X-CSRF-Token',$('#csrf').val());
                        $("#loadMe").modal({
                            backdrop: "static", //remove ability to close modal with click
                            keyboard: false, //remove option to close with keyboard
                            show: true //Display loader!
                        });
                    },
                    success: function(data){
                        $("#loadMe").modal("hide");
                        window.location.replace(redirectUrl+"/"+data);

                    },
                    Error:function(){
                        $('#btn-save').show();
                    }
                });


        });


    </script>


@endsection