@extends('......layouts.owner')


@section('content')
    <div style="padding-top: 30px" class="container-fluid">
        <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des dossiers de levee de fonds</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <div class="card-body p-0">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 38%">
                          Projet
                      </th>
                      <th style="width: 20%">
                          Consultant
                      </th>
                      <th>
                          Progression
                      </th>

                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($dossiers as $projet)
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }}</span>- <small>{{ $projet->created_at?date_format($projet->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> <br/>
                            <?= $projet->active?'<span class="badge badge-success">ACTIF</span>':'<span class="badge badge-danger">Bloqué</span>' ?> -
                            <?= $projet->public?'<span class="badge badge-info">PUBLIC</span>':'<span class="badge badge-warning">PRIVE</span>' ?> - <small class="text-{{$projet->typecolor}}">{{$projet->type?$projet->type->name:'-'}}</small> - <small>{{$projet->variante?$projet->variante->name:''}}</small>
                            </td>

                            <td>{{$projet->consultant?$projet->consultant->name:'-'}}</td>
                            <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar progress-bar-striped bg-{{$projet->progresscolor}}" role="progressbar" aria-volumenow="{{$projet->progress }}" aria-volumemin="0" aria-volumemax="100" style="width: {{$projet->progress .'%'}} ">
                              </div>
                          </div>
                          <small>
                             Complet à {{$projet->progress}}%
                          </small>
                      </td>


                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-xs" href="/owner/dossiers/{{ $projet->token  }}">
                              <i class="fas fa-folder">
                              </i>
                              Afficher
                          </a>


                      </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
        <div class="card">
            <div class="card-header">
                <h3 style="" class="card-title">GESTION DES PROJETS INDUSTRIELS</h3>
            </div>
            <div class="card-body">
                 <div class="row">
                     @foreach($dossiers as $projet)
                          <div class="col-md-3">
                            <!-- Widget: user widget style 1 -->
                            <a style="color:#555" href="/owner/dossiers/{{ $projet->token  }}">
                             <div class="card card-widget widget-user">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header text-white"
                                   style="background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}') center center;">
                                    <h3 style="font-weight: 900; color: #4caf50;" class="widget-user-username text-right"><?= $projet->name ?></h3>
                                    <h6 style="font-weight: 500;" class="widget-user-desc text-right">{{ $projet->consultant?$projet->consultant->name:'Aucun Consultant lié' }}</h6>
                              </div>
                              <div class="widget-user-image">
                                <img class="img-circle" src="{{$projet->consultant?$projet->consultant->imageUri? asset('img/'.$projet->consultant->imageUri):asset('img/avatar.png'):asset('img/avatar.png')}}" alt="User Avatar">
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
                                      <span class="description-text">{{$projet->montant}} FCFA</span>
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
            </div>
            <div class="card-footer">
                 <div class="">
                    <ul class="pagination justify-content-end">
                      {{ $dossiers->links() }}
                    </ul>
                 </div>
            </div>
        </div>
     </div>

@endsection

@section('nav_actions')
<main>
    <nav class="floating-menu">
        <ul class="main-menu">
            <li>
                <a title="Accueil" href="/owner/" class="ripple">
                    <i class="fas fa-home fa-lg"></i>
                </a>
            </li>
            <li>
                <a title="Nouveau Dossier" href="/owner/dossiers/create" class="ripple">
                    <i class="fa fa-plus-circle fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

@endsection