<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">

	<title>Quotation request</title>
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
             background-color: red;
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

       <img style="width: 100%; height: 100px;" src= "{{ public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'entete.png' }} " alt=""/>
    </header>

    <footer>
      <img style="width: 100%" src= "{{ public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'pied.png' }} " alt=""/>
    </footer>

    <main>
        <div style="padding-top: 30px" class="container">
            <div style="margin-top: 100px; margin-right: auto; margin-left: auto; max-width: 700px; text-align: center">
            <div style=" text-align: right"><h5> <span style="margin-left: 80%; font-weight: 900;">{{ $projet->created_at?\Carbon\Carbon::parse($projet->created_at)->toDayDateTimeString():'-' }}</span></h5></div>

               <div style="width: 100%; box-sizing: border-box; padding-top: 30px; display: flex; flex-wrap: wrap; margin: 10px 0">
                    <div style="border: 1px solid #111; max-width: 40%; flex: 0 0 40%; width: 100%; position: relative; padding: 0 12px;">
                        <h6 style="font-weight: bolder; text-align: center">GEOSYNTHETICS TECHNOLOGIES Ltd</h6>
                        <ul style="list-style-type: none; padding: 0; text-align: left ">
                            <li> <span class="label">Email :</span> <span class="val">armel.belinga@geosyntech.net</span></li>
                            <li><span class="label">Tel : </span><span class="val">(+ 237) 652 578 067</span></li>
                            <li><span class="label">Adresse : </span><span class="val"> BP : 13823 - Yaoundé / Cameroon</span></li>
                        </ul>
                    </div>

                    <div style="border: 1px solid #111; max-width: 40%; flex: 0 0 40%; width: 100%; position: relative; padding: 0 12px; margin-left: 60%">
                        <h6 class="text-center">{{ $projet->transitaire->name }}</h6>
                        <ul style="list-style-type: none; padding: 0; text-align: left ">
                            <li> <span class="label">Addressed to :</span> <span class="val"><?= $projet->transitaire->representant?$projet->transitaire->representant->name:'-' ?></span></li>
                            <li><span class="label">Email : </span><span class="val"><?= $projet->transitaire->representant?$projet->transitaire->representant->email:'-' ?></span></li>
                            <li><span class="label">Request &numero; : </span><span class="val"></span></li>
                        </ul>
                    </div>
               </div>


               <h4 style="margin-top: -40px">REQUEST FOR QUOTATION</h4>




                     <div style="border: 1px solid #7c8a96;  margin-top: -50px; margin-bottom: 30px" class="card">
                        <table class="table table-bordered">
                            <thead>
                                <tr><th style="background-color: #555; color: #FFFFFF; font-weight: 800;"  colspan="6">A- PRODUCT DETAILS</th></tr>
                                <tr>
                                    <th>Pos.</th>
                                    <th>Product designation</th>
                                    <th>Units</th>
                                    <th colspan="2">Quantities</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; $som=0; ?>
                                @if($projet->frncotation->lignes->count())
                                    @foreach($projet->frncotation->lignes as $prdt)
                                        <?php //dd($prdt) ?>
                                        <tr>
                                          <td>{{ $i++ }}</td>
                                          <td style="border-right: 1px #555 solid">
                                              <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                  <li style="font-weight: bolder">{{ $prdt->produit->name }}</li>
                                                  <li>HS CODE: <span class="text-info">{{ $prdt->produit->code }}</span></li>
                                                  <li class="">width(m) : <span class="text-info">{{ $prdt->produit->largeur }}</span></li>
                                                  <li class="">Length(m) : <span class="text-info">{{ $prdt->produit->longueur }}</span></li>
                                                  <li class="">Diameter(cm) : <span class="text-info">{{ $prdt->produit->diametre }}</span></li>

                                              </ul>
                                          </td>
                                          <td>
                                              <ul style="list-style: none; padding: 0; margin-bottom: 0">
                                                <li>Area (m²) : <span class="text-info">{{ $prdt->area }}</span></li>
                                                <li>volume (m³) : <span class="text-info">{{ $prdt->produit->volume }}</span></li>
                                                <li>weigth (Kg ) : <span class="text-info">{{ $prdt->produit->poids }}</span></li>
                                              </ul>
                                          </td>

                                          <td>{{ number_format($prdt->quantity,0,',','.') }} <br/> Rolls</td>
                                          <td>
                                            <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                <li class="text-info">{{ number_format($prdt->area * $prdt->quantity,2,',','.') }} m² </li>
                                                <li class="text-info">{{ number_format($vg=$prdt->produit->volume * $prdt->quantity,2,',','.') }} m³ </li>
                                                <li class="text-info">{{ number_format($pg=$prdt->produit->poids * $prdt->quantity,2,',','.') }} Kg </li>
                                            </ul>

                                          </td>
                                          <td>
                                            <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                <li>Price (€/m²) : <span class="text-info">{{ number_format($prdt->price,2,',','.') }} €</span></li>
                                                <li></li>
                                                <li>Total Amount: <span class="text-info">{{ number_format( ($aux=$prdt->price * $prdt->area * $prdt->quantity),2,',','.' ) }} €</span></li>
                                            </ul>
                                          </td>
                                        </tr>
                                        <?php $som=$som+$aux; ?>
                                    @endforeach
                                    <tr>
                                        <th colspan="4" style="text-align: right; font-weight: bolder">PRICE POSITION Exw.</th>
                                        <th colspan="2" style="text-align: right; font-weight: bolder; padding-right: 20px; border-right: 1px #111 solid" class="bg-warning">{{ number_format($som,2,'.',',') }} €</th>
                                    </tr>


                                @else
                                    <tr>
                                        <th colspan="6">AUCUN PRODUIT</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                     </div>

                     <div style="border: 1px solid #7c8a96;  margin-top: -50px; margin-bottom: 30px" class="card">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="background-color: #555; color: #FFFFFF; font-weight: 800;"  colspan="2">B- IMPORT DETAILS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 33%">
                                        <ul style="list-style: none; padding-left: 0" class="">
                                            <li class=""><span class="label">Origin : </span><span class="value text-info">{{ $projet->origine->name }}/{{ $projet->origine->pay->name }}</span></li>
                                            <li class=""><span class="label">Gross volume(s) : </span><span class="value text-info">{{ number_format($projet->gross_volume,2,',','.') }} m³</span></li>
                                            <li class=""><span class="label">Gross Weight(s) : </span><span class="value text-info">{{ number_format($projet->gross_weigth,2,',','.') }} kg</span></li>
                                        </ul>
                                    </td>
                                    <td style="width: 67%;">
                                        <ul style="list-style: none; padding-left: 0" class="">
                                            <li class=""><span class="label">Import Options : </span><span class="value text-info">{{ $projet->ioption?$projet->ioption->name:'-'  }}</span></li>
                                            <li class=""><span class="label">Transportation : </span><span class="value text-info">{{ $projet->toption?$projet->toption->name:'-'  }}</span></li>
                                            <li class="">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">Packaging : </li>
                                                    <li class="list-inline-item"><span class="label">40ft : </span><span class="value text-info">{{ $projet->ft40 }}</span></li>
                                                    <li class="list-inline-item"><span class="label">20ft : </span><span class="value text-info">{{ $projet->ft20 }}</span></li>
                                                    <li class="list-inline-item"><span class="label">Palets : </span><span class="value text-info">{{ $projet->pallets }}</span></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                     </div>

                     <div style="width: 50%">

                             <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color: #555; color: #FFFFFF; font-weight: 800;">C- EXPECTED INFORMATIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?= $projet->expected_informations ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                     </div>

                </div>
            </div>



    </main>

</body>
</html>