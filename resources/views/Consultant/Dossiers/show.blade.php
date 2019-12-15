@extends('......layouts.consultant')

@section('page-title')
{{$projet->name}}
@endsection


@section('content')
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
            #concurrents table th,#segments table th{
                max-width:50%;
            }
     </style>
    <script>
        $(document).ready(function(){
            getPlan($('#plan_id').val());

            $.ajax({
                url: "/consultant/dossier/getchoices",
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
    @include('includes.Edit.synthese1')


    <!-- Edition de la synthese du diagnostic externe-->
    @include('includes.Edit.synthese2')

        <!-- Edition de la synthese du diagnostic Strategique -->
    @include('includes.Edit.synthese3')




        <!-- Edition du teaser-->
    @include('includes.Edit.teaser')

    <style>
         div.note-editor.note-frame{
             padding: 0;
         }
         note-frame .btn-default {
             color: #222;
             background-color: #FFF;
             border-color: none;
         }

         .card.maximized-card {
            overflow-y: scroll;
         }
            .modal .card-title{
                 color: #000000;
                 font-weight: bold;
            }

            .modal label{
                 font-size: x-small;
                 line-height: 0.5;
            }

            #teaserModal label, #teaserModal legend {
             font-size: 1rem;
            }



    </style>







    <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

    @if($projet->modele)
        @include('includes.Show.business_model')
     @endif

<script type="text/javascript">
  $(document).ready(function() {
     $('textarea').summernote({
      height: 125,
      tabsize: 2,
      followingToolbar: true,
      lang:'fr-FR'
    });
  });
</script>

<script>
        $(document).ready(function(){
           // $('#side2').height($('#side1').height());
           //$('#side2').height(890);
            getPlan($('#pl_id').val());

            $.ajax({
                url: "/consultant/dossier/getchoices",
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


@endsection





@section('nav_actions')
<main>
    <nav style="top:15%" class="floating-menu">
        <ul class="main-menu">

            @if($projet->modepaiement_id>1)
                @if($projet->validated_step==1)
                   <li>
                        <a title="Editer le diagnostic externe" class="ripple" href="/consultant/dossier/create-diag-externe/{{ $projet->token }}"><i class="fa fa-edit text-warning"></i></a>
                   </li>
                @endif
            @endif

            @if($projet->etape==2)
                @if($projet->validated_step==2)
                <li>
                     <a title="Editer le diagnostic strategique"  class="ripple" href="/consultant/dossier/create-diag-strategique/{{$projet->token}}"><i class="fa fa-edit text-primary"></i></a>
                </li>
                @endif
            @endif

            @if($projet->etape==3)
                @if($projet->validated_step==3)
                <li>
                     <a title="Editer le plan financier"  class="ripple" href="/consultant/dossier/create-plan-financier/{{$projet->token}}"><i class="fa fa-edit text-success"></i></a>
                </li>

                @endif
            @endif

            @if($projet->etape==4)

                    @if($projet->validated_step==4)
                    <li>
                        <a data-target="#teaserMoal" data-toggle="modal" title="Editer le teaser" class="ripple" href="#"><i class="fa fa-edit text-success"></i></a>
                    </li>
                    @endif

            @endif


            @if(count($projet->investissements)>=1)
                   <li>
                        <a data-target="#angelsModal" data-toggle="modal" title="Liste des investisseurs potentiels" class="ripple" href="#"><i class="fa fa-users"></i></a>
                   </li>
            @endif

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
@endsection





