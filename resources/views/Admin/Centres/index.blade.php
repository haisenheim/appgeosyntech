@extends('......layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pays</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">CENTRES</li>
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
                  <h3 class="card-title">LISTE DES CENTRES DE FORMATION</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                      <th>NOM</th>

                      <th>ADRESSE</th>
                      <th>TELEPHONE</th>
                      <th>EMAIL</th>
                      <th>DATE DE CREATION</th>


                      <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($entreprises as $ville)

                          <tr>
                              <td>{!! $ville->name !!} </td>

                              <td>{!! $ville->address !!} </td>
                              <td>{!! $ville->phone !!} </td>
                              <td>{!! $ville->email !!} </td>
                              <td><?= date_format($ville->created_at,'d/m/Y H:i') ?></td>
                              <td>

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
                              <th>DATE DE CREATION</th>
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
                        <h4 class="modal-title">Nouvelle entreprise</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.entreprises.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">NOM</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom de l'entreprise">
                            </div>


                            <div class="form-group">
                              <label for="type_id">PAYS</label>
                              <select name="pay_id" class="form-control" id="type_id">
                                @foreach($pays as $p)
                                    <option value="{{ $p->id }}">{{$p->name}}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="longitude">ADRESSE</label>
                              <input type="text" class="form-control" id="longitude" name="address" >
                            </div>
                            <div class="form-group">
                              <label for="longitude">TELEPHONE</label>
                              <input type="text" class="form-control" id="longitude" name="phone" >
                            </div>
                            <div class="form-group">
                              <label for="longitude">EMAIL</label>
                              <input type="email" class="form-control" id="longitude" name="email" >
                            </div>
                            <div class="form-group">
                              <label for="longitude">LOGO</label>
                              <input type="file" class="form-control" id="longitude" name="imageUri" >
                            </div>
                            <div class="form-group">
                              <label for="description">DESCRIPTION</label>
                              <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>

                            <hr/>
                            <h6 class="page-header">Compte de l'Administrateur</h6>
                            <hr/>
                            <div class="form-group">
                              <label for="longitude">NOM</label>
                              <input type="text" class="form-control" id="longitude" name="last_name" >
                            </div>
                            <div class="form-group">
                              <label for="longitude">PRENOM</label>
                              <input type="text" class="form-control" id="longitude" name="first_name" >
                            </div>
                            <div class="form-group">
                              <label for="type_id">TYPE</label>
                              <select name="gender" class="form-control" id="type_id">
                                <option value="1">HOMME</option>
                                <option value="0">FEMME</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="longitude">ADRESSE</label>
                              <input type="text" class="form-control" id="longitude" name="user_address" >
                            </div>
                            <div class="form-group">
                              <label for="longitude">TELEPHONE</label>
                              <input type="text" class="form-control" id="longitude" name="user_phone" >
                            </div>
                            <div class="form-group">
                              <label for="longitude">EMAIL</label>
                              <input type="email" class="form-control" id="longitude" name="user_email" >
                            </div>
                            <div class="form-group">
                              <label for="longitude">MOT DE PASSE</label>
                              <input type="password" class="form-control" id="longitude" name="password" >
                            </div>
                            <div class="form-group">
                              <label for="longitude">PHOTO</label>
                              <input type="file" class="form-control" id="longitude" name="user_imageUri" >
                            </div>



                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-w fa-save"></i> Enregistrer</button>
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

  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">


<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}} "></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();

  });
</script>


@endsection