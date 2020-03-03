<footer class="_1Pb5I" role="navigation">

    <?php

        use App\Models\Secteur;
        $sects = Secteur::all();

    ?>

    <div class="_1s697">
        <div class="_3J3Xl">
            <nav class="_2ruF4">
                <hr class="_17XDy VBCSb">
                <ul class="_1isW-">
                    <li class="_1a8GI">
                        <ul class="_10fbW">
                            <li class="iovEC">SECTEURS</li>

                            @foreach($sects as $sect)
                            <li class="mkT_W"><a class="bmiV0 _3t5SY" href="/secteur/formations/{{ $sect->token }}">{{$sect->name}}</a></li>
                            @endforeach


                        </ul>
                    </li>
                    <li class="_1a8GI">
                        <ul class="_10fbW">
                            <li class="iovEC">Autres liens</li>
                            <li class="mkT_W"><a class="bmiV0 _3t5SY" href="https://obac-alert.com">OBAC ALERT</a></li>
                            <li class="mkT_W"><a class="bmiV0 _3t5SY" href="https://cabinet-obac.com">CABINET OBAC</a></li>

                        </ul>
                    </li>
                    <li class="_1a8GI">
                        <ul class="_10fbW">
                            <li class="iovEC">Our Community</li>
                            <li class="mkT_W"><a class="bmiV0 _3t5SY" href="http://community.envato.com">Community</a></li>
                            <li class="mkT_W"><a class="bmiV0 _3t5SY" href="https://envato.com/blog">Blog</a></li>
                            <li class="mkT_W"><a class="bmiV0 _3t5SY" href="https://forums.envato.com">Forums</a></li>
                            <li class="mkT_W"><a class="bmiV0 _3t5SY" href="http://community.envato.com/#/events">Meetups</a></li>
                        </ul>
                    </li>
                    </ul>
            </nav>
            <div class="_1E0b_">
               <img class="_39Wh1" alt="OBAC" src="{{ asset('img/logo-obac.png') }}">
               <ul class="_2Hrzv">
                    <li class="gNZTp"><span class="_3zD21">58,078,216 </span> Consultants</li>
                    <li class="gNZTp"><span class="_3zD21">$801,919,660 </span>Projets suivis </li>
               </ul>
            </div>
        </div>
        <hr class="VBCSb">
        <div class="_3J3Xl">
           <div class="URBwv">
              <ul class="_1Euek">
                 <li class="Ro6CP"><a class="bmiV0 _229R0" href="https://envato.com">About Envato</a></li>
                 <li class="Ro6CP"><a class="bmiV0 _229R0" href="http://careers.envato.com">Careers</a></li>
                 <li class="Ro6CP"><a class="bmiV0 _229R0" href="https://envato.com/privacy/">Privacy Policy</a></li>
                 <li class="Ro6CP"><a class="bmiV0 _229R0" href="https://envato.com/sitemap/">Sitemap</a></li>
              </ul>
              <hr class="_1eqUd VBCSb">
              <span class="n1aMi">OPPORTUNITES DE BUSINESS EN AFRIQUE CENTRALE</span>
              <small class="n1aMi">© <?= date('Y') ?> OBAC Training Center. Les Formations et cours restent la propriété de leurs producteurs.</small>
           </div>
           <div class="_5akfd">
               <ul itemscope="" >
                    <li class="un_MZ"><a class="_1HTgw" rel="nofollow" href="https://www.linkedin.com/in/cabinet-obac-209837186/" aria-label="LinkedIn"><i class="ti-linkedin"></i></a></li>
                    <li class="un_MZ"><a class="_1HTgw" rel="nofollow" href="https://www.facebook.com/Obac-296785357435548/" aria-label="Facebook"><i class="ti-facebook"></i></a></li>
                </ul>
           </div>
        </div>
    </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        @yield('scripts')

        <script src="{{ asset('assets/js/app.js') }}"></script>



</footer>

