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
             font-size: 1rem;
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
             <h3>DIAGNOSTIC INTERNE</h3>
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
    </main>

</body>
</html>