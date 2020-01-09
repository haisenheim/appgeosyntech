@extends('......layouts.national')

@section('page-title')
{{ $facture->name }}
@endsection

@section('content')

    <div style="padding-top: 30px" class="container">
        <div class="row">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>

                    <small class="float-right">Date: {{ date_format($facture->created_at,'d/m/Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  PARTENAIRE:
                  <address>
                    <strong>{{ $facture->owner->name }} </strong><br>
                    {{ $facture->owner->address }}<br>

                    Téléphone: {{ $facture->owner->phone }}<br>
                    Email: {{ $facture->owner->email }}<br/>

                  </address>
                </div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>TOTAL : {{ number_format($facture->montant, 0,',','.') }} </b><br>
                  <br>


                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">
                   <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Paiement</th>
                                <th>MONTANT</th>


                                <th>DATE DU PAIEMENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($facture->lignes)
                                <?php $i=1 ?>
                                @foreach($facture->lignes as $ligne)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $ligne->name }}</td>
                                        <td>{{ $ligne->montant_consultant }}</td>


                                        <td>{{ date_format($ligne->created_at, 'd/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                   </table>
                </div>
              </div>



            <!-- /.invoice -->

        </div>
    </div>
    </div>
@endsection




