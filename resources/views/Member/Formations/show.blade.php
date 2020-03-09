@extends('......layouts.front')

@section('content')

    <div id="page-head">
         <div class="overlay"></div>
          <img src="{{ asset('img/slide1.jpg')  }}" alt=""/>
          <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
              <div class="w-100 text-white">
                <h1 style="color: #FFFFFF; font-weight: 800;" class="display-3">{{ $formation->name }}</h1>

              </div>
            </div>
          </div>
    </div>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container-fluid">
         <div class="row">

            <div class="col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-header text-center">LISTE DES MODULES</h4>

                             <div class="row">
                                 <div class="col-sm-3">
                                     <div class="nav flex-column nav-pills text-center" role="tablist" aria-orientation="vertical">
                                        <?php $i=0; ?>
                                        @foreach($formation->modules as $module)
                                            <a class="nav-link <?= $i==0?'active':'' ?> mb-2"  id="v-pills-<?= $module->token ?>-tab" data-toggle="pill" href="#v-pills-<?= $module->token ?>" role="tab" aria-controls="v-pills-<?= $module->token ?>" aria-selected="true">
                                                 <i class="dripicons-home font-size-18 d-block my-1"></i> <?= $module->name ?>
                                             </a>
                                             <?php $i++ ?>
                                        @endforeach
                                     </div>
                                 </div>
                                 <div class="col-sm-9">
                                     <div class="tab-content mt-4 mt-sm-0">
                                        <?php $i=0; ?>
                                        @foreach($formation->modules as $module)
                                            <a class="nav-link <?= $i==0?'active':'' ?> mb-2" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-<?= $module->token ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                 <i class="dripicons-home font-size-18 d-block my-1"></i> <?= $module->name ?>
                                             </a>

                                             <div class="tab-pane fade <?= $i==0?'show active':'' ?>" id="v-pills-<?= $module->token ?>" role="tabpanel" aria-labelledby="v-pills-<?= $module->token ?>-tab">
                                                 <p>
                                                      <?= $module->description ?>
                                                 </p>

                                             </div>
                                             <?php $i++ ?>
                                        @endforeach

                                     </div>
                                 </div>
                             </div>


                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">{{ $formation->name }}</h4>
                    </div>
                    <div class="card-body">
                        <img style="height: 220px; max-width: 220px;" src="{{ $formation->imageUri?asset('img/'.$formation->imageUri):'img/logo-obac.png' }}" alt=""/>
                        <p>
                            <?= $formation->description ?>
                        </p>
                    </div>
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

        .nav-pills .nav-link.active{
            background-color: #28a745;
        }



    </style>

@endsection


@section('scripts')

<script>
   /* $('.nav-link').click(function(){
        $('.nav-link.active').css({'background-color':'#28a745'});
    });*/

</script>

@endsection