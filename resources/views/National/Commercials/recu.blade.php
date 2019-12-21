<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">

	<title>{{ $title }}</title>
</head>
<body>
    <div style="padding-top: 30px" class="container">
        <div class="row">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <b>RECU - PAIEMENT FACTURE - {{ $facture->name }}</b> -

                    <small style="float: right; font-weight: 200;">Date: {{ date_format($facture->filled_at,'d/m/Y') }} Par: {{ $facture->payeur->name }} </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                <div  class="col-sm-4 invoice-col">
                  PARTENAIRE:
                  <address>
                    <strong>{{ $facture->owner->name }} </strong><br>
                    {{ $facture->owner->address }}<br>

                    Téléphone: {{ $facture->owner->phone }}<br>
                    Email: {{ $facture->owner->email }}<br/>

                  </address>
                </div>
               </div>
                <!-- /.col -->

                <!-- /.col -->
                <div  class="col-sm-4 invoice-col">

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
                                <th>CLIENT</th>
                                <th>DOSSIER</th>
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
                                        <td>{{ $ligne->montant_apporteur }}</td>
                                        <td>{{ $ligne->owner->name }}</td>
                                        <td>{{ $ligne->projet->name }}</td>
                                        <td>{{ date_format($ligne->created_at, 'd/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                   </table>
                </div>
              </div>

              <div style="width: 100%;">
                <div style="color: red; padding: 3px; border: 1px red solid; min-width: 100px; float: right; margin-right: 100px; font-weight: 900; width: auto"><h4>PAYE</h4></div>
              </div>
              <div style="margin-top: 30px; width: 100%">
                <div class="row">
                    <div style="min-width: 200px; width: auto; float: left" class="col-md-6">
                        <h3>PARTENAIRE</h3>
                    </div>
                    <div style="min-width: 200px; width: auto; float: right; margin-right: 30px" class="col-md-6">
                        <h3>Pour OBAC</h3>
                    </div>
                </div>
              </div>
            <!-- /.invoice -->
        </div>
    </div>

</body>
</html>