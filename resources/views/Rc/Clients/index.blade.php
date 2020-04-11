


@extends('layouts.rc')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">BASE DE DONNEES DES CLIENTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/rc/dashboard">TABLEAU DE BORD</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">Clients</li>
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
                  <h3 class="card-title">BASE DES CLIENTS <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>NOM</th>

                      <th>ADRESSE</th>
                      <th>TELEPHONE</th>
                      <th>EMAIL</th>
                      <th>POURCENTAGE</th>

                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $ville)
                          <tr>
                              <td>{!! $ville->name !!} </td>

                              <td>{!! $ville->address !!} </td>
                               <td>{!! $ville->phone !!} </td>
                                <td>{!! $ville->email !!} </td>
                                <td style="text-align: right; padding-right: 10px">{{ number_format($ville->pourcentage,2,',','.') }}%</td>

                              <td>
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-default btn-xs" href="{{route('rc.clients.show',[$ville->token])}}"><i class="fa fa-search"></i></a></li>
                              </ul>
                              </td>
                          </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                      <th>NOM</th>

                      <th>ADRESSE</th>
                      <th>TELEPHONE</th>
                      <th>EMAIL</th>
                      <th>POURCENTAGE</th>

                      <th></th>
                    </tr>
                    </tfoot>
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
                        <h4 class="modal-title">NOUVEAU CLIENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('rc.clients.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">NOM</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom ">
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">POURCENTAGE</label>
                                      <input type="text" class="form-control" id="pourcentage" name="pourcentage" placeholder="Exple : 12.5 (Sans le signe %) ">
                                    </div>
                                </div>


                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">ADRESSE</label>
                                      <input type="text" class="form-control" id="name" name="address" placeholder="Saisir l'adresse">
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="phone">TELEPHONE</label>
                                      <input type="text" class="form-control" id="phone" name="phone" placeholder="exple : 0456773878">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="email">EMAIL</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="exple : info@system.com">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">LOGO</label>
                                        <input type="file" class="form-control" id="exampleInputFile" name="imageUri">
                                    </div>
                                </div>

                                <fieldset>
                                    <legend>Info de l'admin.</legend>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">NOM</label>
                                              <input type="text" class="form-control" id="name" name="last_name" placeholder="Saisir le nom">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">PRENOM</label>
                                              <input type="text" class="form-control" id="name" name="first_name" placeholder="Saisir le prenom">
                                            </div>
                                        </div>

                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                              <label for="name">ADRESSE</label>
                                              <input type="text" class="form-control" id="name" name="user_address" placeholder="Saisir l'adresse">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                              <label for="phone">TELEPHONE</label>
                                              <input type="text" class="form-control" id="phone" name="user_phone" placeholder="exple : 0456773878">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                              <label for="role_id">PAYS</label>
                                              <select required="required" name="pay_id" id="pay_id" class="form-control">
                                                <option value="0">SELECTIONNER UN PAYS</option>
                                                    @foreach($pays as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">
                                              <label for="email">EMAIL</label>
                                              <input required type="email" class="form-control" id="email" name="user_email" placeholder="exple : info@system.com">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">PHOTO</label>
                                                <input type="file" class="form-control" id="exampleInputFile" name="user_imageUri">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-info btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>

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
<script>
     $(document).ready(function(){$(".datatable").DataTable();});
</script>
@endsection