@extends('......layouts.consultant')
@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="well">

                            <h4 style="background-color: inherit">{{ $projet->name  }}</h4>
                            <p>CODE : {{ $projet->code }}</p>
                            <p>DATE DE CREATION : <span class="value"> {{ date_format($projet->created_at,'d/m/Y') }}</span></p>
                            <p>PROMOTEUR : <span class="value">{{ $projet->owner->name }}</span></p>
                            <p>AUTEUR : {{ $projet->auteur->name }}</p>
                            <p class="text-danger" style="font-weight: 700" > {{ $projet->capital?'DOSSIER D\'AUGMENTATION DE CAPITAL':'' }}</p>
                            <p>MONTANT : {{ $projet->montant }}</p>
                            <input type="hidden" id="id" value="<?= $projet->token ?>"/>
                            <p><i class="fa fa-map-marker"></i> {{ $projet->ville->name }}</p>
                            @if($projet->expert_id)
                                <p>CONSULTANT : <span class="value">{{ $projet->consultant->name }}</span></p>

                            @endif

                            <input type="hidden" id="projet_token" value="<?= $projet->token ?>" name="projet_token"/>

                            @if($projet->modepaiement_id>0)
                                <h6 class="page-header" style="background-color: inherit">MODALITE DE PAIEMENT</h6>
                                <ul class="list-group">
                                    <li class="list-group-item"><span style="font-weight: 700">{{ $projet->modepaiement->name }}</span></li>
                                    <li class="list-group-item" >PRIX HT : <span style="font-weight: 700">{{ $projet->modepaiement->prix }}</span></li>
                                    <li class="list-group-item">PRIX TTC : <span style="font-weight: 700">{{ $projet->modepaiement->prixttc }}</span></li>
                                </ul>
                            @else
                                <div>
                                    <h6 class="page-header" style="background-color: inherit">MODALITE DE PAIEMENT</h6>

                                    <ul class="list-group">
                                        <li class="list-group-item"><span id="mode_name" style="font-weight: 700"></span></li>
                                        <li class="list-group-item" >PRIX HT : <span id="mode_prix" style="font-weight: 700"></span></li>
                                        <li class="list-group-item">PRIX TTC : <span id="mode_prixttc" style="font-weight: 700"></span></li>
                                        <li class="list-group-item">
                                        <p id="mode_description"></p>
                                        </li>
                                    </ul>
                                    <hr/>
                                    <form action="/consultant/dossier/add-mode" method="get" class="form-inline">
                                        <input type="hidden" id="projet_token" value="<?= $projet->token ?>" name="projet_token"/>
                                        <select style="background-color: #FFFFFF" class="form-control" name="mode_id" id="mode_id">
                                            <option value="0">Choix d'une offre de service</option>
                                            @foreach($modes as $mode)
                                                <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-check"></i> ENREGISTRER</button>

                                    </form>
                                </div>
                            @endif
                        </div>


                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="widget">
                            <div class="widget-content">
                                <fieldset>
                                <legend>EDITION DU DIAGNOSTIC STRATEGIQUE</legend>
                                    {{csrf_field()}}
                                    <div class="stepwizard">
                                         <div class="stepwizard-row setup-panel">
                                                     <div class="stepwizard-step">
                                                         <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                                         <p>SWOT</p>
                                                     </div>

                                                     <div class="stepwizard-step">
                                                         <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                         <p>OBJECTIFS</p>
                                                     </div>

                                                     <div class="stepwizard-step">
                                                         <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                         <p>ORGANISATION</p>
                                                     </div>

                                                     <div class="stepwizard-step">
                                                         <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                                         <p>ACTIONS RISQUES</p>
                                                     </div>

                                                     <div class="stepwizard-step">
                                                         <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                                                         <p>ACTIONS STRAT.</p>
                                                     </div>

                                                     <div class="stepwizard-step">
                                                         <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                                                         <p>FAISABILITE</p>
                                                     </div>

                                                 </div>
                                     </div>
                                    <div class="">
                                           <div class="setup-content" id="step-1">
                                            <div class="card">
                                              <div class="card-header">
                                                 <h6 style="background-color: transparent" class="text-center">SWOT</h6>
                                              </div>
                                              <div class="card-body">
                                                 <div class="">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">

                                                                <label>SYNTHESE DES OPPORTUNITES</label>
                                                                <textarea class="form-control" name="" id="synop" cols="30" rows="3"></textarea>


                                                            </div>

                                                        </div>
                                                        <hr/>
                                                        <div class="col-sm-12 col-md-12">
                                                           <div class="form-group">
                                                                         <label>SYNTHESE DES MENACES</label>
                                                                         <textarea class="form-control" name="" id="synmen" cols="30" rows="3"></textarea>

                                                                    </div>
                                                        </div>
                                                        <hr/>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                    <label>SYNTHESE DES FORCES DE L'ENTREPRISE</label>
                                                                     <textarea class="form-control" name="" id="synforces" cols="30" rows="3"></textarea>
                                                            </div>

                                                        </div>
                                                        <hr/>
                                                        <div class="col-sm-12 col-md-12">
                                                            <label for="synfaiblesses">SYNTHESE DES FAIBLESSES DE L’ENTREPRISE</label>
                                                             <textarea class="form-control" name="" id="synfaiblesses" cols="30" rows="3"></textarea>

                                                        </div>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="card-footer text-center">
                                                  <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> Precedent</button>
                                                  <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                              </div>
                                            </div>
                                            </div>
                                           <div class="setup-content" id="step-2">
                                                <div class="card">
                                                   <div class="card-header">
                                                        <h6 class="text-center">DEFINITION DES OBJECTIFS</h6>
                                                   </div>
                                                   <div class="card-body">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">

                                                                <label>OBAJECTIFS A COURT TERME</label>
                                                                <textarea class="form-control" name="" id="objectifs_courts" cols="30" rows="3"></textarea>


                                                            </div>

                                                        </div>
                                                        <hr/>
                                                        <div class="col-sm-12 col-md-12">
                                                           <div class="form-group">
                                                                         <label>OBJECTIFS A MOYEN TERME</label>
                                                                         <textarea class="form-control" name="" id="objectifs_moyens" cols="30" rows="3"></textarea>

                                                                    </div>
                                                        </div>
                                                        <hr/>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                  <label>OBJECTIFS A LONG TERME</label>
                                                                  <textarea class="form-control" name="" id="objectifs_longs" cols="30" rows="3"></textarea>
                                                            </div>

                                                        </div>
                                                   </div>

                                                    <div class="card-footer text-center">
                                                            <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                            <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                                        </div>

                                                </div>
                                            </div>

                                            <div class="setup-content" id="step-3">
                                                <div class="card">
                                                   <div class="card-header">
                                                        <h6 class="text-center">ORGANISATION DU TRAVAIL</h6>
                                                   </div>
                                                   <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="name">NOM ET PRENOM</label>
                                                                    <input type="text" id="name" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="fonction">FONCTION</label>
                                                                    <input type="text" id="function" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="role">RESPONSABILITE</label>
                                                                    <input type="text" id="role" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-sm-12">
                                                                <div class="form-group">
                                                                    <button style="margin-top: 30px" class="btn btn-primary btn-xs" id="add-ressource"><i class="fa fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <table class="table table-bordered table-striped table-hover table-condensed" id="organisation">
                                                            <thead>
                                                                <tr>
                                                                    <th>NOM</th>
                                                                    <th>FONCTION</th>
                                                                    <th>RESPONSABILITES</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                   </div>

                                                    <div class="card-footer text-center">
                                                            <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                            <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                                        </div>

                                                </div>
                                            </div>

                                            <div class="setup-content" id="step-4">
                                                <div class="card">
                                                      <div class="card-header">
                                                          <h6>ANALYSE DES RISQUES ET ACTIONS DE MAITRISE</h6>
                                                      </div>
                                                      <div class="card-body">

                                                        <?php if($projet->plan_id): ?>
                                                            <input type="hidden" id="plan_id" value="<?= $projet->plan_id ?>"/>

                                                            <table class="table table-bordered table-hover dataTable first" id="example">
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
                                                        <script>
                                                            $(document).ready(function(){
                                                                getPlan($('#plan_id').val());
                                                            });
                                                        </script>
                                                        <?php else: ?>

                                                            <div class="text-center">
                                                                <button class="btn btn-sm btn-danger" id="create_plan"><i class="fa fa-list-alt"></i> CREER LE PLAN D'ACTION</button>


                                                            <table style="display: none" class="table table-bordered table-hover dataTable first" id="example">
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


                                                        <?php endif; ?>

                                                      </div>
                                                      <div class="card-footer">
                                                          <div class="btn-div text-center">
                                                              <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                                 <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                                          </div>
                                                      </div>
                                                 </div>
                                            </div>

                                            <div class="setup-content" id="step-5">
                                                <div class="card">
                                                   <div class="card-header">
                                                        <h6 class="text-center">PLAN D'ACTION STRATEGIQUE</h6>
                                                   </div>
                                                   <div class="card-body">

                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="etape">ETAPE</label>
                                                                    <input type="text" id="etape" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="etape">ACTION STRATEGIQUE</label>
                                                                    <input type="text" id="action" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-sm-12">
                                                                <div class="form-group">
                                                                    <button style="margin-top: 30px" class="btn btn-primary btn-xs" id="add-etape"><i class="fa fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <table class="table table-bordered table-striped table-hover table-condensed" id="etapes">
                                                            <thead>
                                                                <tr>
                                                                    <th>ETAPE</th>
                                                                    <th>PLAN D'ACTIONS STRATEGIQUES</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                   </div>

                                                    <div class="card-footer text-center">
                                                            <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                            <button class="btn btn-default nextBtn btn-sm btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                                        </div>

                                                </div>
                                            </div>

                                            <div class="setup-content" id="step-6">
                                                <div class="card">
                                                   <div class="card-header">
                                                        <h6 class="text-center">ETUDE DE FAISABILITE</h6>
                                                   </div>
                                                   <div class="card-body">

                                                        <textarea name="" id="faisabilite" cols="30" rows="10"></textarea>
                                                   </div>

                                                    <div class="card-footer text-center">
                                                            <button class="btn btn-default prevBtn btn-sm btn-rounded" type="button"><i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                            <button id="btn-save" class="btn btn-success  btn-rounded" type="button"><i class="fa fa-save"></i> ENREGISTRER</button>
                                                        </div>

                                                </div>
                                            </div>

                                     </div>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>
    </div>

<script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

<script type="text/javascript">

  $(document).ready(function() {
    $('textarea').summernote({
      height: 200,
      tabsize: 2,
      followingToolbar: true,
      lang:'fr-FR'
    });
  });
</script>
<script>

    $('#add-etape').click(function(e){

        var tr = '<tr class="" data-name="'+ $("#etape").val() +'" data-action="'+ $("#action").val() +'"><td>'+ $("#etape").val() +' <span class="etape-remove"> <i class="fa fa-remove"></i> </span></td><td>'+ $("#action").val() +'</td></tr>';

        if($("#etape").val().length>2){
             $('#etapes').find('tbody').append(tr);
        }else{
            alert('Etape non valide');
        }

        $('#step-5').find('input').val('');

        $('.etape-remove').click(function(){
                $(this).parent().parent().remove();
            });
    });


    $('#add-ressource').click(function(e){
            e.preventDefault();
            var tr = '<tr class="" data-nom="'+ $("#name").val() +'" data-fonction="'+ $("#function").val() +'" data-role="'+ $("#role").val() +'"><td>'+ $("#name").val() +' <span class="ressource-remove"> <i class="fa fa-remove"></i> </span></td><td>'+ $("#function").val() +'</td><td>'+ $("#role").val() +'</td></tr>';

            if($("#name").val().length>2){
                 $('#organisation').find('tbody').append(tr);
            }else{
                alert('Etape non valide');
            }

            $('#step-3').find('input').val('');

            $('.ressource-remove').click(function(){
                    $(this).parent().parent().remove();
                });
        });



    var saveurl = '/consultant/dossier/save-diag-strategique';
    var redirectUrl = '/consultant/dossiers/';

    $('#btn-save').click(function(e){
        e.preventDefault();
        var table = $('#example').find('tbody');
        var tr_org = $('#organisation').find('tbody').find('tr');
        var tr_etapes = $('#etapes').find('tbody').find('tr');


        var trss=table.find('tr');

        var plignes = [];
            trss.each(function(){
            var elt={};
                elt.id=$(this).data('id');
                elt.amelioration=$(this).find('td').last().text();

                plignes.push(elt);
        });

        var ressources = [];

        tr_org.each(function(){
            var elt = {};
            elt.nom = $(this).data('nom');
            elt.fonction = $(this).data('fonction');
            elt.role = $(this).data('role');
            ressources.push(elt);
        });

        var swot = {};

        swot.synop=$('#synop').val();
        swot.synmen=$('#synmen').val();
        swot.synforces=$('#synforces').val();
        swot.synfaiblesses=$('#synfaiblesses').val();



        var etapes = [];

        tr_etapes.each(function(){
             var elt = {};
             elt.name = $(this).data('name');
             elt.action = $(this).data('action');

             etapes.push(elt);
         });



        $.ajax({
            url:saveurl,
            type:'Post',
            dataType:'JSON',
            data:{_csrf:$('input[name="_token"]').val(), etapes:etapes,faisabilite:$('#faisabilite').val(),swot:swot,token:$('#projet_token').val(),
           organisation:ressources,objectifs_courts:$('#objectifs_courts').val(),objectifs_moyens:$('#objectifs_moyens').val(),objectifs_longs:$('#objectifs_longs').val() },
            beforeSend:function(xhr){
                xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());

            },
            success: function(data){

                $.ajax({
                            url:orm+'save-plignes',
                            type:'Post',
                            dataType:'JSON',
                            data:{plignes:plignes,plan_id:$('#plan_id').val()
                            },

                            success: function(dat){
                            console.log(dat);
                                if(dat!=null){
                                   window.location.replace(redirectUrl+data.token);
                                }
                            }
                            });


               /// console.log(data);
            },
            Error:function(){

            }
        });


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




     $('#create_plan').click(function(){

                $('#create_plan').hide();
                $('#example').show();
                $.ajax({
                    url: "/consultant/dossier/getchoices",
                    type:'Get',
                    dataType:'json',
                    data:{id:$('#id').val()},
                    success:function(data){
                        var choix = data;
                        if(data!=null){

                        $.ajax({
                            url: "/consultant/dossier/get-produits",
                            type:'Get',
                            dataType:'json',
                            data:{id:$('#id').val()},
                            success:function(dat){
                                $.ajax({
                                    url:orm+'create-plan',
                                    type:'Post',
                                    dataType:'json',
                                    data:{choix:choix, produits:dat},
                                    success:function(rep){

                                       $.ajax({
                                       url:"/consultant/dossier/update-plan",
                                       type:'get',
                                       dataType:'json',
                                        data:{id:$('#id').val(), plan_id:rep.id},
                                        success:function(reponse){
                                            console.log(reponse);

                                        }
                                       });

                                       getPlan(rep.id);


                                    },
                                    Error:function(){
                                        $('#risks-loader').hide();
                                    }
                            });
                            }
                           });


                        }

                    }
                })
            });

</script>


<style>
         div.note-editor.note-frame{
                    padding: 0;
                }
         .note-frame .btn-default {
                    color: #222;
                    background-color: #FFF;
                    border-color: none;
         }

         legend{
         margin-bottom: 0;
         border-bottom: none;
         }

         .panel{
         box-shadow: none;
         }
</style>

@endsection

