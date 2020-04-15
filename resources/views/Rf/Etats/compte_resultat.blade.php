


@extends('layouts.rf')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">COMPTE D'EXPLOITATION</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/rf/dashboard">SM</a></li>
              <li class="breadcrumb-item">FINANCES</li>
              <li class="breadcrumb-item active">COMPTE D'EXPLOITATION</li>
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
                  <h3 class="card-title">COMPTE D'EXPLOITATION</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div style="margin: 20px 0">
                        <form class="form-inline" action="">
                            <label style="margin-right: 5px" class="mr-10" for="debut">DEBUT</label>
                            <input type="date" class="form-control" name="debut" id="debut"/>

                            <label style="margin: 0 5px 0 20px" class="mr-10" for="debut">FIN</label>
                            <input type="date" style="margin-right: 20px" class="form-control" name="fin" id="debut"/>


                            <button class="btn btn-danger btn-sm" type="submit" title="charger"><i class="fa fa-search"></i></button>
                        </form>
                   </div>
                   <table class="table datatable table-bordered table-hover table-striped table-condensed">
                        <tbody>
                           <tr>
                               <th>CHIFFRE D'AFFAIRE</th>
                               <td>{{ number_format($ca,0,',','.') }}</td>
                           </tr>
                            <tr>
                               <th>CHARGES VARIABLES</th>
                               <td>{{ number_format($cv,0,',','.') }}</td>
                            </tr>
                            <tr>
                               <th>MARGE BRUTE</th>
                               <td>{{ number_format($ca - $cv,0,',','.') }}</td>
                            </tr>
                            <tr>
                               <th>CHARGES FIXES</th>
                               <td>{{ number_format($cf,0,',','.') }}</td>
                            </tr>
                            <tr>
                               <th>VALEUR AJOUTEE</th>
                               <td>{{ number_format($ca - $cv - $cf,0,',','.') }}</td>
                           </tr>
                   </tbody>

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



@endsection

@section('scripts')
<script>
     $(document).ready(function(){$(".datatable").DataTable();});
</script>
@endsection