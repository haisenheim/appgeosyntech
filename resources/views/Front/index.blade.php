@extends('......layouts.front')

@section('content')

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('{{ asset('img/slide1.jpg') }}')">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">PREMIERE SLIDE</h3>
              <p class="lead">Description de la premiere slide</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{ asset('img/slide2.jpg') }}')">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">DEUXIEME SLIDE</h3>
              <p class="lead">This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{ asset('img/slide3.jpg') }}')">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">TROISIEME SLIDE</h3>
              <p class="lead">This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container-fluid">
        <h1 class="font-weight-light">BIENVENU SUR OBAC TRAINING CENTER - <small>Votre Plateforme de formation</small></h1>
        <p class="lead">OBAC TRAINING CENTER est une plateforme qui gere ........ <a href="https://unsplash.com">Unsplash</a>!</p>
      </div>
    </section>

    <section>
        <div class="container-fluid">
            <h1> DECOUVREZ NOS FORMATIONS</h1>
            <div class="row">
               <?php foreach($formations as $formation): ?>
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-box text-center card p-2">
                            <a href="/formation/{{ $token }}" class="text-dark gallery-popup">
                                <div class="position-relative gallery-content">
                                    <div class="demo-img">
                                        <img src="{{ $formation->imageUri?asset('img/'.$formation->imageUri):'img/logo-obac.png' }}" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <div class="gallery-overlay">
                                        <div class="gallery-overlay-icon">
                                            <i class="ti-zoom-in text-white"></i>
                                        </div>
                                    </div>
                                    <div  class="overlay-content">
                                        <h4 class="font-size-16 text-truncate mb-2"><?= $formation->name ?> </h4>
                                        <p>
                                            <?= \Illuminate\Support\Str::limit($formation->description,50); ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
               <?php endforeach ?>
            </div>
        </div>
    </section>

@endsection