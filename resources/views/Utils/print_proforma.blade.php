<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">

	<title>Proforma</title>
	<link rel="stylesheet" href="{{ public_path().DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'bootstrap.min.css' }}"/>
	 <style>
         /**
             Set the margins of the page to 0, so the footer and the header
             can be of the full height and width !
          **/
         @page {
             margin: 0cm 0cm;
         }

         /** Define now the real margins of every page in the PDF **/




         /** Define the header rules **/
         header {
             position: fixed;
             top: 0cm;
             left: 0cm;
             right: 0cm;
             height: 100px;


         }

         /** Define the footer rules **/
         footer {
             position: fixed;
             bottom: 0cm;
             left: 0cm;
             right: 0cm;
             height: 50px;

             /** Extra personal styles **/

             color: #000;
             text-align: center;

         }


         .page-break {
             page-break-after: always;
         }

         .table td, .table th {
             padding: 5px;
             font-size: 10px;
             vertical-align: top;
             border-top: 1px solid
            rgba(41, 41, 41, 0.88);
         }
         .table {
             width: 100%;
             margin-bottom: 1rem;
             color: #212529;
             background-color:
             transparent;
         }

        .val, .label{
        font-size: 10px;
        }
         .table thead th {
             vertical-align: bottom;
             border-bottom: 2px solid
             rgba(41, 41, 41, 0.88);
                 border-bottom-width: 2px;
         }

.val{
    font-weight: 700;
}

         .table-bordered {
             border: 1px solid
             rgba(41, 41, 41, 0.88);
         }
         .table-bordered td, .table-bordered th {
             border: 1px solid
            rgba(41, 41, 41, 0.88);
         }


         *, ::after, ::before {
             box-sizing: border-box;
         }

     </style>
</head>
<body>
    <header>
       <img style="width: 100%; height: 100px;" src= "https://app.geosyntech.cm/img/entete_proforma.PNG" alt=""/>
    </header>

    <footer>
      <img style="width: 100%;" src= "https://app.geosyntech.cm/img/pied_proforma.PNG" alt=""/>
    </footer>

    <main>
        <div style="padding-top: 30px" class="container">
            <div style="margin-top: 100px; margin-right: auto; margin-left: auto; max-width: 700px; text-align: center">
                <?php $projet = $proforma->projet; ?>
               <div style="width: 100%; box-sizing: border-box; padding-top: 30px; display: flex; flex-wrap: wrap; margin-top: -130px">
                    <div style="border: 1px solid #111; max-width: 40%; flex: 0 0 40%; width: 100%; position: relative; padding: 0 12px;">
                        <h6 style="font-weight: bolder; text-align: center">{{ $projet->client->name }}</h6>
                        <ul style="list-style-type: none; padding: 0; text-align: left ">
                            <li> <span class="label">Demandeur :</span> <span class="val">{{ $projet->client->representant?$projet->client->representant->name:'-' }}</span></li>
                            <li> <span class="label">Email :</span> <span class="val">{{ $projet->client->representant?$projet->client->representant->email:'-' }}</span></li>
                            <li><span class="label">Tel : </span><span class="val">{{ $projet->client->representant?$projet->client->representant->phone:'-' }}</span></li>
                            <li><span class="label">Adresse : </span><span class="val">{{ $projet->client->representant?$projet->client->address:'-' }}</span></li>
                        </ul>
                    </div>

                    <div style="border: 1px solid #111; max-width: 40%; flex: 0 0 40%; width: 100%; position: relative; padding: 0 12px; margin-left: 60%">
                        <h6 class="text-center text-info">FACTURE PROFORMA</h6>
                        <ul style="list-style-type: none; padding: 0; text-align: left ">
                            <li> <span class="label">Date d'emission :</span> <span class="val"><?= $projet->debut?date_format($projet->debut,'d/m/Y'):date_format($projet->created_at,'d/m/Y') ?></span></li>
                            <li> <span class="label">Date d'expiration :</span> <span class="val"><?= $projet->fin?date_format($projet->fin,'d/m/Y'):'-' ?></span></li>
                            <li> <span class="label">Proforma N<sup>0</sup> :</span> <span class="val"><?= $projet->name ?></span></li>
                            <li> <span class="label">Identifiant client :</span> <span class="val"><?= $projet->client->identifiant ?></span></li>
                        </ul>
                    </div>
               </div>



                     <div style="border: 1px solid #7c8a96; " class="card">
                        <table class="table table-bordered">
                            <thead>

                                <tr>
                                    <th>N<sup>0</sup></th>
                                    <th>Designation</th>

                                    <th>Quantites</th>
                                    <th>Prix unitaire</th>
                                    <th>Prix total HT</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=1; $som=0; ?>
                                @if($proforma->frncotation->lignes->count())
                                    @foreach($proforma->frncotation->lignes as $prdt)
                                        <?php //dd($prdt) ?>
                                        <tr>
                                          <td>{{ $i++ }}</td>
                                          <td style="border-right: 1px #555 solid">
                                              <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                  <li style="font-weight: bolder">{{ $prdt->produit->name }}</li>
                                                  <li><span style="font-style: italic" class="">{{ $prdt->produit->description }}</span></li>
                                                  <li class="">width(m) : <span class="text-info">{{ $prdt->produit->largeur }}</span></li>
                                                  <li class="">Length(m) : <span class="text-info">{{ $prdt->produit->longueur }}</span></li>
                                                  <li class="">Diameter(cm) : <span class="text-info">{{ $prdt->produit->diametre }}</span></li>

                                              </ul>
                                          </td>

                                          <td>{{ number_format($prdt->quantity,0,',','.') }} m² </td>

                                          <td>
                                               <span class="">{{ \App\Helpers\CurrencyFr::format($prdt->pu) }} XAF/m²</span>
                                          </td>
                                          <td>
                                               <span class="">{{ \App\Helpers\CurrencyFr::format($prdt->montant) }} XAF/m²</span>
                                          </td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <th colspan="2"></th>
                                        <th colspan="2" style="text-align: right; font-weight: bolder">MONTANT TOTAL HT</th>
                                        <th colspan="1" style="text-align: right; font-weight: bolder; padding-right: 20px; border-right: 1px #111 solid" class="">{{ \App\Helpers\CurrencyFr::format($proforma->montant) }} XAF</th>
                                    </tr>



                                    <tr>
                                        <th colspan="2">B</th>
                                        <th colspan="2" style="text-align: right; font-weight: bolder">TVA (19,25%) :</th>
                                        <th colspan="1" style="text-align: right; font-weight: bolder; padding-right: 20px; border-right: 1px #111 solid" class="">{{  \App\Helpers\CurrencyFr::format($proforma->montant_tva) }} XAF </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">C</th>
                                        <th colspan="2" style="text-align: right; font-weight: bolder">AIR  (2,2%) :</th>
                                        <th colspan="1" style="text-align: right; font-weight: bolder; padding-right: 20px; border-right: 1px #111 solid" class="">{{ \App\Helpers\CurrencyFr::format($proforma->montant_air) }} XAF </th>
                                    </tr>


                                @else
                                    <tr>
                                        <th colspan="5">AUCUN PRODUIT</th>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                     </div>


                <div style="position: relative">
                     <div style="width: 45%; float: left; border: solid 1px #000000">
                            <h6 style="background-color: #555; color: #FFFFFF; font-weight: 800;">NOTE SPECIALE</h6>
                            <p><?= $proforma->note_speciale ?></p>

                     </div>

                     <div style="width: 45%; float: left; margin-left: 5%; border: 1px solid #000000">
                        <h6 style="background-color: #555; color: #FFFFFF; font-weight: 800;">MODALITES DE PAIEMENT</h6>
                        <p><?= $proforma->modalites_paiement ?></p>

                     </div>
                </div>
                </div>
            </div>



    </main>

</body>
</html>