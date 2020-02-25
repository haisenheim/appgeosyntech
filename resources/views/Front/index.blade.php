<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>OTC | OBAC TRAINING CENTER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- slick css -->
        <link href="{{ asset('assets/libs/slick-slider/slick/slick.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/slick-slider/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="{{ asset('assets/libs/jqvmap/jqvmap.min.css')}} " rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm-dark.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="19">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm-light.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
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
                            <a href="/login"  class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <span class="d-none d-sm-inline-block ml-1">SE CONNECTER</span>
                                <i class="mdi mdi-login"></i>
                            </a>
                        </div>


                    </div>
                </div>
            </header>

            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">
                                        <i class="mdi mdi-home mr-2"></i>ACCUEIL
                                    </a>
                                </li>

                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-format-underline mr-2"></i>UI Elements <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu mega-dropdown-menu" aria-labelledby="topnav-uielement">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-alerts.html" class="dropdown-item">Alerts</a>
                                                    <a href="ui-badge.html" class="dropdown-item">Badge</a>
                                                    <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                                    <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                                    <a href="ui-dropdowns.html" class="dropdown-item">Dropdowns</a>
                                                    <a href="ui-navs.html" class="dropdown-item">Navs</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-tabs-accordions.html" class="dropdown-item">Tabs &amp; Accordions</a>
                                                    <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                                    <a href="ui-images.html" class="dropdown-item">Images</a>
                                                    <a href="ui-progressbars.html" class="dropdown-item">Progress Bars</a>
                                                    <a href="ui-pagination.html" class="dropdown-item">Pagination</a>
                                                    <a href="ui-popover-tooltips.html" class="dropdown-item">Popover & Tooltips</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-spinner.html" class="dropdown-item">Spinner</a>
                                                    <a href="ui-carousel.html" class="dropdown-item">Carousel</a>
                                                    <a href="ui-video.html" class="dropdown-item">Video</a>
                                                    <a href="ui-typography.html" class="dropdown-item">Typography</a>
                                                    <a href="ui-grid.html" class="dropdown-item">Grid</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-cloud-print-outline mr-2"></i>Components <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-components">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Email <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                <a href="email-inbox.html" class="dropdown-item">Inbox</a>
                                                <a href="email-read.html" class="dropdown-item">Email Read</a>
                                                <a href="email-compose.html" class="dropdown-item">Email Compose</a>
                                            </div>
                                        </div>
                                        <a href="calendar.html" class="dropdown-item">Calendar</a>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-icon"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Icons <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-icon">
                                                <a href="icons-materialdesign.html" class="dropdown-item">Material Design</a>
                                                <a href="icons-dripicons.html" class="dropdown-item">Dripicons</a>
                                                <a href="icons-fontawesome.html" class="dropdown-item">Font awesome 5</a>
                                                <a href="icons-themify.html" class="dropdown-item">Themify</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tables <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                <a href="tables-basic.html" class="dropdown-item">Basic Tables</a>
                                                <a href="tables-datatable.html" class="dropdown-item">Data Tables</a>
                                                <a href="tables-responsive.html" class="dropdown-item">Responsive Table</a>
                                                <a href="tables-editable.html" class="dropdown-item">Editable Table</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Forms <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-form">
                                                <a href="form-elements.html" class="dropdown-item">Form Elements</a>
                                                <a href="form-validation.html" class="dropdown-item">Form Validation</a>
                                                <a href="form-advanced.html" class="dropdown-item">Form Advanced</a>
                                                <a href="form-editors.html" class="dropdown-item">Form Editors</a>
                                                <a href="form-uploads.html" class="dropdown-item">Form File Upload</a>
                                                <a href="form-mask.html" class="dropdown-item">Form Mask</a>
                                                <a href="form-summernote.html" class="dropdown-item">Summernote</a>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Charts <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                <a href="charts-morris.html" class="dropdown-item">Morris</a>
                                                <a href="charts-apex.html" class="dropdown-item">Apex</a>
                                                <a href="charts-chartist.html" class="dropdown-item">Chartist</a>
                                                <a href="charts-chartjs.html" class="dropdown-item">Chartjs</a>
                                                <a href="charts-flot.html" class="dropdown-item">Flot</a>
                                                <a href="charts-sparkline.html" class="dropdown-item">Sparkline</a>
                                                <a href="charts-knob.html" class="dropdown-item">Jquery Knob</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-advancedui" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-package-variant-closed mr-2"></i>Advanced UI <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-advancedui">
                                        <a href="advanced-alertify.html" class="dropdown-item">Alertify</a>
                                        <a href="advanced-rating.html" class="dropdown-item">Rating</a>
                                        <a href="advanced-nestable.html" class="dropdown-item">Nestable</a>
                                        <a href="advanced-rangeslider.html" class="dropdown-item">Range Slider</a>
                                        <a href="advanced-sweet-alert.html" class="dropdown-item">Sweet-Alert</a>
                                        <a href="advanced-lightbox.html" class="dropdown-item">Lightbox</a>
                                        <a href="advanced-maps.html" class="dropdown-item">Maps</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-file-document-box-multiple-outline mr-2"></i>Extra pages <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-more">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Authentication <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                <a href="auth-login.html" class="dropdown-item">Login</a>
                                                <a href="auth-register.html" class="dropdown-item">Register</a>
                                                <a href="auth-recoverpw.html" class="dropdown-item">Recover Password</a>
                                                <a href="auth-lock-screen.html" class="dropdown-item">Lock Screen</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Utility <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                                <a href="pages-starter.html" class="dropdown-item">Starter Page</a>
                                                <a href="pages-maintenance.html" class="dropdown-item">Maintenance</a>
                                                <a href="pages-comingsoon.html" class="dropdown-item">Coming Soon</a>
                                                <a href="pages-timeline.html" class="dropdown-item">Timeline</a>
                                                <a href="pages-gallery.html" class="dropdown-item">Gallery</a>
                                                <a href="pages-faqs.html" class="dropdown-item">FAQs</a>
                                                <a href="pages-pricing.html" class="dropdown-item">Pricing</a>
                                                <a href="pages-404.html" class="dropdown-item">Error 404</a>
                                                <a href="pages-500.html" class="dropdown-item">Error 500</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-flip-horizontal mr-2"></i>Layouts <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                        <a href="layouts-topbar-light.html" class="dropdown-item">Topbar light</a>
                                        <a href="layouts-boxed-width.html" class="dropdown-item">Boxed width</a>
                                        <a href="layouts-colored-header.html" class="dropdown-item">Colored Header</a>
                                    </div>
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

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apaxy</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Number of Sales</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-box"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center">1,753</h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success">1.23 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Sales Revenue</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-briefcase"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center">$45,253</h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success">2.73 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Average Price</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-tags"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center">$12.74</h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-danger">4.35 % <i class="mdi mdi-trending-down mr-1"></i></span> From previous period</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="font-size-14">Product Sold</h5>
                                            </div>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="dripicons-cart"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="m-0 align-self-center">20,781</h4>
                                        <p class="mb-0 mt-3 text-muted"><span class="text-success">7.21 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Sales Analytics</h4>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-4">
                                                <div class="text-center">
                                                    <p>This Month</p>
                                                    <h4>$ 46,543</h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="text-center">
                                                    <p>This Week</p>
                                                    <h4>$ 7,842</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Marketplaces Earning</h4>

                                        <div dir="ltr">

                                            <div class="slick-slider slider-for hori-timeline-desc pt-0">
                                                <div>
                                                    <p class="font-size-16">Daily Earning</p>
                                                    <h4 class="mb-4">$ 1,452</h4>
                                                    <div id="earning-day-chart" class="apex-charts"></div>
                                                </div>
                                                <div>
                                                    <p class="font-size-16">Weekly Earning</p>
                                                    <h4 class="mb-4">$ 6,536</h4>
                                                    <div id="earning-weekly-chart" class="apex-charts"></div>
                                                </div>
                                                <div>
                                                    <p class="font-size-16">Monthly Earning</p>
                                                    <h4 class="mb-4">$ 24,562</h4>
                                                    <div id="earning-monthly-chart" class="apex-charts"></div>
                                                </div>
                                                <div>
                                                    <p class="font-size-16">Yearly Earning</p>
                                                    <h4 class="mb-4">$ 2,82,562</h4>
                                                    <div id="earning-yearly-chart" class="apex-charts"></div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center mb-3">
                                                <div class="col-lg-11">
                                                    <div class="slick-slider slider-nav hori-timeline-nav">
                                                        <div class="slider-nav-item">
                                                            <h5 class="nav-title font-size-14 mb-0">Day</h5>
                                                        </div>
                                                        <div class="slider-nav-item">
                                                            <h5 class="nav-title font-size-14 mb-0">Week</h5>
                                                        </div>
                                                        <div class="slider-nav-item">
                                                            <h5 class="nav-title font-size-14 mb-0">Month</h5>
                                                        </div>
                                                        <div class="slider-nav-item">
                                                            <h5 class="nav-title font-size-14 mb-0">Year</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Social Source</h4>
                                        <div id="social-source-chart" class="apex-charts" dir="ltr"></div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="text-center mt-2">
                                                    <i class="mdi mdi-facebook h2 text-primary"></i>

                                                    <p class="mt-3 mb-2">Facebook</p>
                                                    <h5>1245</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="text-center mt-2">
                                                    <i class="mdi mdi-twitter h2 text-info"></i>

                                                    <p class="mt-3 mb-2">Twitter</p>
                                                    <h5>852</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Clients Review</h4>

                                        <ul class="verti-timeline list-unstyled mb-0" data-simplebar style="max-height: 393px;">
                                            <li class="event-list">
                                                <div class="media">
                                                    <div class="avatar-xs mr-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            D
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="font-size-14 mb-1">Danny Campbell</h5>
                                                        <p class="text-muted mb-0 font-size-13">To an English person, it will seem like simplified.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="media">
                                                    <div class="avatar-xs mr-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            R
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="font-size-14 mb-1">Ralph Merkel</h5>
                                                        <p class="text-muted mb-0 font-size-13">At solmen va esser necessi far sommun paroles.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="media">
                                                    <div class="avatar-xs mr-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            M
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="font-size-14 mb-1">Marcus Smith</h5>
                                                        <p class="text-muted mb-0 font-size-13">Everyone realizes why a new common language.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="media">
                                                    <div class="avatar-xs mr-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            J
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="font-size-14 mb-1">James Denson</h5>
                                                        <p class="text-muted mb-0 font-size-13">For science, music, sport, etc, europe vocabulary.</p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="event-list">
                                                <div class="media">
                                                    <div class="avatar-xs mr-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            D
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="font-size-14 mb-1">Danny Campbell</h5>
                                                        <p class="text-muted mb-0 font-size-13">To an English person, it will seem like simplified.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="media">
                                                    <div class="avatar-xs mr-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            R
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="font-size-14 mb-1">Ralph Merkel</h5>
                                                        <p class="text-muted mb-0 font-size-13">At solmen va esser necessi far sommun paroles.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="media">
                                                    <div class="avatar-xs mr-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            M
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="font-size-14 mb-1">Marcus Smith</h5>
                                                        <p class="text-muted mb-0 font-size-13">Everyone realizes why a new common language.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="media">
                                                    <div class="avatar-xs mr-3">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            J
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="font-size-14 mb-1">James Denson</h5>
                                                        <p class="text-muted mb-0 font-size-13">For science, music, sport, etc, europe vocabulary.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Revenue by Location</h4>
                                        <div id="usa" style="height: 200px"></div>

                                        <div class="mt-5">
                                            <div class="position-relative">
                                                <div class="progress-label text-primary border-primary mb-2">California</div>
                                                <div class="progress progress-sm progress-animate mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-value">
                                                            <h5 class="mb-1 text-dark font-size-14">86%</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="position-relative">
                                                <div class="progress-label text-primary border-primary mb-2">Montana</div>
                                                <div class="progress progress-sm progress-animate mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-value">
                                                            <h5 class="mb-1 text-dark font-size-14">72%</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="#" class="btn btn-primary btn-sm">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Latest Transaction</h4>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"  style="width: 50px;">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheckall">
                                                                <label class="custom-control-label" for="customCheckall"></label>
                                                            </div>
                                                        </th>
                                                        <th scope="col"  style="width: 60px;"></th>
                                                        <th scope="col">ID & Name</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                <label class="custom-control-label" for="customCheck1"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="assets/images/users/avatar-2.jpg" alt="user" class="avatar-xs rounded-circle" />
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1234</p>
                                                            <h5 class="font-size-15 mb-0">David Wiley</h5>
                                                        </td>
                                                        <td>02 Nov, 2019</td>
                                                        <td>$ 1,234</td>
                                                        <td>1</td>

                                                        <td>
                                                            $ 1,234
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-success mr-1"></i> Confirm
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                <label class="custom-control-label" for="customCheck2"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    W
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1235</p>
                                                            <h5 class="font-size-15 mb-0">Walter Jones</h5>
                                                        </td>
                                                        <td>04 Nov, 2019</td>
                                                        <td>$ 822</td>
                                                        <td>2</td>

                                                        <td>
                                                            $ 1,644
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-success mr-1"></i> Confirm
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                <label class="custom-control-label" for="customCheck3"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="assets/images/users/avatar-3.jpg" alt="user" class="avatar-xs rounded-circle" />
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1236</p>
                                                            <h5 class="font-size-15 mb-0">Eric Ryder</h5>
                                                        </td>
                                                        <td>05 Nov, 2019</td>
                                                        <td>$ 1,153</td>
                                                        <td>1</td>

                                                        <td>
                                                            $ 1,153
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-danger mr-1"></i> Cancel
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                                <label class="custom-control-label" for="customCheck4"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="assets/images/users/avatar-6.jpg" alt="user" class="avatar-xs rounded-circle" />
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1237</p>
                                                            <h5 class="font-size-15 mb-0">Kenneth Jackson</h5>
                                                        </td>
                                                        <td>06 Nov, 2019</td>
                                                        <td>$ 1,365</td>
                                                        <td>1</td>

                                                        <td>
                                                            $ 1,365
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-success mr-1"></i> Confirm
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                                <label class="custom-control-label" for="customCheck5"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                    R
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="mb-1 font-size-12">#AP1238</p>
                                                            <h5 class="font-size-15 mb-0">Ronnie Spiller</h5>
                                                        </td>
                                                        <td>08 Nov, 2019</td>
                                                        <td>$ 740</td>
                                                        <td>2</td>

                                                        <td>
                                                            $ 1,480
                                                        </td>
                                                        <td>
                                                            <i class="mdi mdi-checkbox-blank-circle text-warning mr-1"></i> Pending
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2019 © Apaxy.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->




        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>



        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
