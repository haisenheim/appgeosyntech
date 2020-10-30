<footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= date('Y') ?> <span>&copy; GEOSYNTHETICS TECHNOLOGIES</span>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Conçu par <i class="mdi mdi-code-braces text-danger"></i> <i class="mdi mdi-code-string text-primary"></i> <span class="text-danger">Alliages</span>  <span class="text-primary">Technologies</span>
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
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>


        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
                <!-- Buttons examples -->
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script>


            function submit(uri,type,data,action){

            }

            function redirect(url){
                window.location.href=url;
            }
        </script>


        <!-- apexcharts -->
        @yield('apexcharts')
        {{--<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ asset('assets/libs/slick-slider/slick/slick.min.js') }}"></script>--}}

        <!-- Jq vector map -->
        @yield('scripts')


        @yield('dashboard_init')


        <script src="{{ asset('assets/js/app.js') }}"></script>