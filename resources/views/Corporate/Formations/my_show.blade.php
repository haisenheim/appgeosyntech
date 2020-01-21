@extends('......layouts.corporate')

<?php $formation= $myformation->formation; ?>


@section('page-title')
{{ $myformation->formation->name }}
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                 @include('includes.Show.formation_left_side_com')
            </div>
            <div class="col-md-8 col-sm-12">
               <div style="margin-top: 15px" class="card">
                   <div class="card-header">
                       <h4>INSCRIPTIONS</h4>
                       <span class="pull-right"><a class="btn btn-outline-info btn-xs" href="#" data-toggle="modal" data-target="#AddMember"><i class="fa fa-user-alt"></i></a></span>
                   </div>
                   <div>
                       <ul class="list" style="list-style-type: upper-roman;">
                           @foreach($myformation->comptes as $inscrit)
                               <li style="margin-top: 15px; padding-bottom: 5px; border-bottom: 1px #cccccc">{{ $inscrit->compte->name }}  
                                 <ul class="pull-right list-inline">
                                    <li class="list-inline-item"><a class="btn btn-xs btn-info" href="/corporate/formation/inscrit/{{ $inscrit->token }}"> <i class="fa fa-search"></i> </a></li>
                                 </ul>

                               </li>
                           @endforeach
                       </ul>
                   </div>
               </div>
            </div>
        </div>
    </div>

    <div class="modal" id="AddMember">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header bg-info">
               <h4 class="modal-title">{{ $formation->name }}</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">

                <div class="card">
                    <div class="card-body">
                           <div class="row">

                                <div class="col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label for="compte_id">SOUS COMPTE</label>
                                        <select class="form-control" name="compte_id" id="compte_id">
                                            <option value="0">SELECION DU COMPTE</option>
                                            @foreach($members as $member)
                                                <option value="{{ $member->id }}">{{ $member->name  }} - <small>{{ $member->email }}</small></option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-12">
                                   <button style="margin-top: 30px" id="btn-add"  class="btn btn-danger btn-sm"><i class="fa fa-w fa-save"></i> AJOUTER</button>
                                 </div>
                            </div>
                            <div class="divider"></div>
                         <table id="tab-members" class="table table-bordered table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th>Sous Compte</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                         </table>
                         <form action="">
                             {{csrf_field()}}
                             <input type="hidden" id="formation_id" value="{{ $formation->id }}"/>

                         </form>

                    </div>
                </div>
             </div>

           </div>
           <!-- /.modal-content -->
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
        $('#btn-add').click(function(e){
            if($('#compte_id').val()<1){

            }else{
                var exist = false;
                $('#tab-members').find('tbody').find('tr').each(function(){
                    if($('#compte_id').val() == $(this).data('id')){
                        exist = true;
                    }
                });

                if(exist){
                    alert('Compte existe dans le tableau !!!');
                }else{
                    var tr = '<tr data-id='+ $('#compte_id').val()  +' ><td>'+ $('#compte_id option:selected').text()  +'</td><td><span class="remove"><i class="fa fa-trash"></i></span></td></tr>';
                    $('#tab-members').find('tbody').append(tr);

                }
            }
             $('.remove').click(function(){
                $(this).parent().parent().remove();
             });
        });

        $('#btn-save').click(function(e){

                    e.preventDefault();
                     const Toast = Swal.mixin({
                                      toast: true,
                                      position: 'top-end',
                                      showConfirmButton: false,
                                      timer: 5000
                                    });

                        if($('#tab-members').find('tbody').find('tr').length<1){
                           Toast.fire({
                              type: 'error',
                              title: 'Veuillez selectionner des sous compte!!!'
                           });
                        }
                        else
                        {

                         var spinHandle_firstProcess = loadingOverlay.activate();
                          var comptes = [];
                          $('#tab-members').find('tbody').find('tr').each(function(){
                            comptes.push($(this).data('id'));
                          });

                         $.ajax({
                             url:'/corporate/formation/add-comptes',
                             type:'Post',

                             data:{nbcomptes:$('#nbcomptes').val(), formation_id:$('#formation_id').val()},

                             beforeSend:function(xhr){
                                 xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());

                             },
                             success: function(data){

                                 loadingOverlay.cancel(spinHandle_firstProcess);


                                Toast.fire({
                                            type: 'success',
                                            title: 'La formation a été ajoutée avec succès!!!'
                                          });


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
