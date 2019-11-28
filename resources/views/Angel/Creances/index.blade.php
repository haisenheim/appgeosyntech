@extends('......layouts.angel')

@section('page-title')
CESSIONS DE CREANCES
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
        <div class="card">
        <div class="card-body p-0 table-responsive">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>

                      <th>
                          DEBITEUR
                      </th>
                      <th style="width: 20%">MONTANT</th>
                      <th>PRIX DE LA CESSION</th>
                      <th style="width: 20%">
                          CREANCIER
                      </th>
                      <th style="width: 10%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($dossiers as $projet)
                        <tr>

                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->debiteur }}</span>
                            </td>

                            <td>{{ number_format($projet->montant,0,',','.') }} <sup>{{$projet->devise->abb }}</sup></td>
                            <td>{{ number_format($projet->prix_cession,0,',','.') }} <sup>{{$projet->devise->abb }}</sup></td>

                            <td>{{$projet->owner?$projet->owner->name:'-'}}</td>

                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-xs" href="/angel/creances/{{ $projet->token  }}">
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

