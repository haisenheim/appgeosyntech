<div class="">
    <div class="card">
        <div class="card-body">
            <fieldset>
                <legend>Diagnostic Externe</legend>
                <ul class="nav nav-tabs " style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                      <li role="presentation" class="nav-item">
                          <a class="nav-link active" href="#segments" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span> ANALYSE DE LA DEMANDE </a>
                      </li>

                      <li role="presentation" class="nav-item">
                          <a class="nav-link" href="#concurrents" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ANALYSE DE L'OFFRE </a>
                      </li>

                      <li role="presentation" class="nav-item">
                          <a class="nav-link" href="#environnement" role="tab" id="tab3" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ANALYSE DE L'ENVIRONNMENT </a>
                      </li>
                 </ul>

                 <div class="tab-content" id="myTabContent">
                     <div class="tab-pane active" role="tabpanel" id="segments" aria-labelledby="tab1">
                          <div>
                                  <div class="table-responsive">
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


                                  </div>

                          </div>

                     </div>

                     <div class="tab-pane " role="tabpanel" id="concurrents" aria-labelledby="">
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

                     </div>

                     <div class="tab-pane" role="tabpanel" id="environnement" aria-labelledby="">
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
                     </div>

                  </div>
            </fieldset>
         </div>
    </div>
</div>