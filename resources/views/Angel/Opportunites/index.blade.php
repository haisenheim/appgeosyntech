@extends('......layouts.angel')
@section('content-header')
 <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">OPPORTUNITES D'INVESTISSEMENT</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">


         <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">OPPORTUNITES D'INVESTISSEMENT</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">PROJETS DE LEVEE DE FONDS</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">CESSIONS D'ACTIFS</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
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
                                            {{$projet->montant}} FCFA
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
                                    <?php if($projet->teaser): ?>
                                    <div>
                                        <h5>Le Contexte</h5>
                                        <p><?= $projet->teaser->contexte ?></p>
                                        <h5>La Problematique</h5>
                                        <p><?= $projet->teaser->problematique ?></p>
                                        <h5>LE MARCHE</h5>
                                        <p><?= $projet->teaser->marche ?></p>
                                    </div>
                                    <?php else: ?>
                                        <div>
                                            <p>Resume indisponible</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- /.row -->
                                <button data-token="{{$projet->token}}" data-name="<?= $projet->name ?>" data-toggle="modal" data-target="#IpM" class="btn btn-block btn-outline-success btn-xs btn-p"><i class="fas fa-heart"></i> CE PROJET M'INTERESSE</button>
                              </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endforeach
                </div>
                <div class="">
                        <ul class="pagination justify-content-end">
                        {{ $projets->links() }}
                    </ul>
                  </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                        <div class="row">
                    @foreach($actifs as $projet)

                         <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <a style="color:#555" href="/angel/actifs/{{ $projet->token  }}">
             <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}') center center;">
                    <h3 style="font-weight: 900" class="widget-user-username text-right"><?= $projet->name ?></h3>
                    <h5 style="font-weight: 700" class="widget-user-desc text-right">{{ $projet->owner->name }}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{$projet->user?$projet->user->imageUri? asset('img/'.$projet->user->imageUri):asset('img/avatar.png'):asset('img/avatar.png')}}" alt="User Avatar">
              </div>
              <div class="card-body">

              </div>
              <div style="padding: .75rem 1.25rem;" class="card-footer">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="description-block">
                          <h5 class="description-header"><i class="fa fa-map-marker"></i></h5>
                          <span class="description-text">{{ $projet->ville->name  }}</span>
                        </div>
                    </div>

                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="description-block">
                      <h5 class="description-header"><i class="fa fa-coins"></i></h5>
                      <span class="description-text">{{$projet->prix}} FCFA</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            </a>
            <!-- /.widget-user -->
          </div>
                    @endforeach
                </div>
                 <div class="">
                        <ul class="pagination justify-content-end">
                        {{ $actifs->links() }}
                    </ul>
                  </div>
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>


    </div>

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
                    <form enctype="multipart/form-data" class="form" action="/angel/investissements/" method="post">
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
                                            <div class="card-header">
                                                 <h3>RESUME</h3>
                                            </div>
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
                                                 <h3>PROGRAMMER UNE RENCONTRE AVEC LE PORTEUR DE PROJET</h3>
                                            </div>
                                            <div class="card-body">
                                                <input type="date" name="dt_rdv" class="form-control"/>
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


    <script>
        $('.btn-p').click(function(e){
            e.preventDefault();
            $('.project-title').text($(this).data('name'));
            var token = $(this).data('token');
            var teaser = $('#teaser-'+token).html();
            $('#teaser-content').html(teaser);
        });
    </script>

@endsection