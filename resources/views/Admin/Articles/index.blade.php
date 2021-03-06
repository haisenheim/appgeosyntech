@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">CATALOGUE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">GSM</a></li>
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
                                <th>FAMILLE</th>
                                <th>RE</th>
                                <th>SE</th>
                                <th>FI</th>
                                <th>ET</th>
                                <th>DR</th>
                                <th>PR</th>
                                <th>EN</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>

                            @foreach($articles as $group=>$value)
                                <tr class="bg-info">
                                    <th style=" font-weight: bolder; color: #f5f5f5;"  colspan="11">{{ $group }}</th>
                                </tr>
                                @foreach($value as $article)
                                  <tr>
                                      <td>{{ $article->name }} </td>
                                      <td>{{ $article->fournisseur?$article->fournisseur->name:'-' }}</td>
                                      <td>{{ $article->category?$article->category->name:'-' }}</td>
                                      <td class="text-center"><?= $article->re?'<span class="badge badge-light"><i class="fa fa-check-circle"></i></span>':'' ?></td>
                                      <td class="text-center"><?= $article->se?'<span class="badge badge-light"><i class="fa fa-check-circle"></i></span>':'' ?></td>
                                      <td class="text-center"><?= $article->fi?'<span class="badge badge-light"><i class="fa fa-check-circle"></i></span>':'' ?></td>
                                      <td class="text-center"><?= $article->et?'<span class="badge badge-light"><i class="fa fa-check-circle"></i></span>':'' ?></td>
                                      <td class="text-center"><?= $article->dr?'<span class="badge badge-light"><i class="fa fa-check-circle"></i></span>':'' ?></td>
                                      <td class="text-center"><?= $article->pr?'<span class="badge badge-light"><i class="fa fa-check-circle"></i></span>':'' ?></td>
                                      <td class="text-center"><?= $article->en?'<span class="badge badge-light"><i class="fa fa-check-circle"></i></span>':'' ?></td>
                                      <td style="min-width: 7%;">
                                      <ul style="margin-bottom: 0" class="list-inline">
                                        <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.articles.show',[$article->id])}}"><i class="fa fa-search"></i></a></li>
                                        <li class="list-inline-item"><a class="btn btn-info btn-xs btn-edit" href="{{route('admin.articles.edit',[$article->id])}}"><i class="fa fa-edit"></i></a></li>

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