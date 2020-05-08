@extends('layouts.admin')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">BASE DE DONNEES DES PROJETS</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">SGM</a></li>
              <li class="breadcrumb-item">RELATION CLIENT</li>
              <li class="breadcrumb-item active">PROJETS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')


     <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">PROJETS <a class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>DATE</th>
                      <th>NOM</th>
                      <th>MAITRE D'OUVRAGE</th>


                      <th>SITE DE LOCALISATION</th>


                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projets as $projet)

                          <tr>
                              <td>{{ date_format($projet->created_at,'d/m/Y') }}</td>
                              <td>{{ \Illuminate\Support\Str::limit($projet->name,50) }}</td>
                              <td>{{ $projet->maitre?$projet->maitre->name:'-' }}</td>

                              <td>{{ $projet->site }}</td>


                              <td style="min-width: 7%;">
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.projets.show',[$projet->token])}}"><i class="fa fa-search"></i></a></li>


                              </ul>
                              </td>
                          </tr>


                      @endforeach

                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>

          <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVEAU PROJET</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.projets.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">NOM</label>
                                      <input type="text" class="form-control" id="name" name="name" required="required" placeholder="Saisir le nom ">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">CLIENT</label>
                                      <select required="required" name="client_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($clients as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">MAITRE D'OUVRAGE</label>
                                      <select required="required" name="maitreouvrage_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($clients as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">CS DU MARCHE</label>
                                      <select required="required" name="cs_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($clients as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">Ing. DU MARCHE</label>
                                      <select required="required" name="ing_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($clients as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">CONTRACTANT</label>
                                      <select required="required" name="contractant_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($clients as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                </div>
                               <h6 style=" margin:20px 0 15px 0; padding-bottom: 10px; border-bottom: 1px solid orangered">SITE DE LOCALISATION</h6>
                                <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">PAYS</label>
                                      <select required="required" name="pay_id" id="pay_id" class="form-control">

                                            @foreach($pays as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">REGION</label>
                                      <select required="required" name="region_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($regions as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">LIEU DIT</label>
                                      <input type="text" class="form-control" id="name" name="lieu" placeholder="Saisir le lieu precis">
                                    </div>
                                </div>

                                <div class="divider"></div>
                                </div>
                                    <h6 style=" margin:20px 0 15px 0; padding-bottom: 10px; border-bottom: 1px solid orangered">DEMANDEUR</h6>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">NOM</label>
                                              <input type="text" class="form-control" id="name" name="demandeur_name" placeholder="Saisir le nom">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">ADRESSE</label>
                                              <input type="text" class="form-control" id="name" name="demandeur_address" >
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                              <label for="phone">TELEPHONE</label>
                                              <input type="text" class="form-control" id="phone" name="demandeur_phone" placeholder="exple : 0456773878">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                              <label for="email">EMAIL</label>
                                              <input  type="email" class="form-control" id="email" name="demandeur_email" placeholder="exple : info@system.com">
                                            </div>
                                        </div>
                                    </div>

                                    <h6 style=" margin:20px 0 15px 0; padding-bottom: 10px; border-bottom: 1px solid orangered">POINT FOCAL</h6>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">NOM</label>
                                              <input type="text" class="form-control" id="name" name="pf_name" placeholder="Saisir le nom">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">ADRESSE</label>
                                              <input type="text" class="form-control" id="name" name="pf_address" >
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                              <label for="phone">TELEPHONE</label>
                                              <input type="text" class="form-control" id="phone" name="pf_phone" placeholder="exple : 045673243">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                              <label for="email">EMAIL</label>
                                              <input  type="email" class="form-control" id="email" name="pf_email" placeholder="exple : info@gsm.com">
                                            </div>
                                        </div>
                                    </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
          </div>

@endsection

