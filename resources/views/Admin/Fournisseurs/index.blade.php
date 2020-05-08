


@extends('layouts.admin')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">BASE DE DONNEES DES FOURNISSEURS</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">TABLEAU DE BORD</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">Fournisseurs</li>
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
                  <h3 class="card-title">FOURNISSEURS <a class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>NOM</th>
                      <th>SIGLE</th>


                      <th>TELEPHONE</th>

                      <th>BASE</th>
                      <th>PAYS</th>
                      <th>SECTEUR</th>
                      <th>CODE</th>

                      <th>REPRESENTANT</th>


                      <th style="min-width: 7%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $fournisseur)
                        <?php //dd($fournisseur->secteur); ?>
                          <tr>
                              <td>{{ $fournisseur->name }}</td>
                              <td>{{ $fournisseur->sigle }}</td>


                               <td>{{ $fournisseur->phone }} </td>

                                <td>{{ $fournisseur->base?$fournisseur->base->name:'-' }}</td>

                                <td>{{ $fournisseur->pays?$fournisseur->pays->name:'-' }}</td>
                                <td>{{ $fournisseur->secteur?$fournisseur->secteur->name:'-' }}</td>

                                <td>{{ $fournisseur->code }}</td>
                                <td>{{ $fournisseur->representant?$fournisseur->representant->name:'-' }}</td>


                              <td style="min-width: 7%;">
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.fournisseurs.show',[$fournisseur->token])}}"><i class="fa fa-search"></i></a></li>
                                <li class="list-inline-item"><a data-toggle="modal" data-target="#modal-edit" data-token="{{ $fournisseur->token }}" data-name="{{ $fournisseur->name }}"
                                 data-sigle="{{ $fournisseur->sigle }}" data-code="{{ $fournisseur->code }}" data-phone="{{ $fournisseur->phone }}" data-address ="{{ $fournisseur->address }}"

                                 class="btn btn-orange btn-xs btn-edit" href="#"><i class="fa fa-edit"></i></a></li>

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
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVEAU FOURNISSEUR</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.fournisseurs.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">NOM</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom ">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="sigle">SIGLE</label>
                                      <input type="text" class="form-control" id="sigle" name="sigle" >
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">LOGO</label>
                                        <input type="file" class="form-control" id="exampleInputFile" name="imageUri">
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">ADRESSE</label>
                                      <input type="text" class="form-control" id="name" name="address" placeholder="Saisir l'adresse">
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-12">
                                    <div class="form-group">
                                      <label for="phone">TELEPHONE</label>
                                      <input type="text" class="form-control" id="phone" name="phone" placeholder="exple : 0456773878">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="email">EMAIL</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="exple : info@system.com">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">CODE</label>
                                      <input type="text" class="form-control" id="phone" name="code" placeholder="exple : 56773878">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">SECTEUR D'ACTIVE</label>
                                      <select required="required" name="secteur_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($secteurs as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">BASE</label>
                                      <select required="required" name="ville_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($villes as $fournisseur)
                                                <option value="{{ $fournisseur->id }}">{{ $fournisseur->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">PAYS</label>
                                      <select required="required" name="pay_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER UN PAYS</option>
                                            @foreach($pays as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                </div>


                                    <h6 style=" margin:20px 0 15px 0; padding-bottom: 10px; border-bottom: 1px solid orangered">Info du representant.</h6>

                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">NOM</label>
                                              <input type="text" class="form-control" id="name" name="last_name" placeholder="Saisir le nom">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">PRENOM</label>
                                              <input type="text" class="form-control" id="name" name="first_name" placeholder="Saisir le prenom">
                                            </div>
                                        </div>



                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                              <label for="phone">TELEPHONE</label>
                                              <input type="text" class="form-control" id="phone" name="user_phone" placeholder="exple : 0456773878">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                              <label for="email">EMAIL</label>
                                              <input required type="email" class="form-control" id="email" name="user_email" placeholder="exple : info@system.com">
                                            </div>
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

          <div class="modal fade" id="modal-edit">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">EDITION DU FOURNISSEUR</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="/admin/fournisseur/save" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="token" name="token"/>
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">NOM</label>
                                      <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="sigle">SIGLE</label>
                                      <input type="text" class="form-control" id="sigle" name="sigle" >
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">LOGO</label>
                                        <input type="file" class="form-control" id="exampleInputFile" name="imageUri">
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="address">ADRESSE</label>
                                      <input type="text" class="form-control" id="address" name="address" placeholder="Saisir l'adresse">
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-12">
                                    <div class="form-group">
                                      <label for="phone">TELEPHONE</label>
                                      <input type="text" class="form-control" id="phone" name="phone" placeholder="exple : 0456773878">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="email">EMAIL</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="exple : info@system.com">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="code">CODE</label>
                                      <input type="text" class="form-control" id="code" name="code" >
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="secteur_id">SECTEUR D'ACTIVITE</label>
                                      <select required="required" name="secteur_id" id="secteur_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($secteurs as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="ville_id">BASE</label>
                                      <select required="required" name="ville_id" id="ville_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($villes as $fournisseur)
                                                <option value="{{ $fournisseur->id }}">{{ $fournisseur->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">PAYS</label>
                                      <select required="required" name="pay_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER UN PAYS</option>
                                            @foreach($pays as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
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
          <script>

            $('.btn-edit').click(function(e){
                e.preventDefault();
                $('#modal-edit #name').val($(this).data('name'));
                $('#modal-edit #sigle').val($(this).data('sigle'));
                $('#modal-edit #code').val($(this).data('code'));
                $('#modal-edit #phone').val($(this).data('phone'));
                $('#modal-edit #email').val($(this).data('email'));
                $('#modal-edit #address').val($(this).data('address'));
                $('#modal-edit #token').val($(this).data('token'));
            })
          </script>



<style>
    .table th,
    .table td {
      padding: 0.35rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  </style>



@endsection

@section('scripts')

@endsection