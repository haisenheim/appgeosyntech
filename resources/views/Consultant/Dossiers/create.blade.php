@extends('......layouts.consultant')

@section('content')
    <div class="md-container">
        <div class="widget">
            <div class="widget-header">
                <h5 class=""><i class="fa fa-user"></i> NOUVEAU DOSSIER</h5>
            </div>
            <div class="widget-content">
                <form enctype="multipart/form-data" class="form" action="{{route('consultant.dossiers.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="card-header">
                            <h3>NOUVEAU DOSSIER</h3>
                            <hr/>

                            <div class="progress" style="display:none;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">

                                </div>
                            </div>

                            <hr/>

                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                        <p>Informations generales</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                        <p>Identification des risques</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                        <p>Diagnostic Financier</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                        <p>Fin de creation</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form role="form" action="" method="post">

                                    <div class="setup-content" id="step-1">
                                        <div class="card">

                                            <div class="card-header">
                                                <h3>INFORMATIONS GENERALES</h3>
                                            </div>
                                            <div class="card-body">
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
                                                            <label class="control-label">MONTANT A LEVER EN FCFA</label>
                                                            <input id="montant" name="montant" maxlength="100" type="number" required="required" class="form-control" placeholder="Saisir le code du dossier">
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
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <div>
                                                            <label for="photo">IMAGE DU PROJET</label>
                                                            <input type="file" id="photo" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="btn-div card-footer">
                                                <button class="btn btn-primary nextBtn btn-sm pull-right btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </div>



                                    </div>


                                    <div class="setup-content" id="step-2">

                                        <div class="card">
                                            <div class="card-header">
                                                <h3> IDENTIFICATION DES RISQUES</h3>
                                            </div>
                                            <div class="card-body">
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
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-primary prevBtn btn-sm pull-left btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> Precedent</button>
                                                <button class="btn btn-primary nextBtn btn-sm pull-right btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="setup-content" id="step-3">

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 style="" class="section-title text-center">DIAGNOSTIC FINANCIER</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-regular">
                                                <ul class="nav nav-tabs " id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="compte-tab" data-toggle="tab" href="#compte" role="tab" aria-controls="compte" aria-selected="true">COMPTE D'EXPLOITATION</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="equilibres-tab" data-toggle="tab" href="#equilibre" role="tab" aria-controls="equilibre" aria-selected="false">GRANDS EQUILIBRES FINANCIERS</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="ratios-tab" data-toggle="tab" href="#ratios" role="tab" aria-controls="ratios" aria-selected="false">QUELQUES RATIOS</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="compte" role="tabpanel" aria-labelledby="compte-tab">
                                            <div class="card">
                                            <div class="card-header">
                                                <h3>COMPTE D'EXPLOITATION</h3>
                                            </div>
                                            <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <legend>CHIFFRES D'AFFAIRE</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee1</label>
                                                                    <input id="ca1" name="ca1" maxlength="200" type="text" required="required" class="form-control" placeholder="Chiffre d'affaire Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee2</label>
                                                                    <input id="ca2" name="ca2" maxlength="200" type="text" required="required" class="form-control" placeholder="Chiffre d'affaire Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee2</label>
                                                                    <input id="ca3" name="ca3" maxlength="200" type="text" required="required" class="form-control" placeholder="Chiffre d'affaire Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <legend>CHARGES VARIABLES</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="cv1" name="cv1" maxlength="200" type="text" required="required" class="form-control" placeholder="Charges variables Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="cv2" name="cv2" maxlength="200" type="text" required="required" class="form-control" placeholder="Charges variables Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="cv3" name="cv3" maxlength="200" type="text" required="required" class="form-control" placeholder="Charges variables Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <legend>CHARGES FIXES</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="cf1" name="cf1" maxlength="200" type="text" required="required" class="form-control" placeholder="Charges fixes Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="cf2" name="cf2" maxlength="200" type="text" required="required" class="form-control" placeholder="Charges fixes Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="cf3" name="cf3" maxlength="200" type="text" required="required" class="form-control" placeholder="Charges fixes Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <fieldset>
                                                        <legend>SALAIRES</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="salaires1" name="cf1" maxlength="200" type="text" required="required" class="form-control" placeholder="salaires Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="salaires2" name="cf2" maxlength="200" type="text" required="required" class="form-control" placeholder="Salaires Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="salaires3" name="cf3" maxlength="200" type="text" required="required" class="form-control" placeholder="Salaires Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <fieldset>
                                                        <legend>Dotations aux amortissements et provisions</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="dap1" name="dap1" maxlength="200" type="number" required="required" class="form-control" placeholder="DAP Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="dap2" name="dap2" maxlength="200" type="number" required="required" class="form-control" placeholder="DAP Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="dap3" name="dap3" maxlength="200" type="number" required="required" class="form-control" placeholder="DAP Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <fieldset>
                                                        <legend>PRODUITS FINANCIERS</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="pf1" name="pf1" maxlength="200" type="number" required="required" class="form-control" placeholder="PF. Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="pf2" name="pf2" maxlength="200" type="number" required="required" class="form-control" placeholder="PF. Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="pf3" name="pf3" maxlength="200" type="number" required="required" class="form-control" placeholder="PF. Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <fieldset>
                                                        <legend>CHARGES FINANCIERES</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="cfi1" name="cfi1" maxlength="200" type="number" required="required" class="form-control" placeholder="CFi Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="cfi2" name="cfi2" maxlength="200" type="number" required="required" class="form-control" placeholder="CFi Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="cfi3" name="cfi3" maxlength="200" type="number" required="required" class="form-control" placeholder="CFi Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <fieldset>
                                                        <legend>PRODUIT EXCEPTIONNEL</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="pe1" name="pe1" maxlength="200" type="number" required="required" class="form-control" placeholder="PE. Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="pe2" name="pe2" maxlength="200" type="number" required="required" class="form-control" placeholder="PE. Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="pe3" name="pe3" maxlength="200" type="number" required="required" class="form-control" placeholder="PE. Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <fieldset>
                                                        <legend>CHARGES EXCEPTIONNELLES</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="ce1" name="ce1" maxlength="20" type="number" required="required" class="form-control" placeholder="CE Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="ce2" name="ce2" maxlength="20" type="number" required="required" class="form-control" placeholder="CE Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="ce3" name="ce3" maxlength="20" type="number" required="required" class="form-control" placeholder="CE Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <fieldset>
                                                        <legend>IMPOTS</legend>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 1</label>
                                                                    <input id="impots1" name="impots1" maxlength="20" type="number" required="required" class="form-control" placeholder="Impots Annee 1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 2</label>
                                                                    <input id="impots2" name="impots2" maxlength="20" type="number" required="required" class="form-control" placeholder="Impots Annee 2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Annee 3</label>
                                                                    <input id="impots3" name="impots3" maxlength="20" type="number" required="required" class="form-control" placeholder="Impots Annee 3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            </div>

                                            </div>

                                            </div>
                                            <div class="tab-pane fade" id="equilibre" role="tabpanel" aria-labelledby="equilibres-tab">
                                                <div class="card">
                                                    <div class="card-header"><h3> GRANDS EQUILIBRES FINANCIERS</h3></div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-6">
                                                                <fieldset>
                                                                    <legend>RESSOURCES DURABLES</legend>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 1</label>
                                                                                <input id="ress_durable1" name="ress_dur1" maxlength="20" type="number" required="required" class="form-control" placeholder="Ress. Annee 1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 2</label>
                                                                                <input id="ress_durable2" name="ress_dur2" maxlength="20" type="number" required="required" class="form-control" placeholder="Ress. Annee 2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 3</label>
                                                                                <input id="ress_durable3" name="ress_dur3" maxlength="20" type="number" required="required" class="form-control" placeholder="Ress. Annee 3">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                <fieldset>
                                                                    <legend>ACTIFS IMMOBILISES</legend>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 1</label>
                                                                                <input id="actifs_immo1" name="actifs_immo1" maxlength="20" type="number" required="required" class="form-control" placeholder="Actifs Immo. Annee 1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 2</label>
                                                                                <input id="actifs_immo2" name="actifs_immo2" maxlength="20" type="number" required="required" class="form-control" placeholder="Actifs Immo. Annee 2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 3</label>
                                                                                <input id="actifs_immo3" name="actifs_immo3" maxlength="20" type="number" required="required" class="form-control" placeholder="Actifs Immo. Annee 3">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-6">
                                                                <fieldset>
                                                                    <legend>CREANCES</legend>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 1</label>
                                                                                <input id="creances1" name="creances1" maxlength="20" type="number" required="required" class="form-control" placeholder="Creances Annee 1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 2</label>
                                                                                <input id="creances2" name="creances2" maxlength="20" type="number" required="required" class="form-control" placeholder="Creances Annee 2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 3</label>
                                                                                <input id="creances3" name="creances3" maxlength="20" type="number" required="required" class="form-control" placeholder="Creances Annee 3">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                <fieldset>
                                                                    <legend>STOCKS</legend>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 1</label>
                                                                                <input id="stocks1" name="stocks1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 2</label>
                                                                                <input id="stocks2" name="stocks2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 3</label>
                                                                                <input id="stocks3" name="stocks3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                <fieldset>
                                                                    <legend>DETTES</legend>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 1</label>
                                                                                <input id="dettes1" name="dettes1" maxlength="20" type="number" required="required" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 2</label>
                                                                                <input id="dettes2" name="dettes2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Annee 3</label>
                                                                                <input id="dettes3" name="dettes3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="ratios" role="tabpanel" aria-labelledby="ratios-tab">
                                            <div class="card">
                                            <div class="card-header"><h4>QUELQUES RATIOS</h4></div>
                                            <div class="card-body">
                                            <div class="row">
                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>CAPITAUX PROPRES</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="capitaux_propres1" name="capitaux_propres1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="capitaux_propres2" name="capitaux_propres2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="capitaux_propres3" name="capitaux_propres3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>RATIO D'AUTONOMIE FINANCIERE</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="ratio_auto_fin1" name="ratio_auto_fin1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="ratio_auto_fin2" name="ratio_auto_fin2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="ratio_auto_fin3" name="ratio_auto_fin3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>RATIO D'ENDETTEMENT NET</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="ratio_endettement_net1" name="ratio_endettement_net1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="ratio_endettement_net2" name="ratio_endettement_net2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="ratio_endettement_net3" name="ratio_endettement_net3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>RATIO DE LIQUIDITE GENERALE</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="ratio_liquidite_gen1" name="ratio_liquidite_gen1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="ratio_liquidite_gen2" name="ratio_liquidite_gen2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="ratio_liquidite_gen3" name="ratio_liquidite_gen3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>RATIO DE COUVERTURE DES EMPLOIS STABLES</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="ratio_couv_emploi_stables1" name="ratio_couv_emploi_stables1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="ratio_couv_emploi_stables2" name="ratio_couv_emploi_stables2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="ratio_couv_emploi_stables3" name="ratio_couv_emploi_stables3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>RATIO DE VETUSTE DES IMMOBILISATIONS</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="ratio_vetuite_immo1" name="ratio_vetuite_immo1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="ratio_vetuite_immo2" name="ratio_vetuite_immo2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="ratio_vetuite_immo3" name="ratio_vetuite_immo3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>DELAIS DE PAIEMENT DES CLIENTS</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="delais_paie_clients1" name="delais_paie_clients1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="delais_paie_clients2" name="delais_paie_clients2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="delais_paie_clients3" name="delais_paie_clients3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>DELAIS DE PAIEMENT DES FOURNISSEURS</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="delais_paie_frn1" name="delais_paie_frn1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="delais_paie_frn2" name="delais_paie_frn2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="delais_paie_frn3" name="delais_paie_frn3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>


                                            <div class="col-sm-12 col-md-4">
                                                <fieldset>
                                                    <legend>RENTABILITE DES CAPITAUX PROPRES</legend>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 1</label>
                                                                <input id="rentabilite_capitaux_propres1" name="rentabilite_capitaux_propres1" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 2</label>
                                                                <input id="rentabilite_capitaux_propres2" name="rentabilite_capitaux_propres2" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Annee 3</label>
                                                                <input id="rentabilite_capitaux_propres3" name="rentabilite_capitaux_propres3" maxlength="20" type="number" required="required" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-primary prevBtn btn-sm pull-left btn-rounded" type="button"><i class="fa fa-arrow-left"></i> Precedent</button>
                                                <button class="btn btn-primary nextBtn btn-sm pull-right btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row setup-content" id="step-4">
                                        <div class="card">
                                            <div class="col-md-12">
                                                <div class="card-header">
                                                    <h3 class="text-center">CONCLUSION</h3>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        Pour Conclure cette étape, bien vouloir vous rapprocher du Cabinet OBAC
                                                        qui mettra à votre disposition un consultant charge de vous accompagner dans le processus
                                                        de normalisation de votre dossier.
                                                        </p>
                                                        <p>
                                                        Vous avez amorce la première étape du processus OBAC-ALERTE,
                                                        grâce à un consultant OBAC, vous pourrez la conclure en rédigeant les observations faites issues cette analyse interne.

                                                        </p>
                                                    <div class="">
                                                        <h3>Termes de la relation avec OBAC </h3>
                                                        <p>En cliquant le bouton Enregistrer:</p>
                                                        <ul class="list-unstyled arrow">
                                                            <li class="">
                                                                J'atteste que les informations transmises par ce formulaires sont
                                                            </li>
                                                            <li>
                                                                Ces informations sont librement mises a la disposition du Cabinet OBAC pour traitement du present dossier
                                                            </li>
                                                            <li>
                                                                Je ........
                                                            </li>
                                                        </ul>

                                                        <label class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="agree"/>
                                                            <span class="custom-control-label">J'accepte</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="btn-div">
                                                        <button class="btn btn-primary prevBtn btn-sm pull-left btn-rounded" type="button"><i class="fa fa-arrow-left"></i> Precedent</button>
                                                        <button style="display: none" id="btn-save" class="btn btn-success btn-sm pull-right btn-rounded" type="submit"><i class="fa fa-save"></i> Enregister</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>


                    <br/>
                    <div>
                        <button class="btn btn-block btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                    </div>
                </form>
            </div>
        </div>


    </div>


@endsection