
@extends('......layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">CONSULTANTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ACCUEIL</a></li>

              <li class="breadcrumb-item active">Consultants</li>
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
                  <h3 class="card-title">BASE DE DONNEES DES CONSULTANTS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed">
                    <thead>
                     <tr>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>ADRESSE</th>
                            <th>TELEPHONE</th>
                            <th>EMAIL</th>
                            <th>TYPE DE COMPTE</th>
                            <th><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{!! $user->last_name !!} </td>
                                <td>{!! $user->first_name !!} </td>
                                <td>{!! $user->address !!} </td>
                                <td>{!! $user->phone !!} </td>
                                <td>{!! $user->email !!} </td>
                                <td>{!! $user->senior?'CONSULTANT SENIOR' :'CONSULTANT JUNIOR' !!} </td>
                                <td>
                                    <ul class="list-inline">
                                        <li title="Toutes les dettes" class="list-inline-item"><a class="btn btn-danger btn-xs" href="/admin/consultant/creances/{{ $user->token }}"><i class="fa fa-coins"></i></a></li>
                                        <li title="Toutes les factures payées" class="list-inline-item"><a class="btn btn-warning btn-xs" href="/admin/consultant/payees/{{ $user->token }}"><i class="fa fa-search"></i></a></li>
                                        @if(!$user->senior)
                                            @if(!$user->confirmed)
                                                <li title="Promouvoir le consultant en confirmé" class="list-inline-item"><a class="btn btn-info btn-xs" href="/admin/consultant/set-confirm/{{ $user->token }}"><i class="fa fa-hand-up"></i></a></li>
                                            @else
                                                <li title="Promouvoir le consultant en senior" class="list-inline-item"><a class="btn btn-success btn-xs" href="/admin/consultant/set-senior/{{ $user->token }}"><i class="fa fa-hand-up"></i></a></li>
                                            @endif
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>NOM</th>
                      <th>PRENOM</th>
                      <th>ADRESSE</th>
                      <th>TELEPHONE</th>
                      <th>EMAIL</th>
                      <th>TYPE DE COMPTE</th>
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
                        <h4 class="modal-title">Nouveau compte de consultant</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.experts.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">NOM</label>
                              <input type="text" class="form-control" id="name" name="last_name" placeholder="Saisir le nom ">
                            </div>
                            <div class="form-group">
                              <label for="name">PRENOM</label>
                              <input type="text" class="form-control" id="name" name="first_name" placeholder="Saisir le prenom">
                            </div>
                            <div class="form-group">
                              <label for="name">ADRESSE</label>
                              <input type="text" class="form-control" id="name" name="address" placeholder="Saisir l'adresse">
                            </div>

                            <div class="form-group">
                              <label for="phone">TELEPHONE</label>
                              <input type="text" class="form-control" id="phone" name="phone" placeholder="exple : 0456773878">
                            </div>

                            <div class="form-group">
                              <label for="pay_id">PAYS</label>
                              <select name="pay_id" class="form-control" id="pay_id">
                                @foreach($pays as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                              </select>

                            </div>

                            <fieldset>
                                <legend>Infos. de connexion</legend>
                                <div class="form-group">
                                  <label for="email">EMAIL</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="exple : info@system.com">
                                </div>
                                <div class="form-group">
                                  <label for="name">MOT DE PASSE</label>
                                  <input type="password" class="form-control" id="name" name="password" placeholder="">
                                </div>
                            </fieldset>


                            <div class="form-group">
                            <label for="exampleInputFile">PHOTO</label>
                            <input type="file" class="form-control" id="exampleInputFile" name="imageUri">
                          </div>
                          </div>

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