@extends('layouts.admin')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">COTATIONS TRANSITAIRES</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">SGM</a></li>
              <li class="breadcrumb-item">COTATIONS</li>
              <li class="breadcrumb-item active">COTATIONS TRANSITAIRES</li>
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
                  <h3 class="card-title">DEMANDES DE COTATION TRANSITAIRE<a class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>DATE</th>
                      <th>TRANSITAIRE</th>
                      <th>ORIGINE</th>
                      <th>VOLUME DE GROS</th>
                      <th>POIDS DE GROS</th>
                      <th>PRIX</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cotations as $projet)

                          <tr>
                              <td>{{ date_format($projet->created_at,'d/m/Y') }}</td>
                              <td>{{ $projet->transitaire->sigle }}</td>
                              <td>{{ $projet->origine?$projet->origine->name:'' }}</td>
                              <td>{{ number_format($projet->volume,2,',','.') }}</td>
                              <td>{{ number_format($projet->poids,2,',','.') }}</td>
                               <td>{{ number_format($projet->prix,2,',','.') }}</td>
                              <td style="min-width: 7%;">
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.transcotations.show',[$projet->token])}}"><i class="fa fa-search"></i></a></li>
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
                        <h4 class="modal-title">NOUVELLE DEMANDE DE COTATION TRANSITAIRE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.transcotations.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">

                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">TRANSITAIRE</label>
                                      <select required="required" name="transitaire_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($fournisseurs as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">ORIGNINE</label>
                                      <select required="required" name="origine_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($villes as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">DESTINATION</label>
                                      <select required="required" name="destination_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($villes as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">OPTION D'IMPORTATION</label>
                                      <select required="required" name="import_option_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($ioptions as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">MODE DE TRANSPORT</label>
                                      <select required="required" name="transport_option_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($toptions as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                </div>
                               <h6 style=" margin:20px 0 15px 0; padding-bottom: 10px; border-bottom: 1px solid orangered">EMBALLAGE</h6>
                                <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="ft40">CONTAINER 40'</label>
                                      <input class="form-control" name="ft40" id="ft40" type="number"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="ft40">CONTAINER 20'</label>
                                      <input class="form-control" name="ft20" id="ft40" type="number"/>
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="ft40">PALLETS</label>
                                      <input class="form-control" name="pallets" id="ft40" type="number"/>
                                    </div>
                                </div>


                                </div>


                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm1">INFOMATIONS COMPLEMENTAIRES</label>
                                              <textarea class="form-control" name="expected_informations" id="elm1" cols="30" rows="10"></textarea>
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
         <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
          <!--tinymce js-->
        <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>

@endsection

