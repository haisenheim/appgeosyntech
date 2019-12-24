@extends('......layouts.adminag')
@section('content')


<?php //dd($projet->resultats)

 ?>
 <input type="hidden" value="<?= $projet->token ?>" id="token"/>

        <div class="card card-success">
            <div class="card-header">
                <h3 class="">{{$projet->name}} - {{$projet->code}} - <small><?= date_format($projet->created_at,'d/m/Y') ?></small></h3>
            </div>

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
                    @include('includes.Show.plan_financier')
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
        @include('includes.Show.business_model')
     @endif

     @if($projet->investissements->count()>=1)
         @include('includes.Show.angels')
     @endif

     @if($projet->synthese_diagnostic_interne)
        @include('includes.Show.synthese1')
     @endif

     @if($projet->synthese_diagnostic_externe)
        @include('includes.Show.synthese2')
     @endif

     @if($projet->synthese_diagnostic_strategique)
        @include('includes.Show.synthese3')
     @endif

     @if($projet->teaser)
        @include('includes.Show.teaser')
     @endif

    <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>

    <script>
        $(document).ready(function(){
           // var orm = 'http://localhost/ormsys/api/';
           var h2 = $('#side2 .card').height();
            $('#side1 .card').height(h2).css({'overflow-y':'scroll'});

            $.ajax({
                url: "/adminag/dossier/getchoices",
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
@include('includes.Actions.admin_dossier')

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


@endsection

@section('consultant_choice')

<div class="card">
    <div class="card-body">
         <fieldset>
            <legend>CONSULTANT</legend>
             @if($projet->expert_id>0)
                <ul>
                        <li style="font-size: larger"><b>{{$projet->consultant->name}}</b></li>
                        <li><i class="far fa-fw fa-envelope"></i> {{$projet->consultant->email}}</li>
                        <li><i class="fas fa-fw fa-mobile"></i> {{$projet->consultant->phone}}</li>
                        <li><i class="fas fa-fw fa-home"></i> {{$projet->consultant->agence?$projet->consultant->agence->name:'-'}}</li>
                 </ul>
             @else
                @if(\Illuminate\Support\Facades\Auth::user()->role_id==9)
                    <form class=""  action="/adminag/dossier/expert">
                     {{csrf_field()}}
                     <input type="hidden" name="id" value="{{ $projet->id }}"/>
                         <div class="form-group">
                              <label for="expert_id">AFFECTER A UN CONSULTANT</label>
                             <select class="form-control" name="expert_id" id="expert_id">
                                 @foreach($experts as $expert)
                                     <option value="{{ $expert->id }}">{{ $expert->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-link"></i> LIER</button>
                         </div>
                     </form>
                @endif
             @endif
        </fieldset>
    </div>
</div>

@endsection