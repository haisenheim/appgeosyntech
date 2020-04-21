@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">OBJECTIFS DE PERFORMANCE CLIENTS</h4>

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

    <div class="container">
         <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">OBJECTIFS CLIENTS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            @foreach($tobclients as $type)
                                <?php $obj = $obj_clients->firstWhere('tobclient_id',$type->id); ?>
                                <tr>
                                 <td>{{ $type->name }}</td>
                                 <td class="td-value" data-val="{{ $type->id }}" data-field="tobclient_id" data-table="obtobclients" contenteditable="true">{{ $obj?$obj->objectif:0 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
                <!-- /.card-body -->
              </div>


              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">OBJECTIFS AGENTS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table class="table table-striped table-hover table-bordered">
                        <tbody>
                            @foreach($tobagents as $type)
                                <?php $obj = $obj_agents->firstWhere('tobclient_id',$type->id); ?>
                                <tr>
                                 <td>{{ $type->name }}</td>
                                 <td class="td-value" data-val="{{ $type->id }}" data-field="tobagent_id" data-table="obtobagents" contenteditable="true">{{ $obj?$obj->objectif:0 }}</td>
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
            var table = $(this).data('table');
            var field = $(this).data('field');
            var val = $(this).data('val');
            //var id = $(this).data('id');
            if($.isNumeric(objectif)){
                $.ajax({
                    url :'/admin/objectifs/save',
                    type:'get',
                    dataType:'json',
                    data:{table:table,field:field,objectif:objectif,val:val},
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