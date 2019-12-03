<!doctype html>
<html lang="fr">

    <head>

		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>OBAC ALERT</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/media-queries.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/carousel.css')}}">


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('front/ico/apple-touch-icon-144-precomposed.png')}}">

         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
                <style type="text/css">
                    #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                       width: 100%; /* important! if you need full width display */
                       height: 640px;
                       margin-top: 60px;
                       border-radius: 5px;
                                   	/* ... */
                    }
                </style>


        <style>



            .header {
              width:100%;
              height:30px;
              font-size:10px;
              color:#FFFFFF;
              background: #212529;
              font-weight:bold;
            }

            .nav {
              width:100%;
              height:60px;
              font-size:20px;
              line-height:60px;
              background:#28a745;
              color:#fff;
              position:relative;
              margin-bottom:-60px;
              z-index:3;
              text-transform:uppercase;
            }


            .sticky {
              position:fixed;
              top:0;
              z-index: 999999;
              padding: 0;
              height: 60px;
            }
            .sticky a{
                font-weight: 600;
            }

            p {
              line-height:2;
            }
            .navbar-right a{
                color: #FFFFFF;
                text-decoration: none;
                border-bottom: none;
            }

            form label {
            text-align: left;
            color: #000000;
            font-weight: 800;
            }

            #poles .col-md-4, #poles .col-sm-12, #howto .col-md-4, #howto .col-sm-12{
                border-radius: 50%;
                background: #28a745;
                height: 360px;
                padding: 1%;
                color:#fff;
            }

            #poles h3, #howto h3{
            color: #fff;
            font-size: 1.2rem;
            font-family: initial;
            font-weight: bold;
            position:relative;
            top:2%;
            right:6%;
            left:6%;
            }


        </style>
    </head>

    <body style="overflow-x: hidden">

		<!-- Top menu -->


		<div class="header">
            <div class="" style="" id="">
                <ul style="float: right; margin-right: 65px; margin-bottom: 0" class="navbar-right list-inline">
                    <li class="list-inline-item">
                        <a href="/login">Se connecter</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/register">Créer un compte</a>
                    </li>

                </ul>
            </div>
		</div>
		<div class="nav navbar navbar-dark navbar-expand-md">
            <div class="container">
            				<a class="navbar-brand" style="background: none; text-indent: 0" href="">OBAC ALERT</a>
            			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            			        <span class="navbar-toggler-icon"></span>
            			    </button>
            			    <div class="collapse navbar-collapse" id="navbarNav">
            			        <ul class="navbar-nav ml-auto">
            			            <li class="nav-item">
            			                <a class="nav-link" href="/"><i class="fa fa-home -fa-lg"></i></a>
            			            </li>
            			             <li class="nav-item">
            			                <a class="nav-link" href="/projets">TOUS LES PROJETS</a>
            			            </li>
            			            <li class="nav-item">
            			                <a class="nav-link" href="#about">COMMENT CA MARCHE?</a>
            			            </li>
            			            <li class="nav-item">
            			                <a class="nav-link" href="#obac">OBAC</a>
            			            </li>
            			            <li class="nav-item">
            			                <a class="nav-link" href="#contact">CONTACT</a>
            			            </li>
            			        </ul>
            			    </div>
            		    </div>
		</div>
        <div style="height: 100%; overflow-y: scroll">
            <div id="map"></div>
        </div>

		 <div class="section-1-container section-container">
        	        <div class="container">
        	                <div class="col section-1 section-description wow fadeIn ">

                                 <h1>BIENVENU SUR OBAC ALERT</h1>
                                 <div class="divider-1 wow fadeInUp"><span></span></div>
          	                    <p>
          	                    	Obac alert est l’outil de mobilisation de capitaux du cabinet de conseils stratégiques et financiers et à vocation de banques d’affaires : OBAC Sarl. Cet outil nous permet de présenter à notre réseau de partenaires financiers locaux,
          	                    	 régionaux et internationaux <b> les projets structurés par le cabinet dans les pays dans lesquels nous intervenons.</b>
          	                    </p>
        	                </div>
        	        </div>
          </div>

        <!-- Top content -->
        <div class="section-1-container section-container" style="background: #f8f8f8;">
             <h1>Découvrez les projets que nous avons structurés</h1>
             <div class="divider-1 wow fadeInUp"><span></span></div>
        	<div class="container-fluid">
        		<div id="carousel-example" class="carousel slide" data-ride="carousel">
        			<div class="carousel-inner row w-100 mx-auto" role="listbox">
        			    <?php $i=0; ?>
        			    @foreach($projets as $projet)

            			<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 <?= $i==0?'active':'' ?>">
            			    <div class="carousel-item-inner">

            			        <h3 style="position: relative; top: 120px; color: #FFFFFF; font-weight: 700">{{$projet->name}}</h3>
							<img style="height: 240px;" src="{{asset($projet->imageUri?'img/'.$projet->imageUri:'front/img/backgrounds/1.jpg')}}" class="img-fluid mx-auto d-block" alt="img1">
                            <div class="carousel-caption">

                                 <a class="btn btn-sm btn-primary" href="/projet/{{ $projet->token }}">Consulter</a>
                            </div>
            			    </div>

						</div>
						<?php $i++ ?>
						@endforeach

        			</div>
        			<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Precedent</span>
					</a>
					<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Suivant</span>
					</a>
        		</div>
        	</div>
        </div>

        <!-- Section 1 -->
        <div class="section-1-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col section-1 section-description wow fadeIn">
	                    <h1>NOUS VOUS PRESENTONS 3 TYPES DE PROJETS</h1>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                    <p>
	                    	Nous présentons à notre réseau de partenaires financiers, 3 types de projets :
	                    </p>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col-md-4 section-1-box wow fadeInUp">
                		<div class="row">
                			<div class="col-md-12">
			                	<div class="section-1-box-icon">
			                		<i class="fas fa-magic"></i>
			                	</div>
			                	<h3>Projets Industriels</h3>
		                	</div>
	                		<div class="col-md-12">
	                    		<p>Des projets industriels ou de services à forte valeur ajoutée</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-md-4 section-1-box wow fadeInDown">
	                	<div class="row">
                			<div class="col-md-12">
			                	<div class="section-1-box-icon">
			                		<i class="fas fa-cog"></i>
			                	</div>
			                	<h3>Projets liés aux financements structurés </h3>
		                	</div>
	                		<div class="col-md-12">

	                    		<p>Des projets liés aux financements structurés (Ressources naturelles et infrastructures)</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-md-4 section-1-box wow fadeInUp">
	                	<div class="row">
                			<div class="col-md-12">
			                	<div class="section-1-box-icon">
			                		<i class="fab fa-twitter"></i>
			                	</div>
			                	<h3>Projets de cession d’actifs ou de créances</h3>
		                	</div>
	                		<div class="col-md-12">

	                    		<p>projets de cession d’actifs immobilisés ou de créances</p>
	                    	</div>
	                    </div>
                    </div>
	            </div>
	            <div class="row">
                    <div class="col section-1 section-description wow fadeIn">
                        <h3>Afin d’intégrer notre réseau de partenaires financiers</h3>
                        <p><b>Cliquez sur <a href="#contact">Contacter le cabinet OBAC</a></b></p>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                    </div>
                </div>
	        </div>
        </div>


       <div class="section-1-container section-container" style="background: #f8f8f8;">
             <h1>NOS PARTENAIRES FINANCIERS</h1>
             <div class="divider-1 wow fadeInUp"><span></span></div>
        	<div class="container-fluid">
        		<div id="carousel-example" class="carousel slide" data-ride="carousel">
        			<div class="carousel-inner row w-100 mx-auto" role="listbox">
        			    <?php $i=0; ?>
        			    @foreach($partenaires as $projet)
                        @if($projet->imageUri)
            			<div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3 <?= $i==0?'active':'' ?>">
            			    <div class="carousel-item-inner">
							    <img style="height: 120px; border-radius: 50%" src="{{asset('img/'.$projet->imageUri)}}" class="img-fluid mx-auto d-block" alt="img1">
            			    </div>
						</div>
						<?php $i++ ?>
						@endif
						@endforeach

        			</div>
        			<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Precedent</span>
					</a>
					<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Suivant</span>
					</a>
        		</div>
        	</div>
        </div>

        <!-- Section 2 -->
        <div id="about" class="section-2-container section-container section-container-gray-bg">
	        <div class="container">
	            <div class="row">
	                <h1>COMMENT CA MARCHE ?</h1>

	                <div class="col section-2 section-description wow fadeIn">
	                    Nous sélectionnons nos partenaires financiers
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col section-2-box wow fadeInLeft">
	            	    <div id="howto" class="row">
	            	        <div class="col col-sm-12 col-md-4 section-2-box wow fadeInLeft">
	            	            <div class="sup"><h3>1- PRISE DE CONTACT </h3></div>

	            	            <div class="inf">
                                     <p>
                                        Nous prenons connaissance de votre politique d’investissement, de votre appétence pour le risque ainsi que de la valeur ajoutée financière et
                                        non financière que vous pouvez apporter aux projets que nous accompagnons.
                                    </p>
	            	            </div>

	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInRight">
	            	            <h3>2- SIGNATURE D’UNE CONVENTION DE PARTENARIAT  </h3>
	            	            <p>
	            	                Nous développons des partenariats avec des fonds d’investissement, des banques, des microfinances, des groupes d’entreprises
	            	                ou des Business Angels en Afrique et dans le monde afin d’accompagner la croissance des projets que nous structurons.
	            	            </p>
	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInLeft">
	            	            <h3>3- CREATION D’UN COMPTE « INVESTISSEUR »  </h3>
	            	            <p>
	            	               Le compte Investisseur vous permettra d’accéder aux projets structurés par le cabinet dans les pays dans lesquels nous intervenons.
	            	               Vous pouvez dès lors vous intéresser à un projet après avoir lu le teaser puis solliciter une rencontre avec le porteur de projet
	            	            </p>
	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInRight">
	            	            <h3>RENCONTRE AVEC LES PORTEURS DE PROJET   </h3>
	            	            <p>
	            	                Avant toutes décisions d’investissement, nous favorisons la rencontre entre le porteur de projet et les investisseurs qui s’intéressent à son projet. Cette rencontre est importante
	            	                car c’est le porteur de projet qui décidera s’il souhaite poursuivre la discussion avec vous en vous donnant accès à la DATA ROOM.
	            	            </p>
	            	        </div>


	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInLeft">
	            	            <h3>ANALYSE DE LA DATE ROOM, DUE DILIGENCE ET LETTRE D’INTENTION </h3>

	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInRight">
	            	            <h3>6- VALIDATION DE LA DOCUMENTATION JURIDIQUE DE L’OPERATION   </h3>

	            	                Après avoir rencontré , Vous pouvez investir à moyen - long terme en participant aux financements
	            	                de projets présentés sur la plateforme ou à court terme en investissant par exemple sur les cessions de créances.

	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInLeft">
	            	            <h3>7- VERSEMENT DES FONDS   </h3>

	            	              Le versement des fonds se fera sur un numéro de compte qui vous sera communiqué le moment venu

	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInRight">
	            	            <h3> 8- LE SUIVI DE L’INVESTISSEMENT APRES LE DEAL   </h3>

	            	               Le cabinet OBAC utilise son outil de gestion des risques intitulé OBAC RISK MANAGEMENT afin de maitriser les risques
	            	               liés à l’exécution des projets qui ont reçu des financements. OBAC RISK MANAGEMENT est un logiciel expert qui permet
	            	               d’identifier les risques d’exploitation, financiers, d’aléas et stratégiques relatifs à un projet
	            	               puis de mettre en place un plan d’actions en vue de maitriser réduire ces probabilités d’occurrence et limiter les pertes de capital.

	            	            <b>Par ailleurs, chaque mois le porteur de projet est tenu de rédiger un rapport de gestion. </b>
	            	        </div>
	            	        <div class="col  col-md-4 col-sm-12 wow fadeInLeft">
	            	            <h3> 9- RECOLTEZ DANS LE RESPECT DE LA DOCUMENTATION JURIDIQUE QUI A ETE SIGNEE</h3>

	            	        </div>
	            	    </div>
	                </div>
	            </div>
	        </div>
        </div>

		<!-- Section 3 -->
        <div id="obac" class="section-3-container section-container">
	        <div class="container">
	        	
	            <div class="row">
	                <div class="col section-3 section-description wow fadeIn">
	                    <h1>A PROPOS DU CABINET OBAC</h1>
	                        <p>
	                            Créé en 2014, OBAC est un cabinet de conseils stratégiques et financiers spécialisé sur l'Afrique Centrale et à vocation de Banque d’affaires.
	                             OBAC est structuré autour de 3 pôles d’expertise visant chacun à accomplir une mission spécifique.
	                        </p>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                </div>
	            </div>
	            
	            <div id="poles" style="margin-bottom: 30px;" class="row">
	                <div style="border-radius: 50%;background: #28a745;height: 360px; padding: 6%" class="col-md-4 col-sm-12 section-3-box wow fadeInLeft">
	                	<div class="">
	                	    <span><i class="fa fa-lg fa-coins"></i></span>
	                		<div style="">
                                <h3 style="color: #fff; font-size: 1.2rem; font-family: initial; font-weight: bold;">POLE STRUCTURATION DE PROJETS </h3>
                                Nous aidons les porteurs de projet à créer de la valeur en structurant leur entreprise
	                		</div>
	                	</div>
	                </div>
	                <div class="col-md-4 col-sm-12 section-3-box wow fadeInRight">
	                	<div class="">
	                	    <span><i class="fa fa-lg fa-cloud"></i></span>
	                		<div style="">
                                <h3>POLE RISK MANAGEMENT </h3>
                                Nous accompagnons les porteurs de projets dans la maitrise des risques liés à l’exécution de leur plan d’actions
	                		</div>
	                	</div>
	                </div>

	                <div class="col-md-4 col-sm-12 section-3-box wow fadeInLeft">
	                	<div class="">
	                	    <span><i class="fa fa-lg fa-graduate"></i></span>
	                		<div style="">
                                <h3>POLE FORMATION  </h3>
                                <p>Nous accompagnons les porteurs de projet dans le renforcement de leurs capacités managériales</p>
	                		</div>
	                	</div>
	                </div>
	            </div>
	            
	            <div class="row">
	                <p>Notre ambition à moyen terme est d’être présent dans les 6 pays de la CEMAC d’ici 2025
	                tout en saisissant les opportunités présentes dans les pays de la CEDEAO.  </p>
	                <p>Notre mission est d'accompagner d'une part les porteurs de projets dans la structuration
	                de leur projet afin de leur permettre de retrouver une bonne performance et santé financière
                       et d’autre part les investisseurs institutionnels ou privés dans la réduction / maîtrise
                       des risques liés aux investissements.</p>
                    <p>
                        Par ailleurs, le cabinet OBAC forme chaque année des centaines de porteurs de projets à travers différents programmes et séminaires de
                        formation afin de leur donner les outils qui leur permettront de réussir leur aventure entrepreneuriale
                    </p>
	            </div>
                <div class="divider-1 wow fadeInUp"><span></span></div>
                <div class="row">
                    <div class="col section-3 section-description wow fadeIn">
	                    <h2>DECOUVREZ EN IMAGES NOS EVENEMENTS  </h2>

	                    <div class="divider-1 wow fadeInUp"><span></span></div>
                </div>
	        </div>
        </div>
       </div>
		<!-- Section 4 -->
        <div id="contact" class="section-4-container section-container section-container-image-bg">
	        <div class="container">
	            <div class="row">
                    <h1>CONTACTEZ NOUS</h1>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
	            </div>
	            <div class="">
	                <form action="/contact" method="post">
	                 @csrf
	                    <div class="row">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label for="name">NOM</label>
	                                <input type="text" name="name" class="form-control"/>
	                            </div>
	                        </div>
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label for="name">ADRESSE EMAIL</label>
	                                <input type="text" name="email" class="form-control"/>
	                            </div>
	                        </div>
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label for="name">OBJET</label>
	                                <input type="text" name="objet" class="form-control"/>
	                            </div>
	                        </div>
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label for="name">MESSAGE</label>
	                                <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
	                            </div>
	                        </div>
	                        <div class="col-md-12">
	                            <button class="btn btn-success btn-sm"><i class="fa fa-envelope"></i> ENVOYER</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
        </div>

        <!-- Footer -->
        <footer class="footer-container">
        
	        <div class="container">
	        	<div class="row">
	        		
                    <div class="col">
                    	&copy; OBAC ALERT - Cabinet Obac 2019 - Tous droits Reservés.
                    </div>
                    
                </div>
	        </div>
                	
        </footer>



        <!-- Javascript -->
		<script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{asset('front/js/jquery-migrate-3.0.0.min.js')}}"></script>
		<script src="{{asset('front/js/popper.min.js')}}"></script>
		<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="{{asset('front/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{asset('front/js/wow.min.js')}}"></script>
        <script src="{{asset('front/js/scripts.js')}}"></script>
            <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
        	<script type="text/javascript">
        	// On initialise la latitude et la longitude de Paris (centre de la carte)
                                                var lat = -2.300;
                                                var lon = 14.800;
                                                var macarte = null;
                                                // Fonction d'initialisation de la carte
                                                function initMap(villes) {
                                                    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                                                    macarte = L.map('map').setView([lat, lon], 7);
                                                    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                                                    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                                                        // Il est toujours bien de laisser le lien vers la source des données
                                                        attribution: '© <a href="#">OBAC ALERT</a>/Plateforme de collecte des financements',
                                                        minZoom: 1,
                                                        maxZoom: 20
                                                    }).addTo(macarte);

                                                   var marker = L.marker([-4.8441,11.7783]).addTo(macarte);
                                                   marker.bindPopup("Pointe-noire");
                                                    for (var i in villes) {
                                                    		var marker = L.marker([villes[i].latitude, villes[i].longitude]).addTo(macarte);
                                                    		marker.bindPopup(villes[i].name+"   <a style='cursor:pointer' class='badge badge-success' href='/villes/"+ villes[i].id +"'> Afficher  <i class='fa fa-search'></i></a>");

                                                    	}
                                                   }

                                                window.onload = function(){
                                    		// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
                                    		    $.ajax({
                                    		     url:'/getvilles',
                                    		     type:'get',
                                    		     dataType:'json',
                                    		     success:function(data){
                                    		        initMap(data);
                                    		     }

                                    		    });
                                    		    var vils = {"Brazzaville":{latitude:-4.2695,longitude:15.2712},"Dolisie":{latitude:-4.2006,longitude:12.6792},"Nkayi":{latitude:-4.1841,longitude:13.2884}};

                                                };

                </script>
        <script>
            var yourNavigation = $(".nav");
                stickyDiv = "sticky";
                yourHeader = $('.header').height();

            $(window).scroll(function() {
              if( $(this).scrollTop() > yourHeader ) {
                yourNavigation.addClass(stickyDiv);
              } else {
                yourNavigation.removeClass(stickyDiv);
              }
            });
        </script>
    </body>

</html>