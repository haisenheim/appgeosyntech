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
            <div style="margin-top: 100px; margin-right: auto; margin-left: auto; max-width: 700px; text-align: left">

               <div style="width: 100%; box-sizing: border-box; padding-top: 30px; display: flex; flex-wrap: wrap; margin-top: -100px">
                    <div style="border: 1px solid #111; max-width: 40%; flex: 0 0 40%; width: 100%; position: relative; padding: 0 12px;">
                        <h6 style="font-weight: bolder; text-align: center">{{ $projet->client->name }}</h6>
                        <ul style="list-style-type: none; padding: 0; text-align: left ">
                            <li> <span class="label">Applicant :</span> <span class="val">{{ $projet->client->representant?$projet->client->representant->name:'-' }}</span></li>
                            <li> <span class="label">Email :</span> <span class="val">{{ $projet->client->representant?$projet->client->representant->email:'-' }}</span></li>
                            <li><span class="label">Tel : </span><span class="val">{{ $projet->client->representant?$projet->client->representant->phone:'-' }}</span></li>
                            <li><span class="label">Address : </span><span class="val">{{ $projet->client->representant?$projet->client->address:'-' }}</span></li>
                        </ul>
                    </div>

                    <div style="border: 1px solid #111; max-width: 40%; flex: 0 0 40%; width: 100%; position: relative; padding: 0 12px; margin-left: 60%">
                        <h6 class="">BON DE LIVRAISON N <sup>o</sup> : <span class="text-info">{{ $projet->name }}</span> </h6>
                        <ul style="list-style-type: none; padding: 0; text-align: left ">
                            <li><span class="label">Page: </span> <span class="val">1/2</span></li>
                            <li> <span class="label">Date de livraison :</span> <span class="val"><?= $projet->jour?date_format($projet->jour,'d/m/Y'):date_format($projet->created_at,'d/m/Y') ?></span></li>
                            <li> <span class="label">BC N<sup>o</sup> :</span> <span class="val"><?= $projet->bcnum ?></span></li>
                            <li> <span class="label">Provider ID :</span> <span class="val"><?= $projet->fournisseur->identifiant ?></span></li>
                        </ul>
                    </div>
               </div>
               <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="background-color: #555; color: #FFFFFF; font-weight: 900">REF COMMANDE</th>
                            <th style="background-color: #555; color: #FFFFFF; font-weight: 900">FABRICANT</th>
                            <th style="background-color: #555; color: #FFFFFF; font-weight: 900">MODALITES DE PAIEMENT</th>
                            <th style="background-color: #555; color: #FFFFFF; font-weight: 900">MODE D'EXPEDITION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="padding-bottom: 2px">{{$projet->bcnum}}</th>
                            <th style="padding-bottom: 2px">{{ $projet->fournisseur->name }}</th>
                            <th style="padding-bottom: 2px; font-size: smaller"><?= $projet->modalites_paiement ?></th>
                            <th style="padding-bottom: 2px">{{ $projet->transport_option->name }}</th>
                        </tr>
                    </tbody>
               </table>



                     <div style="border: 1px solid #222; padding: 15px">
                        <h5 style="font-weight: 900; text-decoration: underline; margin-top: 10px;">A- DETAILS DES PRODUITS LIVRES</h5>
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th rowspan="2" >DESIGNATION ET DETAILS DES PRODUITS <br/></th>
                                    <th colspan="3">Caractéristiques</th>
                                    <th rowspan="2">Quantité Livrée (m²) <br/></th>

                                    <th rowspan="2">OBSERVATIONS <br/></th>


                                </tr>
                                <tr>


                                    <th>long.</th>
                                    <th>larg.</th>
                                    <th>nombre</th>


                                </tr>
                            </thead>
                            <tbody>

                                @if($projet->lignes->count())
                                    @foreach($projet->lignes as $prdt)
                                        <?php //dd($prdt) ?>
                                        <tr>

                                          <td>
                                              <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                  <li style="font-weight: bolder">{{ $prdt->produit->name }}</li>
                                                  <li><span style="font-style: italic" class="">{{ $prdt->produit->description }}</span></li>

                                              </ul>
                                          </td>
                                          <td>{{ $prdt->produit->longueur }}</td>
                                          <td>{{ $prdt->produit->largeur }}</td>
                                          <td>{{ $prdt->nombre }}</td>
                                          <td>{{ number_format($prdt->quantity,2,',','.') }} m²</td>

                                          <td>
                                            {{ $prdt->observations }}
                                          </td>

                                        </tr>

                                    @endforeach


                                @else
                                    <tr>
                                        <th colspan="10">AUCUN PRODUIT</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <h5 style="font-weight: 900; text-decoration: underline; margin-top: 10px;">B- OBSERVATIONS SUR LA LIVRAISON</h5>
                        <textarea class="form-control" name="" id="" cols="30" rows="10"><?= $projet->observation ?></textarea>
                     </div>





                </div>
                <div class="page-break"></div>
                <div style="margin-top: 100px; margin-right: auto; margin-left: auto; max-width: 700px; text-align: left">

                   <div style="margin-left: 70%; width: 20%">
                        <div style="background-color: #cccccc">
                            <ul style="list-style: none">
                                <li><span class="label">Page : </span><span class="val">2/2</span></li>
                            </ul>
                        </div>
                   </div>
                    <h5 style="font-weight: 900; text-decoration: underline; margin-top: 10px;">C- PRESENCE A LA RECEPTION </h5>
                     <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="font-weight: 900; text-decoration: underline">CLIENT</th>
                                <th style="font-weight: 900; text-decoration: underline">FOURNISSEUR</th>
                            </tr>
                            <tr>
                                <th><?= $projet->presence_client ?></th>
                                <th><?= $projet->presence_fournisseur ?></th>
                            </tr>
                        </tbody>
                     </table>
                    <h5 style="font-weight: 900; text-decoration: underline; margin-top: 10px;">D- APERÇU DE LA RECEPTION </h5>
                    <div style="margin-top: 100px">
                        <ul class="list-inline">
                            @foreach($projet->photos as $photo)
                            <li class="list-inline-item">
                                <img src="{{ public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$photo->uri }}" alt="{{ $photo->name }}" style="max-width: 240px; max-height: 240px"/>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>



    </main>

</body>
</html>