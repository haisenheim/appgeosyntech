@extends('......layouts.rc')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $bulletin->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $bulletin->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <?php $user= $bulletin->owner ?>
    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">

                <div class="card-body">
                    <div class="card text-white" style="background-color: #888; border-color: #333;">
                        <div class="card-body">
                            BULLETIN &numero;: <span style="text-align: right;" class="value">{{ $bulletin->name }}</span>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span>NOM DE L'AGENT : </span> <span class="value"> {{ $user->name }}</span>
                                </li>
                                <li class="list-group-item">CATEGORIE SOCIO-PROFESSIONNELLE : <span class="value"> {{ $user->classe?$user->classe->category->name:'-' }} </span></li>
                                <li class="list-group-item"> SALAIRE DE BASE : <span class="value"> {{ number_format($bulletin->minimum,0,',','.') }} </span></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <ul class="list-group">
                                <li class="list-group-item">PLACEMENT : <span class="value"> {{ $bulletin->livraison->client->name }}</span></li>
                                <li class="list-group-item">POSTE : <span class="value"> {{ $bulletin->livraison->poste->name }}</span></li>
                            </ul>
                        </div>
                    </div>


                    <h6>LISTE DES PRIMES </h6>
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>PRIME</th>

                               <th>MONTANT</th>


                           </tr>
                       </thead>
                       <tbody>
                           <?php $total = 0 ?>
                           @foreach($bulletin->livraison->primes as $liv)
                            <?php $total = $total + $liv->montant ?>
                               <tr>
                                   <td>{{ $liv->tprime?$liv->tprime->name:'-' }}</td>


                                   <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ number_format($liv->montant, 0,',','.') }}</td>


                               </tr>

                           @endforeach
                           <tr>
                                <td>TOTAL</td>
                                <th style="padding-right: 10px; text-align: right; "><?= number_format($total,0,',','.') ?></th>

                           </tr>

                       </tbody>
                   </table>
                   <div class="card text-white" style="background-color: #888; border-color: #333;">
                        <div class="card-body">
                            NET A PERCEVOIR : <span style="text-align: right;" class="value">{{ number_format($total + $bulletin->minimum,0,',','.') }}</span>
                        </div>
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