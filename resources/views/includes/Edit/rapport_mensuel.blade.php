@if($projet->bilans)
    <?php $link='dossier' ?>
@else
    <?php $link='projet' ?>
@endif

<div class="modal fade" id="reportEditModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6  class="modal-title text-center">EDITION DU RAPPORT MENSUEL DE GESTION</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
            <div class="card card-danger">
                <div class="card-body">
                    <form method="post" action="/owner/{{ $link }}/edit-report">
                        {{csrf_field()}}
                        <input type="hidden" name="projet_token" value="{{ $projet->token }}"/>
                        <div class="form-group">
                            <label for="moi_id">MOIS</label>
                            <select name="moi_id" id="moi_id" class="form-control">
                                @foreach($mois as $m)
                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">MOT DE BIENVENU</h4>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">COMPTE DE RESULTAT</h4>
                            </div>
                            <div class="card-body">
                                <div class="section">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ca">CHIFFRE D'AFFAIRE</label>
                                                <input type="number" id="ca" data-input="ca" name="ca" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cv">CHARGES VARIABLES </label>
                                                <input type="number" id="cv" data-input="cv" name="cv" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cf">CHARGES FIXES</label>
                                                <input type="number" id="cf" data-input="cf" name="cf" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="taxes">IMPOTS ET TAXES</label>
                                                <input type="number" id="taxes" data-input="taxes" name="taxes" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pi">PRODUCTION IMMOBILISEE</label>
                                                <input type="number" id="pi" data-input="pi" name="pi" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ps">PRODUCTION STOCKEE</label>
                                                <input type="number" id="ps" data-input="ps" name="ps" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sp">SUBVENTION D'EXPLOITATION</label>
                                                <input type="number" id="sp" data-input="sp" name="sp" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ape">AUTRES PRODUITS D'EXPLOITATION</label>
                                                <input type="number" id="ape" data-input="ape" name="ape" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pf">PRODUIT FINANCIER</label>
                                                <input type="number" id="pf" data-input="pf" name="pf" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cfi">CHARGES FINANCIERES</label>
                                                <input type="number" id="cfi" data-input="cfi" name="cfi" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="pe">PRODUIT EXCEPTIONNEL</label>
                                                <input type="number" id="pe" data-input="pe" name="pe" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ce">CHARGES EXCEPTIONNELLES</label>
                                                <input type="number" id="ce" data-input="ce" name="ce" class="form-control"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dap">DAP</label>
                                                <input type="number" id="dap" data-input="dap" name="dap" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="salaires">SALAIRES</label>
                                                <input type="number" id="salaires" data-input="salaires" name="salaires" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="participations">PARTICIPATION DES TRAVAILLEURS</label>
                                                <input type="number" id="participations" data-input="participations" name="participations" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="impots">IMPOTS</label>
                                                <input type="number" id="impots" data-input="impots" name="impots" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">BILAN</h4>
                            </div>
                            <div class="card-body">
                                <fieldset>
                                   <legend>ACTIF</legend>
                                   <div class="row">
                                       <div class="col-md-3 col-sm-12">
                                           <div class="form-group">
                                               <label for="frais_developpement" title="Frais de développement et de prospection">Frais de dév. et de prospection</label>
                                               <input type="number" class="form-control" name="frais_developpement" title="Frais de développement et de prospection"/>
                                           </div>
                                       </div>
                                       <div class="col-md-3 col-sm-12">
                                           <div class="form-group">
                                               <label for="brevets" title="Brevets, licences, logiciels, et droits assimilaires">Brevets, licences, logiciels,...</label>
                                               <input type="number" class="form-control" name="brevets" title="Brevets, licences, logiciels, et droits assimilaires"/>
                                           </div>
                                       </div>
                                       <div class="col-md-3 col-sm-12">
                                           <div class="form-group">
                                               <label for="fonds_commercial" title="Fonds commercial et droit au bail">Fonds commercial et droit au bail</label>
                                               <input type="number" class="form-control" name="fonds_commercial" title="Fonds commercial et droit au bail"/>
                                           </div>
                                       </div>
                                       <div class="col-md-3 col-sm-12">
                                           <div class="form-group">
                                               <label for="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles">AUTRES IMMO. INCORP.</label>
                                               <input type="number" class="form-control" name="autres_immobilisations_incorporelles" title="Autres immobilisations incorporelles"/>
                                           </div>
                                       </div>
                                   </div>

                                       <div class="row">
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="terrains">TERRAIN</label>
                                                   <input type="number" class="form-control" name="terrains"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="batiments">BATIMENTS</label>
                                                   <input type="number" class="form-control" name="batiments"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="amenagements" title="Aménagements, agencements et installations">AMENAGEMENTS, AGENCEM. ET INSTAL.</label>
                                                   <input type="number" class="form-control" name="amenagements" title="Aménagements, agencements et installations"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="materiel_mobilier">MATERIEL, MOBILIER</label>
                                                   <input type="number" class="form-control" name="materiel_mobilier"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="materiel_transport">Materiel de transport</label>
                                                   <input type="number" class="form-control" name="materiel_transport"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="avances_acomptes">AVANCES ET ACOMPTES VERSES,...</label>
                                                   <input type="number" class="form-control" name="avances_acomptes"/>
                                               </div>
                                           </div>
                                       </div>

                                      <div class="row">

                                              <div class="col-md-6 col-sm-12">
                                               <div class="form-group">
                                                   <label for="titres_participation">Titres de participation</label>
                                                   <input type="number" class="form-control" name="titres_participation"/>
                                               </div>
                                           </div>
                                           <div class="col-md-6 col-sm-12">
                                               <div class="form-group">
                                                   <label title="Autres immobilisations financières" for="autres_immobilisations_financieres">Autres immo. financières</label>
                                                   <input title="Autres immobilisations financières" type="number" class="form-control" name="autres_immobilisations_financieres"/>
                                               </div>
                                           </div>
                                      </div>

                                       <div class="row">
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="actif_circulant_hao">ACTIF CIRCULANT HAO</label>
                                                   <input type="number" class="form-control" name="actif_circulant_hao"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="stocks_encours">STOCK ET ENCOURS</label>
                                                   <input type="number" class="form-control" name="stocks_encours"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="creances_emplois">CRÉANCES ET EMPLOIS ASSIMILÉS</label>
                                                   <input type="number" class="form-control" name="creances_emplois"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="avances_fournisseurs">FOURNISSEURS AVANCES VERSEES</label>
                                                   <input type="number" class="form-control" name="avances_fournisseurs"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="clients">CLIENTS</label>
                                                   <input type="number" class="form-control" name="clients"/>
                                               </div>
                                           </div>
                                           <div class="col-md-4 col-sm-12">
                                               <div class="form-group">
                                                   <label for="autres_creances">AUTRES CREANCES</label>
                                                   <input type="number" class="form-control" name="autres_creances"/>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="row">
                                           <div class="col-md-3 col-sm-12">
                                               <div class="form-group">
                                                   <label for="titres_placement">TITRES DE PLACEMENT</label>
                                                   <input type="number" class="form-control" name="titres_placement"/>
                                               </div>
                                           </div>
                                           <div class="col-md-3 col-sm-12">
                                               <div class="form-group">
                                                   <label for="valeur_encaisser">VALEURS  A ENCAISSER</label>
                                                   <input type="number" class="form-control" name="valeur_encaisser"/>
                                               </div>
                                           </div>
                                           <div class="col-md-3 col-sm-12">
                                               <div class="form-group">
                                                   <label for="banques_cheques_">BANQUES, CHEQUES POSTAUX,...</label>
                                                   <input type="number" class="form-control" name="banques_cheques_"/>
                                               </div>
                                           </div>
                                           <div class="col-md-3 col-sm-12">
                                               <div class="form-group">
                                                   <label for="ecart_conversion_actif">ECART DE CONVERSION</label>
                                                   <input type="number" class="form-control" name="ecart_conversion_actif"/>
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
                                                <input type="number" class="form-control" name="capital"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="apporteurs_acpital_non_appele">CAPITAL NON APPELE</label>
                                                <input type="number" class="form-control" name="apporteurs_acpital_non_appele"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="primes_apport">PRIMES D'APPORT D'EMISSION</label>
                                                <input type="number" class="form-control" name="primes_apport"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="ecarts_reevaluation">ECART DE REEVALUAT.</label>
                                                <input type="number" class="form-control" name="ecarts_reevaluation"/>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="reserves_indisponibles">RESERVES DISPONIBLES</label>
                                                    <input type="number" class="form-control" name="reserves_indisponibles"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="reserves_libres">RESERVES LIBRES</label>
                                                    <input type="number" class="form-control" name="reserves_libres"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="report_a_nouveau">REPORT A NOUVEAU</label>
                                                    <input type="number" class="form-control" name="report_a_nouveau"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="resultat_net_exercice">RESULTAT NET DE L'EXERCICE</label>
                                                    <input type="number" class="form-control" name="resultat_net_exercice"/>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="subventions_investissement">Subventions d'investissement</label>
                                                    <input type="number" class="form-control" name="subventions_investissement"/>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="provisions_reglementees">Provisions réglementés</label>
                                                    <input type="number" class="form-control" name="provisions_reglementees"/>
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="emprunts">EMPRUNTS</label>
                                                    <input type="number" class="form-control" name="emprunts"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="dettes_location_acquisition">Dettes de location acquisition</label>
                                                    <input type="number" class="form-control" name="dettes_location_acquisition"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="provisions_financieres_risques_">Provisions financières pour risques et charges</label>
                                                    <input type="number" class="form-control" name="provisions_financieres_risques_"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="dettes_circulantes_hao">Dettes circulantes HAO</label>
                                                    <input type="number" class="form-control" name="dettes_circulantes_hao"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="clients_avances_recues">Clients avances reçues</label>
                                                    <input type="number" class="form-control" name="clients_avances_recues"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="fournisseurs_exploitation" title="Fournisseurs d'exploitation">Fournisseurs d'exploitation</label>
                                                    <input type="number" class="form-control" name="fournisseurs_exploitation"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="dettes_fiscales">Dettes fiscales et sociales</label>
                                                    <input type="number" class="form-control" name="dettes_fiscales"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="autres_dettes">Autres dettes</label>
                                                    <input type="number" class="form-control" name="autres_dettes"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="banques_credit_escompte" title="Banques, crédits d'escomptes et de trésorerie">Banques, crédits d'escomptes et de trésorerie</label>
                                                    <input type="number" class="form-control" name="banques_credit_escompte"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="banques_credit_tresorerie" title="Banques, crédits de trésorerie">Banques, crédits de trésorerie</label>
                                                    <input type="number" class="form-control" name="banques_credit_tresorerie"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <div class="form-group">
                                                    <label for="ecart_conversion_passif">ECART DE CONVERSION</label>
                                                    <input type="number" class="form-control" name="ecart_conversion_passif"/>
                                                </div>
                                            </div>
                                        </div>
                                </fieldset>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-save"></i> ENREGISTRER</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
