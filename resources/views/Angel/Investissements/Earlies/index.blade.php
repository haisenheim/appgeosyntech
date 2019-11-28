@extends('......layouts.angel')
@section('page-title')
MES INVESTISSEMENTS SUR LES PROJETS EN PHASE DE DEMARRAGE
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">


        <div class="card">

        <div class="card-body p-0 table-responsive">
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
                          Promoteur
                      </th>


                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($investissements as $investissement)
                        <?php $projet= $investissement->earlie ?>
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }} - <b>{{ $projet->montant }} {{ $projet->devise->abb }}</b></span>- <small>{{ $investissement->created_at?date_format($investissement->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> <br/>

                            </td>

                            <td>{{$projet->owner?$projet->owner->name:'-'}}</td>


                              <td class="project-actions text-right">
                                    @if($investissement->validated)
                                          <a class="btn btn-success btn-xs" href="/angel/investissements/projets/{{ $investissement->token  }}">
                                              <i class="fas fa-door-open">
                                              </i>
                                              Data room
                                          </a>
                                  @endif


                              </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>
          <div>
            <ul class="pagination">
                {{ $investissements->links(); }}
            </ul>
          </div>
        </div>
        <!-- /.card-body -->
      </div>


    </div>


@endsection