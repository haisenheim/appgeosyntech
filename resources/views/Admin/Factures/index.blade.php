


@extends('layouts.admin')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">BASE DES FACTURES </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ALLIAGES ERP</a></li>
              <li class="breadcrumb-item">CLIENTS</li>
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
                <div class="card-body table-responsive">
                     <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                       <thead>
                       <tr>
                         <th>&numero;</th>
                         <th>PROJET</th>
                         <th>JALON</th>
                         <th>MONTANT</th>

                         <th></th>
                       </tr>
                       </thead>
                       <tbody>

                           @foreach($factures as $facture)
                               <tr>
                                   <td>{{ $facture->name }}</td>
                                   <td><a href="/admin/projets/{{ $facture->projet->token }}">{{ \Illuminate\Support\Str::limit($facture->projet->name,60) }}</a></td>
                                   <td>{{ $facture->jalon?$facture->jalon->name:'-' }}</td>
                                   <td>{{ \App\Helpers\CurrencyFr::format($facture->montant) }}</td>
                                   <td><a href="/admin/facture/{{ $facture->token }}"><i class="fa fa-search"></i></a></td>
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