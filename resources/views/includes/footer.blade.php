
     <footer style="min-height: 8%; position: fixed; bottom: 0; width: 100%; padding: .2rem" class="main-footer">
        <div style="display: flex; justify-content: space-between" class="" id="footer" >
            <div style="width: 30%;">
                <img style="float: left;" src="{{ asset('img/logo.png') }}" height="50" alt=""/>
                <div class="p-2">
                    <strong>Copyright &copy; <?= date('Y') ?> <a href="#" style="" class="text-danger">GEOSYNTECH </a>.</strong> <br/> <small>Tous droits reservés</small>
                </div>


            </div>
            <div style="width: 50%; margin: -3px 0;">
                <div class="container-fluid">
                    <div id="carousel-example" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner row w-100 mx-auto" role="listbox">

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3 active">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/background/img1.jpg')}}" class="img-fluid mx-auto d-block" alt="img1">
                                </div>
                            </div>

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/background/img2.jpg')}}" class="img-fluid mx-auto d-block" alt="img2">
                                </div>
                            </div>

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/background/img3.jpg')}}" class="img-fluid mx-auto d-block" alt="img2">
                                </div>
                            </div>

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/background/img4.jpg')}}" class="img-fluid mx-auto d-block" alt="img2">
                                </div>
                            </div>

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/background/img5.jpg')}}" class="img-fluid mx-auto d-block" alt="img2">
                                </div>
                            </div>

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/background/img6.jpg')}}" class="img-fluid mx-auto d-block" alt="img2">
                                </div>
                            </div>

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/background/img7.jpg')}}" class="img-fluid mx-auto d-block" alt="img2">
                                </div>
                            </div>

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/background/img8.jpg')}}" class="img-fluid mx-auto d-block" alt="img2">
                                </div>
                            </div>

                            <div class="carousel-item col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="carousel-item-inner">
                                    <img style="height: 60px; border-radius: 10px" src="{{asset('img/logo.png')}}" class="img-fluid mx-auto d-block" alt="img2">
                                </div>
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Precedent</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>
                </div>
            </div>
            <div>
                 <div style="float: right; margin-right: 100px;"><span style="font-weight: 200; font-style: italic; color: orangered">By</span> <span><img height="50" src="{{ asset('img/logo-alliages.png') }}" alt=""/></span></div>
            </div>
        </div>


        <script src="{{asset('js/jQuery.print.min.js')}}"></script>
        <script src="{{asset('dist/js/adminlte.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('html').css({'height':'100%'});
                $('body').css({'height':'100%'});
                var main_height = $('#full-wrapper').height();
                console.log(main_height);
                $('#bg-image').height(main_height);
            });
        </script>
      </footer>

<?php use Illuminate\Support\Facades\Auth; ?>




<?php if(Auth::user()): ?>
<div class="modal fade" id="user-profil-form" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<div class="modal-header">
    			<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>VOTRE PROFIL UTLISATEUR</span></h5>
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
    		</div>
    		<div class="modal-body">
    		    <form enctype="multipart/form-data" method="post" action="/profil">
    		    <input type="hidden" value="<?= Auth::user()->token ?>" name="token"/>
    		    <div class="">
    		        <div class="">
    		             @csrf

    		             <div style="text-align: center; padding: 15px auto">
    		                <img style="width: 125px; height:125px; margin: 5px auto; border-radius: 50%" src="<?= Auth::user()->imageUri?asset('img/'.Auth::user()->imageUri):asset('img/avatar.png') ?>" alt=""/>

                            </div>
                        </div>

                         <div class="row">

                    <div class="col-md-6 col-sm-12 form-group">

                        <label for="name" class="control-label">NOM</label>
                        <input type="text" name="last_name" id="name" value="<?= Auth::user()->last_name ?>" class="form-control"/>
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                       <label for="name" class="control-label">PRENOM</label>
                       <input type="text" name="first_name" value="<?= Auth::user()->first_name ?>" id="name" class="form-control"/>
                     </div>

                    </div>
                    <div class="row">
                     <div class="form-group col-sm-12 col-md-8">
                         <label for="name" class="control-label">ADRESSE</label>
                         <input type="text" name="address" id="name" value="<?= Auth::user()->address ?>" class="form-control"/>
                     </div>
                     <div class="form-group col-sm-12 col-md-4">
                       <label for="name" class="control-label">TELEPHONE</label>
                       <input type="text" name="phone" id="name" value="<?= Auth::user()->phone ?>" class="form-control"/>
                     </div>

                     </div>
                     <div class="row">
                     <div class="col-md-12 col-sm-12 form-group">
                         <label for="name" class="control-label">EMAIL</label>
                         <input type="text" name="email" value="<?= Auth::user()->email ?>" id="name" class="form-control"/>
                     </div>
                     <div class="col-md-12">
                     <label for="password">MOT DE PASSE</label>
                     <input type="password" id="password" name="password" class="form-control"/>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <label for="cpassword">CONFIRMATION</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword"/>
                     </div>

                    <div class="col-sm-12 col-md-12">

                        <label for="imageUri">CHANGER VOTRE PHOTO DE PROFIL</label>
                        <input type="file" class="form-control" name="imageUri"/>
                     </div>
                    </div>
    		        </div>
    		        <div class="card-footer">
    		           <button class="btn btn-success btn-block btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
    		        </div>

    		    </form>
    		</div>
    	</div>
    </div>
</div>
<?php endif; ?>

