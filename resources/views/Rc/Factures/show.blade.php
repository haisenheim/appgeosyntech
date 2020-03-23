@extends('......layouts.rc')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $client->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $client->name }}</li>
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
                    <h4>SECTEUR <a href="#" data-toggle="modal" data-target="#addSecteur" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus-circle"></i></a></h4>
                </div>
                <div class="card-body">
                    <ul class="list-inline">
                             @foreach($client->secteurs as $ville)
                              <li class="list-inline-item index-item">

                               <ul class="list-inline " style="margin-left: 10px">
                                    <li class="list-inline-item">{!! $ville->name !!}</li>
                               </ul>
                               </li>
                            @endforeach

                    </ul>
                </div>
            </div>
            <div class="card">

                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#home-justify" role="tab">
                                <i class="fas fa-coins mr-1 align-middle"></i> <span class="d-none d-md-inline-block">FACTURES</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#profile-justify" role="tab">
                                <i class="dripicons-document-remove mr-1 align-middle"></i> <span class="d-none d-md-inline-block">COMMANDES</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="home-justify" role="tabpanel">

                                <table class="table datatable table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>PERIODE</th>
                                            <th>MONTANT</th>
                                            <th>STATUT</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client->factures as $liv)

                                            <tr>
                                                <td>{{ $liv->name }}</td>

                                                <td>{{ $liv->moi_id }} / {{ $liv->annee }} </td>
                                                <td>{{ number_format($liv->montant, 0,',','.') }}</td>
                                                <td> <span class="badge badge-{{ $liv->etat['color'] }}">{{ $liv->etat['name'] }}</span> </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/rc/factures/{{ $liv->token }}"></a></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>

                        </div>
                        <div class="tab-pane" id="profile-justify" role="tabpanel">
                            <table class="table datatable table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th>DATE</th>
                                            <th>NB D'AGENT</th>
                                            <th>STATUT</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client->commandes as $liv)

                                            <tr>

                                                <td>{{ $liv->name }}</td>
                                                <td>{{ date_format($liv->created_at,'d/m/Y') }}</td>
                                                <th>{{ number_format($liv->nombre,0,',','.') }}</th>
                                                <td> <span class="badge badge-{{ $liv->etat['color'] }}">{{ $liv->etat['name'] }}</span> </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/rc/factures/{{ $liv->token }}"></a></li>
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

        <div class="modal fade" id="addSecteur">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">AJOUT DE SECTEUR</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form  action="/rc/client/add-secteur" method="post">
                  {{csrf_field()}}

                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <input type="hidden" name="client_id" value="{{ $client->id }}"/>
                              <div class="form-group">
                                <label for="competence_id">SECTEUR</label>
                                <select class="form-control" name="secteur_id" id="competence_id" required="required">
                                      <option value="">SELECTIONNER UN SECTEUR</option>
                                      @foreach($secteurs as $comptence)
                                          <option value="{{ $comptence->id }}">{{ $comptence->name }}</option>
                                      @endforeach
                                </select>
                              </div>
                          </div>

                      </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                    </div>
                  </form>
                </div>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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