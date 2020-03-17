<footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <?= date('Y') ?> <span>&copy; SITRAD</span>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Conçu par <i class="mdi mdi-script text-success"></i> Alliages Technologies
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


        <!-- apexcharts -->
        @yield('apexcharts')
        {{--<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ asset('assets/libs/slick-slider/slick/slick.min.js') }}"></script>--}}

        <!-- Jq vector map -->
        @yield('scripts')


        @yield('dashboard_init')


        <script src="{{ asset('assets/js/app.js') }}"></script>