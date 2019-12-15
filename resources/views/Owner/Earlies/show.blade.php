@extends('......layouts.owner')


@section('page-title')
{{$projet->name}}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <div style="padding-top: 30px; padding-bottom: 80px;" class="container-fluid">
      <div class="row">
          <div id="side1" class="col-md-4 col-sm-12" style="max-height:860px; overflow-y: scroll ">
            @include('includes.Sidebars.dossier')
          </div>
          <div style="overflow-y: scroll; max-height: 860px" id="side2" class="col-md-8 col-sm-12">
              <div class="card">
                  <div class="card-body">

                    <div class="card">
                                      <div class="card-header">
                                       <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                      </div>
                                      <div class="card-body">
                                          <div class="table-responsive">
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
                                      </div>
                                  </div>
                  </div>
              </div>
          </div>
      </div>
      <div style="margin-top: 30px" class="row">
         @if($projet->etape>=2)
           @include('includes.Show.diagnostic2')
         @endif
         @if($projet->etape>=3)
            @include('includes.Show.diagnostic3')
         @endif
         @if($projet->etape>=4)
              @include('includes.Show.plan_financier')
         @endif
       </div>

    </div>


    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

    <script>
        $(document).ready(function(){
           // $('#side2').height($('#side1').height());
           //$('#side2').height(890);
           $('textarea').summernote({
             height: 125,
             tabsize: 2,
             followingToolbar: true,
             lang:'fr-FR'
           });

           var tsr = $('#has_teaser').val();
           if(tsr){
              setTimeout(function() {
                          $('#popup').show();
                        },9000);
           }
            getPlan($('#plan_id').val());

            $.ajax({
                url: "/owner/projet/getchoices",
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
                                $('#risks-loader').hide();

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
                                $('#risks-loader').hide();
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

    <!-- Edition de la synthese du diagnostic interne -->
    <div class="modal fade" id="synDiagIntModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

    		<div class="modal-dialog modal-lg" role="document">
    			<div class="modal-content">
        				<div class="modal-header bg-info">
        					<h5 class="modal-title" id="myModalLabel"><span> SYNTHESE DU DIAGNOSTIC INTERNE</span></h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
        				</div>
        				<div class="modal-body">
        				    <div class="card">
        				        <div class="card-body">
        				            <p><?= $projet->synthese_diagnostic_interne ?></p>
        				        </div>
        				    </div>

        				</div>

        			</div>
    		</div>
    </div>


    <!-- Edition de la synthese du diagnostic externe-->
        <div class="modal fade" id="synDiagExtModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

        		<div class="modal-dialog modal-lg" role="document">
        			<div class="modal-content">
        				<div class="modal-header bg-info">
        					<h5 class="modal-title" id="myModalLabel"><span> SYNTHESE DU DIAGNOSTIC EXTERNE</span></h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
        				</div>
        				<div class="modal-body">
        				    <div class="card">
        				        <div class="card-body">
        				            <p><?= $projet->synthese_diagnostic_externe ?></p>
        				        </div>
        				    </div>

        				</div>

        			</div>
        		</div>

        </div>

        <!-- Edition de la synthese du diagnostic Strategique -->
        <div class="modal fade" id="synDiagStratModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

        		<div class="modal-dialog modal-lg" role="document">
        			<div class="modal-content">
        				<div class="modal-header bg-primary">

        					<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span> SYNTHESE DU DIAGNOSTIC STRATEGIQUE</span></h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
        				</div>
        				<div class="modal-body">
        				    <div class="card">
        				        <div class="card-body">
        				            <p><?= $projet->synthese_diagnostic_strategique ?></p>
        				        </div>
        				    </div>
        				</div>
        			</div>
        		</div>

        </div>



        <div class="modal fade" id="teaserModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
        		<div class="modal-dialog modal-lg" role="document">
        			<div class="modal-content">
        				<div class="modal-header bg-success">
        					<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>TEASER</span></h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
        				</div>
        				<div class="modal-body">
        				    <div class="card">
        				        <div class="card-header">
        				            <small class=""><?= $projet->teaser?date_format($projet->teaser->created_at,'d/m/Y'):'-' ?> - <span class="text-primary"><?= $projet->teaser?$projet->teaser->user->name:'-' ?></span></small>
        				        </div>
        				        <div class="card-body">
                                    <dl>
                                      <dt>CONTEXTE</dt>
                                      <dd><?= $projet->teaser?$projet->teaser->contexte:'-' ?></dd>
                                      <dt>PROBLEMATIQUE</dt>
                                     <dd><?= $projet->teaser?$projet->teaser->problematique:'-' ?></dd>
                                      <dt>MARCHE</dt>
                                      <dd><?= $projet->teaser?$projet->teaser->marche:'-' ?></dd>
                                      <dt>STRATEGIE</dt>
                                      <dd><?= $projet->teaser?$projet->teaser->strategie:'-' ?></dd>
                                      <dt>CHIFFRES CLEFS</dt>
                                      <dd><?= $projet->teaser?$projet->teaser->chiffres:'-' ?></dd>
                                      <dt>FOCUS REALISATION</dt>
                                      <dd><?= $projet->teaser?$projet->teaser->focus_realisations:'-' ?></dd>
                                    </dl>
        				        </div>
        				    </div>

        				</div>
        			</div>
        		</div>


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


        </div>

        @if($projet->modele)
        <div class="modal fade" id="bm" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
        		<div class="modal-dialog modal-xl" role="document">
        			<div class="modal-content">
        				<div class="modal-header bg-success">
        					<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>MODELE ECONOMIQUE</span></h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
        				</div>
        				<div class="modal-body">
        				    <form method="get" action="/owner/dossier/save-modele">
        				    <div class="card">
        				        <div class="card-body">
        				        <input type="hidden" name="token" value="{{ $projet->modele->token }}"/>
        				           <div class="form-group">
                                       <label for="offre">OFFRE</label>
                                       <textarea name="offre" id="offre" cols="30" rows="3" class="form-control">{{ $projet->modele->offre }}</textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="segment">SEGMENTS DE CLIENTELE</label>
                                       <textarea name="segment" id="segment" cols="30" rows="3" class="form-control">{{ $projet->modele->segment }}</textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="canaux">CANAUX DE DISTRIBUTION </label>
                                       <textarea name="canaux" id="canaux" cols="30" rows="3" class="form-contol">{{ $projet->modele->canaux }}</textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="relation">RELATION CLIENTS </label>
                                       <textarea name="relation" id="relation" cols="30" rows="3" class="form-control">{{ $projet->modele->relation }}</textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="partenaires">PARTENAIRES CLES</label>
                                       <textarea name="partenaires" id="partenaires" cols="30" rows="3" class="form-control">{{ $projet->modele->partenaires }}</textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="activites">ACTIVITES CLES </label>
                                       <textarea name="activites" id="activites" cols="30" rows="3" class="form-control">{{ $projet->modele->activites }}</textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="ressources">RESSOURCES CLES </label>
                                       <textarea name="ressources" id="ressources" cols="30" rows="3" class="form-control">{{ $projet->modele->ressources }}</textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="couts">COUTS</label>
                                       <textarea name="couts" id="couts" cols="30" rows="3" class="form-control">{{ $projet->modele->couts }}</textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="revenus">REVENUS</label>
                                       <textarea name="revenus" id="revenus" cols="30" rows="3" class="form-control">{{ $projet->modele->revenus }}</textarea>
                                   </div>
        				        </div>
        				        <div class="card-footer">
        				           <button class="btn btn-block btn-success" type="submit">ENREGISTRER</button>
        				        </div>
        				    </div>
        				    </form>
        				</div>
        			</div>

        		</div>
        </div>
        @endif
        <!-- Edition du teaser-->




<style>
         div.note-editor.note-frame{
                    padding: 0;
                }
              .note-frame .btn-default {
                    color: #222;
                    background-color: #FFF;
                    border-color: none;
                }

                label{
                color: #000000;
                margin-top: 10px;
                }
    </style>

      @if($projet->teaser)
           <input type="hidden" id="has_teaser" value="1"/>
           <div class="modal" id="popup" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
               <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                        <div class="modal-header">

                           <button onclick="$('#popup').hide();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       <div class="modal-body">
                           <div class="row">

                               <div style="overflow-y: scroll" class="col-md-11 col-sm-12">
                                       <p><b>Félicitations, votre teaser a été enregistré et Il a été envoyé à notre réseau d’investisseurs.</b> </p>

                                          <p> Vous pouvez dès lors :</p>
                                          <ul style="list-style: decimal">
                                               <li>Discuter avec les investisseurs en allant sur l’onglet « messagerie »</li>
                                               <li>Les rencontrer en étant accompagné d’un consultant du cabinet OBAC</li>
                                               <li>Leur donner accès à la « Data Room » en allant sur l’onglet « Liste des investisseurs » puis sur « Actions » et enfin  en cliquant sur « ouvrir la data room »</li>
                                               <li>Consulter les lettres d’intention dès lors qu’elles seront envoyées en cliquant sur « Liste des investisseurs » puis sur « Actions » et enfin sur « Lettre d’intention »</li>
                                               <li>Proposer aux investisseurs un contrat en se basant sur la documentation juridique présente dans l’onglet « MODELE DE DOCUMENT »</li>
                                               <li>Procéder à la signature de la documentation juridique et à la mise en ligne du document juridique. Après validation de ce document juridique par OBAC, l’investisseur procédera au versement des fonds sur un numéro de compte qui lui sera indiqué. </li>
                                               <li>Recevoir les fonds levés, déduits de la commission de succès de 5% du cabinet OBAC, des frais annuels d’abonnement à OBAC RISK MANAGEMENT pour la maitrise des risques de votre projet et d’une commission de gestion de x% sur le montant non décaissé. Le décaissement se fera par tranche en tenant compte de chaque étape de votre projet. </li>
                                               <li>Rédiger des rapports de gestion mensuels à destination des investisseurs</li>
                                          </ul>

                               </div>
                           </div>
                       </div>

                   </div>
               </div>
           </div>
       @else
           <input type="hidden" id="has_teaser" value="0"/>
       @endif


@endsection



@section('nav_actions')
<main>
    <nav style="top:30%" class="floating-menu">
        <ul class="main-menu">
            @if($projet->modepaiement_id==1)
                @if($projet->validated_step==1)
                   <li>
                        <a title="Editer le diagnostic externe" class="ripple" href="/owner/projet/create-diag-externe/{{ $projet->token }}"><i class="fa fa-pencil-alt"></i></a>
                   </li>
                @endif
            @endif
            @if(count($projet->investissements)>=1)
                   <li>
                        <a data-target="#angelsModal" data-toggle="modal" title="Liste des investisseurs potentiels" class="ripple" href="#"><i class="fa fa-users"></i></a>
                   </li>
            @endif
            <li>
                <a title=Modifier" href="#" class="ripple">
                    <i class="fa fa-edit fa-lg"></i>
                </a>
            </li>


            <li>
                <a data-toggle="modal" data-target="#upDocsModal" title="Charger les documents du projet" href="#" class="ripple">
                    <i class="fa fa-book fa-lg"></i>
                </a>
            </li>

            <li>
                <a data-toggle="modal" data-target="#reportEditModal" title="Editer le rapport mensuel de gestion" href="#" class="ripple">
                    <i class="fa fa-pencil-alt fa-lg"></i>
                </a>
            </li>


        </ul>
        <div
         style="
          background-image:-webkit-linear-gradient(top,#28a745 0,#167699 100%);
          background-image:-o-linear-gradient(top,#28a745 0,#167699 100%);
          background-image:-webkit-gradient(linear,left top,left bottom,from(#28a745),to(#167699));
          background-image:linear-gradient(to bottom,#efffff 0,tranparent 100%);
          background-repeat:repeat-x;position:absolute;width:100%;height:100%;border-radius:50px;z-index:-1;top:0;left:0;
          -webkit-transition:.1s;-o-transition:.1s;transition:.1s
        "
        class="menu-bg"></div>
    </nav>
</main>

<div class="modal fade" id="angelsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6  class="modal-title text-center">INVESTISSEURS POTENTIELS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
            <div class="card card-danger">
                <div class="card-body">
                     @if(count($projet->investissements)>=1)
                        <table style="color: #000" id="table-invest" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Depuis le</th>
                              <th>RDV</th>
                              <th>STATUT</th>
                              <th></th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projet->investissements as $invest)
                                    <tr>
                                        <td>{{ $invest->angel->name }}</td>
                                        <td><?= $invest->created_at?date_format($invest->created_at, 'd/m/Y H:i'):'-' ?></td>
                                        <td><?= $invest->rencontre ?></td>
                                        <td></td>
                                        <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-flat">Actions</button>
                                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                                  <span class="caret"></span>

                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                 <?php if($invest->lettre): ?>
                                                    <a class="dropdown-item" href="#">Lettre d'intention</a>
                                                  <?php endif; ?>
                                                  <?php if($invest->validated): ?>
                                                    <a class="dropdown-item" href="/owner/investissements/close/{{ $invest->token }}">Fermer la data room</a>
                                                  <?php else: ?>
                                                    <a class="dropdown-item" href="/owner/investissements/open/{{ $invest->token }}">Ouvrir la data room</a>
                                                  <?php endif; ?>

                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                @endif
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upDocsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6  class="modal-title text-center">CHARGEMENT DES DOCUMENTS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
            <div class="card card-danger">
                <div class="card-body">
                    <form action="/owner/projets/docs/" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="projet_token" value="{{ $projet->token }}"/>
                        <div class="form-group">
                            <label for="ordre">ORDRE DE VIREMENT</label>
                            <input type="file" class="form-control" id="ordre" name="ordre"/>
                        </div>
                        <div class="form-group">
                            <label for="pacte">PACTE DES ACTIONNNAIRES</label>
                            <input type="file" class="form-control" id="pacte" name="pacte"/>
                        </div>
                        <div class="form-group">
                            <label for="pret">CONTRAT DE PRET</label>
                            <input type="file" class="form-control" id="pret" name="pret"/>
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-block"> <i class="fa fa-save fa-lg"></i> ENREGISTRER</button>
                    </form>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>

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
                    <form method="post" action="/owner/projets/edit-report">
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
<style>
   .modal .card-title{
        color: #000000;
        font-weight: bold;
   }

   .modal label{
        font-size: x-small;
        line-height: 0.5;
   }
   .card.maximized-card {

               overflow-y: scroll;
           }
</style>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#table-invest").DataTable();

  });
</script>

@endsection