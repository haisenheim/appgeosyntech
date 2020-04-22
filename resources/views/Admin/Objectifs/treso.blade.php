@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">OBJECTIFS DE PERFORMANCE - TRESORERIE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">OJECTIFS DE PERFOMANCE</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="">
         <div class="row">

            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">OBJECTIFS - TRESORERIE</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach($mois as $m)
                                  <th>{{ $m->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tobtresos as $type)
                                <tr>
                                <td>{{ $type->name }}</td>

                                @php
                                    $objs = $obj_tresos->where('tobtresos_id',$type->id);
                                @endphp
                                @foreach($mois as $m)
                                      @php
                                        $obj = $objs->where('moi_id',$m->id)->first();
                                      @endphp
                                     <td class="td-value" data-moi="{{ $m->id }}" data-val="{{ $type->id }}" data-field="tobtresorerie_id" data-table="obtobtresoreries" contenteditable="true">{{ $obj?$obj->objectif:0 }}</td>

                                @endforeach
                                </tr>

                            @endforeach
                        </tbody>
                   </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>



            <!-- /.col -->
          </div>
    </div>




<style>
    .table th,
    .table td {
      padding: 0.35rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  </style>


<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script>

    $('.td-value').keypress(function(e){
        var keycode = e.keyCode?e.keyCode:e.which;
        if(keycode == '13'){
            //alert($(this).text());
            var objectif = $(this).text();
            //var table = $(this).data('table');
            //var field = $(this).data('field');
            var val = $(this).data('val');
            var moi_id = $(this).data('moi');
            //var id = $(this).data('id');
            if($.isNumeric(objectif)){
                $.ajax({
                    url :'/admin/objectifs/save-treso',
                    type:'get',
                    dataType:'json',
                    data:{objectif:objectif,val:val,moi_id:moi_id},
                    success:function(){
                        window.location.reload();
                    }
                });
            }else{
                alert('donnée invalide !!!')
            }
        }
    })


</script>

@endsection