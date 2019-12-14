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
             font-size: 11px;
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
         .row {
             display: -ms-flexbox;
             display: flex;
             -ms-flex-wrap: wrap;
             flex-wrap: wrap;
             margin-right: -7.5px;
             margin-left: -7.5px;
         }
         .col-md-6 {
             -ms-flex: 0 0 50%;
             flex: 0 0 50%;
             max-width: 50%;
         }

         .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
             position: relative;
             width: 100%;
             padding-right: 7.5px;
             padding-left: 7.5px;
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
            <div class="sommaire">
                <h3 style="text-align: center;">TABLE DES MATIERES</h3>
                <ol style="list-style: upper-roman">
                    <li><?= str_pad('RESUME EXECUTIF',$pad_length1,'.',STR_PAD_RIGHT).'.p.' ?></li>
                    <li>
                    <?= str_pad('DIAGNOSTIC EXTERNE',$pad_length1,'.',STR_PAD_RIGHT).'.p.' ?>

                        <ul style="list-style: none">
                            <li>2.1. Analyse de l’environnement .....................p.</li>
                            <li>2.2. Analyse de la demande............................p.</li>
                            <li>2.3. Analyse de l’offre ..............................p.</li>
                            <li>2.4. Résumé du diagnostic externe .....................p.</li>
                        </ul>

                    </li>
                    <li>
                        <?= str_pad('DIAGNOSTIC INTERNE',$pad_length1,'.',STR_PAD_RIGHT).'.p.' ?>

                        <ul style="list-style: none;">
                            <li><?= str_pad('3.1. Présentation du modèle économique',$pad_length2,'.',STR_PAD_RIGHT).'.p.' ?></li>

                            <li>3.2. Présentation de la cartographie des risques..........p.</li>
                            <li><?= str_pad('3.3. Présentation des états financiers',$pad_length2,'.',STR_PAD_RIGHT).'.p.' ?></li>

                        </ul>
                    </li>

                </ol>
            </div>
             <div class="page-break"></div>
             <h3>TABLE DE MATIERE 2</h3>
            <div class="sommaire2">
                I/ RESUME EXECUTIF<span>P.</span><br/>
                II/ DIAGNOSTIC EXTERNE<span>P.</span> <br/>
                	2.1. Analyse de l’environnement<span>P.</span> <br/>
                	2.2. Analyse de la demande<span>P.</span> <br/>
                	2.3. Analyse de l’offre<span>P.</span> <br/>
                	2.4. Résumé du diagnostic externe<span>P.</span> <br/>
                III/ DIAGNOSTIC INTERNE<span>P.</span> <br/>
                	3.1. Présentation du modèle économique<span>P.</span> <br/>
                	3.2. Présentation de la cartographie des risques<span>P.</span> <br/>
                	3.3. Présentation des états financiers<span>P.</span> <br/>
                	3.4. Résumé du diagnostic interne<span>P.</span> <br/>
                IV/ DIAGNOSTIC STRATEGIQUE<span>P.</span> <br/>
                	4.1. Présentation du SWOT<span>P.</span> <br/>
                	4.2. Objectifs stratégiques<span>P.</span> <br/>
                	4.3. Organisation du travail<span>P.</span> <br/>
                	4.4. Actions de maitrise des risques<span>P.</span> <br/>
                	4.5. Plan d’actions stratégiques<span>P.</span> <br/>
                	4.6. Etudes de faisabilité<span>P.</span> <br/>
                V/ PLAN FINANCIER<span>P.</span> <br/>
                	5.1. Compte d’exploitation prévisionnel<span>P.</span> <br/>
                	5.2. Bilan prévisionnel<span>P.</span> <br/>
                	5.3. Flux de trésorerie<span>P.</span> <br/>
                	5.4. Montage financier<span>P.</span> <br/>
                	5.5. Rentabilité du projet et/ou tableau d’amortissement du prêt<span>P.</span> <br/>
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