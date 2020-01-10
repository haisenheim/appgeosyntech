@extends('......layouts.national')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">CLIENTS CORPORATE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/national/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">Entreprises</li>
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
                  <h3 class="card-title">LISTE DES ENTREPRISES</h3>
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


                      <th><a class="btn btn-info btn-xs" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></th>
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
                                    <ul class="list-inline">
                                            <li title="Afficher" class="list-inline-item"><a class="btn btn-info btn-xs" href="/national/entreprises/{{ $ville->token }}"><i class="fa fa-search"></i></a></li>

                                            @if($ville->active)
                                                <li title="bloquer le client" class="list-inline-item"><a class="btn btn-danger btn-xs" href="/national/corporate/disable/{{ $ville->token }}"><i class="fa fa-lock"></i></a></li>
                                            @else
                                              <li title="débloquer le client" class="list-inline-item"><a class="btn btn-success btn-xs" href="/national/corporate/enable/{{ $ville->token }}"><i class="fa fa-unlock"></i></a></li>
                                            @endif
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