@extends('......layouts.front')

@section('content')

    <header>
         <div class="overlay"></div>
          <img src="{{ asset('img/slide1.png')  }}" alt=""/>
          <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
              <div class="w-100 text-white">
                <h1 class="display-3">{{ $secteur->name }}</h1>

              </div>
            </div>
          </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container-fluid">
         <div class="row">
            @foreach($secteur->formations as $formation)
                <div class="col-md-3 col-sm-12">

                                <div class="gallery-box text-center card p-2">
                                    <a href="/formation/{{ $formation->token }}" class="text-dark gallery-popup">
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
            @endforeach
         </div>
      </div>
    </section>







    <style>

        .divider span {
            display: inline-block;
            width: 300px;
            border-bottom: 1px solid #28a745;
            margin: 20px 0;
            font-weight: 900;
        }

        section .card{
            padding: 40px 0 25px 0;
        }

        section{
            background-color: #FFFFFF;
        }

        header {
          position: relative;
          background-color: black;
          height: 75vh;
          min-height: 25rem;
          width: 100%;
          overflow: hidden;
        }

        header img {
          position: absolute;
          top: 50%;
          left: 50%;
          min-width: 100%;
          min-height: 100%;
          width: auto;
          height: auto;
          z-index: 0;
          -ms-transform: translateX(-50%) translateY(-50%);
          -moz-transform: translateX(-50%) translateY(-50%);
          -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
        }

        header .container {
          position: relative;
          z-index: 2;
        }

        header .overlay {
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          width: 100%;
          background-color: black;
          opacity: 0.5;
          z-index: 1;
        }



    </style>

@endsection


@section('scripts')

@endsection