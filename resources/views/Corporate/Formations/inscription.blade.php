@extends('......layouts.corporate')
<?php $formation = $compteformation->inscription->formation; ?>
@section('page-title')
 <span class="text-success" style="font-size: larger; font-weight: bolder">{{ $compteformation->compte->name }} :</span>   {{ $formation->name }}
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                 <div style="margin-top: 15px" class="card">
                     <div class="card-header bg-info">
                         <h3 class="card-title">{{ $formation->name  }}</h3>
                     </div>
                     <div class="card-body">
                         <div style="width: 100%; height: 220px">
                             <img src="{{ $formation->imageUri?asset('img/'.$formation->imageUri):'img/logo-obac.png' }}" style="height: 100%; width: 100%" alt=""/>
                         </div>
                         <div class="divider"></div>

                         <ul>
                             <li>MODULES : <span class="text-info text-bold">{{ $formation->modules->count() }}</span></li>

                         </ul>
                         <div class="divider"></div>
                         <fieldset>
                             <legend>Description</legend>
                                 <div style="max-height: 200px; overflow-y: scroll">
                                     <p><?= $formation->description ?></p>
                                 </div>
                         </fieldset>
                         <fieldset>
                             <legend>AUTEUR</legend>
                             <ul>
                                 <li><b> {{ $formation->contributeur->name }} </b></li>
                                 <li>{{ $formation->contributeur->address }}</li>

                                 <li><i class="fa fa-envelope"></i> {{ $formation->contributeur->email }}</li>

                             </ul>
                         </fieldset>
                     </div>

                 </div>
            </div>
            <div class="col-md-8 col-sm-12">
               <div style="margin-top: 15px" class="card">
                   <div class="card-header">
                       <h4>LISTES DE MODULES</h4>

                   </div>
                   <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Premier score</th>
                                    <th>Deuxieme score</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach($formation->modules as $module)

                                    <?php
                                        $test1 = $module->tests->where('owner_id',$compteformation->compte_id)->where('premier_id',0)->first();
                                        $test2 = $module->tests->where('owner_id',$compteformation->compte_id)->where('premier_id','>',0)->first();
                                        $score1 = $test1?$test1->score:0;
                                        $score2 = $test2?$test2->score:0;

                                     ?>

                                    <tr>
                                        <td>{{ $module->name }}</td>
                                        <td><?= $test1?($score1 . '%'):'<span class="badge badge-danger">non démarré </span>' ?></td>
                                        <td><?= $test2?($score2 . '%'):'<span class="badge badge-danger">non bouclé </span>' ?></td>

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>


                   </div>
               </div>
            </div>
        </div>
    </div>


        <script type="text/javascript" src="{{ asset('js/loadingOverlay.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
                <!-- SweetAlert2 -->
        <script type="text/javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
                <!-- Toastr -->
        <script type="text/javascript" src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>





    <script>
        $('#btn-save').click(function(e){

                    e.preventDefault();
                     const Toast = Swal.mixin({
                                      toast: true,
                                      position: 'top-end',
                                      showConfirmButton: false,
                                      timer: 5000
                                    });

                        if($('#nbcomptes').val().length<1){
                           Toast.fire({
                              type: 'error',
                              title: 'Veuillez saisir le nombre de sous compte!!!'
                           });
                        }
                        else
                        {

                         var spinHandle_firstProcess = loadingOverlay.activate();


                         $.ajax({
                             url:'/corporate/formations/',
                             type:'Post',

                             data:{nbcomptes:$('#nbcomptes').val(), formation_id:$('#formation_id').val()},

                             beforeSend:function(xhr){
                                 xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());

                             },
                             success: function(data){

                                 loadingOverlay.cancel(spinHandle_firstProcess);
                                 $('#AddCart').hide();

                                Toast.fire({
                                            type: 'success',
                                            title: 'La formation a été ajoutée avec succès!!!'
                                          });
                                          setTimeout(function() {
                                            $('#popup').show();
                                          },2000);

                             },
                             Error:function(){
                                 loadingOverlay.cancel(spinHandle_firstProcess);
                                 Toast.fire({
                                            type: 'error',
                                            title: 'Une erreur est survenue lors de l\'enregistrement. Verifiez que toutes les informations sont saisies correctement !!!'
                                          });

                             }
                         });

                        }


                });
    </script>

@endsection
