@extends('......layouts.owner')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header p-20">
                <h3 class=""> NOUVEAU DOSSIER</h3>
            </div>
            <div class="card-body">
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

                                                         <div class="col-md-6 col-sm-12">
                                                             <div class="form-group">
                                                                 <label class="control-label">CLASSE  PROJET (Variante)</label>
                                                                 <select class="form-control" name="variante_id" id="variante_id">
                                                                    @foreach($variantes as $p)
                                                                       <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                                                    @endforeach
                                                                 </select>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-6 col-sm-12">
                                                             <div class="form-group">
                                                                 <label class="control-label">TYPE DE FINANCEMENT</label>
                                                                 <select class="form-control" name="tprojet_id" id="tprojet_id">
                                                                    @foreach($tprojets as $p)
                                                                       <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                                                    @endforeach
                                                                 </select>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-6 col-sm-12">
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
                                               <textarea name="businessmodel" id="businessmodel" cols="30" rows="10"></textarea>



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
                                        <div class="card">
                                            <div class="card-header  d-flex p-0">
                                                <h4 class="card-title p-3">DIAGNOSTIC FINANCIER</h4>
                                                    <ul style="margin-left: auto" class="nav nav-pills ml-auto p-2" id="objTabs" role="tablist">
                                                         <li role="presentation" class="nav-item">
                                                             <a class="nav-link active" href="#n1" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span> <?= date('Y') - 1 ?></a>
                                                         </li>

                                                         <li role="presentation" class="nav-item">
                                                             <a class="nav-link" href="#n2" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> <?= date('Y') - 2 ?></a>
                                                         </li>
                                                         <li role="presentation" class="nav-item">
                                                             <a class="nav-link " href="#n3" role="tab" id="tab3" data-toggle="tab" aria-controls="n3" aria-expanded="false"><span class=""></span> <?= date('Y') - 3 ?></a>
                                                         </li>

                                                    </ul>
                                            </div>

                                             <div class="df card-body" id="df">
                                                    <div class="tab-content" id="myTabContent">

                                                    <div class="tab-pane active " role="tabpanel" id="n1" aria-labelledby="tab1">

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

                                                        <!--  SAISIE DU BILAN   -->

                                                         <fieldset id="bilan1" class="bilan">
                                                            <legend>BILAN</legend>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ress_durable">RESSOURCES DURABLES</label>
                                                                        <input type="number" class="form-control" id="ress_durable" data-input="ress_durable"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="actifs_immo">EMPLOIS DURABLES</label>
                                                                        <input type="number" class="form-control" id="actifs_immo" data-input="actifs_immo"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="creances">CREANCES</label>
                                                                        <input type="number" class="form-control" id="creances" data-input="creances"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes">DETTES</label>
                                                                        <input type="number" class="form-control" id="dettes" data-input="dettes"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="stocks">STOCK</label>
                                                                        <input type="number" class="form-control" id="stocks" data-input="stocks"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <div class="tab-pane fade" role="tabpanel" id="n2" aria-labelledby="tab2">

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
                                                         <!--  SAISIE DU BILAN   -->

                                                         <fieldset id="bilan2" class="bilan">
                                                            <legend>BILAN</legend>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ress_durable">RESSOURCES DURABLES</label>
                                                                        <input type="number" class="form-control" id="ress_durable" data-input="ress_durable"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="actifs_immo">EMPLOIS DURABLES</label>
                                                                        <input type="number" class="form-control" id="actifs_immo" data-input="actifs_immo"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="creances">CREANCES</label>
                                                                        <input type="number" class="form-control" id="creances" data-input="creances"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes">DETTES</label>
                                                                        <input type="number" class="form-control" id="dettes" data-input="dettes"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="stocks">STOCK</label>
                                                                        <input type="number" class="form-control" id="stocks" data-input="stocks"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="tab-pane fade" role="tabpanel" id="n3" aria-labelledby="tab3">

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
                                                        <!--  SAISIE DU BILAN   -->

                                                         <fieldset id="bilan3" class="bilan">
                                                            <legend>BILAN</legend>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ress_durable">RESSOURCES DURABLES</label>
                                                                        <input type="number" class="form-control" id="ress_durable" data-input="ress_durable"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="actifs_immo">EMPLOIS DURABLES</label>
                                                                        <input type="number" class="form-control" id="actifs_immo" data-input="actifs_immo"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="creances">CREANCES</label>
                                                                        <input type="number" class="form-control" id="creances" data-input="creances"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="dettes">DETTES</label>
                                                                        <input type="number" class="form-control" id="dettes" data-input="dettes"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="stocks">STOCK</label>
                                                                        <input type="number" class="form-control" id="stocks" data-input="stocks"/>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>

                                                    </div>


                                                    </div>

                                                    <div class="btn-div card-footer text-center">
                                                        <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                       <button id="btn-save" class="btn btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                                                    </div>
                                                </div>

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

      <script type="text/javascript" src="{{ asset('js') }}"></script>

    <script>

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
                                    html+='<div class="col-lg-4 col-md-4 col-sm-12"><h6 style="font-weight: 900">'+prs[j].question.name+'</h6><div class="choices">';
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





        $('#btn-save').click(function(e){

            e.preventDefault();

                var init = document.getElementById('step-1');

                var inputs = init.getElementsByTagName('input');
                var values = {};

                for (var i=0; i < inputs.length; i++) {
                    var id = inputs[i].getAttribute('id');
                    values[id] = $('#' + id).val();

                }
                values['type_id'] = $('#tprojet_id').val();
                values['ville_id'] = $('#ville_id').val();

                var bm = $('#businessmodel').val();

                var compte1 = document.getElementById('compte1');

                var cr1inputs = compte1.getElementsByTagName('input');
                var cr1 = {};
                for (var i=0; i < cr1inputs.length; i++) {
                    var id = cr1inputs[i].getAttribute('id');
                    cr1[id] = $('#compte1 #' + id).val();
                }

                var compte2 = document.getElementById('compte2');
                var cr2inputs = compte2.getElementsByTagName('input');
                var cr2 = {};
                for (var i=0; i < cr2inputs.length; i++) {
                    var id = cr2inputs[i].getAttribute('id');
                    cr2[id] = $('#compte2 #' + id).val();
                }
                var compte3 = document.getElementById('compte3');
                var cr3inputs = compte3.getElementsByTagName('input');
                var cr3 = {};
                for (var i=0; i < cr3inputs.length; i++) {
                    var id = cr3inputs[i].getAttribute('id');
                    cr3[id] = $('#compte3 #' + id).val();
                }
                var bilan1 = document.getElementById('bilan1');
                var bil1inputs = bilan1.getElementsByTagName('input');
                var bil1 = {};
                for (var i=0; i < bil1inputs.length; i++) {
                    var id = bil1inputs[i].getAttribute('id');
                    bil1[id] = $('#bilan1 #' + id).val();
                }
                var bilan2 = document.getElementById('bilan2');
                var bil2inputs = bilan2.getElementsByTagName('input');
                var bil2 = {};
                for (var i=0; i < bil2inputs.length; i++) {
                    var id = bil2inputs[i].getAttribute('id');
                    bil2[id] = $('#bilan2 #' + id).val();
                }
                var bilan3 = document.getElementById('bilan3');
                var bil3inputs = bilan3.getElementsByTagName('input');
                var bil3 = {};
                for (var i=0; i < bil1inputs.length; i++) {
                    var id = bil3inputs[i].getAttribute('id');
                    bil3[id] = $('#bilan3 #' + id).val();
                }

                var url = '/owner/dossier/initJson';
                var redirectUrl = '/owner/dossiers';

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
                    data:{_csrf:$('input[name="_token"]').val(), answers:reponses, dossier:values,produits:produits,bm:bm,bil1:bil1,bil2:bil2,bil3:bil3,
                    compte1:cr1, compte2:cr2,compte3:cr3
                    },
                    beforeSend:function(xhr){
                        xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
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