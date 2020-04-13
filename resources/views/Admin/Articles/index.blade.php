@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ARTICLES</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">Articles</li>
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
                  <h3 class="card-title">ARTICLES</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">



                   <table class="table table-bordered table-striped table-condensed table-hover datatable">
                        <thead>
                            <tr>
                                <th>DESIGNATION</th>

                                <th>QUANTITE EN STOCK</th>
                                <th>SEUIL MINIMUM</th>
                                <th>CATEGORIE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($articles as $article)

                                <tr style="background-color: <?= ($article->quantity <= $article->minimum)?'rgba(255, 10, 3, 0.36)':''  ?> ">
                                    <td>{{ $article->name }}</td>
                                    <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ number_format($article->quantity,0,',','.') }} {{ $article->unite?$article->unite->name:'Unité(s)' }}</td>
                                    <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ number_format($article->minimum,0,',','.') }} {{ $article->unite?$article->unite->name:'Unité(s)' }}</td>
                                    <td>{{ $article->type?$article->type->name:'-' }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline">
                                                 <a class="btn btn-xs btn-info" href="#"><i class="fa fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </td>
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





@endsection
@section('scripts')
<script>
     $(document).ready(function(){$(".datatable").DataTable();});
</script>
@endsection