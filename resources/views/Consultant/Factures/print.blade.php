<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">

	<title>{{ $title }}</title>
	 <style>
         /**
             Set the margins of the page to 0, so the footer and the header
             can be of the full height and width !
          **/
         @page {
             margin: 0cm 0cm;
         }

         /** Define now the real margins of every page in the PDF **/
         body {
             margin-top: 2cm;
             margin-left: 2cm;
             margin-right: 2cm;
             margin-bottom: 2cm;
         }

         /** Define the header rules **/
         header {
             position: fixed;
             top: 0cm;
             left: 0cm;
             right: 0cm;
             height: 2cm;

             /** Extra personal styles **/
             background-color: #28a745;;
             color: white;
             text-align: center;
             line-height: 1.5cm;
         }

         /** Define the footer rules **/
         footer {
             position: fixed;
             bottom: 0cm;
             left: 0cm;
             right: 0cm;
             height: 2cm;

             /** Extra personal styles **/
             background-color: #28a745;;
             color: white;
             text-align: center;
             line-height: 1.5cm;
         }
     </style>
</head>
<body>

    <header>
       Cabinet OBAC
    </header>

    <footer>
       OBAC ALERT Copyright &copy; <?php echo date("Y");?>
    </footer>

    <main>
        <div style="padding-top: 30px" class="container">
            <div class="row">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        <b># {{ $facture->name }}</b> -

                        <small style="float: right; font-weight: 200;">Date: {{ date_format($facture->created_at,'d/m/Y') }}</small>
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
                <!-- /.invoice -->
            </div>
        </div>
    </main>

</body>
</html>