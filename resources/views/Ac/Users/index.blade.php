


@extends('layouts.ac')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">BASE DE DONNEES DES AGENTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/ac/dashboard">TABLEAU DE BORD</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">Agent</li>
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
                  <h3 class="card-title">LISTE DES AGENTS <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-ciacle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>NOM</th>
                      <th>PRENOM</th>
                      <th>ADRESSE</th>
                      <th>TELEPHONE</th>
                      <th>EMAIL</th>
                      <th>POSTE</th>
                      <th>DU</th>
                      <th>AU</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($livraisons as $livraison)
                          <tr>
                              <td>{{ $livraison->user->last_name }} </td>
                              <td>{{ $livraison->user->first_name }} </td>
                              <td>{{ $livraison->user->address }} </td>
                               <td>{{ $livraison->phone }} </td>
                                <td>{{ $livraison->poste->email }} </td>
                              <td>{{ $livraison->poste->name }}</td>
                              <td>{{ date_format($livraison->debut,'d/m/Y') }}</td>
                              <td>{{ date_format($livraison->fin,'d/m/Y') }}</td>
                              <td>
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-default btn-xs" href="{{route('ac.users.show',[$livraison->user->token])}}"><i class="fa fa-seaach"></i></a></li>
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
                      <th>PAYS RES.</th>
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



@endsection

@section('scripts')
<script>
     $(document).ready(function(){$(".datatable").DataTable();});
</script>
@endsection