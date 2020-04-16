@extends('......layouts.ro')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $partenaire->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $partenaire->name }}</li>
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
                    <h3>LISTE DES CERTIFICATS ETABLIS</h3>
                </div>
                <div class="card-body">
                    <table class="table datatable table-bordered table-hover table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DATE</th>
                                <th>TYPE DE DOCUMENT</th>
                                <th>DEBUT VALIDITE</th>
                                <th>FIN VALIDITE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partenaire->certificats as $liv)
                    
                                <tr>
                                    <td>{{ $liv->name }}</td>
                    
                                    <td>{{ date_format($liv->created_at,'d/m/Y') }}</td>
                                    <td>{{ $liv->tcertificat?$liv->tcertificat->name:'-' }}</td>
                                    <td>{{ date_format($liv->debut,'d/m/Y') }}</td>
                                    <td>{{ date_format($liv->fin,'d/m/Y') }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/ro/show-certificat/{{ $liv->token }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                    
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">{{ $partenaire->name }} - <span style="font-size: smaller; font-weight: bolder">{{ $partenaire->tpartenaire?$partenaire->tpartenaire->name:'-' }}</span>  </h5>
                    

                </div>
                <div class="card-body">
                        <div style="padding: 10px auto; max-width: 200px; margin: 0 auto">
                            <div class="">
                              <img style="max-height: 100px; max-width:100px; border-radius: 50%" src="<?= $partenaire->imageUri?asset('img/'. $partenaire->imageUri):asset('img/logo.png') ?>" class="img-circle elevation-2">
                            </div>
                        </div>
                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Adresse: {{ $partenaire->address }}</h5></li>
                            <li class="list-group-item"><h6><i class="fa fa-mobile"></i> {{ $partenaire->phone }}</h6></li>
                            <li class="list-group-item"><h6><i class="fa fa-envelope"></i> {{ $partenaire->email }}</h6></li>
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