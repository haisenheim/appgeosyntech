@extends('......layouts.rf')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $paiement->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $paiement->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
   
    <div class="row">
        <div class="col-md-4 col-sm-12">

            <div class="card">

                <div class="card-body">
                    <?php
                        $lib = "-";
                        if($paiement->facture){
                            $lib = 'Paiement Facture - '.$paiement->facture->mois->name.' - '.$paiement->client->name;
                        }
                    ?>
                        <ul class="list-inline">
                            <li class="list-inline-item"><span class="label">LIBELLE :</span> <span class="value">{{ $lib }}</span></li>
                            <li class="list-inline-item"><span class="label">MONTANT :</span> <span class="value">{{ number_format($paiement->montant,0,',','.') }}</span></li>
                            <li class="list-inline-item"><span class="label">DATE DE SAISIE :</span> <span class="value">{{ date_format($paiement->created_at,'d/m/Y H:i:s') }}</span></li>
                            <li class="list-inline-item"><span class="label">OPERATEUR :</span> <span class="value">{{ $paiement->user?$paiement->user->name:'-' }}</span></li>
                        </ul>

                     
                </div>
            </div>
        </div>

    </div>

     <style>
        .label{
            font-weight: bolder;
        }

        .list-inline-item{
        padding: 10px;
        }
     </style>
@endsection

@section('script')
<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>
@endsection