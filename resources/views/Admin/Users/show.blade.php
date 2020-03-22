@extends('......layouts.rh')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $user->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
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
                    <h4>COMPETENCES <a href="#" data-toggle="modal" data-target="#addCompetence" class="btn btn-xs btn-info"><i class="fa fa-plus-circle"></i></a></h4>
                </div>
                <div class="card-body">
                    <ul class="list-inline">

                             @foreach($user->competences as $ville)
                              <li class="list-inline-item index-item">

                               <ul class="list-inline " style="margin-left: 10px">
                                    <li class="list-inline-item">{!! $ville->name !!}</li>

                                    <li class="list-inline-item"><a title="supprimer" class="badge badge-danger" href="/rh/user/delete-competence/{{ $user->id }}/{{ $ville->id }}"><i class="fa fa-trash"></i></a></li>
                               </ul>
                               </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PLACEMENTS</h4>
                </div>
                <div class="card-body">
                   <table id="example1" class="table table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>ENTREPRISE</th>

                      <th>DEBUT</th>
                      <th>FIN</th>


                      <th>POSTE</th>
                      <th>STATUT</th>
                      <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->livraison as $liv)
                          <tr>
                             <td>{{ $liv->name }}</td>
                             <td>{{ $liv->ligne->commande->client->name }}</td>
                             <td>{{ date($liv->debut,'d/m/Y') }}</td>
                             <td>{{ date($liv->fin,'d/m/Y') }}</td>


                             <td>{{ $liv->poste?$liv->poste->name:'-' }}</td>
                             <td>-</td>
                              <td></td>

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
                    <h5 class="card-title">{{ $user->name }} </h5>
                    <span style="float: right" class="badge badge-<?= !$user->active?'danger':'success' ?>"><?= !$user->active?'compte bloqué':'compte actif' ?></span>


                </div>
                <div class="card-body">
                        <div style="padding: 10px auto">
                            <div class="">
                              <img style="max-height: 100px; max-height:100px; border-radius: 50%" src="<?= $user->imageUri?asset('img/'. $user->imageUri):asset('img/avatar.png') ?>" class="img-circle elevation-2">
                            </div>
                        </div>
                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-inline-item"><h5>Adresse: {{ $user->address }}</h5></li>
                            <li class="list-inline-item"><h6><i class="fa fa-mobile"></i> {{ $user->phone }}</h6></li>
                            <li class="list-inline-item"><h6><i class="fa fa-envelope"></i> {{ $user->email }}</h6></li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
     <div class="modal fade" id="addCompetence">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">AJOUT D'UNE COMPETENCE</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form  action="/rh/user/add-competence" method="post">
                  {{csrf_field()}}

                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                              <div class="form-group">
                                <label for="competence_id">NOM</label>
                                <select name="competence_id" id="competence_id" required="required">
                                      <option value="">SELECTIONNER UNE COMPETENCE</option>
                                      @foreach($competences as $comptence)
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
@endsection

@section('script')
<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>
@endsection