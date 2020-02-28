    @include('includes.head-front')

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header style="background-color: #28a745" id="page-topbar">
                <div style="height: 50px;" class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <div class="navbar-brand-box">
                            <a href="/" class="logo logo-dark">OBAC TRAINING CENTER</a>

                            <a href="/" style="color: #FFFFFF" class="logo logo-light">OBAC TRAINING CENTER</a>
                        </div>
                        </div>

                        <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Rechercher...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Rechercher ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="dropdown d-inline-block">
                            <a style="height: 50px; color: #FFFFFF" href="/login"  class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <span class="d-none d-sm-inline-block ml-1">SE CONNECTER</span>
                                <i class="mdi mdi-login"></i>
                            </a>
                        </div>


                    </div>
                </div>
            </header>

            <div style="margin-top: 50px;" class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">
                                        <i class="mdi mdi-home mr-2"></i>ACCUEIL
                                    </a>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-grid-large mr-2"></i>SECTEURS <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu mega-dropdown-menu" aria-labelledby="topnav-uielement">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">FINANCES</a>
                                                    <a href="#" class="dropdown-item">COMPTABILITE</a>
                                                    <a href="#" class="dropdown-item">GESTION FINANCIERE</a>
                                                    <a href="#" class="dropdown-item">RH</a>
                                                    <a href="#" class="dropdown-item">MARKETING</a>
                                                    <a href="#" class="dropdown-item">GESTION D'ENTREPRISE</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">RESEAUX &amp; TELECOMS</a>
                                                    <a href="#" class="dropdown-item">PROGRAMMATION</a>
                                                    <a href="#" class="dropdown-item">INFOGRAPHIE</a>
                                                    <a href="#" class="dropdown-item">BASES DE DONNEES</a>
                                                    <a href="#" class="dropdown-item">SYSTEMES D'EXPLOITATION</a>
                                                    <a href="#" class="dropdown-item">MODELISATION</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Spinner</a>
                                                    <a href="#" class="dropdown-item">Carousel</a>
                                                    <a href="#" class="dropdown-item">Video</a>
                                                    <a href="#" class="dropdown-item">Typography</a>
                                                    <a href="#" class="dropdown-item">Grid</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                 <li class="nav-item">
                                    <a class="nav-link" href="/formations">
                                        <i class="mdi mdi-school mr-2"></i>TOUTES LES FORMATIONS
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/centres">
                                        <i class="mdi mdi-houzz mr-2"></i>NOS CENTRES
                                    </a>
                                </li>



                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="" style="margin-top: 105px;">

                    @yield('content')


                </div>
                <!-- End Page-content -->

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        @include('footer-front')

    </body>

