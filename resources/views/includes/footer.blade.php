     <footer class="main-footer">
        <strong>Copyright &copy; <?= date('Y') ?> <a href="#">OBAC ALERT</a>.</strong> <small>Tous droits reserés</small>
        <script src="{{asset('dist/js/adminlte.js')}}"></script>
      </footer>

<?php use Illuminate\Support\Facades\Auth; ?>


<div class="modal fade" id="obac-contact-form" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog modal-xl" role="document">
    	<div class="modal-content">
    		<div class="modal-header bg-success">
    			<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>CONTACTER OBAC</span></h5>
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
    		</div>
    		<div class="modal-body">
    		    <form method="post" action="/contact-obac">
    		    <div class="card">
    		        <div class="card-body">
    		             @csrf
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group">

                                     <input required="required" type="text" name="objet" class="form-control" placeholder="Objet"/>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="form-group">

                                     <textarea required="required" name="message" id="" cols="30" rows="4" class="form-control" placeholder="Votre message ..."></textarea>
                                 </div>
                             </div>

                         </div>
    		        </div>
    		        <div class="card-footer">
    		           <button class="btn btn-warning btn-block btn-sm"><i class="fa fa-envelope"></i> ENVOYER</button>
    		        </div>
    		    </div>
    		    </form>
    		</div>
    	</div>
    </div>
</div>

<?php if(Auth::user()): ?>
<div class="modal fade" id="user-profil-form" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<div class="modal-header bg-info">
    			<h5 style="text-transform: uppercase; background-color: transparent" class="modal-title" id="myModalLabel"><span>VOTRE PROFIL UTLISATEUR</span></h5>
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
    		</div>
    		<div class="modal-body">
    		    <form method="post" action="/profil">
    		    <div class="card">
    		        <div class="card-body">
    		             @csrf

    		             <div style="text-align: center; padding: 15px auto">
                            <div style='background: url("<?= Auth::user()->imageUri?asset('img/'.Auth::user()->imageUri):asset('img/avatar.png') ?>");width: 200px; height: 200px;border-radius: 50%; background-size: cover'>

                            </div>
                        </div>

                         <div class="row">

                    <div class="col-md-12 col-sm-12 form-group">

                        <label for="name" class="control-label">NOM</label>
                        <input type="text" name="last_name" id="name" value="<?= Auth::user()->last_name ?>" class="form-control"/>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                       <label for="name" class="control-label">PRENOM</label>
                       <input type="text" name="first_name" value="<?= Auth::user()->first_name ?>" id="name" class="form-control"/>
                     </div>

                    </div>
                    <div class="row">
                     <div class="form-group col-sm-12 col-md-12">
                         <label for="name" class="control-label">ADRESSE</label>
                         <input type="text" name="address" id="name" value="<?= Auth::user()->address ?>" class="form-control"/>
                     </div>
                     <div class="form-group col-sm-12 col-md-12">
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
    		           <button class="btn btn-info btn-block btn-sm"><i class="fa fa-envelope"></i> ENVOYER</button>
    		        </div>
    		    </div>
    		    </form>
    		</div>
    	</div>
    </div>
</div>
<?php endif; ?>
