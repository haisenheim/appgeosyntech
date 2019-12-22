@extends('......layouts.national')
@section('content')


<?php //dd($projet->resultats)

 ?>
 <input type="hidden" value="<?= $projet->token ?>" id="token"/>

        <div class="bg-success p-20">
          <h3 class="">{{$projet->name}} - {{$projet->code}} - <small><?= date_format($projet->created_at,'d/m/Y') ?></small></h3>
        </div>
        <hr/>
        <div class="">
          <div class="row">
            <div id="side1" class="col-md-8 col-lg-9 col-sm-12">
                @if($projet->etape==4)
                     <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Investissement</span>
                      <span class="info-box-number text-center text-muted mb-0"><?= number_format($projet->montant_investissement,0,',','.') ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Besoin en fonds de roulement</span>
                      <span class="info-box-number text-center text-muted mb-0"><?= number_format($projet->bfr ,0,',','.') ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Cout global</span>
                      <span class="info-box-number text-center text-muted mb-0"><?= number_format(($projet->montant_investissement + $projet->bfr),0,',','.') ?> </span>
                    </div>
                  </div>
                </div>
              </div>
                @endif
                @include('includes.Show.diagnostic1')
            </div>
            <div id="side2" class="col-md-4 col-lg-3 col-sm-12">
                @include('includes.Sidebars.admin_dossier')
            </div>
          </div>
          <div class="">
                @if($projet->etape>=2)
                   @include('includes.Show.diagnostic2')

                  @endif


                  @if($projet->etape>=3)
                    @include('includes.Show.diagnostic3')
                        <script>
                            $(document).ready(function(){
                                getPlan($('#plan_id').val());
                            });
                        </script>
                  @endif

                  @if($projet->etape>=4)
                    @include('icludes.show.plan_financier')
                  @endif

                </div>
              </div>



        <!-- /.card-body -->


    @if($projet->modele)
        <style>
            #meModal .card-title{
                font-weight: 800;
                font-size: 0.9rem;
            }
        </style>
        <div class="modal fade" id="meModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
        		<div class="modal-dialog modal-xl" role="document">
        			<div class="modal-content">
        				<div class="modal-header bg-success">
        					<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>MODELE ECONOMIQUE</span></h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
        				</div>
        				<div class="modal-body">

        				    <div class="card">
        				        <div class="card-header">


                                      <div class="card-tools">

                                           <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                                           </button>

                                      </div>
                                </div>
        				        <div class="card-body">
        				            <div class="row">
        				                <div class="col-md-2 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">PARTENAIRES</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->partenaires ?>
        				                        </div>
        				                    </div>
        				                </div>
        				                <div class="col-md-3 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">ACTIVITES</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->activites ?>
        				                        </div>
        				                    </div>
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">RESSOURCES</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->ressources ?>
        				                        </div>
        				                    </div>
        				                </div>
        				                <div class="col-md-2 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">OFFRE</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->offre ?>
        				                        </div>
        				                    </div>
        				                </div>
        				                <div class="col-md-3 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">RELATION CLIENT</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->relation ?>
        				                        </div>
        				                    </div>
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">CANAUX DE DISTRIBUTION</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->canaux ?>
        				                        </div>
        				                    </div>
        				                </div>
        				                <div class="col-md-2 col-sm-12">
        				                    <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">SEGMENTS CLIENT</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->segment ?>
        				                        </div>
        				                    </div>
        				                </div>
        				            </div>
        				            <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">STRUCTURE DES COUTS</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->couts ?>
        				                        </div>
        				                    </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="card">
        				                        <div class="card-header">
        				                            <h3 class="card-title">SOURCES DE REVENUS</h3>
        				                        </div>
        				                        <div class="card-body">
        				                            <?= $projet->modele->revenus ?>
        				                        </div>
        				                    </div>
                                        </div>
        				            </div>

        				    </div>

        				</div>
        			</div>

        		</div>

        </div>
        </div>
     @endif



     <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <script>
        $(document).ready(function(){
           // var orm = 'http://localhost/ormsys/api/';
            $.ajax({
                url: "/national/projet/getchoices",
                type:'Get',
                dataType:'json',
                data:{id:$('#token').val()},
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

                                        console.log(risks[i][1][k]);
                                    }
                                    console.log(risks[i][1]);

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

@endsection

@section('nav_actions')
<main>
    <nav class="floating-menu">
        <ul class="main-menu">

            @if($projet->investissements->count()>=1)
                   <li>
                        <a data-target="#angelsModal" data-toggle="modal" title="Liste des investisseurs potentiels" class="ripple" href="#"><i class="fa fa-users"></i></a>
                   </li>
            @endif
            @if($projet->etape==1 && $projet->validated_step==0 && $projet->modepaiement_id>0)
                   <li>
                        <a  title="Valider le premier paiement" class="ripple" href="/national/projet/validate-diag-interne/{{ $projet->token }}"><i class="fa fa-coins"></i></a>
                   </li>
            @endif
            @if($projet->etape==2 && $projet->validated_step<2 )
                   <li>
                        <a  title="Valider le deuxieme paiement" class="ripple" href="/national/projet/validate-diag-externe/{{ $projet->token }}"><i class="fa fa-coins"></i></a>
                   </li>
            @endif
            @if($projet->etape==3 && $projet->validated_step<3 )
                   <li>
                        <a  title="Valider le troisieme paiement" class="ripple" href="/national/projet/validate-plan-strategique/{{ $projet->token }}"><i class="fa fa-coins"></i></a>
                   </li>
            @endif
            @if($projet->etape==4 && $projet->validated_step<4 )
                   <li>
                        <a  title="Valider le quatrieme paiement" class="ripple" href="/national/projet/validate-plan-financier/{{ $projet->token }}"><i class="fa fa-coins"></i></a>
                   </li>
            @endif

             @if($projet->etape==4 && $projet->validated_step>=4 )
                @if($projet->ordrevirement_validated)
                   <li>
                        <a  title="Rejeter l'ordre de virement" class="ripple" href="/national/projet/disvalidate-ordre-virement/{{ $projet->token }}"><i class="fa fa-trash"></i></a>
                   </li>
                 @else
                   <li>
                        <a  title="Valider l'ordre de virement" class="ripple" href="/national/projet/validate-ordre-virement/{{ $projet->token }}"><i class="fa fa-check"></i></a>
                   </li>
                 @endif
            @endif

            @if($projet->active )
                   <li>
                        <a  title="Bloquer le dossier" class="ripple" href="/national/projet/disable/{{ $projet->token }}"><i class="fa fa-lock"></i></a>
                   </li>
             @else
                    <li>
                        <a  title="debloquer le dossier" class="ripple" href="/national/projet/enable/{{ $projet->token }}"><i class="fa fa-unlock"></i></a>
                   </li>
            @endif





        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

<div class="modal fade" id="angelsModal">
    <div class="modal-dialog modal-xl">
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
                                <th style="width: 5%;"></th>
                              <th>#</th>
                              <th>Entreprise</th>
                              <th>Organisme Fin.</th>
                              <th>Depuis le</th>
                              <th>RDV</th>

                              <th style="width: 10%;"></th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projet->investissements as $invest)
                                    <tr>
                                         <td style="width: 5%;"></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#angelMoal">
                                                <img style="border-radius: 50%;float: left;height: 40px;width: 40px;"
                                                    src="{{ $invest->angel->imageUri?asset('img/'.$invest->angel->imageUri):asset('img/avatar.png') }}" /> <br/>
                                               <p>{{ $invest->angel->name }}  </p>
                                        </a>
                                        </td>
                                        <td>
                                            <?php if($invest->angel->entreprise): ?>
                                                    <img  style="border-radius: 50%;float: left;height: 40px;width: 40px;" src="{{ $invest->angel->entreprise->imageUri?asset('img/'.$invest->angel->entreprise->imageUri):asset('img/logo-obac.png') }}" /> <br/>
                                                    <p>{{ $invest->angel->entreprise->name }}</p>

                                             <?php else: ?>
                                                -
                                             <?php endif; ?>
                                        </td>
                                         <td>
                                            <?php if($invest->angel->organisme): ?>
                                                    <img  style="border-radius: 50%;float: left;height: 40px;width: 40px;" src="{{ $invest->angel->organisme->imageUri?asset('img/'.$invest->angel->organisme->imageUri):asset('img/logo-obac.png') }}" /> <br/>
                                                    <p>{{ $invest->angel->organisme->name }}</p>

                                             <?php else: ?>
                                                -
                                             <?php endif; ?>
                                        </td>
                                        <td><?= $invest->created_at?date_format($invest->created_at, 'd/m/Y'):'-' ?></td>
                                        <td><?= \Illuminate\Support\Carbon::createFromTimeString($invest->rencontre)->format('d/m/Y'); ?></td>

                                        <td style="width: 10%;">

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-flat">Actions</button>
                                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                                  <span class="caret"></span>

                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                 <?php if($invest->lettre): ?>
                                                    <a class="dropdown-item" href="/national/letter/create/{{ $invest->token }}">Lettre d'intention</a>
                                                  <?php endif; ?>
                                                  <?php if(!$invest->doc_juridique): ?>
                                                    <a title="Autoriser l'accès à la documentation juridique" class="dropdown-item" href="/national/projet/docs/open/{{ $invest->token }}">Ouvrir la documentation</a>
                                                  <?php else: ?>
                                                    <a title="Autoriser l'accès à la documentation juridique" class="dropdown-item" href="/national/projet/docs/close/{{ $invest->token }}">Fermer la documentation</a>
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

<style>
    td p {
       border-radius: .3rem;
       color:#444;

       position: relative;
       font-weight: bold;
       display:inline-block;
       font-size: smaller;
    }
</style>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#table-invest").DataTable({
        "lengthChange":true

    });

  });
</script>

@endsection
