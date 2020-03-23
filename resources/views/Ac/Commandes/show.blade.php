@extends('......layouts.ac')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $commande->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $commande->name }} - <span style="font-size: smaller">{{ date_format($commande->created_at,'d/m/Y') }}</span></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <?php $client= $commande->client ?>
    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">

                <div class="card-body">
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>

                               <th>POSTE</th>
                               <th>QUANTITE</th>
                               <th>DEBUT</th>
                               <th>FIN</th>

                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($facture->lignes as $liv)

                               <tr>

                                   <td>{{ $liv->poste?$liv->poste->name:'-' }}</td>


                                   <td>{{ number_format($liv->quantity, 0,',','.') }}</td>
                                   <td>{{ date_format($commande->debut,'d/m/Y') }}</td>
                                   <td>{{ date_format($commande->fin,'d/m/Y') }}</td>

                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/ac/lignes/{{ $liv->token }}"></a></li>
                                       </ul>
                                   </td>
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