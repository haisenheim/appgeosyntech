@extends('......layouts.consultant')
@section('page-title')
CREATION DU DIAGNOSTIC EXTERNE
@endsection
@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-header">

                            </div>

                        <div class="card-body">

                            <h4 style="background-color: inherit">{{ $projet->name  }}</h4>
                            <p>CODE : {{ $projet->code }}</p>
                            <p>DATE DE CREATION : <span class="value"> {{ date_format($projet->created_at,'d/m/Y') }}</span></p>
                            <p>PROMOTEUR : <span class="value">{{ $projet->owner->name }}</span></p>
                            <p>AUTEUR : {{ $projet->auteur->name }}</p>
                            <p class="text-danger" style="font-weight: 700" > {{ $projet->capital?'DOSSIER D\'AUGMENTATION DE CAPITAL':'' }}</p>
                            <p>TYPE DE FINANCEMENT : {{ $projet->type?$projet->type->name:'-' }}</p>
                            <p>MONTANT : {{ $projet->montant }}</p>
                            <input type="hidden" id="id" value="<?= $projet->token ?>"/>
                            <p><i class="fa fa-map-marker"></i> {{ $projet->ville->name }}</p>
                            <hr/>

                            @if($projet->modepaiement_id>0)
                                <h6 class="page-header" style="background-color: inherit">FORMULE DE PAIEMENT</h6>
                                <ul class="list-group">
                                    <li class="list-group-item"><span style="font-weight: 700">{{ $projet->modepaiement->name }}</span></li>

                                    <li class="list-group-item">PRIX TTC : <span style="font-weight: 700">{{ number_format($projet->traite * 4 ,0,',','.') }} <sup>{{ $projet->devise->abb }}</sup></span></li>
                                </ul>

                            @endif
                        </div>
                        </div>

                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="">
                            <div class="">
                                <fieldset>
                                <legend>EDITION DU DIAGNOSTIC EXTERNE</legend>
                                    {{csrf_field()}}
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="stepwizard">
                                                <div class="stepwizard-row setup-panel">
                                                    <div class="stepwizard-step">
                                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                                        <p>ANALYSE DE LA DEMANDE</p>
                                                    </div>
                                                    <div class="stepwizard-step">
                                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                        <p>ANALYSE DE L'OFFRE</p>
                                                    </div>
                                                    <div class="stepwizard-step">
                                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                        <p>ANALYSE DE L'ENVIRONNEMENT</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    <div class="card-body">
                                           <div class="setup-content" id="step-1">
                                            <div class="card">
                                              <div class="card-header">
                                                 <h6 style="background-color: transparent" class="text-center">ANALYSE DE LA DEMANDE</h6>
                                                  <div class="card-tools">
                                                       <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                                                       </button>
                                                  </div>
                                              </div>
                                              <div class="card-body">
                                                 <div class="">
                                                    <div class="" id="">
                                                     <div class="" id="segments" >
                                                         <div class="row" style="">
                                                             <div class="col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                     <label for="qui" class="control-label" title="Le nom du segment">Qui sont les clients cibles ?</label>
                                                                     <input id="qui" name="name" type="text" class="form-control de"/>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                     <label for="" class="control-label" title="Le nom du segment">Quel est la problématique à laquelle ils sont confrontés? </label>
                                                                     <input id="quoi" name="quoi" type="text" class="form-control de" placeholder=""/>
                                                                 </div>
                                                             </div>
                                                             </div>
                                                             <div class="row">
                                                             <div class="col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                     <label for="" class="control-label" title="Où comblent-ils leur besoin actuellement">Où achètent-ils des produits-services pour résoudre cette problématique ?</label>
                                                                     <input id="ou" name="ou" type="text" class="form-control de" placeholder=""/>
                                                                 </div>
                                                             </div>

                                                             <div class="col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                     <label for="" class="control-label" title="À quel moment et à quelle fréquence procèdent-ils à un achat?">A quelle fréquence achètent-ils ces produits-services ?</label>
                                                                     <input id="quand" name="ou" type="text" class="form-control de" placeholder="À quel moment et à quelle fréquence procèdent-ils à un achat?"/>
                                                                 </div>
                                                             </div>
                                                            </div>
                                                            <div class="row">
                                                             <div class="col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                     <label for="" class="control-label" title="Combien dépensent-ils pour obtenir la solution / Combien sont-ils à avoir ce besoin?">En moyenne, à combien achètent ils ces produits-services ?</label>
                                                                     <input id="combien" name="ou" type="text" class="form-control de" placeholder="Combien dépensent-ils pour obtenir la solution / Combien sont-ils à avoir se besoin?"/>
                                                                 </div>
                                                             </div>

                                                             <div class="col-md-12 col-sm-12">
                                                                 <div class="form-group">
                                                                     <label for="" class="control-label" title="Pourquoi apprécient-ils la solution qu'ils utilisent ?">Pourquoi achètent-ils ces produits-services en particulier et pas un autre ? </label>
                                                                     <textarea id="pourquoi" name="ou" class="form-control de" placeholder="Pourquoi apprécient-ils la solution qu'ils utilisent ?"></textarea>
                                                                 </div>
                                                             </div>
                                                             </div>
                                                             <div class="">
                                                                 <button style="margin-top: 40px" class="btn btn-outline-success btn-sm btn-block" id="btn-seg-add"><i class="fa fa-plus-circle"></i></button>
                                                             </div>

                                                         <hr/>
                                                         <h6 class="">TABLE DES SEGMENTS</h6>
                                                         <div class="table-responsive">

                                                             <table class="table table-bordered table-striped" id="table-segments">
                                                                 <thead>
                                                                 <tr>

                                                                     <th>QUI</th>
                                                                     <th>QUOI</th>
                                                                     <th>OU</th>
                                                                     <th>QUAND</th>
                                                                     <th>COMBIEN</th>
                                                                     <th>POURQUOI</th>
                                                                     <th></th>
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
                                              <div class="card-footer text-center">
                                                  <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> Precedent</button>
                                                  <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                              </div>
                                            </div>
                                            </div>
                                           <div class="setup-content" id="step-2">
                                                           <div class="card">
                                                              <div class="card-header">
                                                                   <h6 class="text-center">ANALYSE DE L'OFFRE</h6>
                                                              </div>
                                                              <div class="card-body">
                                                                   <div class="">
                                                                      <div class="" id="concurrents" >
                                                                          <div class="row" style="">
                                                                              <div class="col-md-12 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label" title="Le nom du segment">Qui sont vos concurrents sur le segment que vous avez ciblé?</label>
                                                                                      <input id="quic" name="name" type="text" class="form-control dec"/>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-12 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label" title="Le nom du segment">Quel est le produit-service proposé par vos  concurrents pour résoudre les problèmes auxquels vos clients sont confrontés? (Avantages et inconvénients)</label>
                                                                                      <input id="quoic" name="quoi" type="text" class="form-control dec" placeholder=""/>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="col-md-12 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label" title="Où comblent-ils leur besoin actuellement">Quels sont les canaux de distribution utilisés par chaque concurrent pour acheminer le produit-service vers les clients? Canaux directs et indirects ; (Avantages et inconvénients)</label>
                                                                                      <input id="ouc" name="ou" type="text" class="form-control dec" placeholder=""/>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-12 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label" title="À quel moment et à quelle fréquence procèdent-ils à un achat?">Quels sont les canaux de communication utilisés par chaque concurrent pour faire connaitre leur produit-service ?  (Avantages et inconvénients)</label>
                                                                                      <input id="quandc" name="ou" type="text" class="form-control dec" placeholder="À quel moment et à quelle fréquence procèdent-ils à un achat?"/>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-12 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label" title="Combien dépensent-ils pour obtenir la solution / Combien sont-ils à avoir ce besoin?">Quelle est la stratégie mise en place par les concurrents pour pousser les clients à acheter ? (Avantages et inconvénients)</label>
                                                                                      <input id="combienc" name="ou" type="text" class="form-control dec" placeholder="Combien dépensent-ils pour obtenir la solution / Combien sont-ils à avoir se besoin?"/>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-12 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label" title="Pourquoi apprécient-ils la solution qu'ils utilisent ?">Quelle est la stratégie mise en place par les concurrents pour fidéliser les clients ? (Avantages et inconvénients)</label>
                                                                                      <textarea id="pourquoic" name="ou" class="form-control dec" placeholder="Pourquoi apprécient-ils la solution qu'ils utilisent ?"></textarea>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-3 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label">CHIFFRE D'AFFAIRE</label>
                                                                                      <input id="ca" name="ou" type="number" class="form-control dec"/>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-3 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label">CHARGES VARIABLES</label>
                                                                                      <input id="cv" name="ou" type="number" class="form-control dec"/>
                                                                                  </div>
                                                                              </div>


                                                                              <div class="col-md-3 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label">CHARGES FIXES</label>
                                                                                      <input id="cf" name="ou" type="number" class="form-control dec"/>
                                                                                  </div>
                                                                              </div>

                                                                              <div class="col-md-3 col-sm-12">
                                                                                  <div class="form-group">
                                                                                      <label for="" class="control-label">SALAIRES</label>
                                                                                      <input id="sal" name="ou" type="number" class="form-control dec"/>
                                                                                  </div>
                                                                              </div>


                                                                              <div class="col-md-1 col-sm-12">
                                                                                  <button style="margin-top: 40px" class="btn btn-success btn-sm" id="btn-con-add"><i class="fa fa-plus-circle"></i></button>
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                               <hr/>
                                                         <h6 class="">TABLE DES CONCURRENTS</h6>
                                                         <div class="table-responsive">
                                                             <table class="table table-bordered table-striped" id="table-concurrents">
                                                                 <thead>
                                                                     <tr>
                                                                         <th>QUI</th>
                                                                         <th>QUOI</th>
                                                                         <th>OU</th>
                                                                         <th>QUAND</th>
                                                                         <th>COMBIEN</th>
                                                                         <th>POURQUOI</th>
                                                                         <th>CA</th>
                                                                         <th>CV</th>

                                                                         <th>CF</th>

                                                                         <th>SAL</th>

                                                                         <th></th>
                                                                     </tr>
                                                                 </thead>
                                                                 <tbody>

                                                                 </tbody>

                                                             </table>
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
                                                        <h6>ANALYSE DE L'ENVIRONNEMENT</h6>
                                                    </div>
                                                    <div class="card-body">

                                                        <div class="" id="environnement">
                                                            <div>
                                                                <span style="display: none" id="risks-loader"  class="dashboard-spinner spinner-success spinner-xl "></span>
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
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="cmep">
                                                                        <th style="width: 25%">CADRE MACRO ECONOMIQUE DU PROJET</th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="asc">
                                                                        <th style="width: 25%">ASPECTS SOCIO-CULTURELS</th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="et">
                                                                        <th style="width: 25%">ENVIRONNEMENT TECHNOLOGIQUES</th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="iep">
                                                                        <th style="width: 25%">IMPACT ENVIRONNEMENTAL DU PROJET</th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="crp">
                                                                        <th style="width: 25%">CADRE REGLEMENTAIRE DU PROJET</th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="pnf">
                                                                        <th style="width: 25%">POUVOIR DE NEGOCIATION DES FOURNISSEURS</th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="pnc">
                                                                        <th style="width: 25%">POUVOIR DE NEGOCIATION DES CLIENTS</th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="pps">
                                                                        <th style="width: 25%">PERFORMANCES  DES PRODUITS DE SUBSTITUTION </th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>
                                                                    <tr id="ic">
                                                                        <th style="width: 25%">INTENSITE CONCURRENTIELLE</th>
                                                                        <td contenteditable="true"></td>
                                                                        <td contenteditable="true"></td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="btn-div text-center">
                                                            <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                            <button id="btn-save" class="btn btn-success btn-sm btn-rounded" type="button"><i class="fa fa-save"></i>ENREGISTRER</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                     </div>
                                 </div>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>
    </div>

    <div class="modal" id="popup" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<div class="modal-body">
    			<div class="row">
    			    <div class="col-md-5 col-sm-12">
    			         <div  id="popup-img">

                         </div>
    			    </div>
    			    <div class="col-md-7 col-sm-12">
                            « Félicitations ! Vous venez d’effectuer le diagnostic externe de ce projet. <br/>
                            Le dossier de levée de fonds est composé de 4 parties. <br/>
                            Afin de passer à la troisième partie nous vous prions de vous rapprocher du cabinet OBAC afin de solder le second paiement. »

                            <a class="btn btn-success btn-block" id="btn-continue" href="/consultant/projets/{{ $projet->token }}">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
    			    </div>
    			</div>
    		</div>


    	</div>
    </div>
    </div>
<script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>
<script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
                <!-- SweetAlert2 -->
    <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
                <!-- Toastr -->
    <script type="text/javascript" src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

<script>


    $('#btn-seg-add').click(function(e){
        e.preventDefault();
        var qui=$('#qui').val();
        var quoi=$('#quoi').val();
        var quand=$('#quand').val();
        var ou = $('#ou').val();
        var pourquoi=$('#pourquoi').val();
        var combien = $('#combien').val();
        var table= $('#table-segments').find('tbody');
        var tr = '<tr data-qui="'+ qui +'" data-quoi="'+ quoi +'" data-quand= "'+ quand +'" data-combien= "'+ combien +'" data-ou="'+ ou +'" data-pourquoi="'+ pourquoi +'"><td>'+qui+'</td><td>'+quoi+'</td><td>'+ou+'</td><td>'+quand+'</td><td>'+combien+'</td><td>'+pourquoi+'</td><td class="remove"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td></tr>';
        console.log(tr);
        table.append(tr);
        $('.de').val('');

        $('.remove').click(function(e){
            $(this).parent().remove();
        });
    });

    $('#btn-con-add').click(function(e){
        e.preventDefault();
        var qui=$('#quic').val();
        var quoi=$('#quoic').val();
        var quand=$('#quandc').val();
        var ou = $('#ouc').val();
        var pourquoi=$('#pourquoic').val();
        var combien = $('#combienc').val();

        var sal = $('#sal').val();
        var cv = $('#cv').val();
        var cf = $('#cf').val();

        var ca = $('#ca').val();


        var table= $('#table-concurrents').find('tbody');
        var tr = '<tr data-qui="'+ qui +'" data-quoi="'+ quoi +'" data-quand= "'+ quand +'" data-combien= "'+ combien
            +'" data-ou="'+ ou +'" data-pourquoi="'+ pourquoi +'" data-ca="'+ ca +'" data-cv="'+ cv +'" data-cf="'+ cf +'" data-sal="'+ sal
            +'"><td>'+qui+'</td><td>'+quoi+'</td><td>'+ou+'</td><td>'+quand+'</td>' +
            '<td>'+combien+'</td><td>'+pourquoi+'</td><td>'+ca+'</td><td>'+cv+'</td><td>'+cf+'</td><td>'+sal+'</td><td class="removec"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td></tr>';
        console.log(tr);
        table.append(tr);
        $('.dec').val('');

        $('.removec').click(function(e){
            $(this).parent().remove();
        });
    });

    var saveurl = '/consultant/projet/save-diag-externe';
    var redirectUrl = '/consultant/projets/';
    $('#btn-save').click(function(e){
        e.preventDefault();
        var table_conc = $('#table-concurrents').find('tbody');
        var table_seg= $('#table-segments').find('tbody');

        var trss=table_seg.find('tr');

        var segments = [];
            trss.each(function(){
            var elt={};
                elt.qui=$(this).data('qui');
                elt.quoi=$(this).data('quoi');
                elt.ou=$(this).data('ou');
                elt.quand=$(this).data('quand');
                elt.combien=$(this).data('combien');
                elt.pourquoi=$(this).data('pourquoi');
                segments.push(elt);
        });

        var trs=table_conc.find('tr');
        var concurrents = [];

        trs.each(function(){
            var elt={};
            elt.qui=$(this).data('qui');
            elt.quoi=$(this).data('quoi');
            elt.ou=$(this).data('ou');
            elt.quand=$(this).data('quand');
            elt.combien=$(this).data('combien');
            elt.pourquoi=$(this).data('pourquoi');
            elt.ca=$(this).data('ca');
            elt.cv=$(this).data('cv');
            elt.cf=$(this).data('cf');
            //elt.mb=$(this).data('mb');
            //elt.va=$(this).data('va');
            elt.sal=$(this).data('sal');
            //elt.ebe=$(this).data('ebe');
            concurrents.push(elt);
        });




        var analyse_env={};
        analyse_env.pol_secto_op=$("#ps").find('td').first().text();
        analyse_env.pol_secto_men=$("#ps").find('td').last().text();
        analyse_env.cadre_macroeco_op=$("#cmep").find('td').first().text();
        analyse_env.cadre_macroeco_men=$("#cmep").find('td').last().text();
        analyse_env.asp_sociocult_op=$("#asc").find('td').first().text();
        analyse_env.asp_sociocult_men=$("#asc").find('td').last().text();
        analyse_env.env_tech_op=$("#et").find('td').first().text();
        analyse_env.env_tech_men=$("#et").find('td').last().text();
        analyse_env.impact_env_op=$("#iep").find('td').first().text();
        analyse_env.impact_env_men=$("#iep").find('td').last().text();
        analyse_env.cadre_regl_op=$("#crp").find('td').first().text();
        analyse_env.cadre_regl_men=$("#crp").find('td').last().text();
        analyse_env.pouv_nego_frn_op=$("#pnf").find('td').first().text();
        analyse_env.pouv_nego_frn_men=$("#pnf").find('td').last().text();
        analyse_env.pouv_nego_cli_op=$("#pnc").find('td').first().text();
        analyse_env.pouv_nego_cli_men=$("#pnc").find('td').last().text();
        analyse_env.perf_prdt_subst_op=$("#pps").find('td').first().text();
        analyse_env.perf_prdt_subst_men=$("#pps").find('td').last().text();
        analyse_env.intensite_concu_op=$("#ic").find('td').first().text();
        analyse_env.intensite_concu_men=$("#ic").find('td').last().text();

        const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
        if((concurrents.length<1) || (segments.length<1)){
            alert('Les informations saisies sont incorrectes. Verifiez que les concurrents et les segments clients ont été saisis !!!!');

            Toast.fire({
                    type: 'error',
                    title: 'Les informations saisies sont incorrectes. Verifiez que les concurrents et les segments clients ont été saisis !!!!'
                  })
        }else{
         var spinHandle_firstProcess = loadingOverlay.activate();
            $.ajax({
                        url:saveurl,
                        type:'Post',
                        dataType:'JSON',
                        data:{_csrf:$('input[name="_token"]').val(), concurrents:concurrents,segments:segments,token:$('#id').val(),
                        env:analyse_env},
                        beforeSend:function(xhr){
                            xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());

                        },
                        success: function(data){
                            if(data.id!=null){

                               Toast.fire({
                                           type: 'success',
                                           title: 'Votre dossier a été créé avec succès!!!'
                                         });
                                         setTimeout(function() {
                                           $('#popup').show();
                                         },2000);

                               // window.location.replace(redirectUrl+data.token);
                            }
                           /// console.log(data);
                        },
                        Error:function(){
                            loadingOverlay.cancel(spinHandle_firstProcess);
                            alert('Une erreur est survenue lors de l\'enregistrement du dossier. Verifiez que toutes les informations sont saisies correctement !!!');
                        }
                    });
        }




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
</style>

@endsection

