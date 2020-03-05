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

            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-header text-center">LISTE DES MODULES</h4>

                             <div class="row">
                                 <div class="col-sm-3">
                                     <div class="nav flex-column nav-pills text-center" role="tablist" aria-orientation="vertical">
                                         <a class="nav-link active mb-2" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                             <i class="dripicons-home font-size-18 d-block my-1"></i> Home
                                         </a>
                                         <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                             <i class="dripicons-user font-size-18 d-block my-1"></i> Profile
                                         </a>
                                         <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                             <i class="dripicons-mail font-size-18 d-block my-1"></i> Messages
                                         </a>
                                     </div>
                                 </div>
                                 <div class="col-sm-9">
                                     <div class="tab-content mt-4 mt-sm-0">
                                         <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                             <p>
                                                 Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free.
                                             </p>
                                             <p class="mb-0">
                                                 If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing.
                                             </p>
                                         </div>
                                         <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                             <p>
                                                 Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.
                                             </p>
                                             <p class="mb-0">
                                                 To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Qui photo booth letterpress.
                                             </p>
                                         </div>
                                         <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                             <p>
                                                 Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache.
                                             </p>
                                             <p class="mb-0">
                                                 Everyone realizes why a new common language would be desirable. one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation.
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>


                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">{{ $formation->name }}</h4>
                    </div>
                    <div class="card-body">

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



    </style>

@endsection


@section('scripts')

<script>
    $('.nav-link .active').css({'background-color':'#28a745'});
</script>

@endsection