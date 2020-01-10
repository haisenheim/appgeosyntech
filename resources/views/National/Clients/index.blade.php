


@extends('......layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">CLIENTS ORDINANIRES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/national/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">Porteurs de projets</li>
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
                  <h3 class="card-title">LISTE DES CLIENTS ORDINANIRES</h3>
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
                      <th>AGENCE</th>
                      <th><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $ville)
                          <tr>
                              <td>{!! $ville->last_name !!} </td>
                              <td>{!! $ville->first_name !!} </td>
                              <td>{!! $ville->address !!} </td>
                               <td>{!! $ville->phone !!} </td>
                                <td>{!! $ville->email !!} </td>
                              <td>{!! $ville->agence?$ville->agence->name:'-' !!}</td>
                              <td>
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-default btn-xs" href="{{route('national.members.show',[$ville->id])}}"><i class="fa fa-search"></i></a></li>
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
                      <th>AGENCE</th>
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