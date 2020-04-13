@extends('......layouts.admin')


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



                </div>
                <div class="card-body">
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>

                               <th>POSTE</th>
                               <th>QUANTITE</th>
                               <th>DEBUT</th>
                               <th>FIN</th>
                               <th>NIVEAU</th>
                               @if($commande->step['level']==3)
                                <th></th>
                               <th></th>
                               @endif
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($commande->lignes as $liv)

                               <tr>

                                   <td>{{ $liv->poste?$liv->poste->name:'-' }}</td>


                                   <td>{{ number_format($liv->quantity, 0,',','.') }}</td>
                                   <td>{{ date_format($liv->debut,'d/m/Y') }}</td>
                                   <td>{{ date_format($liv->fin,'d/m/Y') }}</td>
                                   <td><span class="badge badge-{{ $liv->level['color'] }}">{{ $liv->level['name'] }}</span></td>
                                   @if($commande->step['level']==3)
                                   <td>
                                       <div class="progress">
                                           <div class="progress-bar bg-{{ $liv->etat['color'] }}" role="progressbar" style="width: <?= $liv->etat['progress'].'%' ?>;" aria-valuenow="{{ $liv->etat['progress'] }}" aria-valuemin="0" aria-valuemax="100">{{ $liv->etat['progress'] }}%</div>
                                       </div>
                                   </td>


                                   <td>
                                       <ul class="list-inline">
                                             @if($liv->livraisons)
                                             <li class="list-inline-item"><a class="btn btn-xs btn-success" title="Afficher" href="/admin/commande/ligne/{{$liv->token}}"><i class="fa fa-eye"></i></a></li>
                                             @endif
                                       </ul>
                                   </td>
                                  @endif
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>

     
@endsection

@section('scripts')
<script>

  $(function () {
    $(".datatable").DataTable();

  });
</script>
@endsection