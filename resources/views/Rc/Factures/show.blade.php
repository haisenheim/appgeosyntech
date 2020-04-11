@extends('......layouts.rc')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $facture->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $facture->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <?php $client= $facture->client ?>
    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">

                <div class="card-body">
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>AGENT</th>
                               <th>POSTE</th>
                               <th>MONTANT</th>

                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $total = 0 ?>
                           @foreach($facture->bulletins as $liv)
                            <?php $total = $total + $liv->montant ?>
                               <tr>
                                   <td>{{ $liv->owner?$liv->owner->name:'-' }}</td>
                                   <td>{{ $liv->livraison?$liv->livraison->poste->name:'-' }}</td>


                                   <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ number_format($liv->montant, 0,',','.') }}</td>

                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/rc/bulletins/{{ $liv->token }}"></a><i class="fa fa-eye"></i></li>
                                       </ul>
                                   </td>
                               </tr>

                           @endforeach
                           <tr>
                                <td colspan="2">TOTAL</td>
                                <th style="padding-right: 10px; text-align: right; "><?= number_format($total,0,',','.') ?></th>
                                <td></td>
                           </tr>
                           <tr>
                                <td colspan="2">NET A PAYER</td>
                                 <th style="padding-right: 10px; text-align: right; "><?= number_format($total*(1 + $client->pourcentage/100),0,',','.') ?></th>
                                 <td></td>
                           </tr>
                       </tbody>
                   </table>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">{{ $client->name }} </h5>
                    <span style="float: right" class="badge badge-<?= !$client->active?'danger':'success' ?>"><?= !$client->active?'compte bloqué':'compte actif' ?></span>


                </div>
                <div class="card-body">
                        <div style="padding: 10px auto">
                            <div class="">
                              <img style="max-height: 100px; max-height:100px; border-radius: 50%" src="<?= $client->imageUri?asset('img/'. $client->imageUri):asset('img/avatar.png') ?>" class="img-circle elevation-2">
                            </div>
                        </div>
                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Adresse: {{ $client->address }}</h5></li>
                            <li class="list-group-item"><h6><i class="fa fa-mobile"></i> {{ $client->phone }}</h6></li>
                            <li class="list-group-item"><h6><i class="fa fa-envelope"></i> {{ $client->email }}</h6></li>

\                        </ul>
                    </div>
                    <div class="index-item">
                        <h5>Utilisateurs</h5>
                        <ul class="list-group">
                            @foreach($client->users as $user)
                                <li class="list-group-item">{{ $user->name }}- <span style="font-size: smaller">{{ $user->email }}</span> <span class="pull-right">{{ $user->role->name }}</span></li>
                            @endforeach
                        </ul>
                    </div>
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