


@extends('layouts.rf')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">BASE DES FACTURES FOURNISSEUR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/rf/dashboard">SM</a></li>
              <li class="breadcrumb-item">FOURNISSEURS</li>
              <li class="breadcrumb-item active">FACTURES</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection

@section('content')

    <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">FACTURES</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>FOURNISSEUR</th>
                               <th>&numero;</th>
                               <th>Date</th>
                               <th>DELAI DE PAIEMENT</th>
                               <th>MONTANT</th>
                               <th>VERSEMENT</th>
                               <th>RESTE</th>
                               <th>STATUT</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($factures as $liv)

                               <tr>
                                   <td>{{ $liv->partenaire?$liv->partenaire->name:'-' }}</td>
                                   <td>{{ $liv->name }}</td>

                                   <td>{{ date_format($liv->created_at,'d/m/Y') }} </td>
                                   <td>{{ $liv->delai?$liv->delai->name:'-' }}</td>
                                   <td style="padding-right: 10px;text-align: right; font-weight: bolder">{{ number_format($liv->montant, 0,',','.') }}</td>
                                   <td style="padding-right: 10px;text-align: right; font-weight: bolder">{{ number_format($liv->versement, 0,',','.') }}</td>
                                   <td style="padding-right: 10px;text-align: right; font-weight: bolder">{{ number_format($liv->reste, 0,',','.') }}</td>
                                   <td> <span class="badge badge-{{ $liv->etat['color'] }}">{{ $liv->etat['name'] }}</span> </td>
                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/rf/bills/{{ $liv->token }}"><i class="fa fa-eye"></i></a></li>
                                       </ul>
                                   </td>
                               </tr>

                           @endforeach
                       </tbody>
                   </table>

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

@section('scripts')
<script>
     $(document).ready(function(){$(".datatable").DataTable();});
</script>
@endsection