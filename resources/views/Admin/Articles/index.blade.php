@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">CATALOGUE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">GM</a></li>
                        <li class="breadcrumb-item active">Catalogue</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="">
         <div class="">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Catalogue</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">



                   <table class="table table-bordered table-striped table-condensed table-hover datatable">
                        <thead>
                            <tr>
                                <th>DESIGNATION</th>

                                <th>FOURNISSEUR</th>
                                <th>CATEGORIE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($articles as $group=>$value)
                                <tr style="background-color: orangered; border: 1px solid orange">
                                    <th style="font-weight: bolder; color: #f5f5f5;"  colspan="11">{{ $group }}</th>
                                </tr>
                                @foreach($value as $article)
                                  <tr>
                                      <td>{{ $article->name }} </td>
                                      <td>{{ $article->fournisseur?$article->fournisseur->name:'-' }}</td>
                                      <td>{{ $article->category?$article->category->name:'-' }}</td>
                                      <td style="min-width: 7%;">
                                      <ul style="margin-bottom: 0" class="list-inline">
                                        <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.clients.show',[$article->token])}}"><i class="fa fa-search"></i></a></li>
                                        <li class="list-inline-item"><a data-toggle="modal" data-target="#modal-edit"
                                         class="btn btn-orange btn-xs btn-edit" href="#"><i class="fa fa-edit"></i></a></li>

                                      </ul>
                                      </td>
                                  </tr>
                                @endforeach
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





@endsection
@section('scripts')
<script>
     $(document).ready(function(){$(".datatable").DataTable();});
</script>
@endsection