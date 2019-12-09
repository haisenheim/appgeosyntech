


@extends('......layouts.admin')

@section('page-title')
{{ $apporteur->name }} - FACTURES PAYEES
@endsection

@section('content')

    <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <table  class="table table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>MOIS</th>
                      <th>MONTANT</th>
                      <th>PAYEE LE</th>
                      <th>PAR</th>
                      <th></th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($factures as $creance)
                          <tr>
                              <td>{{$creance->name }} </td>
                              <td>{{$creance->mois->name  }} / {{ $creance->annee }} </td>
                              <td>{{ number_format($creance->montant,0,',','.') }} </td>
                              <td>{{ date_format($creance->filled_at,'d/m/Y H:i') }}</td>
                              <td>{{ $creance->payeur->name }}</td>

                              <td>
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-default btn-xs" href="/apporteur/facture/{{ $creance->token }}"><i class="fa fa-search"></i></a></li>
                              </ul>
                              </td>
                          </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                      <th>#</th>
                      <th>MOIS</th>
                      <th>MONTANT</th>

                      <th></th>
                    </tr>
                    </tfoot>
                  </table>
                  <ul class="pagination">{{ $factures->links() }}</ul>
                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>




<style>
    .table th,
    .table td {
      padding: 0.35rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  </style>




@endsection