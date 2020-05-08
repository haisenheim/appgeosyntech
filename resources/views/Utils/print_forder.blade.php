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

       <img style="width: 100%; height: 100px;" src= "{{ public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'entete.png' }} " alt=""/>
    </header>

    <footer>
      <img style="width: 100%" src= "{{ public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'pied.png' }} " alt=""/>
    </footer>

    <main>
        <div style="padding-top: 30px" class="container">
            <div style="margin-top: 100px; margin-right: auto; margin-left: auto; max-width: 700px; text-align: center">

               <div style="width: 100%; box-sizing: border-box; padding-top: 30px; display: flex; flex-wrap: wrap; margin-top: -100px">
                    <div style="border: 1px solid #111; max-width: 40%; flex: 0 0 40%; width: 100%; position: relative; padding: 0 12px;">
                        <h6 style="font-weight: bolder; text-align: center">{{ $projet->fournisseur->name }}</h6>
                        <ul style="list-style-type: none; padding: 0; text-align: left ">
                            <li> <span class="label">Applicant :</span> <span class="val">{{ $projet->fournisseur->representant?$projet->fournisseur->representant->name:'-' }}</span></li>
                            <li> <span class="label">Email :</span> <span class="val">{{ $projet->fournisseur->representant?$projet->fournisseur->representant->email:'-' }}</span></li>
                            <li><span class="label">Tel : </span><span class="val">{{ $projet->fournisseur->representant?$projet->fournisseur->representant->phone:'-' }}</span></li>
                            <li><span class="label">Address : </span><span class="val">{{ $projet->fournisseur->representant?$projet->fournisseur->address:'-' }}</span></li>
                        </ul>
                    </div>

                    <div style="border: 1px solid #111; max-width: 40%; flex: 0 0 40%; width: 100%; position: relative; padding: 0 12px; margin-left: 60%">

                        <ul style="list-style-type: none; padding: 0; text-align: left ">
                            <li> <span class="label">Date :</span> <span class="val"><?= $projet->jour?date_format($projet->jour,'d/m/Y'):date_format($projet->created_at,'d/m/Y') ?></span></li>
                            <li> <span class="label">BC N<sup>o</sup> :</span> <span class="val"><?= $projet->name ?></span></li>
                            <li> <span class="label">Provider ID :</span> <span class="val"><?= $projet->fournisseur->identifiant ?></span></li>
                        </ul>
                    </div>
               </div>

                    <h5 style="font-weight: 900; text-decoration: underline">PURCHASE ORDER</h5>

                     <div style="border: 1px solid #7c8a96; " class="card">
                        <table class="table table-bordered">
                            <thead>

                                <tr>
                                    <th>N<sup>0</sup></th>
                                    <th>Product designation</th>

                                    <th>Quantities</th>
                                    <th>Unit price</th>
                                    <th>Total </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; $som=0; ?>
                                @if($projet->lignes->count())
                                    @foreach($projet->lignes as $prdt)
                                        <?php //dd($prdt) ?>
                                        <tr>
                                          <td>{{ $i++ }}</td>
                                          <td style="border-right: 1px #555 solid">
                                              <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                  <li style="font-weight: bolder">{{ $prdt->produit->name }}</li>
                                                  <li><span style="font-style: italic" class="">{{ $prdt->produit->description }}</span></li>
                                                  <li>
                                                      <ul class="list-inline">
                                                          <li class="list-inline-item">width(m) : <span class="text-info">{{ $prdt->produit->largeur }}</span></li>
                                                          <li class="list-inline-item">Length(m) : <span class="text-info">{{ $prdt->produit->longueur }}</span></li>
                                                          <li class="list-inline-item">Diameter(cm) : <span class="text-info">{{ $prdt->produit->diametre }}</span></li>
                                                      </ul>
                                                  </li>


                                              </ul>
                                          </td>

                                          <td>{{ number_format($prdt->quantity,2,'.',',') }} m² </td>

                                          <td>
                                               <span class="">{{ number_format($prdt->price,2,'.',',') }} €/m²</span>
                                          </td>
                                          <td>
                                               <span class="">{{ number_format($prdt->montant,2,'.',',') }} €</span>
                                          </td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <th colspan="4" style="text-align: right; font-weight: bolder">TOTAL AMOUNT</th>
                                        <th colspan="1" style="text-align: right; font-weight: bolder; padding-right: 20px; border-right: 1px #111 solid" class="">{{ number_format($projet->montant,0,'.',',') }} €</th>
                                    </tr>

                                    <tr class="bg-primary">
                                        <th colspan="4" style="text-align: right; font-weight: bolder; color: #FFFFFF">TOTAL AMOUNT OF SUPPLY  :</th>
                                        <th colspan="1" style="text-align: right; font-weight: bolder; padding-right: 20px; color: #FFFFFF" class="">{{ number_format($projet->montant,0,'.',',') }} €</th>
                                    </tr>


                                @else
                                    <tr>
                                        <th colspan="5">AUCUN PRODUIT</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                     </div>



                     <div style="width: 50%">

                             <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color: #555; color: #FFFFFF; font-weight: 800;">NOTE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?= $projet->note_speciale ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #555; color: #FFFFFF; font-weight: 800;">PAYMENT TERMS</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= $projet->modalites_paiement ?>
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