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
             color: #28a745;
             text-align: center;
             line-height: 1.5cm;
         }
     </style>
</head>
<body>

    <header>
       Entete du document
    </header>

    <footer>
       Pied de page OBAC ALERT Copyright &copy; <?php echo date("Y");?>
    </footer>

    <main>
        <div style="padding-top: 30px" class="container">
            <div style="margin-top: 200px; margin-right: auto; margin-left: auto; width: 600px; text-align: center">
               <h1>RAPPORT D’EVALUATION DU PROJET </h1>
            </div>

            <div></div>

            <div style="margin-top: 20px; width: 600px; height: 400px; background: url('{{ $dossier->imageUri?asset('/img/'.$dossier->imageUri):asset('/img/logo.png') }}');  background-size: cover">

            </div>
            <?php $image_path = '/img/logo.png'; ?>
            <img src="{{ public_path() . $image_path }}" style="width: 300px; height: 240px;">
            
            <img  src="{{ url('img/projets/01f926254e281c2493eab56da0e093a3b5ab6b72.jpg') }}"  alt=""/>

        </div>
    </main>

</body>
</html>