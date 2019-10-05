@extends('......layouts.owner')
@section('content')
    <div style="padding-top: 30px" class="container-fluid">
                <div class="row">

                    <div class="col-md-4 col-sm-12">
                        <div class="well">

                            <h4 style="background-color: inherit">{{ $projet->name  }}</h4>

                            <div style="max-height: 300px; max-width: 300px">
                                @if($projet->imageUri)
                                    <img class="img-thumbnail" src="{{asset('img/'.$projet->imageUri)}}" alt=""/>
                                    <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
                                @else
                                     <img class="img-thumbnail" src="{{asset('img/logo-obac.png')}}" alt=""/>
                                     <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
                                @endif
                            </div>

                            <p>TYPE D'IMMOBILISATION : {{ $projet->tactif->name }}</p>
                            <p>DATE DE CREATION : <span class="value"> {{ date_format($projet->created_at,'d/m/Y') }}</span></p>
                            <p>PROMOTEUR : <span class="value">{{ $projet->owner->name }}</span></p>



                            <p>PRIX INITIAL : {{ $projet->prix }}</p>
                            <input type="hidden" id="id" value="<?= $projet->id ?>"/>
                            <p><i class="fa fa-map-marker"></i> {{ $projet->ville->name }}</p>
                            @if($projet->expert_id)
                                <p>CONSULTANT : <span class="value">{{ $projet->consultant->name }}</span></p>

                            @endif



                        </div>


                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="widget">
                            <div class="widget-content">
                               <fieldset>
                                    <legend>DESCRIPTION</legend>
                                    <p>
                                        <?= $projet->description ?>
                                    </p>
                               </fieldset>
                               <hr/>
                               <fieldset>
                                    <legend>CARACTERISTIQUES</legend>
                                    <p>
                                        <?= $projet->caracteristiques ?>
                                    </p>
                               </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

    </div>



        <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
                	<form enctype="multipart/form-data" method="post" action="/owner/dossier/add-tag">
                		<input type="hidden" id="" name="projet_token" value="<?= $projet->token ?>" />
                		{{csrf_field()}}
                		<div class="modal-dialog modal-lg" role="document">
                			<div class="modal-content">
                				<div class="modal-header">
                					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                					<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span> Chargement de l'image du projet</span></h5>
                				</div>
                				<div class="modal-body">
                					<div class="form-group">
                						 <select class="form-control" name="tag_id" id="tag_id">
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                          </select>
                					</div>
                				</div>
                				<div class="modal-footer">
                					<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> ENREGISTRER</button>
                				</div>

                			</div>
                		</div>
                	</form>



                </div>


    <script>
        $(document).ready(function(){
            $('.fa-modif').css({
            cursor:'pointer',
            display:'none'
            });
            getPlan($('#plan_id').val());
            //var orm = 'http://localhost/ormsys/api/';
            $.ajax({
                url: "/owner/dossier/getchoices",
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
                                    //console.log(risks[i][1]);

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

                         $('.td-modif').hover(function(){
                            $(this).find('.fa-modif').css({
                            display:'block',
                            margin:'-15px 0 0 20px',
                            'z-index':99999,
                            'text-align':'right'
                            }).click(function(e){
                                $(this).parent('td').prop('contentEditable',true)
                            })
                         }).mouseleave(function(){
                            $(this).find('.fa-modif').css({display:'none'});
                         })

                         $('.td-modif').keypress(function(e){
                            //console.log(e);
                            if($(this).prop('contentEditable')){
                                //console.log(e.keyCode);
                                if(e.keyCode==13){
                                    var name = $(this).data('name');
                                    var model = $(this).data('model');
                                    var value = $(this).text();
                                    var id = $(this).data('id');
                                    $.ajax({
                                        url:'/owner/dossier/edit-field',
                                        type:'get',
                                        dataType:'json',
                                        data:{name:name,model:model,value:value,id:id},
                                        success:function(data){
                                            window.location.reload();
                                        }
                                    })
                                }
                                //console.log($(this).data('name'));
                            }
                         });
                    }
    </script>

@endsection

@section('action')

@if($projet->modepaiement_id>1)
    @if($projet->validated_step==1)
        <a class="btn btn-xs btn-success" href="/owner/dossiers/add-step"><i class="fa fa-pencil"></i> Editer le diagnostic externe</a>
    @endif
@endif


@endsection