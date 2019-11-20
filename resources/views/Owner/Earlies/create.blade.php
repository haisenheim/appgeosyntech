@extends('......layouts.owner')

@section('page-title')
CREATION D'UN DOSSIER EARLY STAGE
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header p-20">
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


                     </div>
                 </div>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" class="form" action="{{route('owner.dossiers.store')}}" method="post">
                            {{csrf_field()}}

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

                                                         <div class="col-md-4">
                                                             <div class="form-group">
                                                                 <label class="control-label">PHOTO DU PROJET</label>
                                                                 <input id="imageUri" name="imageUri"  required="required" type="file"  class="form-control">
                                                             </div>
                                                         </div>

                                                         <div class="col-md-2 col-sm-12">
                                                             <div class="form-group">
                                                                 <label class="control-label">DEVISE</label>
                                                                 <select class="form-control" name="devise_id" id="devise_id">
                                                                    @foreach($devises as $p)
                                                                       <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                                                    @endforeach
                                                                 </select>
                                                             </div>
                                                         </div>
                                                          <div class="col-md-3 col-sm-12">
                                                             <div class="form-group">
                                                                 <label class="control-label">OUVERTURE DE CAPITAL ?</label>
                                                                 <select class="form-control" name="capital" id="capital">
                                                                    <option value="0">NON</option>
                                                                    <option value="1">OUI</option>
                                                                 </select>
                                                             </div>
                                                         </div>



                                                         <div class="col-md-3 col-sm-12">
                                                             <div class="form-group">
                                                                 <label class="control-label">VILLE</label>
                                                                 <select class="form-control" name="ville_id" id="ville_id">
                                                                    @foreach($villes as $p)
                                                                       <option value='{!! $p->id !!}'>{{$p->name}}</option>
                                                                    @endforeach
                                                                 </select>
                                                             </div>
                                                         </div>




                                                     </div>
                                                     <hr/>

                                                     <div class="row">
                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">REPRESENTANT</label>
                                                                 <input id="representant" name="montant" maxlength="250" type="text" required="required" class="form-control" placeholder="Personne de ressource du dossier">
                                                             </div>
                                                         </div>
                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">ADRESSE</label>
                                                                 <input id="address" name="address" maxlength="100" type="text" required="required" class="form-control" placeholder="Saisir l'adresse de la personne ressource">
                                                             </div>
                                                         </div>

                                                         <div class="col-md-3">
                                                             <div class="form-group">
                                                                 <label class="control-label">TELEPHONE</label>
                                                                 <input id="phone" name="phone" maxlength="50" type="text" required="required" class="form-control" placeholder="Saisir ici les contacts telephoniques">
                                                             </div>
                                                         </div>
                                                         <div class="col-md-3">
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

                                              <div style="margin: 20px auto; width: 1000px; margin-bottom: 100px">
                                                    <h4 class="text-center page-header"> ACCORD DE CONFIDENTIALITE </h4>

                                                ENTRE <br/>
                                                La société OPPORTUNITES DE BUSINESS EN AFRIQUE CENTRALE en sigle OBAC, Société à responsabilité limitée au capital de FCFA un million (1 000 000 ), immatriculée sous le numéro CG/BZV/13-B-5368, ayant son siège social au 1578 avenue des trois martyrs Brazzaville, représentée par Mr Philippe BOUITI VIAUDO en sa qualité de Directeur Associé du cabinet OBAC
                                                Ci-après dénommée  « OBAC »
                                                D’une part <br/>
                                                Et <br/>

                                                LA SOCIETE , (forme juridique) au capital de FCFA (montant), immatriculée au Registre du Commerce et du Crédit Mobilier de (Brazzavile / Pointe Noire) sous le numéro (numéro), ayant son siège social à sis (adresse), (ville) (Pays), représentée par Monsieur (Prénom, Nom) en sa qualité de (titre),

                                                Ci-après dénommée « XXX», <br/>
                                                D’autre part <br/>

                                                OBAC et XXX, ci-après désignées séparément « la Partie » ou collectivement « les Parties », <br/>

                                                ETANT PREALABLEMENT EXPOSE QUE : <br/>
                                                La société XXX, exerce dans le secteur dans…

                                                OBAC est un cabinet de conseils stratégiques et financiers à vocation de Banque d’affaires qui accompagne d’une part avec les organismes financiers sur des problématiques liées à la réduction du risque de crédit, l’assainissement et la diversification du portefeuille de prêts et d’autres part avec les PME/PMI sur des problématiques liés à la gestion de projets, au développement organisationnel & stratégique et à la levée de fonds.

                                                La société XXX sollicite le concours d’OBAC Sarl pour l’accompagner dans (décrire le projet).







                                                DE CE QUI PRECEDE LES PARTIES SONT CONVENUES DE CE QUI SUIT :
                                               <ul>
                                                   <li>
                                                        ARTICLE 1.	Définition

                                                            Dans le cadre de cet Accord, le terme « Informations confidentielles » recouvre toutes les informations ou toutes données divulguées par l’une ou l’autre des Parties, par écrit ou oralement, aux termes et conditions du présent Accord, et incluant sans limitation tous documents écrits ou imprimés, tous modèles ou plus généralement tous moyens de divulgation de l’information pouvant être choisis par les Parties pendant la période de validité de cet Accord.

                                                            Relèveront des dispositions du présent Accord toutes informations ou données, quelle qu’en soit la forme ou le support, transmises par l’une ou l’autre des Parties et désignées comme Informations Confidentielles par la partie qui les transmet avec l’apposition sur leur support d’un tampon ou d’une formule ou par la remise ou l’envoi d’une notification écrite à cet effet. Lorsqu’elles sont divulguées oralement, ont le caractère d’Informations Confidentielles celles dont ce caractère a été porté à la connaissance de la Partie qui les reçoit, au moment de leur divulgation, et confirmé par écrit dans les plus brefs délais (dans les quinze jours de divulgation au plus tard).

                                                            Chacune des parties, pour autant qu’elle soit autorisée à le faire, transmettra à l’autre Partie les seules Informations Confidentielles jugées nécessaires, par la Partie auteur de la divulgation à la poursuite des objectifs prévus à cet Accord.

                                                            La signature, l’existence et l’exécution du présent Accord seront gardées confidentielles par les Parties et ne seront pas divulguées par l’une ou l’autre d’entre elles sans l’accord écrit de l’autre partie.

                                                   </li>
                                                   <li>
                                                        ARTICLE 2.	Non-contournement

                                                        Chaque PARTIE s’engage à éviter toute manœuvre qui aurait pour but, soit directement, soit indirectement, de priver l’autre PARTIE de droits, honoraires, bénéfices qui pourraient lui être dus dans le cadre de l'exécution des présentes. Chaque PARTIE  s'engage, notamment, sous peine de sa mise en cause pour abus de confiance, à ne pas tenter de contourner l’autre partie  ni d'utiliser les renseignements confidentiels, comme définis aux articles précédents, pour chercher à tirer parti par quelque moyen que ce soit d’une information communiquée, comme par exemple s’approprier seul ou avec des tiers de  tout ou partie des stratégies, rapports, études et renseignements  techniques, idées énoncées  ou encore contacter directement, sans accord préalable, un contact de l’autre PARTIE.

                                                        Chacune des PARTIES accepte et comprend que toute action ouverte ou cachée de contournement vis-à-vis de l’autre PARTIE, directement ou indirectement, individuellement ou par action comprenant des intervenants tiers, constitue une violation de propriété, de confiance et de légalité grave.

                                                        En cas de contournement, la PARTIE contrevenante indemnisera l’autre PARTIE de toutes les commissions, honoraires ou argent obtenus en contrevenant à la CONVENTION.  Toutes les dépenses, les coûts et frais juridiques engagés pour recouvrer les recettes perdues seront à la charge du contrevenant. La PARTIE contournée pourra demander en outre une sanction pécuniaire d'égalité juridique maximale.

                                                   </li>
                                                   <li>
                                                        ARTICLE 3.	Utilisation et protection des Informations Confidentielles

                                                La Partie qui reçoit s’engage, à compter de la date de signature du présent Accord, à ce que les Informations Confidentielles émanant de la Partie qui les divulgue :

                                                (i)	soient protégées et gardées strictement confidentielles et soient traitées avec le même degré de précaution et de protection qu’elle accorde à ses propres Informations Confidentielles ; <br/>
                                                (ii)	ne soient divulguées de manière interne qu’aux seuls membres de son personnel ayant à en connaître et ne soient utilisées par ces derniers que dans le but défini par le présent Accord ; <br/>
                                                (iii)	ne soient utilisées, totalement ou partiellement, dans un autre but que celui défini par le présent Accord, sans le consentement préalable et écrit de la Partie qui les a divulguées ;<br/>
                                                (iv)	ne soient ni divulguées ni susceptibles d’être divulguées, soit directement soit indirectement, à tous tiers ou à toutes personnes autres que celles mentionnées à l’alinéa ci-dessus ;<br/>
                                                (v)	ne soient ni copiées, ni reproduites, ni dupliquées totalement ou partiellement au-delà d’un nombre limité de copies réservées au strict usage interne prévu au paragraphe (ii) du présent article lorsque de telles copies, reproductions ou duplications n’ont pas été autorisées par la Partie de qui elles émanent et ce, de manière spécifique et par écrit. <br/>

                                                Toutes les Informations Confidentielles et leurs reproductions, transmises par une Partie à l’autre resteront la propriété de la Partie qui les a divulguées et seront restituées à cette dernière immédiatement sur sa demande.

                                                   </li>
                                                   <li>
                                                        ARTICLE 4.	Restriction à la confidentialité

                                                            Sauf dans le cas prévu ci-dessus, la Partie qui reçoit n’aura aucune obligation et ne sera soumise à aucune restriction eu égard à toutes les Informations Confidentielles dont elle peut apporter la preuve : <br/>

                                                            (i)	qu’elles sont entrées dans le domaine public préalablement à leur divulgation ou après celle-ci, mais dans ce cas, en l’absence de toute faute qui soit imputable ; ou <br/>
                                                            (ii)	qu’elles sont déjà connues de celle-ci, ceci pouvant être démontré par l’existence de documents appropriés dans ses dossiers ; ou <br/>
                                                            (iii)	qu’elles ont été reçues d’un tiers de manière licite sans restriction ni violation du présent Accord ; ou <br/>
                                                            (iv)	qu’elles ont été publiées sans violer les dispositions du présent Accord ; ou <br/>
                                                            (v)	qu’elles sont le résultat de développements internes entrepris de bonne foi par des membres de son personnel n’ayant pas eu accès à ces Informations Confidentielles ; ou <br/>
                                                            (vi)	que l’utilisation ou la divulgation ont été autorisées par écrit par la Partie dont elles émanent. <br/>

                                                   </li>
                                                   <li>
                                                         ARTICLE 5.	Interprétation <br/>

                                                            Aucune disposition de cet Accord ne peut être interprétée comme obligeant l’une ou l’autre des Parties à divulguer les informations Confidentielles ou à se lier contractuellement dans l’avenir. <br/>

                                                            Le droit de propriété sur toutes les Informations Confidentielles que les Parties se divulguent entre elles au titre du présent Accord appartient, sous réserve des droits des tiers, en tout état de cause à la partie dont émanent ces Informations Confidentielles. <br/>
                                                   </li>

                                                   <li>
                                                        ARTICLE 6.	Durée <br/>

                                                        Le présent Accord pourra être résilié par l’une ou l’autre des Parties, à tout moment de plein droit et sans formalités, avec un préavis de sept (7) jours suivant la notification faite à l’autre Partie. <br/>

                                                        Sauf résiliation anticipée telle que prévue à l’alinéa précédent, le présent Accord restera en vigueur pendant une durée de cinq  (05) ans. <br/>

                                                        Le terme ou la résiliation du présent Accord n’aura pas pour effet de dégager la Partie qui reçoit les Informations Confidentielles de son obligation de respecter les dispositions de l’article 2 du présent Accord concernant l’utilisation et la protection des Informations Confidentielles reçues avant la date d’arrivée du terme ou la date de résiliation, les obligations contenues dans ces dispositions restant en vigueur pendant la durée définie dans cet article. <br/>

                                                   </li>
                                                   <li>
                                                         ARTICLE 7.	Attribution de Juridiction <br/>

                                                            Le présent Accord est régi par les dispositions pertinentes du droit congolais. <br/>

                                                            Tous les litiges nés de l’exécution ou de l’interprétation du présent Accord seront réglés à l’amiable et, à défaut de règlement amiable dans un délai de trois (03) mois, ils seront tranchés définitivement par voie d’arbitrage dont l’organisation est confiée à la Cour Commune de Justice et d’Arbitrage (CCJA) de l’Organisation pour l’Harmonisation en Afrique du Droit des Affaires (OHADA) à Abidjan en Côte d’Ivoire, conformément à son Règlement d’arbitrage. <br/>

                                                   </li>
                                                   <li>
                                                        ARTICLE 8.	Election de domicile <br/>

                                                        Les documents et données utilisées pour demander ou transférer des Informations
                                                        Confidentielles visées à l’article 1 du présent Accord,
                                                        et plus généralement les notifications et autres communications entre les Parties,
                                                         en vertu ou au sujet du présent Accord devront être remises par porteur ou adressées
                                                         par courrier, télex, télégramme, télécopie ou par courrier électronique confirmé par
                                                         courrier ou télécopie, aux adresses respectives des Parties ci-dessous
                                                         (ou toute autre adresse que l’une des Parties pourra ultérieurement notifier à l’autre Partie sous réserve de respecter un préavis de huit (8) jours au moins : <br/>

                                                   </li>
                                                   <li>
                                                       ARTICLE 9.	Entrée en vigueur <br/>

                                                            Le présent Accord entrera en vigueur à la date de sa signature par les Parties.
                                                   </li>

                                               </ul>




                                                Fait en deux exemplaires originaux, à Pointe Noire le ………………………….



                                                <div style="margin-bottom: 100px">
                                                    <div style="float: left; width: 300px; padding: 20px">
                                                        Pour OBAC
                                                    </div>

                                                    <div style="float: right; width: 300px; padding: 20px;">
                                                        Pour XXX
                                                    </div>
                                                </div>

                                              </div>


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
                                                   <button id="btn-save" class="btn btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                                                </div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
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

                        var html='<div id="sect'+idp+'"'+'style="padding: 15px; border: solid 0.6px #cccccc; border-radius: 4px"> <h6 class="page-header" style="font-weight: 700">'+$("#produit_id option:selected").text()+'</h6><div class="">';
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


                var url = '/owner/projet/initJson';
                var redirectUrl = '/owner/projets';

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

               // var data = new FormData();
//               var data = {};
//                data.answers=reponses;
//                data.dossier=values;
//                data.produits=produits;
//                data.bm=bm;
//                data._csrf=$('input[name="_token"]').val();
//                data.imageUri=$('#imageUri')[0].files[0];
                    var fd = new FormData();
                    fd.append('imageUri',$('#imageUri')[0].files[0]);
                   //console.log($('#imageUri')[0].files[0]);
                $.ajax({
                    url:url,
                    type:'Post',
                    //dataType:'JSON',
                  //  data:{answers:reponses,dossier:values,produits:produits,bm:bm,imageUri:$('#imageUri')[0].files[0]},
                    data:{answers:reponses,dossier:values,produits:produits,bm:bm,fd:fd},
                    //enctype:'multipart/form-data',
                    processData:false,
                    contentType:'application/json',
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