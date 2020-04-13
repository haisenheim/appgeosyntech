@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $fiche->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $fiche->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <?php $client= $fiche->client ?>
    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="card">

                <div class="card-body">
                    <div class="card text-white" style="background-color: #888; border-color: #333;">
                        <div class="card-body">
                            FICHE &numero;: <span style="text-align: right;" class="value">{{ $fiche->name }}</span>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span>JOUR : </span> <span class="value"> {{ date_format($fiche->jour,'d/m/Y') }}</span>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <ul class="list-group">
                                <li class="list-group-item">CLIENT : <span class="value"> {{ $client->name }}</span></li>

                            </ul>
                        </div>
                    </div>


                    <h6>POINTAGE </h6>
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>AGENT</th>
                               <th>POSTE</th>

                               <th>HEURE D'ENTREE</th>
                               <th>HEURE DE SORTIE</th>


                           </tr>
                       </thead>
                       <tbody>

                           @foreach($fiche->pointages as $liv)

                               <tr>
                                   <td>{{ $liv->user?$liv->user->name:'-' }}</td>
                                   <td>{{ $liv->livraison->poste?$liv->livraison->poste->name:'-' }}</td>


                                   <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ $liv->debut?date_format($liv->debut,'H:i'):'-' }}</td>
                                   <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ $liv->fin?date_format($liv->fin,'H:i'):'-' }}</td>


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