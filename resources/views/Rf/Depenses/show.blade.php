@extends('......layouts.rf')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $depense->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $depense->name }}</li>
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
                        $lib = "";
                        if($depense->bulletin){
                            $lib = 'Paiement salaire - mois -'.$depense->bulletin->mois->name.' - '.$depense->bulletin->owner->name;
                        }else{
                            if($depense->tdepense){
                               $lib = $depense->tdepense->name;
                            }
                        }
                    ?>
                        <ul class="list-inline">
                            <li class="list-inline-item"><span class="label">LIBELLE :</span> <span class="value">{{ $lib }}</span></li>
                            <li class="list-inline-item"><span class="label">MONTANT :</span> <span class="value">{{ number_format($depense->montant,0,',','.') }}</span></li>
                            <li class="list-inline-item"><span class="label">DATE CONCERNEE :</span> <span class="value">{{ date_format($depense->jour,'d/m/Y') }}</span></li>
                            <li class="list-inline-item"><span class="label">DATE DE SAISIE :</span> <span class="value">{{ date_format($depense->created_at,'d/m/Y H:i:s') }}</span></li>
                            <li class="list-inline-item"><span class="label">OPERATEUR :</span> <span class="value">{{ $depense->user?$depense->user->name:'-' }}</span></li>
                        </ul>
                    
                       <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card bg-primary text-white">
                                    <h5 style="color: white; font-size: 12px">MOTIF:</h5>
                                    <p>
                                        {{ $depense->motif?$depense->motif:'Aucun !!!' }}
                                    </p>
                                </div>
                            </div>
                       </div>
                     
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