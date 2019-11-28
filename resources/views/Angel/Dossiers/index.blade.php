@extends('......layouts.angel')
@section('page-title')
PROJETS INDUSTRIELS ET/OU DE SERVICES
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">


         <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">

              <div class="card-body">

                    <div class="row">
                    @foreach($projets as $projet)

                         <div class="col-md-3">
                            <!-- Widget: user widget style 1 -->
                             <div class="card card-widget widget-user position-relative">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header text-white"
                                   style="background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover">
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-primary">
                                            <?= number_format( $projet->montant,0,',','.') ?> <sup> {{ $projet->devise->abb }} </sup>
                                        </div>
                                    </div>
                                    <h3 style="font-weight: 900" class="widget-user-username text-left"><?= $projet->name ?></h3>
                                    <h5 style="font-weight: 700" class="widget-user-desc text-right">{{ $projet->owner->name }}</h5>
                              </div>
                              <div class="widget-user-image">
                                <img class="img-circle" src="{{$projet->user?$projet->user->imageUri? asset('img/'.$projet->user->imageUri):asset('img/avatar.png'):asset('img/avatar.png')}}" alt="User Avatar">
                              </div>
                              <div class="card-body">

                              </div>
                              <div style="padding: .75rem 1rem" class="card-footer ">
                                <div class="row">
                                    <div class="col-md-12">

                                          <span class="description-text"><i class="fa fa-map-marker"></i> {{ $projet->ville->name  }}</span>

                                    </div>
                                  <!-- /.col -->

                                </div>

                                <div style="display: none" id="teaser-{{$projet->token}}">
                                    <input type="hidden" name="token" value="<?= $projet->token ?>"/>
                                    <?php if($projet->teaser): ?>
                                    <div>

                                        <dl>
                                          <dt>Le Contexte</dt>
                                          <dd><?= $projet->teaser->contexte ?></dd>
                                          <dt>Problematique</dt>
                                          <dd><?= $projet->teaser->problematique ?></dd>

                                          <dt>LE MARCHE</dt>
                                          <dd><?= $projet->teaser->marche ?></dd>
                                        </dl>

                                    </div>
                                    <?php else: ?>
                                        <div>
                                            <p>Resume indisponible</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- /.row -->
                               @if($projet->authorized)
                                <button data-token="{{$projet->token}}" data-name="<?= $projet->name ?>" data-toggle="modal" data-target="#IpM" class="btn btn-block btn-outline-success btn-xs btn-p"><i class="fas fa-heart"></i> CE PROJET M'INTERESSE</button>
                              @else
                                <span class="btn-block btn-danger btn">DOSSIER DEJA OUVERT</span>
                              @endif

                              </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endforeach
                </div>
                    <ul class="pagination justify-content-end">
                        {{ $projets->links() }}
                    </ul>

                </div>


                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->


    <div  class="modal fade" id="IpM">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h4  class="modal-title project-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form enctype="multipart/form-data" class="form" action="#" method="post">
                    {{csrf_field()}}

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
                                    <div class="stepwizard-step">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                        <p>RENCONTRE</p>
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
                                                <button class="btn btn-primary nextBtn btn-sm  btn-rounded" type="button"> SUIVANT <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </div>

                                     </div>
                                     <div class="setup-content" id="step-3">
                                        <div class="card">
                                            <div class="card-header">
                                                 <h4>PROGRAMMER UNE RENCONTRE AVEC LE PORTEUR DE PROJET</h4>
                                            </div>
                                            <div class="card-body">
                                                <input type="date" name="dt_rdv" class="form-control"/>
                                                <input type="hidden" id="token" />
                                            </div>
                                            <div class="btn-div card-footer text-center">
                                                <button class="btn btn-primary prevBtn btn-sm  btn-rounded" type="button"> <i class="fa fa-arrow-left"></i> PRECEDENT</button>
                                               <button id="btn-save" class="btn btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
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
                                        <a class="btn btn-success btn-block" href="/angel/investissements/dossiers">CONTINUER <i class="fa fa-arrow-right fa-lg"></i></a>
        					    </div>
        					</div>
        				</div>


        			</div>
        		</div>

        </div>
<script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
            <!-- SweetAlert2 -->
    <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
            <!-- Toastr -->
    <script type="text/javascript" src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

<script>
    $('.btn-p').click(function(e){
        e.preventDefault();
        $('.project-title').text($(this).data('name'));
        var token = $(this).data('token');
        var teaser = $('#teaser-'+token).html();
        $('#token').val(token);
        $('#teaser-content').html(teaser);
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
           url:'/angel/investissements/dossiers/',
           dataType:'json',
           type:'post',
           data:{_csrf:$('input[name="_token"]').val(),token:$('#token').val(), dt_rdv:$('#rdv').val()},
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