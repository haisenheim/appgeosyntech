<div class="">
       <div class="card">
        <div class="card-body">
               <fieldset>
                  <h5>DIAGNOSTIC STRATEGIQUE</h5>
                   <ul class="nav nav-tabs " style="margin: 2px 10px 20px 0" id="objTabs" role="tablist">
                        <li role="presentation" class="nav-item">
                            <a class="nav-link active" href="#swot" role="tab" id="tab1" data-toggle="tab" aria-controls="n1" aria-expanded="false"><span class=""></span> SWOT </a>
                        </li>

                        <li  role="presentation" class="nav-item">
                            <a class="nav-link" href="#objectifs" role="tab" id="tab2" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> OBJECTIFS </a>
                        </li>

                        <li role="presentation" class="nav-item">
                            <a class="nav-link" href="#organisation" role="tab" id="tab3" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ORGANISATION DU TRAVAIL </a>
                        </li>

                        <li role="presentation" class="nav-item">
                             <a class="nav-link" href="#actions" role="tab" id="tab4" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ACTIONS DE MAITRISE </a>
                        </li>

                        <li role="presentation" class="nav-item">
                            <a class="nav-link" href="#etapes" role="tab" id="tab5" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> PLAN D'ACTION STRATEGIQUE </a>
                        </li>

                        <li role="presentation" class="nav-item">
                            <a class="nav-link" href="#faisabilite" role="tab" id="tab6" data-toggle="tab" aria-controls="n2" aria-expanded="false"><span class=""></span> ETUDE DE FAISABILITE</a>
                        </li>
                   </ul>

                   <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade active show" role="tabpanel" id="swot" aria-labelledby="tab1">
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

                     <div class="tab-pane fade" role="tabpanel" id="objectifs" aria-labelledby="">
                        <p></p>
                        <br/>
                        <hr/>
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

                     </div>

                     <div class="tab-pane fade" role="tabpanel" id="organisation" aria-labelledby="">
                        <p></p>

                        <h6 class="page-header">ORGANISATION DU TRAVAIL</h6>
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

                     <div class="tab-pane fade" role="tabpanel" id="actions" aria-labelledby="">
                        <input type="hidden" id="plan_id" value="<?= $projet->plan_id ?>"/>
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
                     </div>

                     <div class="tab-pane fade" role="tabpanel" id="etapes" aria-labelledby="">
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
                     </div>

                     <div class="tab-pane fade" role="tabpanel" id="faisabilite" aria-labelledby="">
                        <br/>
                        <br/>
                        <div class="well">
                            <p><?= $projet->etude_faisabilite ?></p>
                        </div>

                     </div>


                  </div>
               </fieldset>
        </div>
    </div>
</div>