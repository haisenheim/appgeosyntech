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
        <p class="lead">OBAC TRAINING CENTER est une plateforme qui gere ........ </p>
      </div>
    </section>
    <hr/>

    <section>
        <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"> DECOUVREZ LA CHAIRE OBAC</h3>
                    <div class="divider text-center"><span></span></div>
            <div class="row">
               <?php foreach($chaire as $formation): ?>
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-box text-center card p-2">
                            <a href="/formation/{{ $formation->token }}" class="text-dark gallery-popup">
                                <div class="position-relative gallery-content">
                                    <div class="demo-img">
                                        <img style="height: 220px" src="{{ $formation->imageUri?asset('img/'.$formation->imageUri):'img/logo-obac.png' }}" alt="" class="img-fluid mx-auto d-block rounded">
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
            <div class="card-footer">
                <div class="text-center">
                    <a class="btn btn-success" href="/chaire">Afficher toutes les formations de la chaire OBAC <i class="fas fa-book-reader"></i></a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <hr/>

    <section>
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center"> DECOUVREZ NOS FORMATIONS</h3>
                    <div class="divider text-center"><span></span></div>
                    <div class="row">
                       <?php foreach($formations as $formation): ?>
                            <div class="col-lg-3 col-md-4">
                                <div class="gallery-box text-center card p-2">
                                    <a href="#" data-toggle="modal" data-target="#content-show" data-token="{{ $formation->token }}" class="formation-show">
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
                <div class="card-footer">
                    <div class="text-center">
                        <a class="btn btn-success" href="/formations">Afficher toutes les formations <i class="ti-blackboard"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr/>
    <section id="centres">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center"> DECOUVREZ LES CENTRES OBAC TRAINING CENTER</h3>
                    <div class="divider text-center"><span></span></div>
                    <p class="card-title-desc">OBAC TRAINING Center c'est un ensemble de centres eparpille a travers plusieurs villes du Congo et du monde ......</p>

                    <div class="popup-gallery">

                        @foreach($centres as $centre)
                            <a class="float-left" href="{{ $centre->imageUri?asset('img/'.$centre->imageUri):'img/logo-obac.png' }}" title="{{ $centre->name }} - <small> {{  $centre->phone }}</small>">
                                <div class="img-fluid">
                                    <img src="{{ $centre->imageUri?asset('img/'.$centre->imageUri):'img/logo-obac.png' }}" alt="" style="min-height: 220px" width="240">
                                </div>
                            </a>
                        @endforeach





                    </div>
                </div>
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

        /*section h3, section h2, section h1{
            margin-bottom: 15px;
        }*/

    </style>
    <!-- Lightbox css -->
    <link href="{{ asset('assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />



    <div id="content-show" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal-title" class="modal-title mt-0"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1></h1>
                    <div class="row">
                        <div id="formation-image" class="col-md-6 col-sm-12">
                            <img id="form-img" src="" style="width: 100%; height: 100%" alt=""/>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div id="form-desc">

                            </div>
                            <div id="form-details">

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection


@section('scripts')
    <!-- Magnific Popup-->
        <script src="{{ asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

        <!-- Tour init js-->
        <script src=" {{ asset('assets/js/pages/lightbox.init.js') }}"></script>

        <script>
            $('.formation-show').click(function(e){

                var token = $(this).data('token');
                var content = $('#content-body');
                $.ajax({
                    url: '/formation/'+token,
                    type:'get',
                    dataType:'json',
                    success:function(data){
                        var html = '';
                        $('#modal-title').html(data.formation.name);
                        $('#form-img').prop('src',"http://otc.test/img/"+data.formation.imageUri);
                        $('#formation-image').css({'background-size':'cover' ,'min-height':'240px'});
                        $('#form-desc').text(data.formation.description);

                        html = '<ul class="list-group">' +
                         '<li class="list-group-item">Cout en ligne: <span class="badge badge-warning">'+ data.formation.montant  +'</span> </li>' +
                          '</ul>'
                    }


                });
            });
        </script>


@endsection