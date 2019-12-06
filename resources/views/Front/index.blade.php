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

            form .form-control {
                font-size: 0.9rem;

            }

            .bottom-inner{
                padding: 25px 5px;
            }

            #poles .col-md-4, #poles .col-sm-12{
                border-radius: 50%;
                background: #28a745;
                height: 360px;
                padding: 4%;
                color:#fff;
                box-sizing: border-box;
            }

             #howto .col-md-4, #howto .col-sm-12{
                border-radius: 50%;
                background: #ffff;
                border: solid 1px #28a745;
                height: 360px;
                padding: 4%;
                color:#28a745;
                box-sizing: border-box;
            }

             #types .col-md-4, #types .col-sm-12{
                border-radius: 50%;
                background: #ffff;
                border: solid 1px #28a745;
                height: 360px;
                padding: 4%;

                box-sizing: border-box;
            }

            .divider-1 span {
                display: inline-block;
                width: 200px;
                border-bottom: 1px solid #fff;
            }




             #howto .col-sm-12 p{
               font-size: 0.9rem;
               margin-top: 0;

               margin-bottom: 1rem;

               box-sizing: border-box;

               margin-left: -15px;

               margin-right: -15px;

               text-align: center;
            }

            #poles h3, #howto h3{

            font-size: 1.2rem;
            font-family: initial;
            font-weight: bold;
            position:relative;
            margin:6%;

            }

            .label {
              position: absolute;
              margin: auto;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
              border-radius: 50%;
              width: 100%;
              height: 360px;
              background: none;
              border: 1px solid #28a745;
            }

            .label::before,
            .label::after {
              content: "";
              position: absolute;
              margin: auto;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
              border-radius: 50%;
            }

            .label::before {
              width: 350px;
              height: 350px;
              background: #28a745;
              border: solid 1px #28a745;
            }

            .label::after {
              width: 345px;
              height: 172.5px;
              bottom: 172.5px;
              background: #FFF;
              border-radius: 172.5px 172.5px 0 0;
            }

            .disc-font {
              font-family: Roboto, Arial, Sans-serif;
              font-size: 0.5em;
              text-align: center;
              z-index: 10;
              position: absolute;
              color: #331832;
            }

            .disc-title {
              margin-top: 100px;
              width: 300px;
              margin-left: auto;
              margin-right: auto;
            }

            .disc-group {
              top: 50px;
              left: 10px;
              width: 260px;
            }



             .label {
                          position: absolute;
                          margin: auto;
                          top: 0;
                          left: 0;
                          bottom: 0;
                          right: 0;
                          border-radius: 50%;
                          width: 360px;
                          height: 360px;
                          background: none;
                          border: 1px solid #28a745;
                        }

                        .label::before,
                        .label::after {
                          content: "";
                          position: absolute;
                          margin: auto;
                          top: 0;
                          left: 0;
                          bottom: 0;
                          right: 0;
                          border-radius: 50%;
                        }

                        .label::before {
                          width: 350px;
                          height: 350px;
                          background: #28a745;
                          border: solid 1px #28a745;
                        }

                        .label::after {
                          width: 345px;
                          height: 172.5px;
                          bottom: 172.5px;
                          background: #FFF;
                          border-radius: 172.5px 172.5px 0 0;
                        }

                        .disc-font {
                          font-family: Roboto, Arial, Sans-serif;
                          font-size: 0.5em;
                          text-align: center;
                          z-index: 10;
                          position: absolute;
                          color: #331832;
                        }

                       .label .disc-title {
                          margin-top: 100px;
                          width: 300px;
                          margin-left: auto;
                          margin-right: auto;
                          color: #28a745;
                        }

                       .label .disc-group {
                          top: 50px;
                          left: 10px;
                          width: 260px;
                          color:#fff
                        }

           .disc-group {
              top: 180px;
              left: 10px;
              width: 260px;
              color:#fff;
              font-size: 0.8rem;
            }




             .label-reverse {
              position: absolute;
              margin: auto;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
              border-radius: 50%;
              width: 360px;
              height: 360px;
              background: none;
              border: 1px solid #FFFFFF;
            }

            .label-reverse::before,
            .label-reverse::after {
              content: "";
              position: absolute;
              margin: auto;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
              border-radius: 50%;
            }

            .label-reverse::before {
              width: 350px;
              height: 350px;
              background: #FFFFFF;
              border: solid 1px #FFFFFF;
            }

            .label-reverse::after {
              width: 345px;
              height: 172.5px;
              bottom: 172.5px;
              background: #28a745;
              border-radius: 172.5px 172.5px 0 0;
            }

            .label-reverse .disc-title {
               margin-top: 100px;
               width: 300px;
               margin-left: auto;
               margin-right: auto;
               color: #FFFFFF;
             }

            .label-reverse .disc-group {
               top: 50px;
               left: 10px;
               width: 260px;
               color:#28a745
             }


             .carousel-inner .carousel-item-right.active,
                .carousel-inner .carousel-item-next {
                  transform: translateX(33.33%);
                }

                .carousel-inner .carousel-item-left.active,
                .carousel-inner .carousel-item-prev {
                  transform: translateX(-33.33%)
                }

                .carousel-inner .carousel-item-right,
                .carousel-inner .carousel-item-left{
                  transform: translateX(0);
                }


         .section-container{
            padding: 70px 5px;
         }

         .section-reverse{
            background:#28a745 ;
         }

         .section-reverse a{
            color: #a4f095;;
         }

         .section-reverse a:hover{
            color: #6cddf0;
         }

          .bottom-inner{
            height: 560px;

          }

          .border-right{
            border-right: 1px solid #fff;
          }

          .section-1-container h1 {
            color:#28a745 ;
            font-weight: 700;
          }

          .section-reverse h1, .section-reverse h2, .section-reverse h3{
            color:#FFFFFF;
          }

          .section-1-box{
            text-align: center;
          }

          #types h3{
          font-size: 1.1rem;
          font-weight: 900;
          color:#28a745 ;
          }

          #types p {
          color: #000000;
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
            				<a class="navbar-brand" style="background: none; text-indent: 0" href=""><i><img style="border-radius:35px; height: 45px; width:50px;" src="img/bg-obac.png" alt=""/></i> OBAC ALERT</a>
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

            			        </ul>
            			    </div>
            		    </div>
		</div>
        <div style="height: 100%; overflow-y: scroll">
            <div id="map"></div>
        </div>

		 <div class="section-1-container section-container">
        	        <div class="container">
        	                <div class="col section-1 section-description wow fadeIn">

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
        <div class="section-1-container section-container section-reverse" style="">
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
	        <div id="types" class="container">
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
			                	<div style="width: 150px; margin: 10px auto;" class="">
			                		<img style="height: 80px; width:90px; border-radius: 40px" src="img/projets-industriels.png" alt=""/>
			                	</div>
			                	<h3>Projets Industriels et de service</h3>
		                	</div>
	                		<div class="col-md-12">
	                    		<p>Des projets industriels ou de services à forte valeur ajoutée</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-md-4 section-1-box wow fadeInDown">
	                	<div class="row">
                			<div class="col-md-12">
			                	<div style="width: 150px; margin: 10px auto;" class="">
			                		<img style="height: 80px; width:90px; border-radius: 40px" src="img/financement-de-linnovation.jpg" alt=""/>
			                	</div>
			                	<h3>Projets d'infrastructures </h3>
		                	</div>
	                		<div class="col-md-12">

	                    		<p>Des projets liés aux financements structurés (Ressources naturelles et infrastructures)</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-md-4 section-1-box wow fadeInUp">
	                	<div class="row">
                			<div class="col-md-12">
			                	<div style="width: 150px; margin: 10px auto;" class="">
			                		<img style="height: 80px; width:90px; border-radius: 40px" src="img/cessions.jpg" alt=""/>
			                	</div>
			                	<h3>Cession d’actifs ou de créances</h3>
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


       <div class="section-1-container section-container section-reverse">
             <h1>NOS PARTENAIRES FINANCIERS</h1>
             <div class="divider-1 wow fadeInUp"><span></span></div>
        	<div style="margin-top: 50px;" class="container-fluid">
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
        <div id="about" class="section-2-container section-container">
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
	            	        <div style="background: none" class="col-md-4">
                                <div class="turntable">
                                  <div class="disc">
                                    <div class="label">
                                         <div class="disc-font disc-title">
                                           <h3>1- PRISE DE CONTACT</h3>
                                          </div>
                                          <div class="disc-font disc-group">
                                               Nous prenons connaissance de votre politique d’investissement, de votre appétence pour le risque ainsi que de la valeur ajoutée financière et
                                            non financière que vous pouvez apporter aux projets que nous accompagnons.
                                          </div>
                                    </div>
                                  </div>
                                </div>
	            	        </div>
	            	        <div style="background: none" class="col-md-4">
                                <div class="turntable">
                                  <div class="disc">
                                    <div class="label-reverse">
                                         <div class="disc-font disc-title">
                                            <h3>2- SIGNATURE D’UNE CONVENTION DE PARTENARIAT  </h3>
                                          </div>
                                          <div class="disc-font disc-group">
                                            Nous développons des partenariats avec des fonds d’investissement, des banques, des microfinances, des groupes d’entreprises
	            	                        ou des Business Angels en Afrique et dans le monde afin d’accompagner la croissance des projets que nous structurons.
                                          </div>
                                    </div>
                                  </div>
                                </div>
	            	        </div>
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
	            	            <h3>4- RENCONTRE AVEC LES PORTEURS DE PROJET   </h3>
	            	            <p>
	            	                Avant toutes décisions d’investissement, nous favorisons la rencontre entre le porteur de projet et les investisseurs qui s’intéressent à son projet. Cette rencontre est importante
	            	                car c’est le porteur de projet qui décidera s’il souhaite poursuivre la discussion avec vous en vous donnant accès à la DATA ROOM.
	            	            </p>
	            	        </div>


	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInLeft">
	            	            <h3>5- ANALYSE DE LA DATE ROOM, DUE DILIGENCE ET LETTRE D’INTENTION </h3>

	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInRight">
	            	            <h3>6- VALIDATION DE LA DOCUMENTATION JURIDIQUE DE L’OPERATION   </h3>

	            	              <p>  Après avoir rencontré , Vous pouvez investir à moyen - long terme en participant aux financements
	            	                de projets présentés sur la plateforme ou à court terme en investissant par exemple sur les cessions de créances. </p>

	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInLeft">
	            	            <h3>7- VERSEMENT DES FONDS   </h3>

	            	             <p>Le versement des fonds se fera sur un numéro de compte qui vous sera communiqué le moment venu </p>

	            	        </div>
	            	        <div class="col col-md-4 col-sm-12 section-2-box wow fadeInRight">
	            	            <h3> 8- LE SUIVI DE L’INVESTISSEMENT APRES LE DEAL   </h3>

	            	             <p style="font-size: 0.8rem">  Le cabinet OBAC utilise son outil de gestion des risques intitulé OBAC RISK MANAGEMENT afin de maitriser les risques
	            	               liés à l’exécution des projets qui ont reçu des financements. OBAC RISK MANAGEMENT est un logiciel expert qui permet
	            	               d’identifier les risques d’exploitation, financiers, d’aléas et stratégiques relatifs à un projet
	            	               puis de mettre en place un plan d’actions en vue de maitriser réduire ces probabilités d’occurrence et limiter les pertes de capital.</p>

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
	            </div>
	         </div>
                <div class="divider-1 wow fadeInUp"><span></span></div>
                <div class="section-container">
                    <div class="col section-3 section-description wow fadeIn">
	                    <h2>DECOUVREZ EN IMAGES NOS EVENEMENTS  </h2>

	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                    <div class="container-fluid">
        		<div id="carousel-example" class="carousel slide" data-ride="carousel">
        			<div class="carousel-inner row w-100 mx-auto" role="listbox">
        			    <?php $i=0; ?>
        			    @foreach($events as $projet)
                        @if($projet->imageUri)
            			<div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3 <?= $i==0?'active':'' ?>">
            			    <div class="carousel-item-inner">
							    <h3 style="position: relative; top: 120px; color: #000; font-weight: 700">{{$projet->name}}</h3>
							     <h4 style="position: relative; top: 140px; color: #003; font-weight: 500">{{ date_format($projet->start,'d/m/Y') }} - {{ date_format($projet->end,'d/m/Y') }}</h4>
                                <img style="height: 240px;" src="{{asset($projet->imageUri)}}" class="img-fluid mx-auto d-block" alt="img1">

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
	        </div>

		<!-- Section 4 -->
        <div id="contact" class="section-4-container section-container section-reverse section-container-image-bg">
	        <div class="container">
	            <div class="row">
	                  <div class="col-md-4">
                            <div class="bottom-inner border-right">
                                <div style='background: url("img/logo-obac.png"); background-size: cover; width: 55%; height: 158px; margin-bottom: 20px;'>

                                </div>
                                <div style="color: #fff; text-align: left;" class="address-obac">
                                    <h5 class="page-header">CABINET OBAC</h5>
                                    <ul>
                                        <li>CONSEIL STRATEGIQUE ET FINANCIER</li>
                                        <li>ETUDES DE MARCHE</li>
                                        <li>LEVEE DE FONDS</li>
                                    </ul>


                                        <p style="font-weight: 600;">ROND-POINT KASSAI - Pointe-Noire, Congo</p>
                                        <p>TEL : +242 0666656</p>


                                    <p>SITE WEB:<a href="http://cabinet-obac.org">http://cabinet-obac.org</a></p>
                                </div>
                          </div>
	                  </div>
	                  <div class="col-md-4">
                          <div class="bottom-inner border-right">

                          </div>
	                  </div>
	                  <div class="col-md-4">
	                    <div class="bottom-inner">
	                        <h4>CONTACTEZ NOUS</h4>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                        <div style="margin-top:40px;" class="">
                                <form action="/contact" method="post">
                                 @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <input required="required" type="text" name="name" class="form-control" placeholder="Votre nom complet"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <input required="required" type="email" name="email" class="form-control" placeholder="Votre adresse email"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <input required="required" type="text" name="objet" class="form-control" placeholder="Objet"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <textarea required="required" name="message" id="" cols="30" rows="4" class="form-control" placeholder="Votre message ..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-warning btn-block btn-sm"><i class="fa fa-envelope"></i> ENVOYER</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
	                    </div>
	                  </div>

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

        <script src="{{asset('front/js/wow.min.js')}}"></script>

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