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

    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">
                <div class="card-header">

                        <ul class="list-inline">
                            @if($commande->step['level']==1 || $commande->step['level']==2)
                                <li class="list-inline-item"><a title="Annuler la procedure" class="btn btn-outline-danger btn-xs" href="/ac/commande/disable/{{ $commande->token }}"><i class="fa fa-trash"></i></a></li>
                                <li class="list-inline-item"><a title="Modifier" class="btn btn-outline-info btn-xs" href="/ac/commande/edit/{{ $commande->token }}"><i class="fa fa-edit"></i></a></li>
                            @endif
                            @if($commande->step['level']==1)
                                <li class="list-inline-item"><a title="Valider la demande" class="btn btn-outline-{{$commande->step['color']}} btn-xs" href="/ac/commande/valider/{{ $commande->token }}"><i class="fas fa-check-circle"></i></a></li>
                            @endif
                            @if($commande->step['level']==2)
                                <li class="list-inline-item"><a title="Commander" class="btn btn-outline-{{$commande->step['color']}} btn-xs" href="/ac/commande/order/{{ $commande->token }}"><i class="fa fa-edit"></i></a></li>
                            @endif
                        </ul>

                </div>
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
                           @foreach($commande->lignes as $liv)

                               <tr>

                                   <td>{{ $liv->poste?$liv->poste->name:'-' }}</td>


                                   <td>{{ number_format($liv->quantity, 0,',','.') }}</td>
                                   <td>{{ date_format($liv->debut,'d/m/Y') }}</td>
                                   <td>{{ date_format($liv->fin,'d/m/Y') }}</td>

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