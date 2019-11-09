


@extends('......layouts.commercial')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PORTEURS DE PROJETS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">ACCUEIL</a></li>

              <li class="breadcrumb-item active">Finances</li>
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
                  <h3 class="card-title">ETAT DES REVENUS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php $colors=['primary','danger','info','success']; $i=0; $ms = [1=>'JANVIER',2=>'FEVRIER',3=>'MARS',4=>'AVRIL',5=>'MAI',6=>'JUIN',7=>'JUILLET',8=>'AOUT',9=>'SEPTEMBRE',10=>'OCTOBRE',11=>'NOVEMBRE',12=>'DECEMBRE'] ?>
                    <div class="row">
                        @foreach($dossiers as $k=>$v)
                            <?php $i = $i<3?$i+1:0; ?>
                            <div class="col-md-4 col-sm-12">
                                <div class="card card-{{ $colors[$i] }} collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $k }}</h3>
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                           <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            @foreach($v as $m=>$prjs)
                                                <div class="card  collapsed-card">
                                                    <div class="card-header bg-{{ $colors[$i] }}">
                                                        <h3 class="card-title">{{ $ms[$m] }}</h3>
                                                        <div class="card-tools">
                                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                                           <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-condensed table-striped, table-hover">
                                                <thead>
                                                    <tr>
                                                       <th>CLIENT</th>
                                                       <th>DOSSIER</th>
                                                       <th>DATE DE CREATION</th>
                                                       <th>REVENU</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($prjs as $prj)
                                                        <tr>
                                                            <td>{{ $prj['representant'] }}</td>
                                                            <td>{{ $prj['name'] }}</td>
                                                            <td>{{ date_format(\Carbon\Carbon::createFromTimeString($prj['created_at']), 'd/m/Y') }}</td>
                                                            <th>-</th>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                             @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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