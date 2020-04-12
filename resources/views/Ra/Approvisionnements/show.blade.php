@extends('......layouts.ra')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $entree->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $entree->name }} - <span style="font-size: smaller">{{ date_format($entree->created_at,'d/m/Y') }}</span></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">

                <div class="card-body">
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>

                               <th>ARTICLE</th>
                               <th>QUANTITE</th>


                           </tr>
                       </thead>
                       <tbody>
                           @foreach($entree->lignes as $liv)

                               <tr>

                                   <td>{{ $liv->article?$liv->article->name:'-' }}</td>


                                   <td>{{ number_format($liv->quantity, 0,',','.') }}</td>



                               </tr>

                           @endforeach
                       </tbody>
                   </table>

                </div>
            </div>
        </div>




    </div>
     
@endsection

@section('script')
<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>
@endsection