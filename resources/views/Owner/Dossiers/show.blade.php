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
                    <div id="side1" class="col-md-4 col-sm-12" style="">
                       @include('includes.Sidebars.dossier_owner')
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

        @include('includes.Show.angels')

        @if($projet->modele)
        @include('includes.Edit.business_model')
        @endif



   @if($projet->teaser)
           <input type="hidden" id="has_teaser" value="1"/>
        @include('includes.Show.after_teaser_popup')
   @else
           <input type="hidden" id="has_teaser" value="0"/>
   @endif

    @include('includes.Edit.rapport_mensuel')
    @include('includes.Edit.uploadDocs')

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



@endsection

@section('scripts')


<script type="text/javascript" src="{{ asset('js/tinymce/jquery.tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>

<script>
    $(document).ready(function(){

        var h1 = $('#side1 .card').height();
         $('#side2 .card').height(h1).css({'overflow-y':'scroll'});

         $('#btn-print').click(function(e){
             e.preventDefault();
             var link='/print/earlie/'+$('#token_val').val();

             window.location.replace(link);
         });
        getPlan($('#plan_id').val());
        var tsr = $('#has_teaser').val();
               if(tsr){
                  setTimeout(function() {
                              $('#popup').show();
                            },9000);
               }

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

</script>
@endsection




