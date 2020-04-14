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
                    <h4>COMPETENCES <a href="#" data-toggle="modal" data-target="#addCompetence" class="btn btn-xs btn-info pull-right"><i class="fa fa-plus-circle"></i></a></h4>
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

                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#home-justify" role="tab">
                                <i class="dripicons-home mr-1 align-middle"></i> <span class="d-none d-md-inline-block">PLACEMENTS</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#profile-justify" role="tab">
                                <i class="dripicons-document-remove mr-1 align-middle"></i> <span class="d-none d-md-inline-block">CERTIFICATS</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#messages-justify" role="tab">
                                <i class="fas fa-coins mr-1 align-middle"></i> <span class="d-none d-md-inline-block">SALAIRES</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#settings-justify" role="tab">
                                <i class="fas fa-chart-line mr-1 align-middle"></i> <span class="d-none d-md-inline-block">CARRIERE</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="home-justify" role="tabpanel">

                                <table class="table datatable table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>ENTREPRISE</th>
                                            <th>EN TANT QUE</th>
                                            <th>DEBUT</th>
                                            <th>FIN</th>
                                            <th>SALAIRES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->livraisons as $liv)

                                            <tr>
                                                <td>{{ $liv->client?$liv->client->name:'-' }}</td>
                                                <td>{{ $liv->poste?$liv->poste->name:'-' }}</td>
                                                <td>{{ date_format($liv->debut,'d/m/Y') }}</td>
                                                <td>{{ date_format($liv->fin,'d/m/Y') }}</td>
                                                <td></td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>

                        </div>
                        <div class="tab-pane" id="profile-justify" role="tabpanel">
                            <table class="table datatable table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>INTITULE</th>

                                            <th>DEBUT</th>
                                            <th>FIN</th>
                                            <th><a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-certif"><i class="fa fa-plus-circle"></i></a></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->certificats as $liv)

                                            <tr>

                                                <td>{{ $liv->tcertificat?$liv->tcertificat->name:'-' }}</td>
                                                <td>{{ date_format($liv->debut,'d/m/Y') }}</td>
                                                <td>{{ date_format($liv->fin,'d/m/Y') }}</td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item"><a href="/rh/user/show-certif/{{ $liv->token }}"></a></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                             </table>
                        </div>
                        <div class="tab-pane" id="messages-justify" role="tabpanel">
                            <p class="mb-0">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                single-origin coffee squid. Exercitation +1 labore velit, blog
                                sartorial PBR leggings next level wes anderson artisan four loko
                                farm-to-table craft beer twee. Qui photo booth letterpress,
                                commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthetic magna delectus mollit.
                            </p>
                        </div>
                        <div class="tab-pane" id="settings-justify" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                mustache.
                            </p>
                        </div>
                    </div>

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
                            <li class="list-group-item"><h5>Adresse: {{ $user->address }}</h5></li>
                            <li class="list-group-item"><h6><i class="fa fa-mobile"></i> {{ $user->phone }}</h6></li>
                            <li class="list-group-item"><h6><i class="fa fa-envelope"></i> {{ $user->email }}</h6></li>
                            <li class="list-group-item"><h6><i class="mdi mdi-google-classroom"></i> {{ $user->classe?$user->classe->category->name:'-' }}</h6></li>
                            <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#addCategory" class="btn btn-xs btn-danger btn-block btn-sm"><i class="mdi mdi-shape-rectangle-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="modal fade" id="modal-certif">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">AJOUT D'UN DOCUMENT </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form enctype="multipart/form-data"  action="/rh/user/add-certificat" method="post">
                  {{csrf_field()}}

                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                              <div class="form-group">
                                <label for="competence_id">TYPE DE DOCUMENT</label>
                                <select class="form-control" name="tcertificat_id" id="competence_id" required="required">
                                      <option value="">SELECTIONNER UN TYPE DE DOCUMENT</option>
                                      @foreach($types as $type)
                                          <option value="{{ $type->id }}">{{ $type->name }}</option>
                                      @endforeach
                                </select>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="debut">DEBUT</label>
                                    <input id="debut" type="date" required="required" class="form-control" name="debut"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fin">FIN</label>
                                    <input id="fin" type="date" required="required" class="form-control" name="fin"/>
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-12">
                                <div class="form-group">
                                    <label for="fichier">FICHIER</label>
                                    <input id="fichier" type="file" required="required" class="form-control" name="fichier"/>
                                </div>
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
                                <select class="form-control" name="competence_id" id="competence_id" required="required">
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
     <div class="modal fade" id="addCategory">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">AJOUT D'UNE CATEGORIE</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form  action="/rh/user/add-category" method="post">
                  {{csrf_field()}}

                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-12 col-sm-12">
                              <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                              <div class="form-group">
                                <label for="competence_id">CATEGORIE</label>
                                <select class="form-control" name="category_id" id="competence_id" required="required">
                                      <option value="">SELECTIONNER UNE CATEGORIE</option>
                                      @foreach($categories as $comptence)
                                          <option value="{{ $comptence->id }}">{{ $comptence->name }}</option>
                                      @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="debut">DEPUIS LE :</label>
                                <input class="form-control" name="debut" id="debut" type="date" required="required">

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