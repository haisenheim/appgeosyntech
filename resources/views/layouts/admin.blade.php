@include('includes.header')

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
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
                                            <input type="text" class="form-control" placeholder="Recharcher ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src=" {{ asset(auth()->user()->imageUrl?auth()->user()->imageUrl:'img/avatar.png')  }}" alt="">

                                <span class="d-none d-sm-inline-block ml-1">{{ auth()->user()->first_name . "  ". auth()->user()->last_name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Mon Profil</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Contacter l'administrateur</a>
                                <a class="dropdown-item" href="/locked"><i class="mdi mdi-lock font-size-16 align-middle mr-1"></i>Verrouiller l'ecran</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Se deconnecter</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="/admin/dashboard" class="waves-effect">
                                    <i class="mdi mdi-home"></i>
                                    <span>ACCUEIL</span>
                                </a>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-file-account-outline"></i>
                                    <span>RESSOURCES HUM.</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/agents">AGENTS</a></li>
                                    <li><a href="/admin/fiches">FICHES DE POINTAGE</a></li>
                                    <li><a href="/admin/salaires">SALAIRES</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-account-switch"></i>
                                    <span>REL. CLIENT</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/clients">CLIENTS</a></li>
                                    <li><a href="/admin/factures">FACTURES</a></li>
                                    <li><a href="/admin/commandes">COMMANDES</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-animation"></i>
                                    <span>STOCK</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/articles">ARTICLES</a></li>
                                    <li><a href="/admin/approvisionnements">ENTREES</a></li>
                                    <li><a href="/admin/sorties">SORTIES</a></li>

                                </ul>
                            </li>



                            <li>
                                <a href="/admin/users" class="waves-effect">
                                    <i class="mdi mdi-account-group"></i>
                                    <span>UTILISATEURS</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-timetable"></i>
                                    <span>OBJECTIFS DE PERFORM.</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/objectifs/clients">CLIENTS</a></li>
                                    <li><a href="/admin/objectifs/delais-clients">DELAIS DE PAIEMENT</a></li>
                                    <li><a href="/admin/objectifs/agents">AGENTS</a></li>
                                    <li><a href="/admin/objectifs/partenaires">PARTENAIRES</a></li>
                                    <li><a href="/admin/objectifs/result">PERFOR. FINANCIERE></a></li>
                                    <li><a href="/admin/objectifs/bilan">SANTE FINANCIERE</a></li>
                                    <li><a href="/admin/objectifs/tresorerie">TRESORERIE</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-cogs"></i>
                                    <span>PARAMETRES</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/admin/secteurs">SECTEURS</a></li>
                                    <li><a href="/admin/competences">COMPETENCES</a></li>
                                    <li><a href="/admin/postes">POSTES</a></li>
                                    <li><a href="/admin/categories">CATEGORIES PROFESS.</a></li>
                                </ul>
                            </li>


                        </ul>


                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->

                        @yield('page-title')

                        <!-- end page title -->

                        <!-- Flash message -->
                        <div class="container">
                            @include('includes.flash-message')
                       </div>

                        @yield('content')
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                @include('includes.footer')


    </body>
</html>
