@extends('......layouts.angel')


<?php
use \Illuminate\Support\Facades\Auth;

    $projet = $investissement->dossier;
?>

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
                    <div id="side1" class="col-md-4 col-sm-12" style="">
                       @include('includes.Sidebars.dossier_angel')
                    </div>
                    <div style="" id="side2" class="col-md-8 col-sm-12">
                         @include('includes.Show.diagnostic1')
                    </div>
                </div>
                <div style="margin-top: 30px" class="">
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

         @if($projet->modepaiement_id>0)
          <input type="hidden" id="tokpay" value="<?= $projet->token ?>"/>
         @endif


    <!-- Edition de la synthese du diagnostic interne  -->
    @include('includes.Show.synthese1')
    <!-- Edition de la synthese du diagnostic externe-->
    @include('includes.Show.synthese2')
        <!-- Edition de la synthese du diagnostic Strategique -->
    @include('includes.Show.synthese3')
        <!-- Edition du teaser-->
        @include('includes.Show.teaser')

        @if($projet->modele)
        @include('includes.Show.business_model')
        @endif

    <div class="card card-success collapsed-card">
        <div class="card-header">
            <h5 class="card-title">Rapports mensuels de gestion</h5>
              <div class="card-tools">
                  <button title="dérouler" data-toggle="tooltip" type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize" data-toggle="tooltip" title="Agrandir"><i class="fas fa-expand"></i>
                  </button>
              </div>
        </div>
        <div class="card-body">
            @if($investissement->report)
                @include('includes.Show.report')
            @else
                <div class="alert alert-danger">
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <p>VOUS N'ETES PAS AUTORISE A ACCEDER A CES INFORMATIONS. VEUILLEZ CONTACTER LE CABINET OBAC.</p>
                </div>
            @endif

         </div>
    </div>
    <div  class="modal fade" id="JustificatifModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4  class="modal-title text-center">CHARGEMENT Du JUSTIFICATIF DE VOTRE PAIEMENT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="padding: 20px 20px 40px 20px; font-family: 'Gill Sans MT', Calibri, sans-serif" class="modal-body">
                 <form id="letter" enctype="multipart/form-data" class="form" action="/angel/investissement/doc/" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{ $investissement->token }}"/>
                    <input type="file" name="justificatifUri" id="justificatifUri" class="form-control"/>

                    <button id="btn-save3" type="submit" class="btn btn-info btn-block"> ENREGISTRER </button>
                </form>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>

        @if($investissement->lettre)
       <div  class="modal fade" id="DocModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                <h4  class="modal-title text-center">CHARGEMENT DE VOTRE {{ $investissement->lettre->forme_id==1?'CONTRAT D\'ASSOCIES':$investissement->lettre->forme_id==2?'CONTRAT DE PRET':'CONTRAT D\'ENGAGEMENT' }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="padding: 20px 20px 40px 20px; font-family: 'Gill Sans MT', Calibri, sans-serif" class="modal-body">
                 <form id="letter" enctype="multipart/form-data" class="form" action="/angel/investissement/doc/" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{ $investissement->token }}"/>
                    <input type="file" name="docUri" id="docUri" class="form-control"/>

                    <button id="btn-save2" type="submit" class="btn btn-danger btn-block"> ENREGISTRER </button>
                </form>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
        @endif
      @include('includes.Edit.lettre_intention')

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

    #concurrents table th{
       max-width:50%;
    }

</style>

 <div class="modal" id="msg" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

         	<div class="modal-dialog modal-lg" role="document">
         		<div class="modal-content">
         		    <div class="modal-header bg-success">
                    <h4></h4>
                    <button id="closemsg" type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
         			<div class="modal-body">
         				<div class="row">
         				    <div class="col-md-5 col-sm-12">
         				         <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                   </div>
         				    </div>
         				    <div class="col-md-7 col-sm-12">
                                 <p> Félicitations ! Vous êtes sur le point de clôturer votre opération. </p>
                                 <p>  Afin de procéder à votre investissement, nous vous invitons à effectuer un virement ou un dépôt sur le numéro de compte suivant : </p>
                                 <ul>
                                    <li>Code Banque : 30014</li>
                                    <li>Code Guichet : 00001</li>
                                    <li> Numéro de compte : 01206971401</li>
                                    <li>Clé RIB : 80</li>
                                 </ul>

         				    </div>
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
            					         <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                         </div>
            					    </div>
            					    <div class="col-md-7 col-sm-12">
                                            <p>Félicitations ! Votre lettre d’intention a été envoyée au porteur de projet.</p>

                                               <p>Dès que la somme des intentions d’investissement atteindra le montant sollicité par le porteur de projet,
                                               vous aurez la possibilité d’accéder à la documentation juridique à savoir le contrat qui encadre votre relation d’affaires.
                                                Celle-ci pourra faire l’objet d’une discussion avec le porteur de projet dans l’onglet « Messagerie ».</p>

                                               <p>Une fois un accord trouvé, la documentation juridique devra être signée par les deux parties puis mis en ligne pour
                                               être validée par OBAC</p>
                                            <a class="btn btn-success btn-block" href="/angel/investissements/dossiers">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
            					    </div>
            					</div>
            				</div>


            			</div>
            		</div>

            </div>
     <div class="modal" id="popup2" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

            		<div class="modal-dialog modal-lg" role="document">
            			<div class="modal-content">
            				<div class="modal-body">
            					<div class="row">
            					    <div class="col-md-5 col-sm-12">
            					         <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                                         </div>
            					    </div>
            					    <div class="col-md-7 col-sm-12">
                                            <p>Félicitations ! Vous venez de mettre en ligne votre contrat d’affaires. </p>

                                            <p> L’équipe juridique d’OBAC prendra le temps de l’analyser dans un délai de 48 heures avant de procéder à sa validation. </p>

                                            <a class="btn btn-success btn-block" href="/angel/investissements/dossiers">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
            					    </div>
            					</div>
            				</div>


            			</div>
            		</div>

            </div>

     <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">

     	<div class="modal-dialog modal-lg" role="document">
     		<div class="modal-content">
     			<div class="modal-body">
     				<div class="row">
     				    <div class="col-md-5 col-sm-12">
     				         <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

                               </div>
     				    </div>
     				    <div class="col-md-7 col-sm-12">
                                <p>Félicitations ! vous venez d’envoyer le justificatif de versement des fonds. L’équipe juridique d’OBAC procèdera
                                 à son authentification et sa validation dans un délai de 72h.</p>

                                <p>A la suite de la validation de ce justificatif, votre opération sera validée et vous pourrez dès lors suivre l’évolution
                                de votre investissement en souscrivant à l’offre « Rapport d’activité mensuel » à hauteur de 145 000 FCFA HT / trimestre</p>


                                  <a class="btn btn-success btn-block" href="/angel/investissements/dossiers">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
     				    </div>
     				</div>
     			</div>


     		</div>
     	</div>

     </div>

<script type="text/javascript" src="{{ asset('js/tinymce/jquery.tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
 <script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>
                <!-- SweetAlert2 -->
 <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
                <!-- Toastr -->
 <script type="text/javascript" src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script>


    $(document).ready(function(){

         var h1 = $('#side1 .card').height();
         $('#side2 .card').height(h1).css({'overflow-y':'scroll'});

         $('#btn-print').click(function(e){
             e.preventDefault();
             var link='/print/projet/'+$('#tokpay').val();

             window.location.replace(link);
         });
        getPlan($('#plan_id').val());

       setTimeout(function() {
             if($('#doc').val()==1){
                if($('#doc_validated').val()==1){
                    $('#msg').show();
                }
             }
           },2000);

            $.ajax({
                url: "/angel/opportunites/projet/getchoices",
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

      tinymce.init({
        selector:'textarea'
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



   $('#btn-save').click(function(e){
           e.preventDefault();
           var spinHandle_firstProcess = loadingOverlay.activate();
           const Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  showConfirmButton: false,
                                  timer: 5000
                                });

           var letter = $('#letter');
           var inputs = letter.find('input');
           var selects = letter.find('select');
           //var donnees = [];

                   var values = {};
                   for (var i=0; i < inputs.length; i++) {
                       var id = inputs[i].getAttribute('name');
                       values[id] = $('input[name="'+id+'"]').val();
                   }
                   for (var i=0; i < selects.length; i++) {
                                          var id = selects[i].getAttribute('name');
                                          values[id] = $('select[name="'+id+'"]').val();
                                      }

                   //values.type_remboursement_id = $('')

           $.ajax({
               url:'/angel/letter',
               dataType:'json',
               type:'post',
               data:values,
               beforeSend:function(xhr){
                            xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
                        },
               success:function(data){

                   $('#IpM').hide();
                               Toast.fire({
                                       type: 'success',
                                       title: 'Demande initialisée succès!!!'
                                     });
                                     setTimeout(function() {
                                        loadingOverlay.cancel(spinHandle_firstProcess);
                                       $('#popup').show();
                                     },2000);
               }
           });
        });

         $('#btn-save2').click(function(e){

                   e.preventDefault();
                   const Toast = Swal.mixin({
                                          toast: true,
                                          position: 'top-end',
                                          showConfirmButton: false,
                                          timer: 5000
                                        });

                   if($('#docUri').val().length<1){
                        alert('Aucun document n\'a été soumis');
                   }else{
                         var spinHandle_firstProcess = loadingOverlay.activate();
                         var fd = new FormData();
                         fd.append('doc_juridiqueUri',$('#docUri')[0].files[0]);
                         fd.append('token',$('#token').val())


                   $.ajax({
                       url:'/angel/investissement/projet/doc',
                       dataType:'json',
                       type:'post',
                        enctype:'multipart/form-data',
                        processData:false,
                        contentType:false,
                        data:fd,
                       beforeSend:function(xhr){
                                    xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
                                },
                       success:function(data){

                           $('#IpM').hide();
                                       Toast.fire({
                                               type: 'success',
                                               title: 'Demande initialisée succès!!!'
                                             });
                                             setTimeout(function() {
                                                loadingOverlay.cancel(spinHandle_firstProcess);
                                               $('#popup2').show();
                                             },2000);
                       }
                   });
                   }

                });

          $('#btn-save3').click(function(e){

                   e.preventDefault();
                   const Toast = Swal.mixin({
                                          toast: true,
                                          position: 'top-end',
                                          showConfirmButton: false,
                                          timer: 5000
                                        });

                   if($('#justificatifUri').val().length<1){
                        alert('Aucun document n\'a été soumis');
                   }else{
                         var spinHandle_firstProcess = loadingOverlay.activate();
                         var fd = new FormData();
                         fd.append('justificatifUri',$('#justificatifUri')[0].files[0]);
                         fd.append('token',$('#token').val())


                   $.ajax({
                       url:'/angel/investissement/projet/justificatif',
                       dataType:'json',
                       type:'post',
                        enctype:'multipart/form-data',
                        processData:false,
                        contentType:false,
                        data:fd,
                       beforeSend:function(xhr){
                                    xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
                                },
                       success:function(data){

                           $('#IpM').hide();
                                       Toast.fire({
                                               type: 'success',
                                               title: 'Demande initialisée succès!!!'
                                             });
                                             setTimeout(function() {
                                                loadingOverlay.cancel(spinHandle_firstProcess);
                                               $('#popup3').show();
                                             },2000);
                       }
                   });
                   }

                });

     $('#closemsg').click(function(e){$('#msg').hide()})
        $('#forme_id').change(function(e){
            $('.blocx').hide();
            var id = $('#forme_id').val();
            $('#block-'+id).show();
        });

</script>

@endsection








