@extends('layouts.angel')

@section('page-title')
OPPORTUNITES D'ACQUISITION D'ACTIFS
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
            <div class="card">
                <div class="card-body">
                     <div class="row">

                    @foreach($dossiers as $projet)


                     <div class="col-md-2 col-sm-12">


                    <!-- small card -->
                    <div class="small-box">

                      <div class="inner">
                        <h3 style="font: 1rem;">{{ $projet->prix }}<sup style="font-size: 0.5rem">{{ $projet->devise->abb }}</sup></h3>

                        <p>{{ $projet->name }}</p>
                        <img src="{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}" style="width: 60px; height: 60px; border-radius: 50px; position: absolute; top:15px; right: 2px"/>
                      </div>

                      <a data-token="{{ $projet->token }}" data-target="#viewModal" data-name="{{ $projet->name }}" data-toggle="modal" href="#" data-teaser="{{ $projet->teaser }}" class="small-box-footer btn-p">
                        Je suis intéressé(e) <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>



                    </div>

                    @endforeach

                </div>
                </div>
            </div>

            </div>
<div  class="modal fade" id="viewModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h4  class="modal-title project-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form enctype="multipart/form-data" class="form" action="/angel/cessions/actifs" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="token" id="token"/>

                    <div class="">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                        <p>AVERTISSEMENT</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                        <p>RESUME EXECUTIF</p>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">

                                    <div class="setup-content" id="step-1">
                                        <div class="alert alert-warning">

                                           <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                                           Investir dans un actif est une prise de risque. <br> Nous recommandons aux investisseurs d’appliquer des règles de vigilance avant tout investissement : l'investissement dans des actifs comporte des risques de perte totale ou partielle du montant investi, risque d'illiquidité et risque opérationnel du projet pouvant entraîner une rentabilité moindre que prévue.
                                            N’investissez pas dans ce que vous ne comprenez pas parfaitement.
                                         </div>
                                         <div class="btn-div card-footer text-center">
                                                <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                                <button class="btn btn-primary nextBtn btn-sm  btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                    </div>

                                     <div class="setup-content" id="step-2">
                                        <div class="card">

                                            <div class="card-body">
                                               <div id="teaser-content"></div>
                                            </div>
                                            <div class="btn-div card-footer text-center">
                                                <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                               <button id="btn-save" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> VALIDER</button>
                                            </div>
                                        </div>
                                     </div>

                            </div>
                        </div>
                </form>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
                     <!-- SweetAlert2 -->
    <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
                     <!-- Toastr -->
    <script type="text/javascript" src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

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
                                <ul class="" style="list-style: decimal">
                                    <li> Vous pouvez dès lors obtenir la confirmation de votre prise de rendez-vous
                                     en échangeant avec le porteur de projet sur l’onglet « messagerie ». </li>

                                    <li> A la suite de votre discussion et de votre rencontre avec le porteur de projet, n’hésitez pas à lui
                                    demander de vous donner accès à la « DATA ROOM » afin que vous puissiez analyser tous les éléments relatifs
                                    à son plan d’affaires.

                                    Vous retrouverez la « DATA ROOM » en cliquant sur l’onglet « Mes investissements » puis sur le dossier correspondant.</li>

                                    <li> Pour aller plus loin, après analyse des informations présentées dans la DATA ROOM, vous pourrez dès lors
                                    éditer une « lettre d’intention »</li>

                                </ul>
                                <a class="btn btn-success btn-block" href="/angel/investissements/actifs">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <script>
        $('.btn-p').click(function(e){
            e.preventDefault();
            $('.project-title').text($(this).data('name'));
            //var token = $(this).data('token');
            //var teaser = $('#teaser-'+token).html();
            $('#token').val($(this).data('token'));
            $('#teaser-content').html($(this).data('teaser'));
        });

         $('#btn-save').click(function(e){
                        e.preventDefault();
                        var spinHandle_firstProcess = loadingOverlay.activate();
                        const Toast = Swal.mixin({
                                               toast: true,
                                               position: 'top-end',
                                               showConfirmButton: false,
                                               timer: 5000
                                             });
                        $.ajax({
                            url:'/angel/investissements/actifs/',
                            dataType:'json',
                            type:'post',
                            data:{_csrf:$('input[name="_token"]').val(),token:$('#token').val()},
                            beforeSend:function(xhr){
                                         xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());
                                     },
                            success:function(data){
                                loadingOverlay.cancel(spinHandle_firstProcess);
                                $('#IpM').hide();
                                            Toast.fire({
                                                    type: 'success',
                                                    title: 'Demande initialisée succès!!!'
                                                  });
                                                  setTimeout(function() {
                                                    $('#popup').show();
                                                  },2000);
                            }
                        });
                     });
    </script>
@endsection

