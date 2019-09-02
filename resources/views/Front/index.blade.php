@extends('layouts.app-front')

@section('content')
      <!-- Masthead -->

      <header style="background-color: #FFFFFF; min-height: 400px;" class="masthead text-white text-center">
        <h5>ICI LA CARTE</h5>
        <div class="">
          <div class="" style="background-color: #FFFFFF">
            <div style="min-height: 100%;" id="map" class="">

            </div>
          </div>
        </div>
      </header>

      <!-- Icons Grid -->
      <section class="features-icons bg-light text-center">
        <div class="container">
          <div class="row">
            @foreach($projets as $projet)
                <div class="col-md-3 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><?= $projet->name ?></h5>
                    </div>
                    <div class="panel-body">
                         <img class="img-thumbnail" src="{{$projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo-obac.png')}}" alt=""/>
                        <p>CONTEXTE : <?= $projet->teaser?$projet->teaser->contexte:'Non defini' ?></p>
                    </div>
                </div>

                </div>
            @endforeach
          </div>
        </div>
      </section>



      <!-- Testimonials -->
      <section class="testimonials text-center bg-light">
        <div class="container">
          <h2 class="mb-5">CE QUE LES GENS PENSENT DE VOTRE SITE</h2>

        </div>
      </section>

      <!-- Call to Action -->
      <section class="call-to-action text-white text-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-xl-9 mx-auto">
              <h2 class="mb-4">Ready to get started? Sign up now!</h2>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
              <form>
                <div class="form-row">
                  <div class="col-12 col-md-9 mb-2 mb-md-0">
                    <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                  </div>
                  <div class="col-12 col-md-3">
                    <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="footer bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
              <ul class="list-inline mb-2">
                <li class="list-inline-item">
                  <a href="#">About</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                  <a href="#">Contact</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                  <a href="#">Terms of Use</a>
                </li>
                <li class="list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                  <a href="#">Privacy Policy</a>
                </li>
              </ul>
              <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
              <ul class="list-inline mb-0">
                <li class="list-inline-item mr-3">
                  <a href="#">
                    <i class="fab fa-facebook fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item mr-3">
                  <a href="#">
                    <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fab fa-instagram fa-2x fa-fw"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->



@endsection


