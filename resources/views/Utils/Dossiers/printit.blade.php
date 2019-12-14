<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">

	<title> Titre du document</title>
	 <style>
         /**
             Set the margins of the page to 0, so the footer and the header
             can be of the full height and width !
          **/
         @page {
             margin: 0cm 0cm;
         }

         /** Define now the real margins of every page in the PDF **/


         body {
             font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
             font-size: 12px;
             font-weight: 400;
             line-height: 1.5;
             color: #212529;
             text-align: left;
             margin-top: 2cm;
             margin-left: 2cm;
             margin-right: 2cm;
             margin-bottom: 2cm;
         }

         /** Define the header rules **/
         header {
             position: fixed;
             top: 0cm;
             left: 0cm;
             right: 0cm;
             height: 2cm;

             /** Extra personal styles **/
             background-color: #FFFFFF;
             color: #28a745;
             text-align: center;
             line-height: 1.5cm;
         }

         /** Define the footer rules **/
         footer {
             position: fixed;
             bottom: 0cm;
             left: 0cm;
             right: 0cm;
             height: 2cm;

             /** Extra personal styles **/
             background-color: #FFFFFF;
             color: #000;
             text-align: center;
             line-height: 1.5cm;
         }


         .page-break {
             page-break-after: always;
         }
         .sommaire2 span {
            float: right;
            margin-right: 30px;
         }

         .sommaire2{
         max-width: 580px;
         }

         .diagExt-body .table th{
            max-width: 300px;
         }
         .table td, .table th {
             padding: 5px;
             font-size: 10px;
             vertical-align: top;
             border-top: 1px solid
            rgba(41, 41, 41, 0.88);
         }
         .table {
             width: 100%;
             margin-bottom: 1rem;
             color: #212529;
             background-color:
             transparent;
         }

         .table thead th {
             vertical-align: bottom;
             border-bottom: 2px solid
             rgba(41, 41, 41, 0.88);
                 border-bottom-width: 2px;
         }

         .table-bordered {
             border: 1px solid
             rgba(41, 41, 41, 0.88);
         }
         .table-bordered td, .table-bordered th {
             border: 1px solid
            rgba(41, 41, 41, 0.88);
         }


         *, ::after, ::before {
             box-sizing: border-box;
         }

     </style>
</head>
<body>

    <header>
       Entete du document
    </header>

    <footer>
      OBAC Sarl – Congo – Rapport d’évaluation du projet <b><?= $dossier->name ?></b>
    </footer>

    <main>
        <div style="padding-top: 30px" class="container">
            <div style="margin-top: 200px; margin-right: auto; margin-left: auto; width: 600px; text-align: center">
               <h1>RAPPORT D’EVALUATION DU PROJET </h1>
            </div>

            <div></div>

            <div style="margin-top: 20px; margin-right: auto; margin-left: auto; width: 600px; text-align: center; height: 400px;">
                <?php $image_path = '/img/'.$dossier->imageUri; ?>
                <img src="{{ public_path() . $image_path }}" style="width: 480px; height: 240px;">
            </div>

            <div style="float: right; margin-top: 30px; margin-right: 100px; border: 1px solid rgba(5, 11, 41, 0.89); padding: 10px; width: 200px; height: auto; text-align: center">
                Direction du Pôle  Structuration de projets & Levée de fonds
            </div>
            <?php $pad_length1=100; $pad_length2=100; $projet = $dossier; ?>

             <div class="page-break"></div>
             <h3>TABLE DE MATIERE </h3>
            <div class="sommaire2">
                I/ RESUME EXECUTIF<br/>
                II/ DIAGNOSTIC EXTERNE <br/>
                	2.1. Analyse de l’environnement <br/>
                	2.2. Analyse de la demande <br/>
                	2.3. Analyse de l’offre <br/>
                	2.4. Résumé du diagnostic externe <br/>
                III/ DIAGNOSTIC INTERNE <br/>
                	3.1. Présentation du modèle économique <br/>
                	3.2. Présentation de la cartographie des risques <br/>
                	3.3. Présentation des états financiers <br/>
                	3.4. Résumé du diagnostic interne <br/>
                IV/ DIAGNOSTIC STRATEGIQUE <br/>
                	4.1. Présentation du SWOT <br/>
                	4.2. Objectifs stratégiques <br/>
                	4.3. Organisation du travail <br/>
                	4.4. Actions de maitrise des risques <br/>
                	4.5. Plan d’actions stratégiques <br/>
                	4.6. Etudes de faisabilité <br/>
                V/ PLAN FINANCIER <br/>
                	5.1. Compte d’exploitation prévisionnel <br/>
                	5.2. Bilan prévisionnel <br/>
                	5.3. Flux de trésorerie <br/>
                	5.4. Montage financier <br/>
                	5.5. Rentabilité du projet et/ou tableau d’amortissement du prêt <br/>
            </div>
        </div>
        <div class="page-break"></div>
        <div class="teaser">
            <h3>RESUME EXECUTIF</h3>
             <ol style="list-style: upper-roman;">
        	    <li>
        	        <b>Présentation de l’entreprise et du porteur de projet</b>
        	        <ul>
        	           <li>
                            <b>Présentation de l’entreprise  </b>
                            <span><?= $projet->teaser?$projet->teaser->entreprise:'' ?></span>
        	           </li>
        	           @if($projet->teaser->youtubeUri)
                            <li>
                                <span><a href="<?= $projet->teaser?$projet->teaser->youtubeUri:'' ?>">Suivre la vidéo du projet sur Youtube</a></span>
                            </li>
                        @endif
                        <li>
                            <b>Présentation du porteur de projet  </b>
                            <span><?= $projet->teaser?$projet->teaser->porteur:'' ?></span>
        	           </li>
        	        </ul>

        	     </li>
        	     <li>
        	        <b>Présentation de la problématique à résoudre </b>
        	        <span><?= $projet->teaser?$projet->teaser->problematique:'' ?></span>
        	     </li>
        	     <li>
        	        <b>Présentation de la solution proposée </b>
        	        <span><?= $projet->teaser?$projet->teaser->solution:'' ?></span>
        	     </li>
        	     <li>
        	        <b>Présentation de la concurrence</b>
        	        <span><?= $projet->teaser?$projet->teaser->concurrence:'' ?></span>
        	     </li>
        	     <li>
        	        <b>Présentation de la valeur ajoutée apportée par rapport aux concurrents </b>
        	        <span><?= $projet->teaser?$projet->teaser->va:'' ?></span>
        	     </li>
        	     <li>
        	        <b>Présentation de ce qui a déjà été fait </b>
        	        <span><?= $projet->teaser?$projet->teaser->realisations:'' ?></span>
        	     </li>
        	     <li>
        	        <b>Présentation des objectifs  </b>
        	        <span><?= $projet->teaser?$projet->teaser->objectifs:'' ?></span>
        	     </li>
        	     <li>
        	        <b>Présentation des besoins financiers  </b>
        	        <span><?= $projet->teaser?$projet->teaser->besoins:'' ?></span>
        	     </li>
        	     <li>
        	        <b>Quelques chiffres prévisionnels  </b>
        	        <span><?= $projet->teaser?$projet->teaser->chiffres:'' ?></span>
        	     </li>
        	</ol>
        </div>
        <div class="page-break"></div>
        <div class="diagExt">
             <h3>II- DIAGNOSTIC INTERNE</h3>
             <div class="diag diag-body diagExt-body">
                <h4>2-1. ANALYSE DE L'ENVIRONNEMENT</h4>
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
                <h4>2-2. ANALYSE DE LA DEMANDE</h4>
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
                         <tr> <th>Qui sont les clients cibles ?</th> <?= $qui ?> </tr>
                         <tr><th>Quel est la problématique à laquelle ils sont confrontés? </th> <?= $quoi ?> </tr>
                         <tr> <th>Où achètent-ils des produits-services pour résoudre cette problématique ?</th> <?= $ou ?> </tr>
                         <tr> <th>A quelle fréquence achètent-ils ces produits-services ?</th> <?= $quand ?> </tr>
                         <tr> <th>En moyenne, à combien achètent ils ces produits-services ?</th> <?= $combien ?> </tr>
                         <tr> <th>Pourquoi achètent-ils ces produits-services en particulier et pas un autre ?</th> <?= $pourquoi ?> </tr>

                         </tbody>
                     </table>
                 <?php endif; ?>
               <h4>2-3. ANALYSE DE L'OFFRE</h4>
                 <?php if($projet->concurrents): ?>
                     <div class="table-responsive">
                         <table class="table table-bordered">

                     <tbody>
                     <?php $i=0; $quoi=""; $qui=""; $ou=""; $comment=""; $combien=""; $quand="";
                     $ca=""; $cv=""; $cf=""; $mb=""; $va=""; $salaires=""; $ebe=""; $fournisseur=""; $fidelisation=""; $comment=""; $communication=""; $con ="";
                     foreach($projet->concurrents as $segment): ?>
                         <?php
                         $con = $con."<th>CONCURRENT ". ++$i ."</th>";
                         $quoi=$quoi."<td>".$segment->quoi."</td>";
                         $qui=$qui."<td>".$segment->name."</td>";
                         $quand=$quand."<td>".$segment->quand."</td>";
                         $combien=$combien."<td>".$segment->combien."</td>";
                         $ou=$ou."<td>".$segment->ou."</td>";
                         $comment=$comment."<td>".$segment->comment."</td>";
                         $fournisseur=$fournisseur."<td>".$segment->fournisseur."</td>";
                         $communication=$communication."<td>".$segment->communication."</td>";
                         $fidelisation=$fidelisation."<td>".$segment->fidelisation."</td>";
                         $ca=$ca."<td>".number_format($segment->ca,0,',','.' ) ."</td>";
                         $cv=$cv."<td>".number_format($segment->cv,0,',','.')."</td>";
                         $cf=$cf."<td>".number_format($segment->cf,0,',','.')."</td>";
                         $salaires=$salaires."<td>".number_format($segment->salaires,0,',','.')."</td>";
                         $va=$va."<td>". ($segment->ca -$segment->cf - $segment->cv )."</td>";
                         $mb=$mb."<td>".($segment->ca - $segment->cv)."</td>";
                         $ebe=$ebe."<td>". number_format(($segment->ca -$segment->cv - $segment->cf - $segment->salaires),0,',','.' )."</td>";
                         ?>
                     <?php endforeach; ?>
                     <tr><th></th><?= $con ?></tr>
                     <tr> <th >Qui sont vos concurrents sur le segment que vous avez ciblé?</th> <?= $qui ?> </tr>
                    <tr><th>Quel est le produit-service proposé par vos  concurrents pour résoudre les problèmes auxquels vos clients sont confrontés? (Avantages et inconvénients)</th> <?= $quoi ?> </tr>
                    <tr> <th>Quels sont les canaux de distribution utilisés par chaque concurrent pour acheminer le produit-service vers les clients? Canaux directs et indirects ; (Avantages et inconvénients)</th> <?= $ou ?> </tr>
                    <tr> <th>Quels sont les canaux de communication utilisés par chaque concurrent pour faire connaitre leur produit-service ?  (Avantages et inconvénients)</th> <?= $communication?> </tr>
                    <tr> <th>Quelle est la stratégie mise en place par les concurrents pour pousser les clients à acheter ? (Avantages et inconvénients)</th> <?= $comment ?> </tr>
                    <tr> <th>Quelle est la stratégie mise en place par les concurrents pour fidéliser les clients ? (Avantages et inconvénients)</th> <?= $fidelisation ?> </tr>
                    <tr> <th>Qui sont les fournisseurs de vos concurrents et donnez en une appréciation en terme de qualité/Coût/Quantité/Délai de livraison ?</th> <?= $fournisseur ?> </tr>
                     <tr> <th>Quelle est la disponibilité des produits-services des concurrents (Saisonnière – toute l’année – dans la limite des niveaux de production) (Avantages et inconvénients)</th> <?= $quand ?> </tr>
                      <tr> <th>Quelle est la disponibilité des produits-services des concurrents (Saisonnière – toute l’année – dans la limite des niveaux de production) (Avantages et inconvénients)</th> <?= $combien ?> </tr>
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
                 <h4>2-4. RESUME DU DIAGNOSTIC EXTERNE</h4>
                    <P><?= $projet->synthese_diagnostic_externe  ?></P>
             </div>

        </div>
        <div class="page-break"></div>
        <div class="diag diagInt">
           <h3>III- DIAGNOSTIC INTERNE</h3>
           <div class="diag diag-body diagIxt-body">
                <h4>3-1. Présentation du modèle économique</h4>
                 <div class="row">
        		    <div class="col-md-2 col-sm-12">
        		        <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">PARTENAIRES</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->partenaires:'-' ?>
        		            </div>
        		        </div>
        		    </div>
        		    <div class="col-md-3 col-sm-12">
        		        <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">ACTIVITES</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->activites:'' ?>
        		            </div>
        		        </div>
        		        <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">RESSOURCES</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->ressources:'' ?>
        		            </div>
        		        </div>
        		    </div>
        		    <div class="col-md-2 col-sm-12">
        		        <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">OFFRE</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->offre:'' ?>
        		            </div>
        		        </div>
        		    </div>
        		    <div class="col-md-3 col-sm-12">
        		        <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">RELATION CLIENT</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->relation:'' ?>
        		            </div>
        		        </div>
        		        <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">CANAUX DE DISTRIBUTION</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->canaux:'' ?>
        		            </div>
        		        </div>
        		    </div>
        		    <div class="col-md-2 col-sm-12">
        		        <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">SEGMENTS CLIENT</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->segment:'' ?>
        		            </div>
        		        </div>
        		    </div>
        		</div>
        		<div class="row">
                     <div class="col-md-6 col-sm-12">
                         <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">STRUCTURE DES COUTS</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->couts:'' ?>
        		            </div>
        		        </div>
                     </div>
                     <div class="col-md-6 col-sm-12">
                         <div class="card">
        		            <div class="card-header">
        		                <h5 class="card-title">SOURCES DE REVENUS</h5>
        		            </div>
        		            <div class="card-body">
        		                <?= $projet->modele?$projet->modele->revenus:'' ?>
        		            </div>
        		        </div>
                     </div>
        		</div>
        		<div class="page-break"></div>
        		<h4>3-2. Présentation de la cartographie des risques</h4>
                <div>
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
                <div class="page-break"></div>
                <h4>3-3. Présentation des états financiers</h4>
                <div>
                    <div>

                               <h6>SANTE FINANCIERE</h6>
                               <table class="table table-condensed table-bordered">
                                   <thead>
                                   <tr>
                                       <th></th>
                                       <th><?= isset($projet->bilans[0])?$projet->bilans[0]->annee:'' ?></th>
                                       <th><?= isset($projet->bilans[1])?$projet->bilans[1]->annee:'' ?></th>
                                       <th>TAUX DE VARIATION</th>
                                       <th><?= isset($projet->bilans[2])?$projet->bilans[2]->annee:'' ?></th>
                                       <th>TAUX DE VARIATION</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                       <td>RESSOURCES DURABLES</td>
                                       <td><?= isset($projet->bilans[0])?number_format($projet->bilans[0]->ress_durable,0,',','.'):0 ?></td>
                                       <td><?= isset($projet->bilans[1])?number_format($projet->bilans[1]->ress_durable,0,',','.'):0 ?></td>
                                       <td></td>
                                       <td><?= isset($projet->bilans[2])?number_format($projet->bilans[2]->ress_durable,0,',','.'):0 ?></td>
                                       <td></td>
                                   </tr>
                                   <tr>
                                       <td>ACTIFS IMMOBILISES</td>
                                       <td><?= isset($projet->bilans[0])?number_format($projet->bilans[0]->actifs_immo,0,',','.'):0 ?></td>
                                       <td><?= isset($projet->bilans[1])?number_format($projet->bilans[1]->actifs_immo,0,',','.'):0  ?></td>
                                       <td></td>
                                       <td><?= isset($projet->bilans[2])?number_format($projet->bilans[2]->actifs_immo,0,',','.'):0  ?></td>
                                       <td></td>
                                   </tr>
                                   <tr>
                                       <td>FONDS DE ROULEMENT NET GLOBAL</td>
                                       <th><?= number_format($projet->frng_0,0,',','.') ?></th>
                                       <th><?= number_format($projet->frng_1,0,',','.') ?></th>
                                       <th></th>
                                       <th><?= number_format($projet->frng_2,0,',','.') ?></th>
                                       <th></th>
                                   </tr>
                                   <tr>
                                       <td>CREANCES</td>
                                       <td><?= isset($projet->bilans[0])?number_format($projet->bilans[0]->creances,0,',','.'):'' ?></td>
                                       <td><?= isset($projet->bilans[1])?$projet->bilans[1]->creances:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->bilans[2])?$projet->bilans[2]->creances:'' ?></td>
                                       <td></td>
                                   </tr>
                                   <tr>
                                       <td>STOCKS</td>
                                       <td><?= isset($projet->bilans[0])?$projet->bilans[0]->stocks:'' ?></td>
                                       <td><?= isset($projet->bilans[1])?$projet->bilans[1]->stocks:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->bilans[2])?$projet->bilans[2]->stocks:'' ?></td>
                                       <td></td>
                                   </tr>
                                   <tr>
                                       <td>DETTES</td>
                                       <td><?= isset($projet->bilans[0])?$projet->bilans[0]->dettes:'' ?></td>
                                       <td><?= isset($projet->bilans[1])?$projet->bilans[1]->dettes:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->bilans[2])?$projet->bilans[2]->dettes:'' ?></td>
                                       <td></td>
                                   </tr>
                                   <tr>
                                       <td>BESOIN EN FONDS DE ROULEMENT</td>
                                       <th><?= isset($projet->bilans[0])?$projet->bilans[0]->bfr:'' ?></th>
                                       <th><?= isset($projet->bilans[1])?$projet->bilans[1]->bfr:'' ?></th>
                                       <th><?= $projet->tvbfr_0 ?></th>
                                       <th><?= isset($projet->bilans[2])?$projet->bilans[2]->bfr:'' ?></th>
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

                               <h6>PERFORMANCE FINANCIERE</h6>
                               <table class="table table-bordered table-condensed">
                                   <thead>
                                   <tr>
                                       <th></th>
                                       <th><?= isset($projet->resultats[0])?$projet->resultats[0]->annee:'' ?></th>
                                       <th><?= isset($projet->resultats[1])?$projet->resultats[1]->annee:'' ?></th>
                                       <th>TAUX DE VARIATION</th>
                                       <th><?= isset($projet->resultats[2])?$projet->resultats[2]->annee:'' ?></th>
                                       <th>TAUX DE VARIATION</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                       <td>CHIFFRE D'AFFAIRE</td>

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->ca:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->ca:'' ?></td>
                                       <td><?= $projet->tvca_0 ?></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->ca:'' ?></td>
                                       <td><?= $projet->tvca_0 ?></td>

                                   </tr>
                                   <tr>
                                       <td>CHARGES VARIABLES</td>

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->cv:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->cv:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->cv:'' ?></td>
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

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->cf:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->cf:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->cf:'' ?></td>
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

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->salaires:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->salaires:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->salaires:'' ?></td>
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
                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->dap:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->dap:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->dap:'' ?></td>
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

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->pf:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->pf:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->pf:'' ?></td>
                                       <td></td>

                                   </tr>
                                   <tr>
                                       <td>CHARGES FINANCIERES</td>

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->cfi:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->cfi:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->cfi:'' ?></td>
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

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->pe:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->pe:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->pe:'' ?></td>
                                       <td></td>
                                   </tr>
                                   <tr>
                                       <td>CHARGES EXCEPTIONNELLES</td>

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->ce:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->ce:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->ce:'' ?></td>
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

                                       <td><?= isset($projet->resultats[0])?$projet->resultats[0]->impots:'' ?></td>
                                       <td><?= isset($projet->resultats[1])?$projet->resultats[1]->impots:'' ?></td>
                                       <td></td>
                                       <td><?= isset($projet->resultats[2])?$projet->resultats[2]->impots:'' ?></td>
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
                <div class="page-break"></div>
                <h4>3-4. Résumé du diagnostic interne</h4>
                <P><?= $projet->synthese_diagnostic_interne  ?></P>
           </div>
        </div>
        <div class="page-break"></div>
        <div class="diag diagStrat">
            <h3>DIAGNOSTIC STRATEGIQUE</h3>
            <div class="diag-body diagStrat-body">
                <h4>4-1. Présentation du SWOT</h4>
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
                <h4>4.2- Objectifs stratégiques</h4>
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
                 <h4>4.3- Organisation du travail</h4>
                 <div>
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
                 <h4>4-4. Actions de maitrise des risques</h4>
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
                  <h4>4-5. Plan d’actions stratégiques</h4>
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
                  <h4>4-6. 4.6. Etudes de faisabilité</h4>
                  <p><?= $projet->etude_faisabilite ?></p>
            </div>
        </div>
        <div class="page-break"></div>
        <div class="diag diagFin">
            <h3>PLAN FINANCIER</h3>
            <div class="diag-body diagFin-body">
                <h4>5-1. Compte d’exploitation prévisionnel</h4>
                <div>
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

                <h4>5-2. Bilan prévisionnel</h4>
                <div>
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
                <h4 class="">5-3. Flux de trésorerie</h4>
                <div>
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
                </div>
                <h4>5-4. Montage financier</h4>
                <div>
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
                            <h5>MOYENS DE FINANCEMENTS</h5>
                             <table class="table table-bordered">
                                 <tbody>
                                     @foreach($projet->financements as $fin)
                                         <tr>
                                             <td>{{ $fin->moyen->name }}</td>
                                             <th>{{ $fin->montant }} <sup>{{ $projet->devise->abb }}</sup> </th>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>


                         @endif
                </div>
            </div>
        </div>
        <input type="hidden" id="id" value="<?= $projet->token ?>"/>
    </main>
    <script>
        $(document).ready(function(){
           // $('#side2').height($('#side1').height());
           //$('#side2').height(890);
            getPlan($('#pl_id').val());

            $.ajax({
                url: "/dossier/getchoices",
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

                                        //console.log(risks[i][1][k]);
                                    }
                                   // console.log(risks[i][1]);
                                }

                                $('#risques-tab').find('tbody').html(html);
                            },
                            Error:function(){

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
</body>
</html>