@extends('......layouts.owner')

@section('page-title')
CESSIONS DE CREANCES
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
        <div class="card">
        <div class="card-body p-0">
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
                          CONSULTANT
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($dossiers as $projet)
                        <tr>
                            <td><span class="badge badge-<?= $projet->active?'success':'danger' ?>"><i class="fa fa-<?= $projet->active?'check-circle':'trash' ?>"></i></span></td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->debiteur }}</span>
                            </td>

                            <td>{{ number_format($projet->montant,0,',','.') }} <sup>{{$projet->devise->abb }}</sup></td>
                            <td>{{ number_format($projet->prix_cession,0,',','.') }} <sup>{{$projet->devise->abb }}</sup></td>

                            <td>{{$projet->consultant?$projet->consultant->name:'-'}}</td>

                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-xs" href="/owner/creances/{{ $projet->token  }}">
                              <i class="fas fa-folder">
                              </i>
                              Afficher
                          </a>
                      </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>
          <div>
            <ul class="pagination">
                {{ $dossiers->links()  }}
            </ul>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

@endsection

@section('nav_actions')
<main>
    <nav class="floating-menu">
        <ul class="main-menu">
            <li>
                <a title="Nouveau Dossier" href="/owner/creances/create" class="ripple">
                    <i class="fa fa-plus-circle fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

@endsection