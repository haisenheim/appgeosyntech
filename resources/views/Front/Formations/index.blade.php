@extends('......layouts.front')

@section('content')
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <input type="hidden" id="form-token"/>

    <div id="page-head">
         <div class="overlay"></div>
          <img src="{{ asset('img/slide1.jpg')  }}" alt=""/>
          <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
              <div class="w-100 text-white">
                <h1 style="color: #FFFFFF; font-weight: 800;" class="display-3">CATALOGUE DES FORMATIONS</h1>

              </div>
            </div>
          </div>
    </div>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container-fluid">
         <div class="row">
            @foreach($formations as $formation)
                <div class="col-md-3 col-sm-12">

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
            @endforeach
         </div>
          <div class="">

                {{ $formations->links() }}

          </div>
      </div>
    </section>


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
                <div class="modal-footer">
                    @if(auth()->user())
                        <a id="subs-link" href="#"  class="btn btn-block btn-success">SOUSCRIRE <i class="mdi mdi-draw"></i></a>
                    @else
                        <a class="btn btn-block btn-danger" href="/login">SE CONNECTER POUR CONTINUER <i class="mdi mdi-login"></i></a>
                    @endif
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




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

        #page-head {
          position: relative;
          background-color: black;
          height: 15rem;
          width: 100%;
          overflow: hidden;
        }

        #page-head img {
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

        #page-head .container {
          position: relative;
          z-index: 2;
        }

        #page-head .overlay {
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
    <!-- Magnific Popup-->
            <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
            <script src="{{ asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

            <!-- Tour init js-->
            <script src=" {{ asset('assets/js/pages/lightbox.init.js') }}"></script>
            <!-- Sweet alert init js-->
            <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

    <script>
        $('#subs-link').click(function(e){
            e.preventDefault();
            //console.log();
            //$("#sa-success").click(function(){
            $('#content-show').modal('hide');
            $.ajax({
               url:'/member/formation/subscribe',
               type:'get',
               dataType:'json',
               data:{token:$('#form-token').val()},
               success:function(data){
                  Swal.fire({title:"SUCCES!",text:"Souscription faite avec succès!",icon:"success",showCancelButton:0,confirmButtonColor:"#11c46e",cancelButtonColor:"#f46a6a"})
               }
            });
           // })


        });

        $('.formation-show').click(function(e){

            var token = $(this).data('token');
            var content = $('#content-body');
            $.ajax({
                url: '/formation/'+token,
                type:'get',
                dataType:'json',
                success:function(data){

                                $('#modal-title').html(data.formation.name);
                                $('#form-img').prop('src',"http://otc.test/img/"+data.formation.imageUri);
                                $('#formation-image').css({'background-size':'cover' ,'min-height':'240px'});
                                $('#form-desc').html(data.formation.description);
                                $('#form-token').val(token);
                                var owner='-';
                                if(data.formation.contributeur!=null){
                                    owner = data.formation.contributeur.last_name + "  "+data.formation.contributeur.first_name;
                                }
                                var cl =0;
                                var cp=0;
                                var duree =0;
                                for(var i=0;i< data.formation.modules.length; i++){
                                    cl = cl + parseInt(data.formation.modules[i].prix_ligne);
                                     cp = cp + parseInt(data.formation.modules[i].prix_presentiel);
                                     duree = duree + parseInt(data.formation.modules[i].duree);
                                }

                              var  html = '<ul class="list-group">' +
                                 '<li class="list-group-item">Cout en ligne: <span class="badge badge-success">'+ cl  +'</span> </li>' +
                                 '<li class="list-group-item">Cout en présentiel: <span class="badge badge-info">'+ cp  +'</span> </li>' +
                                 '<li class="list-group-item">Auteur : <span class="badge badge-primary">'+ owner +'</span> </li>'+
                                 '<li class="list-group-item">Nombre de modules: <span class="badge badge-danger">'+ data.formation.modules.length  +'</span> </li>'+
                                  '<li class="list-group-item">Durée globale : <span class="badge badge-warning">'+ duree +' jours</span> </li>'+
                                  '</ul>';
                                  //console.log(html);

                                $('#form-details').html(html);
                               // $('#mon-spinner').hide();

                               // $("#sa-success").click(function(){Swal.fire({title:"Good job!",text:"You clicked the button!",icon:"success",showCancelButton:!0,confirmButtonColor:"#3d8ef8",cancelButtonColor:"#f46a6a"})})

                    //setTimeout(maFonction, 1000);

                }


            });
        });
    </script>
@endsection