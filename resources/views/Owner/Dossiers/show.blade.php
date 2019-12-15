@extends('......layouts.owner')

@section('content-header')
 <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">{{$projet->name}}</h3>
@endsection
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
                         @include('includes.Show.diagnostic1')
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
           <style>
            #concurrents table th{
                max-width:50%;
            }
         </style>
         @if($projet->modepaiement_id>0)
          <input type="hidden" id="tokpay" value="<?= $projet->token ?>"/>
         @endif
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
          <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>
    <script>
        $(document).ready(function(){
            getPlan($('#plan_id').val());
            var tsr = $('#has_teaser').val();
                   if(tsr){
                      setTimeout(function() {
                                  $('#popup').show();
                                },9000);
                   }

                   $('textarea').summernote({
                    height: 125,
                    tabsize: 2,
                    followingToolbar: true,
                    lang:'fr-FR'
                  });

            $.ajax({
                url: "/owner/dossier/getchoices",
                type:'Get',
                dataType:'json',
                data:{id:$('#tokpay').val()},
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

    <!-- Edition de la synthese du diagnostic interne  -->
    @include('includes.Show.synthese1')


    <!-- Edition de la synthese du diagnostic externe-->
    @include('includes.Show.synthese2')

        <!-- Edition de la synthese du diagnostic Strategique -->
    @include('includes.Show.synthese3')


        <!-- Edition du teaser-->
        @include('includes.Show.teaser')

        @if($projet->modele)
        @include('includes.Edit.business_model')
        @endif
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
                        <a title="Editer le diagnostic externe" class="ripple" href="/owner/dossier/create-diag-externe/{{ $projet->token }}"><i class="fa fa-pencil-alt text-warning"></i></a>
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

@include('includes.Show.list_ba')
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
                    <form action="/owner/dossier/docs/" method="post" enctype="multipart/form-data">
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

@include('includes.Edit.rapport_mensuel')
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


@endsection