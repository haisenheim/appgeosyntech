


@extends('layouts.rf')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">JOURNAL DES PAIEMENTS</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/rf/dashboard">SM</a></li>
              <li class="breadcrumb-item">FINANCES</li>
              <li class="breadcrumb-item active">ENTREES</li>
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
                  <h3 class="card-title">ENTREES </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div style="margin: 20px 0">
                        <form class="form-inline" action="">
                            <label style="margin-right: 5px" class="mr-10" for="debut">DEBUT</label>
                            <input type="date" class="form-control" name="debut" id="debut"/>

                            <label style="margin: 0 5px 0 20px" class="mr-10" for="debut">FIN</label>
                            <input type="date" style="margin-right: 20px" class="form-control" name="fin" id="debut"/>


                            <button class="btn btn-danger btn-sm" type="submit" title="charger"><i class="fa fa-search"></i></button>
                        </form>
                   </div>
                   <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>

                               <th>&numero;</th>
                               <th>DATE</th>
                               <th>MONTANT</th>
                               <th>LIBELLE</th>
                               <th>CLIENT</th>

                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($paiements as $paiement)
                                <?php
                                   $lib = "-";
                                    if($paiement->facture){
                                        $lib = 'Paiement Facture - '.$paiement->facture->mois->name.' - '.$paiement->client->name;
                                    }
                                ?>
                               <tr>

                                   <td>{{ $paiement->name }}</td>

                                   <td>{{ date_format($paiement->created_at,'d/m/Y') }} </td>
                                   <td style="padding-right: 10px;text-align: right; font-weight: bolder">{{ number_format($paiement->montant, 0,',','.') }}</td>
                                   <td style="font-weight: bolder">{{ $lib }}</td>
                                   <td>{{ $paiement->client?$paiement->client->name:'-' }}</td>

                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-secondary" title="Afficher" href="/rf/paiements/{{ $paiement->token }}"><i class="fa fa-eye"></i></a></li>
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