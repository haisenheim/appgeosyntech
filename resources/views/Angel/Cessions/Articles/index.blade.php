@extends('......layouts.angel')
@section('page-title')
MES INVESTISSEMENTS DANS LES CESSIONS D'ACTIFS
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">

        <div class="card">


        <div class="card-body p-15 table-responsive">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 38%">
                          Actif
                      </th>
                      <th style="width: 20%">
                          Propriétaire
                      </th>


                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($cessions as $cession)
                        <?php $projet= $cession->actif ?>
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }} - <b>{{ $projet->prix }} {{ $projet->devise->abb }}</b></span>- <small>{{ $cession->created_at?date_format($cession->created_at,'d/m/Y'):'' }}</small>  - <span class="badge badge-default"><i class="fa fa-map-marker"></i>&nbsp; {{ $projet->ville->name  }}</span> <br/>

                            </td>

                            <td>{{$projet->owner?$projet->owner->name:'-'}}</td>


                              <td class="project-actions text-right">
                                    @if($cession->validated)
                                          <a class="btn btn-success btn-xs" href="/angel/cessions/{{ $cession->token  }}">
                                              <i class="fas fa-search">
                                              </i>
                                             Afficher
                                          </a>
                                  @endif


                              </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>

        </div>
        <!-- /.card-body -->
      </div>


    </div>


@endsection