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
        <link rel="shortcut icon" href="{{asset('front/ico/favicon.png')}}">
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
            			                <a class="nav-link" href="/">ACCUEIL</a>
            			            </li>
            			             <li class="nav-item">
            			                <a class="nav-link" href="/projets">TOUS LES PROJETS</a>
            			            </li>
            			            <li class="nav-item">
            			                <a class="nav-link" href="/about">A PROPOS</a>
            			            </li>
            			            <li class="nav-item">
            			                <a class="nav-link" href="http://cabinet-obac.com">OBAC</a>
            			            </li>
            			            <li class="nav-item">
            			                <a class="nav-link" href="/contact">CONTACT</a>
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
        	            <div class="row">
        	                <div class="col section-1 section-description wow fadeIn ">

                                 <h1>BIENVENU SUR OBAC ALERT</h1>
                                 <div class="divider-1 wow fadeInUp"><span></span></div>
          	                    <p>
          	                    	Plateforme vitrine des projet <strong>Carousel</strong> template with <strong>Multiple Items</strong> made with
          	                    	the <strong>Bootstrap 4</strong> framework. Check it out now. Download it, customize and use it as you like!
          	                    </p>
        	                </div>
        	            </div>
        	        </div>
          </div>

        <!-- Top content -->
        <div class="" style="background: #f8f8f8;">
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
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                Ut wisi enim ad minim veniam, quis nostrud.
                                 <a class="btn btn-sm btn-primary" href="#">Lire la suite</a>
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
	                    <h1>Projets divers, d'horizons divers pour des investisseurs divers</h1>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                    <p>
	                    	This is a free <strong>Carousel</strong> template with <strong>Multiple Items</strong> made with 
	                    	the <strong>Bootstrap 4</strong> framework. Check it out now. Download it, customize and use it as you like!
	                    </p>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col-md-4 section-1-box wow fadeInUp">
                		<div class="row">
                			<div class="col-md-4">
			                	<div class="section-1-box-icon">
			                		<i class="fas fa-magic"></i>
			                	</div>
		                	</div>
	                		<div class="col-md-8">
	                    		<h3>Projets Industriels</h3>
	                    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-md-4 section-1-box wow fadeInDown">
	                	<div class="row">
                			<div class="col-md-4">
			                	<div class="section-1-box-icon">
			                		<i class="fas fa-cog"></i>
			                	</div>
		                	</div>
	                		<div class="col-md-8">
	                    		<h3>Projets d'exploitations des ressources naturelles</h3>
	                    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-md-4 section-1-box wow fadeInUp">
	                	<div class="row">
                			<div class="col-md-4">
			                	<div class="section-1-box-icon">
			                		<i class="fab fa-twitter"></i>
			                	</div>
		                	</div>
	                		<div class="col-md-8">
	                    		<h3>Projets de partenariat public privé</h3>
	                    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
	                    	</div>
	                    </div>
                    </div>
	            </div>
	        </div>
        </div>

        <!-- Section 2 -->
        <div class="section-2-container section-container section-container-gray-bg">
	        <div class="container">
	            <div class="row">
	                <div class="col section-2 section-description wow fadeIn">
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col section-2-box wow fadeInLeft">
                    	<h3>Section 2</h3>
                    	<p class="medium-paragraph">
                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
                    		sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.
                    	</p>
                    	<p>
                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                    		Ut wisi enim ad minim veniam, quis nostrud. 
                    		Exerci tation ullamcorper suscipit <a href="#">lobortis nisl</a> ut aliquip ex ea commodo consequat. 
                    		Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl. 
                    	</p>
                    	<p>
                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                    		Ut wisi enim ad minim veniam, quis nostrud. 
                    		Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                    	</p>
	                </div>
	            </div>
	        </div>
        </div>

		<!-- Section 3 -->
        <div class="section-3-container section-container">
	        <div class="container">
	        	
	            <div class="row">
	                <div class="col section-3 section-description wow fadeIn">
	                    <h2>Section 3</h2>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-md-6 section-3-box wow fadeInLeft">
	                	<div class="row">
	                		<div class="col-md-3">
	                			<div class="section-3-box-icon">
	                				<i class="fas fa-paperclip"></i>
	                			</div>
	                		</div>
	                		<div class="col-md-9">
	                			<h3>Ut wisi enim ad minim</h3>
		                    	<p>
		                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
		                    		Ut wisi enim ad minim veniam, quis nostrud.
		                    	</p>
	                		</div>
	                	</div>
	                </div>
	                <div class="col-md-6 section-3-box wow fadeInLeft">
	                	<div class="row">
	                		<div class="col-md-3">
	                			<div class="section-3-box-icon">
	                				<i class="fas fa-pencil-alt"></i>
	                			</div>
	                		</div>
	                		<div class="col-md-9">
	                			<h3>Sed do eiusmod tempor</h3>
		                    	<p>
		                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
		                    		Ut wisi enim ad minim veniam, quis nostrud.
		                    	</p>
	                		</div>
	                	</div>
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-md-6 section-3-box wow fadeInLeft">
	                	<div class="row">
	                		<div class="col-md-3">
	                			<div class="section-3-box-icon">
	                				<i class="fas fa-cloud"></i>
	                			</div>
	                		</div>
	                		<div class="col-md-9">
	                			<h3>Quis nostrud exerci tat</h3>
		                    	<p>
		                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
		                    		Ut wisi enim ad minim veniam, quis nostrud.
		                    	</p>
	                		</div>
	                	</div>
	                </div>
	                <div class="col-md-6 section-3-box wow fadeInLeft">
	                	<div class="row">
	                		<div class="col-md-3">
	                			<div class="section-3-box-icon">
	                				<i class="fab fa-google"></i>
	                			</div>
	                		</div>
	                		<div class="col-md-9">
	                			<h3>Minim veniam quis nostrud</h3>
		                    	<p>
		                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
		                    		Ut wisi enim ad minim veniam, quis nostrud.
		                    	</p>
	                		</div>
	                	</div>
	                </div>
	            </div>

	        </div>
        </div>

		<!-- Section 4 -->
        <div class="section-4-container section-container section-container-image-bg">
	        <div class="container">
	            <div class="row">
	                <div class="col section-4 section-description wow fadeInLeftBig">
	                	<h2>Section 4</h2>
	                    <p>
	                    	Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
	                    	aliquip ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud.
	                    </p>
	                </div>
	            </div>
	        </div>
        </div>

        <!-- Footer -->
        <footer class="footer-container">
        
	        <div class="container">
	        	<div class="row">
	        		
                    <div class="col">
                    	&copy; Bootstrap 4 Carousel with Multiple Items. Download it for free on <a href="https://azmind.com">AZMIND</a>.
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