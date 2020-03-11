@extends('layouts.front')

@section('content')

    <div id="page-head">
         <div class="overlay"></div>
          <img src="{{ asset('img/slide1.jpg')  }}" alt=""/>
          <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
              <div class="w-100 text-white">
                <h1 style="color: #FFFFFF; font-weight: 800;" class="display-3">{{ $module->name }}</h1>

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
                <div class="card-header">
                    <h4 class="card-title">{{ $module->name  }} : TEST DE CONNAISSANCE</h4>
                </div>
                    <div class="card-body">

                        <ul class="list-group">

                            @foreach($module->questions as $question)
                                <li class="list-group-item">
                                    <h5>{{ $question->name }}</h5>
                                    <ul class="list-group">
                                        @foreach($question->choices as $response)
                                            <li class="list-group-item"><input class="radio" type="radio" name="{{$question->id}}"/>{{ $response->name }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @enforeach

                        </ul>


                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="card text-white bg-info">
                    <div class="card-header">
                        <h4 class="card-tite">{{ $module->name }}</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">{{ $module->formation->name }}</h4>
                    </div>
                    <div class="card-body">
                        <img style="height: 240px; width: 99%;" src="{{ $module->formation->imageUri?asset('img/'.$module->formation->imageUri):'img/logo-obac.png' }}" alt=""/>
                        <p style="margin-top: 20px;">
                            <?= $module->formation->description ?>
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
            border-bottom: 1px solid #11c46e;
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
            background-color: #11c46e;
        }



    </style>

@endsection


@section('scripts')

<script>
   /* $('.nav-link').click(function(){
        $('.nav-link.active').css({'background-color':'#11c46e'});
    });*/

</script>

@endsection