@extends('......layouts.front')

@section('content')
    <div class="md-container" style="background: #f8f8f8; margin-bottom: 20px;">
        <div class="content-header" style=" background-image:url({{asset($ville->imageUri?'img/'.$ville->imageUri:'img//villes/ville.png')}}); height: 40vh; padding-top:60px; background-size: cover  ">
            <h2 style="text-transform: capitalize; padding-bottom: 10px; margin-bottom: 20px; border-bottom: 1px solid; font-weight: 800;">{{$ville->name}}</h2>
            <h3 class="page-header">LISTE DES PROJETS</h3>
        </div>


         <div class="section-1-container section-container">
	        <div class="container">
	            <div class="row">

	                <div class="col section-1 section-description wow fadeIn">
	                    <h1>Projets de levée de fonds de la ville de {{$ville->name}}</h1>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>

	                </div>
	            </div>

	            <?php $i=0; $classes = ["fadeInUp","fadeInDown"] ?>

	            <div class="row">
	                @foreach($projets as $projet)
	                <?php $i++ ?>
                	<div class="col-md-4 col-lg-3 section-1-box wow <?= $classes[$i%2] ?>">
                	    <a class="btn-view" href="#" data-name="{{$projet->name}}" data-img="{{asset($projet->imageUri?'img/'. $projet->imageUri:'img/logo-obac.png')}}" data-target="#viewModal" data-toggle="modal">
                	        <div class="row">
                			<div class="col-md-4">
			                	<div >
			                		<img class="section-1-box-icon" src="{{asset($projet->imageUri?'img/'. $projet->imageUri:'img/logo-obac.png')}}" alt=""/>
			                	</div>
		                	</div>
	                		<div class="col-md-8">
	                    		<h3>{{$projet->name}}</h3>
	                    		<p><?= $projet->teaser?$projet->teaser->contexte:'Aucun teaser' ?></p>
	                    	</div>
	                    </div>
                	    </a>
                    </div>

                   @endforeach

	            </div>
	        </div>
        </div>
    </div>

    <div style="z-index: 99999999" class="modal fade" id="viewModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 id="project-name" class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                          <div class="card-body">
                           <img id="project-img" src="" alt=""/>


                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button  class="btn btn-success"><i class="fa fa-w fa-save"></i> Souscrire</button>
                          </div>

                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>
        <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
        <script>
            $('.btn-view').click(function(){
                $('#project-name').text($(this).data('name'));
                $('#project-img').prop('src',$(this).data('img'));
            });
        </script>

@endsection