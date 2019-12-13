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
       Entete du document
    </header>

    <footer>
       Pied de page OBAC ALERT Copyright &copy; <?php echo date("Y");?>
    </footer>

    <main>
        <div style="padding-top: 30px" class="container">
            <div style="position: absolute; top:0; bottom: 0;right: 0; left: 0 ">
                <h4>Contenu du document</h4>
            </div>
        </div>
    </main>

</body>
</html>