<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">

	<title> Titre du document</title>
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
             background-color: #FFFFFF;
             color: #28a745;
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
             background-color: #FFFFFF;
             color: #000;
             text-align: center;
             line-height: 1.5cm;
         }


         .page-break {
             page-break-after: always;
         }

     </style>
</head>
<body>

    <header>
       Entete du document
    </header>

    <footer>
      OBAC Sarl – Congo – Rapport d’évaluation du projet <b><?= $dossier->name ?></b>
    </footer>

    <main>
        <div style="padding-top: 30px" class="container">
            <div style="margin-top: 200px; margin-right: auto; margin-left: auto; width: 600px; text-align: center">
               <h1>RAPPORT D’EVALUATION DU PROJET </h1>
            </div>

            <div></div>

            <div style="margin-top: 20px; margin-right: auto; margin-left: auto; width: 600px; text-align: center; height: 400px;">
                <?php $image_path = '/img/'.$dossier->imageUri; ?>
                <img src="{{ public_path() . $image_path }}" style="width: 480px; height: 240px;">
            </div>

            <div style="float: right; margin-top: 30px; margin-right: 100px; border: 1px solid rgba(5, 11, 41, 0.89); padding: 10px; width: 200px; height: auto; text-align: center">
                Direction du Pôle  Structuration de projets & Levée de fonds
            </div>
            <div class="page-break"></div>
            <div class="sommaire">
                <h3 style="text-align: center;">TABLE DES MATIERES</h3>
                <ol style="list-style: upper-roman">
                    <li>RESUME EXECUTIF ................ p.</li>
                    <li>
                        DIAGNOSTIC EXTERNE ................p.
                        <ul style="list-style: none">
                            <li>2.1. Analyse de l’environnement ..........p.</li>
                            <li>2.2. Analyse de la demande................p.</li>
                            <li>2.3. Analyse de l’offre ..................p.</li>
                            <li>2.4. Résumé du diagnostic externe ........p.</li>
                        </ul>

                    </li>
                    <li>
                        DIAGNOSTIC INTERNE…………………………………………………………………………p.
                        <ul style="list-style: none;">
                            <li>3.1. Présentation du modèle économique…p.</li>
                        </ul>
                    </li>

                </ol>
            </div>
        </div>
    </main>

</body>
</html>