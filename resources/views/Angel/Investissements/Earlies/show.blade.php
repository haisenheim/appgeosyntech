@extends('......layouts.angel')
@section('page-title')
{{ $investissement->earlie->name }}
<?php $doc = $investissement->doc_juridiqueUri?1:0; $doc_validated=$investissement->obac_doc_juridique_validated; ?>
<input type="hidden" id="doc" value="{{ $doc }}"/>
<input type="hidden" id="doc_validated" value="{{ $doc_validated }}"/>
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
<div class="card">
        <div class="card-header">
            <?php $projet = $investissement->earlie ?>
          <h3 class="card-title">{{$projet->name}} - {{$projet->code}} - <small><?= date_format($projet->created_at,'d/m/Y') ?></small></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Reduire">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Fermer">
              <i class="fas fa-times"></i></button>
          </div>
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
        <!-- /.card-body -->
      </div>
      <div  class="modal fade" id="JustificatifModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-success">
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

                    <button id="btn-save3" type="submit" class="btn btn-success btn-block"> ENREGISTRER </button>
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
              <div class="modal-header bg-success">
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

                    <button id="btn-save2" type="submit" class="btn btn-success btn-block"> ENREGISTRER </button>
                </form>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
      @endif
      <div  class="modal fade" id="LetterModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h4  class="modal-title text-center">LETTRE D’INTENTION</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div style="padding: 20px 20px 40px 20px; font-family: 'Gill Sans MT', Calibri, sans-serif" class="modal-body">
                 <form id="letter" enctype="multipart/form-data" class="form" action="/angel/letter/" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{ $investissement->token }}"/>

                    <p>La présente lettre d’intention décrit les principales conditions et modalités selon lesquelles l’investissement envisagé dans la société <span style="font-weight: bold"> {{ $investissement->projet->owner->name }} </span>  pourrait être réalisé. </p>
                    <p>Elle ne constitue en aucun cas un engagement ferme et irrévocable des parties de procéder à cet investissement. </p>
                    <p>Cette lettre d’intention a été préparée sur la base et en l’état des informations reçues de la Société à ce jour,
                     particulièrement du business plan qui ont été préparés par les Fondateurs.</p>
                    <p>Le montant total de l’investissement étant estimé à
                    <span style="font-weight: bold"> {{ $investissement->projet->montant }} &nbsp; {{ $investissement->projet->devise->name }} </span>, je, soussigné,<span style="font-weight: bold"> {{ $investissement->angel->name }} </span>, agissant pour
                     <span style="width: 300px;">
                        <select style="font-weight: bold" class="form-control" name="personnel" id="">
                            <option value="1">MON PROPRE COMPTE</option>
                            @if($investissement->angel->organisme_id)
                                <option value="0">{{ $investissement->angel->organisme->name }}</option>
                            @endif
                            @if($investissement->angel->entreprise_id)
                                <option value="0">{{ $investissement->angel->entreprise->name }}</option>
                            @endif
                        </select>
                     </span>
                     ,
                     manifeste le souhait de participer à cette opération sous forme de
                     <span style="font-weight: bold; width:300px">

                        <select class="form-control" name="forme_id" id="forme_id">
                            @foreach($formes as $forme)
                                <option value="{{ $forme->id }}">{{ $forme->name }}</option>
                            @endforeach
                        </select>
                     </span>
                     (prise de participation ou/et Prêts et/ou Engagements par signature)
                     à hauteur de <span style="font-weight: bold; width:300px"> <input class="form-control" name="montant" type="number"/> </span>. </p>
                    <p class="blocx" style="display: block" id="block-1">
                        La prise de participation représentera donc un pourcentage de
                         <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_participation" type="number"/> </span> % au capital du projet <span style="font-weight: bold"> {{ $investissement->projet->name }}  </span>
                    </p>
                    <p class="blocx" style="display: none" id="block-2">
                        Le prêt sera effectué
                        sur une durée de <span style="font-weight: bold; width:100px"> <input class="form-control" name="duree_pret" type="number"/> </span> année(s) à un taux annuel de <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_pret" type="number"/> </span> %, avec
                        <span style="font-weight: bold; width:300px">
                            <select class="form-control" name="type_remboursement" >
                                    <option value="Remboursement In fine">Remboursement In fine </option>
                                    <option value="Amortissement constant du capital">Amortissement constant du capital</option>
                                    <option value="Annuités constantes">Annuités constantes</option>
                            </select>
                        </span>
                    </p>

                    <p class="blocx" style="display: none" id="block-3">
                        L’engagement par signature sera effectué sur une durée de <span style="font-weight: bold; width:100px"> <input id="duree_engagement" class="form-control" name="duree_engagement" type="number"/> </span> année(s), a une commission de caution de <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_engagement" type="number"/> </span>% ou <span style="font-weight: bold; width: 300px"> <input class="form-control" placeholder="Saisir un montant" name="mt_engagement" type="number"/> </span>.
                    </p>

                    <br/>
                    <br/>

                    <div style="float: right; margin-right: 50px">
                        Fait à <span style="font-weight: bold; width:300px"> <input id="lieu" class="form-control" name="lieu" type="text" required="true"/> </span>, le {{ date('d/m/Y') }}.
                        <br/> <br/>
                        Pour l’investisseur
                        <br/>
                        <br/>
                        <span style="font-weight: bold">{{ $investissement->angel->name }}</span>

                    </div>
                    <input type="hidden" name="token" id="token" value="{{ $investissement->token }}"/>
                    <button id="btn-save" type="submit" class="btn btn-success btn-block"> ENREGISTRER </button>
                </form>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="meModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h6  class="modal-title text-center">Description du modèle économique</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                    <p><?= $projet->description_modele_economique ?></p>
                </div>
            </div>
        </div>
    </div>
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



    <style>
        .modal .form-control{
            display:inline;
            width:auto;
            font-weight: bold;
            margin:5px;
        }

        .card.maximized-card {

            overflow-y: scroll;
        }
    </style>


     <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <script>

         $('#closemsg').click(function(e){$('#msg').hide()})
        $('#forme_id').change(function(e){
            $('.blocx').hide();
            var id = $('#forme_id').val();
            $('#block-'+id).show();
        });

        $(document).ready(function(){
           // var orm = 'http://localhost/ormsys/api/';


           setTimeout(function() {
             if($('#doc').val()==1){
                if($('#doc_validated').val()==1){
                    $('#msg').show();
                }
             }

           },2000);




            $.ajax({
                url: "/angel/opportunites/dossier/getchoices",
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


    <script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>


                <!-- SweetAlert2 -->
        <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
                <!-- Toastr -->
        <script type="text/javascript" src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <script>



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
                       url:'/angel/investissement/dossier/doc',
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
                       url:'/angel/investissement/dossier/justificatif',
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


    </script>
</div>
@endsection

