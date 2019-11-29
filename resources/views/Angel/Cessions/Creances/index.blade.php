@extends('......layouts.angel')

@section('page-title')
MES INVESTISSEMENTS DANS LES CESSIONS DE CREANCES
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
        <div class="card">
        <div class="card-body p-15">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th>
                          DEBITEUR
                      </th>
                      <th style="width: 20%">MONTANT</th>
                      <th>PRIX DE LA CESSION</th>
                      <th style="width: 20%">
                          CREANCIER
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($cessions as $cession)
                        <?php $projet = $cession->creance ?>
                        <tr>
                            <td><span class="badge badge-<?= $projet->active?'success':'danger' ?>"><i class="fa fa-<?= $projet->active?'check-circle':'trash' ?>"></i></span></td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->debiteur }}</span>
                            </td>

                            <td>{{ number_format($projet->montant,0,',','.') }} <sup>{{$projet->devise->abb }}</sup></td>
                            <td>{{ number_format($projet->prix_cession,0,',','.') }} <sup>{{$projet->devise->abb }}</sup></td>

                            <td>{{$projet->owner?$projet->owner->name:'-'}}</td>

                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-xs" href="/angel/cessions/creances/{{ $cession->token  }}">
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
    </div>

@endsection

