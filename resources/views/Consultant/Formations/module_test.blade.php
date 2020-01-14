@extends('......layouts.consultant')
@section('page-title')
{{ $module->name }}
@endsection
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                 @include('includes.Show.module_left_side')
            </div>
            <div class="col-md-8 col-sm-12">
                @if($module->questions->count() < 1)
                    <div class="card">
                        <div class="card-body">
                            <div style="margin: 30px; padding: 10px auto; width: 60%">
                                <p style="font-size: 14px">AUCUNE QUESTION</p>
                            </div>
                        </div>
                    </div>
                @else
                    <ul class="list-group">
                        @foreach($module->questions as $question)
                            <li class="list-group-item">
                                <h5>{{$question->name}}</h5>
                                <ol>
                                    @foreach($question->choices as $choice)
                                        <li style="margin-top: 10px">{{ $choice->name }} <span class="pull-right"><?= $choice->ok?'<span class="fa fa-check-circle"></span>':'<span class="fa fa-stop"></span>' ?></span></li>
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ul>


                @endif
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
        $('#btn-add').click(function(e){
            e.preventDefault();
            var choice= $('#choice').val();
            $('#choice').val('');
            var juste = $('#chk').is(':checked')?1:0;
            //$('#chk').val('');
            var rep = 'NON';
            if(juste){
            rep = 'OUI'
            }

            var tr = '<tr data-choice="'+ choice+'" data-juste='+ juste +'><td>'+ choice+'</td> <td>'+ rep +'</td><td><span class="remove btn btn-xs btn-danger"><i class="fa fa-trash"></i></span></td></tr>';
            console.log(tr);
            $('#tab-choices').find('tbody').append(tr);

            $('.remove').click(function(e){
                e.preventDefault();
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
            var spinHandle_firstProcess = loadingOverlay.activate();

            var data = [];
            $('#tab-choices').find('tbody').find('tr').each(function(e){
                var elt = {};
                elt.name = $(this).data('choice');
                elt.ok = $(this).data('juste');
                data.push(elt);
            });

            $.ajax({
                url:'/contributeur/test/add-question',
                type:'Post',
                dataType:'json',
                data:{donnees:data, name:$('#name').val(), token:$('#token').val()},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token',$('input[name="_token"]').val());

                },
                success: function(data){

                  loadingOverlay.cancel(spinHandle_firstProcess);

                   Toast.fire({
                     type: 'success',
                     title: 'La question a été ajoutée avec succès!!!'
                   });

                   setTimeout(function() {
                     window.location.reload();
                   },2000);
                },

                Error:function(){
                    loadingOverlay.cancel(spinHandle_firstProcess);
                    Toast.fire({
                               type: 'error',
                               title: 'Une erreur est survenue lors de l\'enregistrement de la question. Verifiez que toutes les informations sont saisies correctement !!!'
                             });


                }

            });
        });
    </script>

    <style>
        .table-condensed th, .table-condensed td {
            padding: .30rem 50rem;
        }
    </style>

@endsection





