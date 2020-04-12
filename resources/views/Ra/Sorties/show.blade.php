@extends('......layouts.ra')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $sortie->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $sortie->name }} - <span style="font-size: smaller">{{ date_format($sortie->created_at,'d/m/Y') }}</span></li>
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

                    <div class="card text-white" style="background-color: #888; border-color: #333;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    ETAT DE SORTIE &numero;: <span style="text-align: right;" class="value">{{ $sortie->name }}</span>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    CLIENT : <span style="text-align: right;" class="value">{{ $sortie->client->name }}</span>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    MISSION &numero;: <span style="text-align: right;" class="value">{{ $sortie->commande->name }}</span>
                                </div>
                            </div>

                        </div>
                   </div>

                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>AGENT</th>
                               <th>POSTE</th>
                               <th>ARTICLE</th>
                               <th>QUANTITE</th>


                           </tr>
                       </thead>
                       <tbody>
                           @foreach($sortie->lignes as $liv)

                               <tr>
                                   <td>{{ $liv->livraison?$liv->livraison->user->name:'-' }}</td>
                                   <td>{{ $liv->livraison?$liv->livraison->poste->name:'-' }}</td>
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