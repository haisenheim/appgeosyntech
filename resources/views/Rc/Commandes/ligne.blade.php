@extends('......layouts.rc')


@section('page-title')
    <?php  $client = $ligne->commande->client; ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">COMMANDE &numero; {{ $ligne->commande->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $ligne->commande->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">



        <div class="col-md-6 col-sm-12">
            <div class="card-header">
                <h4 class="card-title">
                    POSTE : {{ $ligne->poste->name }} <span class="pull-right index-item"> {{ $ligne->quantity }} Agent(s)</span>
                </h4>
            </div>
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>AGENT</th>
                                <th>CATEGORIE</th>
                                <th>COMPETENCE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ligne->livraisons as $liv)
                                <tr>
                                    <td>{{ $liv->user->name }}</td>
                                    <td>{{ $liv->user->classe?$liv->user->classe->category->name:'-' }}</td>
                                    <td>
                                        <ul class="list-inline">
                                        @foreach($liv->user->competences as $cmp)
                                            <li class="list-inline-item index-item">{{ $cmp->name }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                             <li class="list-inline-item"><a class="btn btn-xs btn-success" title="Afficher" href="/rc/commande/livraison/{{$liv->token}}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">{{ $client->name }} </h5>


                </div>
                <div class="card-body">
                        <div style="padding: 10px auto">
                            <div class="img-center">
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